<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserInfoRequest extends FormRequest
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
            'first_name' => 'max:191',
            'last_name' => 'max:191',
            'phone' => 'max:100|nullable|regex:/(0)[0-9]{9}/',
            'profile_img' => 'image'
        ];
    }
}
