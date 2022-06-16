<?php

namespace App\Http\Requests\student;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequest extends FormRequest
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
            "phone"=>"required",
            "student_type"=>"required",
            "nationality"=>"required"
         
        ];
    }

    public function messages()
    {
        return [
          'name.required'=>"   Name is Required",
          'email.required'=>"  E-Mail Is Required",
          'phone.required'=>"   Phone Is Required ",
          'student_type.required'=>"   Student Type Is Required",
          'nationality.required'=>"   Nationality Is Required",
          

        ];
    }
}
