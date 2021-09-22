<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
    public function rules()
    {
        $user = $this->route()->parameter('user');
        $rules = [
            'name' => 'required|unique|max:50',
            'email' => 'required|unique:users|max:40',
            'pass' => 'required'
        ];
        if($user){
            $rules['name'] = 'required|unique:users,name,'.$user->id;
            $rules['email'] = 'required|unique:users,email,'.$user->id;
        }
       return $rules;
    }
    public function attibutes()
    {
        return[
            'user' => 'Nombre del usuario'
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
            
        ];
    }
}
