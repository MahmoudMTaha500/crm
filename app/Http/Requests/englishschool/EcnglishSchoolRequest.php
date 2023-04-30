<?php

namespace App\Http\Requests\englishschool;

use Illuminate\Foundation\Http\FormRequest;

class EcnglishSchoolRequest extends FormRequest
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
            "englishschool.*"=>"required",
           
            "status.*"=>"required",
            "course.*"=>"required",
            "start_date.*"=>"required",
            "end_date.*"=>"required",
            "duration.*"=>"required",
            "salesman"=>"required",
        ];
    }
    public function messages()
    {
        return [
            'student.required'=>"   Student is Required",
            'englishschool.*' => [
                'required'=>"  University Is Required"
            ],

        
            
            'course.required'=> [
                'required'=>  "    Course  Is Required "
            ],
            'start_date.*'=>[
                'required'=>"   Start Date Is Required "
            ],
            'end_date.*'=>[
                'required'=>    "   End Date Is Required "
        ],
            'duration.*'=>[
                'required'=>    "   Duration Is Required "
            ],
            'status.*'=>[
                'required'=>"   status Is Required "
            ],
            'salesman.required'=>"       Sales Man is Required ",
  
        

        ];
    }
}
