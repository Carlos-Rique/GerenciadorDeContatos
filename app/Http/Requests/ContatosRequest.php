<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatosRequest extends FormRequest
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
            'nome' => 'required|max:60',
            'email' => 'required',
            'telefone' => 'required|min:1',
            'datanascimento' => 'min:8|max:10',
            'foto' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Preencha um nome',
            'email.required' => 'Preencha um email',
            'datanascimento.required' => 'Preencha uma email',
            'telefone.required' => 'Preencha um numero de telefone',
            'datanascimento.min' => 'Data inválida',
            'datanascimento.max' => 'Data inválida',
            'foto.image' => 'Foto inválida',
        ];
    }

}
