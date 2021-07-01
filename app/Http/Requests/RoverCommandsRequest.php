<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoverCommandsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param integer x
     * @param integer y
     * @param string facing_direction
     * @param string command_string
     * @return array
     */
    public function rules()
    {
        return [
            'x' => 'required|numeric|max:200',
            'y' => 'required|numeric|max:200',
            'facing_direction' => 'required|string',
            'command_string' => 'required|string'
        ];
    }
}
