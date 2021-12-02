<?php

namespace App\Http\Requests\student;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            "address"=>"required",
         
        ];
    }

    public function messages()
    {
        return [
          'name.required'=>"   Name is Required",
          'email.required'=>"  E-Mail Is Required",
          'phone.required'=>"   Phone Is Required ",
          'address.required'=>"   Address Is Required",
          

        ];
    }
}
