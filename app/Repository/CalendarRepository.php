<?php

namespace App\Repository;

use App\Entidades\EntidadeCalendar\EntidadeCalendar;
use App\Models\Calendar;
use App\Models\Aulas;
use App\HandlerMessager\HandlerMessager;
use App\ExceptionsErros\MyExceptionsErros;
use App\Models\Professor;
use Exception;
use Illuminate\Support\Facades\DB;

class CalendarRepository {



    /**
    * Busca o caliendario de disponibiliade do professor
    */
    public function indexCalendar($data)
    {
        
        $paginate = $data->get('paginate');
        $paginate ? $paginate : $paginate = 10;
 
        $calendar = Calendar::paginate($paginate);
        if (!$calendar) return HandlerMessager::errorMessage(400, [$calendar],["Erro ao carregar calendario."]);
        else
        return HandlerMessager::sucessMessage(200, [$calendar],["Calendario carregados com sucesso."]);
        
        
    }


    /**
    *Com base em sua relação, este metodo busca as datas disponiveis com base no ID da aula. 
    *@param int $id
    */
    public function calendarShow(int $aula_id)
    {
        
        if(!isset($aula_id))
        {
            return HandlerMessager::errorMessage(400,['Registro não informado.'],['Erro ao efetuar operação.']);
        }

        $aulas    = new Aulas();
        $calendar = $aulas->Find($aula_id);

     
        if(isset($calendar->calendar))
        {
            return HandlerMessager::sucessMessage(200,[$calendar],["Operação realizada com sucesso."]);

        } else {

            return HandlerMessager::errorMessage(404,["Registro não encontrado."],['Erro ao efetuar opecação.']);
        }
 
    }
    


    /**
     * Valida e monta o Calendar enviado do front
     */
    public function fromJsonCalendar($calendar)
    {
        $response = EntidadeCalendar::fromJsonCalendar($calendar);
    
        if(!isset($response->menssagem))
        {
            return $response;

        } else {

            $response = json_encode($response->menssagem);
            throw new Exception($response, 406);
        }


    }


    /**
     * Busca o professor com base no ID informado.
     * @param int $professor
     */
    public function getProfessor(int $professor)
    {

        $professor = Professor::Find($professor);
        if(!$professor)
        {
            throw new Exception("Professor não existe.",404);
        }

        return $professor;

    }




    /**
     * Busca o professor com base no ID informado.
     * @param int $professor
     */
    public function getOnlyCalendar(int $calendar)
    {

        $calendar = Calendar::Find($calendar);
        if(!$calendar)
        {
            throw new Exception("Calendar não existe.",404);
        }

        return $calendar;

    }





    /**
     * Gerencia a criação o calendario de disponibiliade de aulas
     */
    public function calendarStore(int $professor, array $calendar)
    {   

        try{
        
           $professor = $this->getProfessor($professor);
           $calendar  = $this->validationClassCalendar($calendar);
           $calendar  = $this->checkRelationship($professor, $calendar);
           $this->saveCalendar($calendar);
           return HandlerMessager::sucessMessage(201,['Data da aula adicionada com sucesso.'],['Salvo com sucesso']);

        }catch(\Exception $e){
            
            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());
            
        }
    }



    /**
     * Verifica a relação do professor e aulas.
     * @param object $professor
     * @param array $calendars
     */
    public function checkRelationship($professor, $calendars)
    {
        
        $professor_id = $professor->id;
  
        foreach($calendars as $calendar){

            $aula_id = $calendar['aula_id'];

            $result = DB::table('professors')
            ->join('aulas','professors.id', '=', 'aulas.professor_id')
            ->where('professors.id',        '=',  $professor_id)
            ->where('aulas.id',             '=',  $aula_id)
            ->first();

            if(empty($result))
            {
                throw new Exception("Essa aula não pertence a este professor.",400);
            }
           
        }

        return $calendars;

    }


    /**
     * Salva os dados relacionados ao calendario
     */
    private function saveCalendar(array $calendars)
    {
        foreach($calendars as $calendar){
            Calendar::create($calendar);
        }
        return true;
    }



    /**
     * Pesquisa as aulas no banco de dados e monta um array padronizado.
     * @param array $calendars
     * @return array|Exception
     */
    public function validationClassCalendar($calendars)
    {
       
        $today = date('Ymd');
        foreach($calendars as $calendar){

            $aula = Aulas::Find($calendar['aula_id']);
            if(!$aula)
            {
                throw new Exception("Aula não encontrada.",404);
            }

            $calendar = $this->fromJsonCalendar($calendar);
            if($calendar['class_date'] < $today)
            {
                throw new Exception("Data informada não pode ser aceita, muito antiga.",400);
            }

            $array[] = $calendar;

        }

        return  $array;
    }





    public function calendarDelete(int $professor, array $aulas)
    {
        
       try{

        $professor         = $this->getProfessor($professor);
        $relationship      = $this->checkRelationship($professor, $aulas);
        $relationshipClass = $this->checkRelationshipClass($aulas);
        return HandlerMessager::sucessMessage(200,['Calendario deletado.'],['Operação realizada com sucesso.']);

       }catch(Exception $e){

        return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());

       }



    }
    

    /**
    * Verifica relação das aulas e o calendario informado.
    * @param array $calendars
    */
    public function checkRelationshipClass($aulas)
    {

        foreach($aulas as $aula){

            if(!isset($aula['calendar']))
            {
                throw new Exception("Calendario não informado.",400);
            }


            $aula_id = $aula['aula_id'];
            foreach($aula['calendar'] as $calendar){

                $response = Calendar::find($calendar['calendar_id']);

                if(!$response || $response['aula_id'] != $aula_id)
                {
                    throw new Exception("Calendario não existe ou não pertence a aula informada.",400);
                }

                Calendar::destroy($calendar['calendar_id']);
                
            }
            
        }

        return true;

    }




}