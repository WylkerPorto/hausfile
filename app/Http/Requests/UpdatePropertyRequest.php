<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'zipcode' => ['required', 'string'],
            'tenant' => ['nullable', 'string'],
            'user_id' => ['required', 'string'],
        ];
    }
}
