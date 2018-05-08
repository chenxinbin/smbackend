<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class SavePost extends FormRequest
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
            'title' => 'required|max:120',
            'category' => 'required',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '文章标题必须填写',
            'body.required'  => '文章内容必须填写',
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([], 422));
    // }

    protected function failedValidation(Validator $validator) {
        sleep(2);
        throw new HttpResponseException(response()->json(['X_SM_ERROR_FIELDS'=>$validator->errors()], 200)); 
    }


}
