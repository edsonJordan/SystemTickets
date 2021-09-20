<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAreaRequest extends FormRequest
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
        $area = $this->route()->parameter('area');
        $rules = [
            'area' => 'required|unique:areas|max:40'
        ];
        if($area){
            $rules['area'] = 'required|unique:areas,area,'.$area->id;
        }
       return $rules;
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
