<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'user_id' => 'required',
            'typeticket_id' => 'required',
            'priority_id' => 'required',
            'status_id' => 'required',
            'tittle' => 'required',
            'description' => 'required'
        ];
    }
    public function attibutes()
    {
        return[
            'user_id' => 'Nombre de usuario',
            'typeticket_id' => 'Nombre de usuario',
            'priority_id' => 'Nombre de usuario',
            'status_id' => 'Nombre de usuario',
            'tittle' => 'Nombre de usuario',
            'description' => 'Nombre de usuario'
        ];
    }
    public function messages()
    {
        return[
            'user_id.required'=>'Debe Ingresar un usuario',
            'typeticket_id.required'=>'Debe Ingresar un tipo de ticket',
            'priority_id.required'=>'Debe Ingresar la prioridad del ticket',
            'status_id.required'=>'Debe Ingresar el estatus del ticket',
            'tittle.required'=>'Debe Ingresar el titulo del ticket',
            'description.required'=>'Debe Ingresar la descripción del ticket'
        ];
    }
}
