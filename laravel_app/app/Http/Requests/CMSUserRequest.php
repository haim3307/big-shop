<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CMSUserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $item_id = isset($request->item_id) ? ',' . $request->item_id : '';
        $password = !isset($request->item_id) ? 'required|':'';
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email' . $item_id,
            'password' => $password.'string|min:6|confirmed',
        ];
    }
}
