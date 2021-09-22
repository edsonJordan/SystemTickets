<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupSupportRequest extends FormRequest
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
        /* return [
            'group' => 'required|unique:group_supports|max:40',
            'type_id' => 'required'
        ]; */

        $group = $this->route()->parameter('group');
        $rules = [
            'group' => 'required|unique:group_supports|max:40',
            'type_id' => 'required'
        ];
        if($group){
            $rules['group'] = 'required|unique:group_supports,group,'.$group->id;
        }
       return $rules;
    }
    public function attibutes()
    {
        return[
            'group' => 'Nombre del grupo',
            'type_id' => 'Tipo de grupo'
        ];
    }
    public function messages()
    {
        return[
            'group.required'=>'Debe Ingresar un nombre de grupo',
            'group.unique'=>'El nombre ingresado ya existe',
            'type_id.required' => 'Debe marcar una tipo de grupo',
        ];
    }
}
