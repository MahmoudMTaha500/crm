<?php

namespace App\Http\Requests\StudentRequest;

use Illuminate\Foundation\Http\FormRequest;

class ExcelSheetRequest extends FormRequest
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
            // 'ids'=>'    array|required|min:1',
        //     "ids"    => [
        //         'array',
        //         'required',
               
        //   ],
        ];
        
    }

    public function messages(){
     return [

        'ids.required'=>"Please Choose one Row to Export Excel Sheet"
            
     ];
    }
}
