<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroFormRequest extends FormRequest
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
            'nome'              => 'required|min:3|max:60',
            'rg'                => 'required|min:3|max:15',
            'expedidor'         => 'required|min:1|max:20',
            'cpf'               => 'required|min:3|max:15',
            'email'             => 'required|min:3|max:60',
            'razaosocial'       => 'required|min:3|max:60',
            'cnpj'              => 'required|min:3|max:30',
            'endereco'          => 'required|min:3|max:60',
            'cidade'            => 'required|min:3|max:30',
            'uf'                => 'required|min:2|max:5', 
            'cep'               => 'required|min:3|max:10', 
            'celular'           => 'required|min:3|max:20', 
            //'fixo'              => 'required|min:3|max:20',
        ];
    }
}
