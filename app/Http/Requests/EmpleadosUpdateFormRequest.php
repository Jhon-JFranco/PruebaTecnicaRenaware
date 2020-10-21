<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadosUpdateFormRequest extends FormRequest
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
            'telefono' => 'min:7',
            'numero_documento' => 'min:4',
            'nombre_empleado' => 'min:3',
            'apellido_empleado' => 'min:3',
            'direccion' => 'min:4',
        ];
    }
}
