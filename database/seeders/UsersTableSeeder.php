<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 7,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$KIWyhVaEcMbdjdymCdkUZeRciAgEsP5f6eYki3wG0tjLDzpxAUnW.',
                'remember_token' => NULL,
                'photo' => 'user/admin.png',
                'created_at' => '2023-04-13 09:55:09',
                'updated_at' => '2023-04-18 05:14:48',
            ),
        ));
        
        
    }
}