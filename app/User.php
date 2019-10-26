<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_firstname', 'user_lastname', 'user_email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_passwordhash', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'user_address' => 'array',
        'user_contact' => 'array',
    ];

    public function getAuthPassword()
    {
        return $this->user_passwordhash;
    }

    public static function getAddressString(array $address)
    {
        $result = '';

        $elementList = ['address_street', 'address_city', 'address_province', 'address_country', 'address_postal'];

        foreach ($elementList as $element) {
            if (! empty($address[$element])) {
                if (! empty($result)) {
                    $result .= ', ';
                }

                $result .= $address[$element];
            }
        }

        return $result;
    }
}
