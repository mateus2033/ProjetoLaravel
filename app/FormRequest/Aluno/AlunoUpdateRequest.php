<?php
namespace App\FormRequest\Aluno;

use Illuminate\Foundation\Http\FormRequest;

class AlunoUpdateRequest extends FormRequest
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

            "id"                   =>['required'], 
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
        return[

            'required' => "Este campo é obrigatorio.",
            'string'   => "Este campo deve conter apenas caracteres.", 
            'numeric'  => "Este campo deve conter apenas números.",
            'endereco_rua.max'         => "Este campo deve conter no máximo 255 caracteres.",   
            'endereco_bairro.max'      => "Este campo deve conter no máximo 255 caracteres.",    
            'endereco_cidade.max'      => "Este campo deve conter no máximo 255 caracteres.",         
            'endereco_estado.max'      => "Este campo deve conter no máximo 255 caracteres.",     
            'endereco_cep.max'         => "Este campo deve conter no máximo 255 caracteres.",      
            'endereco_longradouro.max' => "Este campo deve conter no máximo 255 caracteres.",  
            'linkedin_aluno.max'       => "Este campo deve conter no máximo 255 caracteres.", 
            'password.max'             => "Este campo deve conter no máximo 255 caracteres.", 
            "nome_aluno.max"           => "Este campo deve conter no máximo 150 caracteres.",          
            "sobre_nome_aluno.max"     => "Este campo deve conter no máximo 150 caracteres.",  
            "curiosidades_aluno.max"   => "Este campo deve conter no máximo 150 caracteres.",
            "escolaridade_aluno.max"   => "Este campo deve conter no máximo 50 caracteres.",  
            "objetivos_aluno.max"      => "Este campo deve conter no máximo 50 caracteres.", 
            "telefone_aluno.max"       => "Este campo deve conter no máximo 15 caracteres.", 
            "celular_aluno.max"        => "Este campo deve conter no máximo 15 caracteres.", 
            "cpf_aluno.max"            => "Este campo deve conter no máximo 14 caracteres.", 


        ];
    }


}
