<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombres' => 'required',
            'apellidos' => 'required',
            'identificacion' => ['required','unique:empleados','min:6','max:11'],
            'direccion' => 'required',
            'telefono' => 'required',
            'pais_nacimiento' => 'required',
            'ciudad_nacimiento' => 'required',
        ];
    }
}
