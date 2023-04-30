<?php

namespace App\Http\Requests\university;

use Illuminate\Foundation\Http\FormRequest;

class UniversityRequest extends FormRequest
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
            "student"=>"required",
            "uni_val.*"=>"required",
            "agency_val.*"=>"required",
            "status"=>"required",
            "kind_of_course"=>"required",
            "start_date"=>"required",
            "salesman"=>"required",
           

        ];
    }

    public function messages()
    {
        return [
            'student.required'=>"   Student is Required",
            'uni_val.*' => [
                'required'=>"  University Is Required"
            ],

            'agency_val.*' => ['required'=>"   Agency Is Required "],
            
            'kind_of_course.required'=>"   Kind Of Course  Is Required ",
            'start_date.required'=>"   Start Date Is Required ",
            'status.required'=>"   status Is Required ",
            'salesman.required'=>"       Sales Man is Required ",
  
        

        ];
    }
}
