<?php
namespace App\FormRequest\Professor;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorUpdateRequest extends FormRequest
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

            'id'                       => ['required','numeric'],
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
            
            
        ]; 
    }




}
