<?php

namespace App\Repository;

use App\Models\Aulas;
use App\Models\Professor;
use App\Entidades\EntidadeAulas\EntidadeAulas;
use App\HandlerMessager\HandlerMessager;
use App\Interfaces\AulasInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use App\ExceptionsErros\MyExceptionsErros;


class AulasRepository implements AulasInterface
{

    
    /**
     * Monta o um objeto padrão para as proximas validações e consequentimente salvar no banco de dados.
     */
    public function fromJsonAulas($data)
    {      
        $response = EntidadeAulas::fromJsonAulas($data);
        if(!isset($response->menssagem))
        {
            return $response;

        } else {

            $response = json_encode($response->menssagem);
            throw new Exception($response, 406);
        }

    }



    /**
     * Recebe dois parametros e cria as aulas associando com professor.
     * @param int $professor_id
     * @param array $aulas
     * @return array|Exception
     */
    public function salvarAula(int $professor_id, array $aulas)
    {   
        try {
            
            $profesor       = Professor::Find($professor_id);        
            $aula           = $this->montarProfessor($aulas, $profesor->id);
            $resultado      = $this->findProfessorAulas($profesor->id);
            return HandlerMessager::sucessMessage(201, [$resultado], 201);

        } catch (Exception $e) {

            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());
 
        }
    }



    /**
     * Busca as aulas que o professor leciona pelo $professor_id.
     * @param int $professor_id;
     */
    private function findProfessorAulas(int $professor_id)
    {

        $profesor   = Professor::Find($professor_id);  
        $profesor->load('aulas');
        return $profesor;

    }




    /**
     *Recebe dois parametros e retorna um array.
     *@param array $aulas
     *@param int professor_id
     *@return true 
     */
    public function montarProfessor(array $aulas, int $professor_id)
    {
        
        foreach ($aulas as $aula) {

            $aula['professor_id'] = $professor_id;
            $aula                 = $this->fromJsonAulas($aula);
            $aula                 = $this->unsetProfessor($aula);
            $aula                 = $this->storeAulas($aula);
        }
        
        return true;

    }


    /**
     * Monta o array para o metodo de adicao de aula.
     * @param array $aulas
     * @return array
     */
    private function unsetProfessor(array $aulas)
    {
        
        $array = [];
        $array['nome_aula']      = $aulas['nome_aula'];
        $array['nivel_aula']     = $aulas['nivel_aula'];
        $array['descricao_aula'] = $aulas['descricao_aula'];
        $array['professor_id']   = $aulas['professor_id'];

        return $array;


    }



    /**
     * Monta o array para o metodo de adicao de aula.
     * @param array $aulas
     * @return array
     */
    private function unsetProfessorForUpdate(array $aulas)
    {
        
        $array = [];

        $array['id']             = $aulas['aula_id'];
        $array['nome_aula']      = $aulas['nome_aula'];
        $array['nivel_aula']     = $aulas['nivel_aula'];
        $array['descricao_aula'] = $aulas['descricao_aula'];

        return $array;


    }



    /**
     *Efetiva os dados no banco de dados.
     */
    public function storeAulas($aulas)
    {   
        $array = Aulas::create($aulas);
        return $array;
    }



    /**
     * Busca as aulas pegando pelo Id
     * @param array $aulas
     */
    public function getAulas(array $aulas)
    {   
        $getAulas = [];
        
        foreach($aulas as $aula) {
            
           
            if(!isset($aula['aula_id']))
            {
                throw new Exception("Aula não informada.", 404);
            }

            
            $resultado = Aulas::find($aula['aula_id']);
            
            if(!$resultado)
            {
                throw new Exception("Aula não encontrada.", 404);
            }

            
            if($resultado->aluno_id)
            {
                throw new Exception("Impossivel deletar ou atualizar a aula de $resultado->nome_aula com um aluno associado.", 404);
            }

            $getAulas[] = $resultado;
           
        }
        
        return $getAulas;

    }


    /**
     * Apenas busca no banco a aula informada atraves do ID
     * @param int $id
     */
    public function getOnlyAulas(int $id)
    {

        $aula = Aulas::Find($id);
        if(!$aula)
        {
            throw new Exception("Aula não encontrada.",404);
        }

        return $aula;

    }





    /**
     * Valida a relação com professor e deleta
     * @param array $aulas
     * @param int $professor
     * @return bool|Exception
     */
    public function deleteAulas(array $aulas, int $professor)
    {
        
        foreach($aulas as $aula){

            if($aula->professor_id != $professor)
            {
                throw new Exception("Essa aula não pertence a este professor.",406);
            }

            Aulas::destroy($aula->id);
            
        }

        return true;

    }



    /**
     * Faz os preparativos para a delecao das aulas selecionados do professor
     * @param int $professor
     * @param array $aulas
     * @return array|Exception
     */
    public function generateDeleteAulas(int $professor, array $aulas)
    {
        
        try{

            $professor = Professor::Find($professor);  
            $aulas     = $this->getAulas($aulas);
            $delete    = $this->deleteAulas($aulas, $professor->id);
            return HandlerMessager::sucessMessage(200,["OK"],["Operação efetuada com sucesso."]);

        }catch(Exception $e){

            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());  
                  
        }

    }


    /**
     * Faz os preparativos para a atualização das aulas selecionados do professor
     * @param int $professor
     * @param array $aulas
     * @return array|Exception
     */
    public function generateUpdateAulas(int $professor, array $aulas)
    {
        
        try{

            $professor = Professor::Find($professor); 
            $update    = $this->updateAulas($aulas, $professor->id);
            return HandlerMessager::sucessMessage(200,[$professor->load('aulas')],['Sucesso.']);

        }catch(Exception $e){

            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());

        }

    }



    /**
    * Valida a relação com professor e faz o Update
    * @param array $aulas
    * @param int $professor
    * @return bool|Exception
    */
    public function updateAulas(array $aulas, int $professor)
    {  

        $getAulas  = $this->getAulas($aulas);

        foreach($getAulas as $myAulas){

            if($myAulas->professor_id != $professor)
            {
                throw new Exception("Essa aula não pertence a esse professor.",406);
            }

            foreach($aulas as $teste)
            {               
                $unset = $this->unsetProfessorForUpdate($teste);
                if($myAulas->id == $unset['id'])
                {
                    DB::table('aulas')->where('id', $myAulas->id)->update([
                    'nome_aula'      => $teste['nome_aula'],
                    'nivel_aula'     => $teste['nivel_aula'],
                    'descricao_aula' => $teste['descricao_aula']]);                  
                }
            }
        }

        return true;

    }




}
