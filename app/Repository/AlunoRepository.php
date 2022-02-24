<?php
namespace App\Repository;

use App\Entidades\EntidadeAluno\EntidadeAluno;
use App\ExceptionsErros\MyExceptionsErros;
use App\Models\Aluno;
use App\Interfaces\AlunoInterface;
use App\Services\MethodsCreateDomainServices;
use App\Services\MethodsUpdateDomainServices;
use App\Services\MethodsDeleteDomainServices;
use App\Services\MethodsValidationServices;
use App\Services\MethodsFindDomainServices;
use App\HandlerMessager\HandlerMessager;
use App\Support\MensageEmail;
use App\Utils\TypeModels;
use Exception;


use App\Support\Email;
use Illuminate\Support\Facades\DB;

class AlunoRepository implements AlunoInterface
{

   
    
    protected $createServices;
    protected $updateServices;
    protected $deleteServices;
    protected $findServices;
    protected $validationServices;



    public function __construct(MethodsFindDomainServices $findServices, MethodsValidationServices $validationServices, MethodsDeleteDomainServices $deleteServices,  MethodsCreateDomainServices $createServices, MethodsUpdateDomainServices $updateServices)
    {

        $this->createServices = $createServices;
        $this->updateServices = $updateServices;
        $this->deleteServices = $deleteServices;
        $this->findServices   = $findServices;
        $this->validationServices = $validationServices;
        
    }


    public function alunoIndex($data)
    {   

        $paginate = $data->get('paginate');
        $paginate ? $paginate : $paginate = 10;
 
        $alunoIndex = Aluno::paginate($paginate)->load('endereco', 'contato');
        if (!$alunoIndex) return HandlerMessager::errorMessage(400, [$alunoIndex],["Erro ao carregar alunos."]);
        else
        return HandlerMessager::sucessMessage(200, [$alunoIndex],["Alunos carregados com sucesso."]);
    
    }

    public function validarAluno(array $data, int $usuario)
    {
     
        $fromJsonAlunoEntidade = EntidadeAluno::fromJsonAlunoEntidade($data, $usuario);
        if(!isset($fromJsonAlunoEntidade->menssagem))
        {
            return $fromJsonAlunoEntidade;

        }  else { 
            
            $aluno = json_encode($fromJsonAlunoEntidade->menssagem);
            throw new Exception($aluno, 406);
            
        }

    }

    public function gerenciarAlunoStore($usuario, $endereco, $contato)
    {
        
        $createUsuario    = $this->createServices->registrarUsuario($usuario); 
        $createdEndereco  = $this->createServices->criarEndereco($endereco);
        $createdCotato    = $this->createServices->criarContato($contato);
        return ['usuario'=>$createUsuario , 'endereco'=>$createdEndereco , 'lista_contatos'=>$createdCotato];

    }



    public function relations(array $aluno, int $aluno_id, int $endereco_id, int $contato_id)
    {

        $aluno['users_id']        = $aluno_id;
        $aluno['endereco_id']     = $endereco_id;
        $aluno['lstacontato_id']  = $contato_id;
        return $aluno;
       
    }


    public function validaDadosPrimordial($cpf, $aluno)
    {

        $cpf = $this->validationServices->validaCPF($cpf, $aluno);
        return $cpf;

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


    public function alunoStore(array $usuario, array $aluno, array $endereco, array  $contato)
    {
        
        try {

            $generateDates      = $this->gerenciarAlunoStore($usuario, $endereco, $contato);
            $aluno              = $this->validarAluno($aluno, $generateDates['usuario']->id);
            $aluno              = $this->relations($aluno, $generateDates['usuario']->id, $generateDates['endereco']->id, $generateDates['lista_contatos']->id); 
            $cpf                = $this->validaDadosPrimordial($aluno['cpf_aluno'], TypeModels::$Aluno);
            $aluno['cpf_aluno'] = $cpf;
            $aluno              = Aluno::create($aluno);
            $aluno->load('endereco','contato','user');
            
            //Metodo de envio de Email.
            //$this->enviaEmail($generateDates['usuario']->name, $generateDates['usuario']->email);          
            return HandlerMessager::sucessMessage(201,[$aluno],['Aluno salvo com sucesso.']); 

        } catch (Exception $e) {
           
            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());
            
        }


    }


    public function ShowAluno($data)
    {

        $aluno = Aluno::find($data->get('aluno_id'));
        if (!$aluno) return HandlerMessager::errorMessage(404, [$aluno],["Erro ao carregar aluno."]);
        $aluno->load('endereco', 'contato');
        return HandlerMessager::sucessMessage(200,[$aluno],['Aluno carregado com sucesso.']);
      
    }


    public function hasAluno(array $data)
    {
        
        if(!isset($data['id']))
        {
            throw new Exception("Aluno não informado.",404);
        }
        
        $aluno = Aluno::find($data['id']);
        if (!$aluno)
        {
            throw new Exception("O aluno informado não existe.", 404);
        } 
    
        $aluno->load('user','endereco', 'contato','aulas');
        return $aluno;


    }


    public function alunoUpdate(array $aluno, array $endereco, array  $contato)
    {
      
        try {

            $getAluno        = $this->hasAluno($aluno);
            $validarAluno    = $this->validarAluno($aluno, $getAluno->users_id);
            $enderecoisValid = $this->updateServices->updateEndereco($endereco, $getAluno->users_id);
            $updateContato   = $this->updateServices->updateContato($contato, $getAluno->users_id);
            $update = $getAluno->update($aluno);
            $alunos = Aluno::find($getAluno['id'])->load('user','endereco', 'contato');
            return HandlerMessager::sucessMessage(200,[$alunos],['Alunos atualizado com sucesso.']);

        } catch (\Throwable $e) {

            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());;

        } catch (\Exception $e) {

            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());
        }


    }


    public function deleteAluno($data)
    {
        try {

            $aluno    = $this->hasAluno($data);
            $endereco = $aluno->endereco;
            $contato  = $aluno->contato;
            $user     = $aluno->user;   
            $alunodelete   = Aluno::destroy($aluno->id);
            $alunodelete   = $this->deleteServices->deleteEndereco($endereco);
            $deletecontato = $this->deleteServices->deleteContato($contato);
            $deleteUser    = $this->deleteServices->deleteUser($user->id);
            return ['Aluno deletado com sucesso', 'code' => 200];

    
        } catch (\Throwable $e) {
           
            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());

        } catch (\Exception $e) {

            return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());

        }
    }



    /**
     * Verifica a relação do professor e aulas.
    */
    public function checkRelationship(array $data)
    {
        
        $array = [];
        $array['professor'] = $this->findServices->getOnlyProfessor($data['professor_id']);
        $array['aula']      = $this->findServices->getOnlyAulas($data['aula_id']);
        $array['calendar']  = $this->findServices->getOnlyCalendar($data['calendar_id']);
        $array['aluno']     = $this->hasAluno(["id"=>$data['aluno_id']]);
        $array['confirmacao_aluno']  = 1;
       
        return $array;

    }


    /**
     *Tende inicialmente a verificar a relação do professor e aula informado.
     *@param object $professor
     *@param object $aluno
     */
    public function RelationshipAulaProfessor(object $professor, object $aula)
    {
        
        if($professor->id != $aula->professor_id)
        {
            throw new Exception("Esta aula não pertence ao professor informado.",400);
        }

        if($aula->confirmacao_aluno == 1 || $aula->confirmacao_professor == 1)
        {
            throw new Exception("Aula indiponivel no momento, tente mais tarde.",406);
        }

        return true;

    }


    /**
     *Tende inicialmente a verificar a relação da aula com calendario informado.
     *@param object $aula
     *@param object $calendar
    */
    public function RelationshipAulaCalendar(object $aula, object $calendar)
    {
        
        if(!count($aula->calendar) > 0)
        {
            throw new Exception("Esta aula não possui um calendario associado.",400);
        }

        foreach($aula->calendar as $cal){

            if($cal->aula_id != $calendar->aula_id)
            {
                throw new Exception("O calendario informado não pertence a esta aula.",400);
            }

        }

        return true;



    }


    /**
     * Atualiza as tabelas aulas e calendar com aluno.
     */
    private function markClass($data)
    {
        
        $aula      = $data['aula'];
        $aluno     = $data['aluno'];

        $aula->aluno()->associate($aluno->id);
        $aula->confirmacao_aluno = $data['confirmacao_aluno'];
        $aula->save();

        return true;

    }


    /**
     * Gerencia o marcar da aula.
     * @param array $data
     */
    public function takeClass(array $data)
    {
      
       try{

        $reponse = $this->checkRelationship($data);  
        $this->RelationshipAulaProfessor($reponse['professor'], $reponse['aula']);
        $this->RelationshipAulaCalendar($reponse['aula'],$reponse['calendar']);
        $this->markClass($reponse);
        return HandlerMessager::sucessMessage(200,["Aula confirmada"],["Operação realizada com sucesso."]);
        
       }catch(\Exception $e){
       
        return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());

       }

    }


    /**
     * Verifica relação Aluno pelo objeto passado com o $aula_id antes do desmarque.
     * @param object $aluno
     * @param int $aula_id
     * @return boolean|Exception
    */
    public function RelationshipAulaAula(object $aluno, int $aula_id)
    {

        $getAulas = $aluno->aulas()->where('id',$aula_id)->get();
        
        if($getAulas->isEmpty())
        {
            throw new Exception("Aula não encontrada.",404);
        }

        foreach($aluno->aulas as $aula){

            if($aula->id == $aula_id)
            {
                $aula->aluno_id          = null;
                $aula->confirmacao_aluno = null;
                $aula->save();
                return true;
            }
        }

        return false;

    }



    /**
     * Gerencia o desmarcar da aula.
     * @param array $data
     */
    public function deselectClass(array $array)
    {
       try{

        $aluno    = $this->hasAluno($array);
        $response = $this->RelationshipAulaAula($aluno, $array['aula_id']);
        return HandlerMessager::sucessMessage(200,["Aula desmarcada com sucesso."],["Operação realizada com sucesso."]);

       }catch(Exception $e){

        return MyExceptionsErros::errosExceptions($e->getCode(), $e->getMessage());

       }


    }





}
