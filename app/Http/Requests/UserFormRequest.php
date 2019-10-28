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

    public function processContactsAndAddresses(array $input)
    {
        if (! empty($input['user_contact'])) {
            $defaultContact = $input['user_contact']['contact_default'];
            unset($input['user_contact']['contact_default']);

            foreach ($input['user_contact'] as $index=>$contact) {
                if ($defaultContact == $index) {
                    $input['user_contact'][$index]['contact_default'] = true;
                } else {
                    $input['user_contact'][$index]['contact_default'] = false;
                }
            }
        }

        if (! empty($input['user_address'])) {
            $defaultAddress = $input['user_address']['address_default'];
            unset($input['user_address']['address_default']);

            foreach ($input['user_address'] as $index=>$contact) {
                if ($defaultAddress == $index) {
                    $input['user_address'][$index]['address_default'] = true;
                } else {
                    $input['user_address'][$index]['address_default'] = false;
                }
            }
        }

        return $input;
    }
}
