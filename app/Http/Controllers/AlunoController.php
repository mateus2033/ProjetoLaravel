<?php

namespace App\Http\Controllers;

use App\FormRequest\Aluno\AlunoStoreRequest;
use App\FormRequest\Aluno\AlunoUpdateRequest;
use App\Models\User as modeloUser;
use App\Models\Aluno as ModeloAluno;
use App\Models\Enderecos as ModeloEndereco;
use App\Models\ListaContatos as ModeloContato;
use Illuminate\Http\Request;
use App\Repository\AlunoRepository;
use Illuminate\Support\Facades\DB;


class AlunoController extends Controller
{


    protected $alunoDomain;
    protected $modeloAluno;
    protected $modeloEndereco;
    protected $modeloContato;
    protected $modeloCalendar;
    

    public function __construct(modeloUser $modeloUser, ModeloContato $modeloContato, ModeloAluno $modeloAluno, AlunoRepository $alunoDomain, ModeloEndereco $modeloEndereco)
    {
        
        $this->alunoDomain    = $alunoDomain;
        $this->modeloAluno    = $modeloAluno;
        $this->modeloEndereco = $modeloEndereco;
        $this->modeloContato  = $modeloContato;
        $this->modeloUser     = $modeloUser;
    //  $this->middleware('guest');
       
    }

    public function index(Request $data)
    {   
     
        $alunoIndex = $this->alunoDomain->alunoIndex($data);
        return response()->json($alunoIndex);
          
    }


    public function store(AlunoStoreRequest $data)
    {   
        
        $aluno    = $data->only($this->modeloAluno->getModel()->getFillable());
        $endereco = $data->only($this->modeloEndereco->getModel()->getFillable());
        $contato  = $data->only($this->modeloContato->getModel()->getFillable());
        $usuario  = $data->only($this->modeloUser->getModel()->getFillable());
        
        DB::beginTransaction();
        $alunostore = $this->alunoDomain->alunoStore($usuario,  $aluno,  $endereco,   $contato);
        
        if ($alunostore['code'] == 201) {

            DB::Commit(); 
            return response($alunostore, $alunostore['code']);

        } else {
            
            DB::Rollback();
            return response($alunostore, $alunostore['code']);
        
        }


    }

    public function show(Request $data)
    {  
        $showaluno = $this->alunoDomain->ShowAluno(collect(['aluno_id' => $data->get('id')]));
        return response($showaluno, $showaluno['code']);
    }


    public function update(AlunoUpdateRequest $data)
    {   
        $aluno    = $data->only($this->modeloAluno->getModel()->getFillable());
        $endereco = $data->only($this->modeloEndereco->getModel()->getFillable());
        $contato  = $data->only($this->modeloContato->getModel()->getFillable());
       
        DB::beginTransaction();
        $alunoupdate = $this->alunoDomain->alunoUpdate($aluno, $endereco, $contato);
        if ($alunoupdate) {
            DB::Commit();
            return response($alunoupdate, $alunoupdate['code']);
        } else {
            DB::Rollback();
            return response($alunoupdate, $alunoupdate['code']);
        }


    }

    public function destroy(Request $data)
    {
        
        DB::beginTransaction();
        $deletarAluno = $this->alunoDomain->deleteAluno(['id' => $data->get('id')]);
        if ($deletarAluno['code'] == 200) {
            DB::Commit();
            return response($deletarAluno, $deletarAluno['code']);
        } else {
            DB::Rollback();
            return response($deletarAluno, $deletarAluno['code']);
        }
    }



    /**
    * Busca, valida e marca a aula
    */
    public function takeAulas(Request $data)
    {

        $array = array(
            'professor_id'      => $data->professor_id,
            'aula_id'           => $data->aula_id,
            'aluno_id'          => $data->aluno_id,
            'calendar_id'       =>$data->calendar_id
        );
       
        DB::beginTransaction();
        $response = $this->alunoDomain->takeClass($array);
        if($response['code'] == 200)
        {
            DB::commit();
            return response($response, $response['code']);

        } else {

            DB::rollBack();
            return response($response, $response['code']);
        }


    }



    /**
     * Busca, valida e desmarca a aula.
    */
    public function deselectClass(Request $data)
    {

        $array = array(
        'id'      => $data->aluno_id,
        'aula_id' => $data->aula_id
        );                     

        DB::beginTransaction();
        $response = $this->alunoDomain->deselectClass($array);
        if($response['code'] == 200)
        {
            DB::commit();
            return response($response, $response['code']);

        } else {

            DB::rollBack();
            return response($response, $response['code']);
        }


    }







    /**
     * Usado para testes
     */
    public function storeTest(Request $data)
    {
        $aluno    = $data->only($this->modeloAluno->getModel()->getFillable());
        $endereco = $data->only($this->modeloEndereco->getModel()->getFillable());
        $contato  = $data->only($this->modeloContato->getModel()->getFillable());
        $usuario  = $data->only($this->modeloUser->getModel()->getFillable());

        DB::beginTransaction();
        $alunostore = $this->alunoDomain->alunoStore($usuario,  $aluno,  $endereco,   $contato);
        
        if ($alunostore['code'] == 201) {

            DB::Commit(); 
            return response($alunostore, $alunostore['code']);

        } else {
            
            DB::Rollback();
            return redirect()->route('register')->with($alunostore);
        
        }
    }

    
}
