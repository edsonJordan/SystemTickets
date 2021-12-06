<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|unique:users|max:50',            
            'email' => 'required|unique:users|max:40',
            'type_id' => 'required|',
            'area_id' => 'required',
            'password' => 'required'

        ];
    }
    public function attibutes()
    {
        return[
            'name' => 'Nombre de usuario',
            'type_id' => 'Tipo de usuario',
            'area_id' => 'Area de usuario',
            'email' => 'Correo de usuario',
            'password' => 'Contraseña de usuario'
        ];
    }
    public function messages()
    {
        return[
            'name.unique'=>'Debe nombre del usuario ya existe',
            'name.required'=>'Debe Ingresar un nombre de usuario',
            'name.max' => 'Sobre paso el maximo de caracteres permitidos (50)',

            'email.required'=>'Debe Ingresar un nombre de usuario',
            'email.unique' => 'El correo del usuario que ingreso ya existe',
            'email.max' => 'Sobre paso el maximo de caracteres permitidos (40)',

            'pass.required'=>'Debe Ingresar una contraseña de usuario',
            
            'name.required'=>'Debe Ingresar un nombre de  usuario',
            'type_id.required'=>'Debe Ingresar un tipo de usuario',
            'area_id.required'=>'Debe Ingresar la area del usuario',
            'email.required'=>'Debe Ingresar el correo del usuario',
            'password.required'=>'Debe Ingresar la contraseña del usuario'
        ];
    }
}
