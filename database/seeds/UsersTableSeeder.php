<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'user_firstname' => 'Vitaly',
                'user_lastname' => 'Spirin',
                'user_isenabled' => true,
                'user_email' => 'vitaly.spirin@gmail.com',
                'user_passwordhash' => Hash::make('vitaly'),
                'user_address' => json_encode([
                    [
                        'address_type' => 'Home',
                        'address_street' => '528 Cochrane Ave',
                        'address_city' => 'Coquitlam',
                        'address_province' => 'BC',
                        'address_country' => 'Canada',
                        'address_postal' => 'V3J 1Z9',
                        'address_default' => true,
                    ],
                    [
                        'address_type' => 'Work',
                        'address_street' => '3660 E Hastings St',
                        'address_city' => 'Vancouver',
                        'address_province' => 'BC',
                        'address_country' => 'Canada',
                        'address_postal' => 'V5K 2A9',
                        'address_default' => false,
                    ],
                ]),
                'user_contact' => json_encode([
                    [
                        'contact_type' => 'Email',
                        'contact_value' => 'vitaly.spirin@gmail.com',
                        'contact_default' => true,
                    ],
                    [
                        'contact_type' => 'Phone',
                        'contact_value' => '604-603-1647',
                        'contact_default' => false,
                    ],
                ]),

            ],

            [
                'user_firstname' => 'John',
                'user_lastname' => 'Black',
                'user_isenabled' => false,
                'user_email' => 'john.black@gmail.com',
                'user_passwordhash' => Hash::make('john'),
                'user_address' => json_encode([]),
                'user_contact' => json_encode([]),
            ],

            [
                'user_firstname' => 'David',
                'user_lastname' => 'Green',
                'user_isenabled' => false,
                'user_email' => 'david.green@gmail.com',
                'user_passwordhash' => Hash::make('david'),
                'user_address' => json_encode([]),
                'user_contact' => json_encode([]),
            ],

            [
                'user_firstname' => 'Adam',
                'user_lastname' => 'Brown',
                'user_isenabled' => true,
                'user_email' => 'adam.brown@gmail.com',
                'user_passwordhash' => Hash::make('adam'),
                'user_address' => json_encode([]),
                'user_contact' => json_encode([]),
            ],

        ]);
    }
}
