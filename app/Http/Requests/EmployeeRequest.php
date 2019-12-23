<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        if ($this->isMethod('patch'))
        {
            return [
                'nik' => 'required|numeric|size:10',
                'name' => 'required|max:100',
                'sex' => 'required',
                'position_id' => 'required',
                'email' => 'required|email|max:100',
                'photo' => 'image|nullable|max:1999'
            ];
        } else {
            return [
                'nik' => 'required|numeric|size:10|unique:employees',
                'name' => 'required|string|max:100',
                'sex' => 'required|string',
                'position_id' => 'required',
                'email' => 'required|string|email|max:100|unique:employees',
                'photo' => 'image|nullable|max:1999'
            ];
        }
    }
}
