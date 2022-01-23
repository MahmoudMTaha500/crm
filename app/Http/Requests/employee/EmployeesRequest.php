<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
            "name"=>"required",
            "email"=>"required",
            "password"=>"required",
            "role"=>"required",

        ];
    }

    public function messages()
    {
        return [
          'name.required'=>" name filed is required",
          'email.required'=>"  email filed is required",
          'password.required'=>"  password filed is required",
          'role.required'=>"  role filed is required",

        ];
    }
}
