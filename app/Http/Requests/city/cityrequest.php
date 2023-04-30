<?php

namespace App\Http\Requests\city;

use Illuminate\Foundation\Http\FormRequest;

class cityrequest extends FormRequest
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
            "country_id"=>"required",
            "name"=>"required",
        ];
    }

    public function messages(){
        return [
            'country_id.required'=>"   Country is Required",
            'name.required'=>"  City Name is Required",


        ];
    }
}
