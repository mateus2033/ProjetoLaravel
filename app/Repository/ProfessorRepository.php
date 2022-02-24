<?php

namespace App\Repository;

use App\Entidades\EntidadeProfessor\EntidadeProfessor;
use App\ExceptionsErros\MyExceptionsErros;
use App\HandlerMessager\HandlerMessager;
use App\Interfaces\ProfessorInterface;
use App\Models\Professor;
use App\Services\MethodsCreateDomainServices;
use App\Services\MethodsUpdateDomainServices;
use App\Services\MethodsDeleteDomainServices;
use App\Repository\HalenRepository;
use App\Support\Email;
use App\Support\MensageEmail;
use App\Utils\TypeModels;
use Exception;



class ProfessorRepository implements ProfessorInterface
{

    protected $modeloClass  = Professor::class;
    protected $createDomain;
    protected $updateDomain;
    protected $deleteDomain;
    protected $validationServices;
  

    public function __construct(HalenRepository $validationServices, MethodsCreateDomainServices  $createDomain, MethodsUpdateDomainServices $updateDomain, MethodsDeleteDomainServices $deleteDomain)
    {
       $this->createDomain =  $createDomain;
       $this->updateDomain =  $updateDomain;
       $this->deleteDomain =  $deleteDomain;
       $this->validationServices = $validationServices;

    }


    public function professorIndex($data)
    {
        $paginate = $data->get('paginate');
        $paginate ? $paginate : $paginate = 10;

        $professor = Professor::paginate($paginate)->load('user', 'endereco', 'contato');
        if($professor->isNotEmpty())  return HandlerMessager::sucessMessage(200,[$professor],["Registros carregados."]);
        else
        return HandlerMessager::errorMessage(200,[$professor],["Não há registros no sistema."]); 

    }

    public function exibirProfessor($data)
    {
        $professor = Professor::find($data->get('id'));
        if($professor){ 
            
            $professor->load('user','endereco','contato');
            return HandlerMessager::sucessMessage(200,[$professor],["Registro carregado com sucesso."]);
    
        } else {
            return HandlerMessager::errorMessage(404,[$professor],["Registro não encontrado."]); 
        }
    }


    public function validarProfessor($data, $usuario)
    {
        
        $fromJsonProfessor = EntidadeProfessor::fromJsonProfessor($data, $usuario);
        if(!isset($fromJsonProfessor->menssagem))
        {   
            return $fromJsonProfessor;

        } else { 

            $professor = json_encode($fromJsonProfessor->menssagem);
            throw new Exception($professor,406);

        }

    }


    public function getProfessor($data)
    {
        
        $professor = null;
        if(!isset($data['id']))
        {
            throw new Exception("Professor não informado.",406);
        }

        $professor = Professor::find($data['id']);
        if($professor)
        {
            $professor->load('user');    
            return $professor;

        } else { 

            throw new Exception("Professor não encontrado.", 404);

        }
    }


    /**
     * Captura o objeto professor sem nenhuma relação.
     * @param array $data
     * @return object|Exception
     */
    public function getOnlyProfessor(array $data)
    {
        
        $professor = null;
        if(!isset($data['id']))
        {
            throw new Exception("Professor não informado.",406);
        }

        $professor = Professor::find($data['id']);
        if($professor)
        {  
            return $professor;

        } else { 

            throw new Exception("Professor não encontrado.", 404);
        }


    }


    public function gerenciarProfessorStore($usuario, $endereco, $contato)
    {
        $createUsuario    = $this->createDomain->registrarUsuario($usuario); 
        $createdEndereco  = $this->createDomain->criarEndereco($endereco);
        $createdCotato    = $this->createDomain->criarContato($contato);
        return ['usuario'=>$createUsuario , 'endereco'=>$createdEndereco , 'lista_contatos'=>$createdCotato];

    }


    public function relations(array $aluno, int $aluno_id, int $endereco_id, int $contato_id)
    {

        $aluno['users_id']        = $aluno_id;
        $aluno['endereco_id']     = $endereco_id;
        $aluno['lstacontato_id']  = $contato_id;
        return $aluno;
       
    }


    public function enviaEmail(string $name, string $email)
    {
   
        $enviaEmail = new Email(); 
        $enviaEmail->add(MensageEmail::$subject, MensageEmail::$body, $name, $email)->send();

        if($enviaEmail->error())
        {
            throw new Exception($enviaEmail->error()->getMessage());
        } 
           
    }



    public function professorStore(array $professor, array $usuario, array $endereco, array $contato)
    {   
        try {

            $generateDates    = $this->gerenciarProfessorStore($usuario, $endereco, $contato);
            $Professor        = $this->validarProfessor($professor, $generateDates['usuario']->id);
            $Professor        = $this->relations($Professor, $generateDates['usuario']->id, $generateDates['endereco']->id, $generateDates['lista_contatos']->id); 
            $cpf              = $this->validationServices->validarCPF($professor['cpf_professor'], TypeModels::$Professor);
            $Professor['cpf_professor'] = $cpf;
            $Professor                  = Professor::create($Professor);
            $Professor->load('user','endereco','contato');

            //Metodo de envio de Email.
            //$this->enviaEmail($Professor->user->name, $Professor->user->email); 
            return HandlerMessager::sucessMessage(201,[$Professor],["Registro salvo com sucesso."]);  
                
        } catch (\Exception $e) {
        
            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());

        } 

        
    }


    public function professorUpdate($professor, $endereco, $contato)
    {
        

        try {

          $hasProfessor      = $this->getProfessor($professor); 
          $professor         = $this->validarProfessor($professor, $hasProfessor->users_id);
          $updateEndereco    = $this->updateDomain->updateEndereco($endereco, $hasProfessor->users_id);
          $updateContato     = $this->updateDomain->updateContato($contato,  $hasProfessor->users_id);
          $updateEndereco    = $hasProfessor->update($professor);
          $hasProfessor->load('user','endereco','contato');
          return HandlerMessager::sucessMessage(200,[$hasProfessor],["Registro salvo com sucesso."]);  

        } catch (\Exception $e) {

            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());

        }

    }



    public function hasProfessor($data)
    {
       

       if(!isset($data['id']))
       {
           throw new Exception("Professor não informado.",404);
       }
       
       $aluno = Professor::find($data['id']);
       if (!$aluno)
       {
           throw new Exception("O Professor informado não existe.", 404);
       } 
   
       $aluno->load('user','endereco', 'contato','aulas');
       return $aluno;

      
    }



    /**
     * Faz uma verificação para confirmar ou não uma aula.
     * @param object $response
     * @return object|Exception
     */
    private function checkToConfirm(object $response)
    {
               
        if($response->isEmpty())
        {
           return HandlerMessager::genericError(404, "Aula não encontrada.");
        }

        $response =  $response->first();

        if($response->confirmacao_professor)
        {
            return HandlerMessager::genericError(406, "Aula já confirmada.");
        }

        if(!$response->confirmacao_aluno)
        {
            return HandlerMessager::genericError(406, "O professor só pode confirmar uma Aula após a confirmação do Aluno.");
        }

        return $response;

    }



    /**
     * Valida relacionamento professor e aula para o desmarque.
     * @param array $array
     */
    public function RelationshipAula(array $array)
    {
        $professor = $array['id'];
        $aula_id   = $array['aula_id'];
       
        $response = $professor->aulas()->where('id',$aula_id)->get();
        $result   = $this->checkToConfirm($response);

        if(!is_array($result))
        {

            $result->confirmacao_professor = 1;
            $result->save(); 
            return true;

        } 

        throw new Exception($result['message'],$result['code']);

    }


    /**
     * Confirma a aula, professor aluno.
     * @param array $array
     */
    public function confirmClass(array $array)
    {

        try{
            
           $array['id'] = $this->hasProfessor($array); 
           $response    = $this->RelationshipAula($array);
           return HandlerMessager::sucessMessage(200,["Aula confirmada com sucesso."],["Operação concluida"]);

        }catch(\Exception $e){
           
            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());

        }

    }



    /**
     * Faz uma verificação para desmarcar ou não uma aula.
     * @param object $response
     * @return object|Exception
     */
    private function checkToUnmarkClass(object $response)
    {
               
        if($response->isEmpty())
        {
           return HandlerMessager::genericError(404, "Aula não encontrada.");
        }

        $response =  $response->first();
        
        
        if(!$response->confirmacao_professor)
        {
            return HandlerMessager::genericError(406, "Aula não confirmada.");
        }

        return $response;
        

    }



    
    /**
     * Valida relacionamento professor e aula para o desmarque.
     * @param array $array
     */
    public function RelationshipAulaToUnmark(array $array)
    {
        
        $professor = $array['id'];
        $aula_id   = $array['aula_id'];
       
        $response = $professor->aulas()->where('id',$aula_id)->get();
        $result   = $this->checkToUnmarkClass($response);
        
        
        if(!is_array($result))
        {

            $result->confirmacao_professor = null;
            $result->save(); 
            return true;

        } 
        

        throw new Exception($result['message'],$result['code']);

    }




    /**
     * @param array $array
     */
    public function unmarkClass(array $array)
    {

        try{

            $array['id'] = $this->hasProfessor($array); 
            $response    = $this->RelationshipAulaToUnmark($array);
            return HandlerMessager::sucessMessage(200, ["Aula desmarcada com sucesso"],["Operação concluida"]);
            

        }catch(\Exception $e){

            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());
        }

    }



    public function deleteProfessor($data)
    {
       
        try {

          $professor = $this->hasProfessor($data);
          $endereco  = $professor->endereco;
          $contato   = $professor->contato;
          $user      = $professor->user;  
          $professor = Professor::destroy($professor->id);
          $enderecoDelete = $this->deleteDomain->deleteEndereco($endereco);
          $contatoDelete  = $this->deleteDomain->deleteContato($contato);
          $deleteUser     = $this->deleteDomain->deleteUser($user->id);
          return HandlerMessager::sucessMessage(200,[$professor],["Registro deletado com sucesso."]); 
          
        }catch(\Exception $e) {

            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());

        }

    }


}