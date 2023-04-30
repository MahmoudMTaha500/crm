<?php

namespace App\Http\Requests\study_place;

use Illuminate\Foundation\Http\FormRequest;

class studyPlaceRequest extends FormRequest
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
            "type_id"=>"required",
            "country_id"=>"required",
            "city_id"=>"required",
           

        ];
    }

    public function messages()
    {
        return [
          'name.required'=>"   Name  Of Place Is Required",
          'type_id.required'=>"  Type Is Required",
          'country_id.required'=>"   Counrty Is Required ",
          'city_id.required'=>"   City Is Required",
        

        ];
    }
}
