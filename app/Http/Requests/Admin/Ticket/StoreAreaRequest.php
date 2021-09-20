<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreAreaRequest extends FormRequest
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
            'area' => 'required|unique:areas|max:40'
        ];
    }
    public function attibutes()
    {
        return[
            'area' => 'Nombre del área'
        ];
    }
    public function messages()
    {
        return[
            'area.required'=>'Debe Ingresar un nombre de Área',
            'area.unique' => 'El área que ingreso ya existe',
            'area.max' => 'Sobre paso el maximo de caracteres permitidos (40)'
        ];
    }
}
