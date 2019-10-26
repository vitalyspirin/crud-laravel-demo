<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'user_firstname' => 'string|nullable',
            'user_lastname' => 'required|string',
            'user_email' => 'required|email|unique:users,user_email,'.optional($this->user)->user_id.
                ',user_id',
            'password' => 'required_without:user_id|confirmed',
        ];
    }
}
