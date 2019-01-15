<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Cuando el formulario es de uso publico es importante autorizar
     * por completo la petición. (false si fuese un formulario para usuarios autenticados)
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * La misma lógica que en el $this->validate() del controlador
     * para las reglas de validación
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message' => ['required', 'max:160'],
        ];
    }

    /**
     * Este método se agrega manualmente si deseamos personalizar los mensajes
     * de error de validación.
     * Se recomienda emplear los archivos de idiomas en lugar de personalizar
     * manualmente los mensajes
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'message.required' => 'Estimado usuario, el mensaje es requerido',
            'message.max' => 'Estimado usuario, el mensaje no debe exceder los 160 caracteres'
        ];
    }
}
