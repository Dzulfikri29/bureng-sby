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
                'photo' => 'user/admin.jpg',
                'created_at' => '2023-04-13 09:55:09',
                'updated_at' => '2023-10-06 09:04:27',
            ),
            1 => 
            array (
                'id' => 8,
                'name' => 'Admin 2',
                'email' => 'admin2@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$lCOLzE4nZ8fRnbPrPmT9netmv4cuhd6U9k4YLzz6ukyNa2SUeZZka',
                'remember_token' => NULL,
                'photo' => 'user/admin-2.jpg',
                'created_at' => '2023-10-06 09:04:16',
                'updated_at' => '2023-10-06 09:04:16',
            ),
        ));
        
        
    }
}