<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormRequest\Professor\ProfessorStoreRequest;
use App\FormRequest\Professor\ProfessorUpdateRequest;
use App\Repository\ProfessorRepository;
use App\Repository\AulasRepository;
use App\Models\Professor     as ProfessorModel;
use App\Models\ListaContatos as ListaContatos;
use App\Models\User          as usuarioDomain;
use App\Models\Enderecos;
use Illuminate\Support\Facades\DB;


class ProfessorController extends Controller
{

    protected $professorDomain;
    protected $professorModel;
    protected $enderecoModel;
    protected $listacontatoDomain;
    protected $usuarioDomain;
    protected $aulasDomain;
    
    public function __construct(AulasRepository $aulasDomain, usuarioDomain $usuarioDomain, ListaContatos  $listacontatoDomain ,Enderecos $enderecoModel,  ProfessorModel $professorModel, ProfessorRepository $professorDomain)
    { 
        $this->professorDomain    = $professorDomain;
        $this->professorModel     = $professorModel;
        $this->enderecoModel      = $enderecoModel;
        $this->listacontatoDomain = $listacontatoDomain;
        $this->usuarioDomain      = $usuarioDomain;
        $this->aulasDomain        = $aulasDomain;

    }

   
    public function index(Request $data)
    {   
        $professor = $this->professorDomain->professorIndex($data);
        return response($professor, $professor['code']);
    }

    public function store(ProfessorStoreRequest $data)
    {
        
        $professor = $data->only($this->professorModel->getModel()->getFillable());
        $endereco  = $data->only($this->enderecoModel->getModel()->getFillable());
        $contato   = $data->only($this->listacontatoDomain->getModel()->getFillable());
        $usuario   = $data->only($this->usuarioDomain->getModel()->getFillable());
       
      
        DB::beginTransaction();
        
        $createProfessor = $this->professorDomain->professorStore($professor, $usuario, $endereco, $contato);
        if($createProfessor['code']==201){
            DB::commit();
            return response($createProfessor, $createProfessor['code']);
        } else { 
            DB::Rollback();
            return response($createProfessor, $createProfessor['code']);
        }

    }

    public function show(Request $data)
    {
        $professor = $this->professorDomain->exibirProfessor($data);
        return response($professor, $professor['code']);
    }

    
    public function update(ProfessorUpdateRequest $data)
    {
     
        $professor = $data->only($this->professorModel->getModel()->getFillable());
        $endereco  = $data->only($this->enderecoModel->getModel()->getFillable());
        $contato   = $data->only($this->listacontatoDomain->getModel()->getFillable());

        DB::beginTransaction();
        $updateProfessor = $this->professorDomain->professorUpdate($professor, $endereco, $contato);
        if($updateProfessor['code']==200){
            DB::commit();
            return response($updateProfessor, $updateProfessor['code']);
        } else { 
            DB::Rollback();
            return response($updateProfessor, $updateProfessor['code']);
        }

    }

    public function destroy(Request $data)
    {
        
       DB::beginTransaction();
       $deleteProfessor = $this->professorDomain->deleteProfessor(collect(['id'=>$data->get('id')]));
       if($deleteProfessor['code'] == 200){
           DB::Commit();
           return response($deleteProfessor, $deleteProfessor['code']);
       } else { 
           DB::Rollback();
           return response($deleteProfessor, $deleteProfessor['code']);
       }


    }


    public function storeAulas(Request $data)
    {
        
        $array[0] = [];

        empty($data->professor_id) ? $professor = 0      : $professor = $data->professor_id;
        empty($data->aula)         ? $aula     = $array  : $aula      = $data->aula;
    
        DB::beginTransaction(); 
        $professor  = $this->aulasDomain->salvarAula($professor, $aula);
        if($professor['code'] == 201)
        {
            DB::commit();
            return response($professor, $professor['code']);

        } else {

            DB::rollBack();
            return response($professor, $professor['code']);

        }
    }




    public function updateAulas(Request $data)
    {
        
        $array[0] = [];

        empty($data->professor_id) ? $professor = 0      : $professor = $data->professor_id;
        empty($data->aulas)        ? $aulas     = $array : $aulas     = $data->aulas;

        DB::beginTransaction();
        $response = $this->aulasDomain->generateUpdateAulas($professor, $aulas);
            
        if($response['code'] == 200)
        {
            DB::commit();
            return response($response, $response['code']);

        } else {

            DB::rollBack();
            return response($response, $response['code']);

        }
    }



    public function deleteAulas(Request $data)
    {

        $array[0] = [];
 
        empty($data->professor_id) ? $professor = 0      : $professor = $data->professor_id;
        empty($data->aulas)        ? $aulas     = $array : $aulas     = $data->aulas;

        DB::beginTransaction();
        $response = $this->aulasDomain->generateDeleteAulas($professor, $aulas);
            
            if($response['code'] == 200)
            {
                DB::commit();
                return response($response, $response['code']);

            } else {

                DB::rollBack();
                return response($response, $response['code']);

        }

    }




    public function confirmClass(Request $data)
    {

        $array = array(
            'id'                    => $data->professor_id,
            'aula_id'               => $data->aula_id
        );

        DB::beginTransaction();
        $response = $this->professorDomain->confirmClass($array);

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
     * Desmarca a aula por parte do professor.
     */
    public function unmarkClass(Request $data)
    {

      $array = array(
        'id'      => $data->professor_id,
        'aula_id' => $data->aula_id
      );

      DB::beginTransaction();
      $response = $this->professorDomain->unmarkClass($array);

      if($response['code'] == 200)
      {
        DB::commit();
        return response($response, $response['code']);

      } else { 

        DB::rollBack();
        return response($response, $response['code']);

      }

    }
   
    
}
