<?php

namespace App\Http\Requests\salesmen;

use Illuminate\Foundation\Http\FormRequest;

class SalesMenRequest extends FormRequest
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
            "phone"=>"required",
            

        ];
    }

    public function messages()
    {
        return [
          'name.required'=>"   Name is Required",
          'phone.required'=>"   Phone Is Required ",

        ];
    }
}
