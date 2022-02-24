<?php
namespace App\FormRequest\Professor;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorStoreRequest extends FormRequest
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


            'email'                    => ['required', 'string'],
            'password'                 => ['required', 'string','min:8','max:255'], 
            'idade_professor'          => ['required', 'numeric'],   
            'formacao_professor'       => ['required', 'string'],
            'instituicao_professor'    => ['required', 'string'],
            'diploma_professor'        => ['required', 'string'],
            'especializacao_professor' => ['required', 'string'],
            'endereco_rua'             => ['required', 'string'],
            'endereco_bairro'          => ['required', 'string'],
            'endereco_cidade'          => ['required', 'string'],
            'endereco_estado'          => ['required', 'string'],
            'endereco_cep'             => ['required', 'string'],
            'endereco_longradouro'     => ['required', 'string'],
            'cpf_professor'            => ['required', 'string']

        ];
    }

    public function messages()
    {

        return [


            'required'                 => "Este campo é obrigatorio.",
            'string'                   => "Este campo deve conter apenas caracteres.",
            'numeric'                  => "Este campo deve conter apenas números.",
            'endereco_rua.max'         => "Este campo deve conter no máximo 255 caracteres.",
            'endereco_bairro.max'      => "Este campo deve conter no máximo 255 caracteres.",
            'endereco_cidade.max'      => "Este campo deve conter no máximo 255 caracteres.",
            'endereco_estado.max'      => "Este campo deve conter no máximo 255 caracteres.",
            'endereco_cep.max'         => "Este campo deve conter no máximo 255 caracteres.",
            'endereco_longradouro.max' => "Este campo deve conter no máximo 255 caracteres.",

            'celular_professor'            => "Este campo deve conter no máximo 15 caracteres.",
            'telefone_professor.max'       => "Este campo deve conter no máximo 15 caracteres.",
            'linkedin_professor.max'       => "Este campo deve conter no máximo 100 caracteres.",

            'nome_professor.max'           => "Este campo deve conter no máximo 150 caracteres.",
            'formacao_professor.max'       => "Este campo deve conter no máximo 200 caracteres.",
            'instituicao_professor.max'    => "Este campo deve conter no máximo 150 caracteres.",
            'diploma_professor.max'        => "Este campo deve conter no máximo 150 caracteres.",
            'especializacao_professor.max' => "Este campo deve conter no máximo 200 caracteres.",
            'cpf_professor.max'            => "Este campo deve conter no máximo 14 caracteres.",

            "email.max"                => "Este campo deve conter no máximo 150 caracteres.",
            "password.min"             => "Este campo deve conter no minimo 8 caracteres.",
            "password.max"             => "Este campo deve conter no máximo 255 caracteres.",
        ];
    }
}
