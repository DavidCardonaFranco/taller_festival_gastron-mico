<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserUpdateRequest extends FormRequest
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
            'name' => '|min:5|max:50',
            'email' => 'min:10|max:70',
            'password' => 'min:5|max:20',
        ];
    }

    public function failedValidation(Validator $validator)
 {
 throw new HttpResponseException(response()->json($validator->errors(),
422));
 }

}
