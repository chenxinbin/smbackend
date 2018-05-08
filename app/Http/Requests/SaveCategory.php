<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class SaveCategory extends FormRequest
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
            'name' => 'required|max:30',
            'slug' => 'required|max:30',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '分类名称必须填写',
            'slug.required' => '分类网址必须填写',
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([], 422));
    // }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['X_SM_ERROR_FIELDS'=>$validator->errors()], 200)); 
    }


}
