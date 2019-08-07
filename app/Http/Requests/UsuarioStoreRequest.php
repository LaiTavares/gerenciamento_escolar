<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioStoreRequest extends FormRequest
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
            "nome" => ["required"], // Array de regras que valida o campo
            "email" => ["required", "email", "unique:usuario,email".$this->route('id')], 
            "data_nascimento" => ["required"], 
            "nivel_id" => ["required"]
        ];
    }

    public function messages(){        
        return [
            "required" => "Mensagem de erro", //mensagem que o "required" retorna na view
            
            //"nome.required" => "Mensagem de erro", 
            //"email.required" => "Mensagem de erro", 
            "data_nascimento.required" => "Bota a data ae vacilaum!", 
            //"nivel_id.required" => "Mensagem de erro"
        ];

    }
}
