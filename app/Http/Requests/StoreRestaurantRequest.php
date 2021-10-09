<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRestaurantRequest extends FormRequest
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
            'title' => 'required|unique:posts|max:250',
            'body' => 'required',
            'name' => 'required|string|min:5|max:50',
            'description' => 'required|string|min:10|max:30',
            'city' => 'required|string|max:250',
            'phone' => 'required|alpha_dash|min:10|max:10',
            'category_id' => 'required|exists:categories,id',
            'delivery' => [
                'required',
                Rule::in(['y','n']),
            ],
            'facebook' => 'required|string|max:256',
            'twitter' => 'required|strin|max:256',
            'instagram' => 'required|strin|max:256',
            'youtube' => 'required|strin|max:256',
            'logo' => 'required|image',
        ];
    }
}


