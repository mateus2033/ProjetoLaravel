<?php
namespace App\FormRequest\Aluno;

use Illuminate\Foundation\Http\FormRequest;

class AlunoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        
        return [

            "name"                 =>['required','max:150'],    
            "sobre_nome"           =>['required','max:150'],
            "email"                =>['required','max:150'],
            "password"             =>['required','min:8','max:255'], 
            "idade_aluno"          =>['required','numeric'],
            "curiosidades_aluno"   =>['required','max:150'],
            "escolaridade_aluno"   =>['required','max:50'],
            "objetivos_aluno"      =>['required','max:50'],
            "cpf_aluno"            =>['required','max:14'],
            "endereco_rua"         =>['required','max:255'],    
            "endereco_bairro"      =>['required','max:255'],
            "endereco_cidade"      =>['required','max:255'],
            "endereco_estado"      =>['required','max:255'],
            "endereco_cep"         =>['required','max:255'],
            "endereco_longradouro" =>['required','max:255'],
            "celular_primario"    =>['max:255'],
            "celular_secundario"  =>['max:255'],
            "telefone_primario"   =>['max:255'],
            "telefone_secundario" =>['max:255'],
            "telefone_secundario" =>['max:255'],
            "linkedin"            =>['max:255'],

        ];
        
    }

    public function messages()
    {
        


        return [

             'required'                 =>'required',
             'string'                   =>'string',
             'numeric'                  =>'numeric',
             'endereco_rua.max'         =>'maxLength|255',  
             'endereco_bairro.max'      =>'maxLength|255',    
             'endereco_cidade.max'      =>'maxLength|255',       
             'endereco_estado.max'      =>'maxLength|255',   
             'endereco_cep.max'         =>'maxLength|255',    
             'endereco_longradouro.max' =>'maxLength|255',
             'linkedin_aluno.max'       =>'maxLength|100',  
             'nome_aluno.max'           =>'maxLength|150',       
             'sobre_nome_aluno.max'     =>'maxLength|150',   
             'curiosidades_aluno.max'   =>'maxLength|50',  
             'escolaridade_aluno.max'   =>'maxLength|50',  
             'objetivos_aluno.max'      =>'maxLength|50',    
             'cpf_aluno.max'            =>'maxLength|14',  
             'email.max'                =>'maxLength|150',  
             'password.min'             =>'minLength|8', 
             'password.max'             =>'maxLength|255',

        ];



    }



}
