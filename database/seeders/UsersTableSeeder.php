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
                'family_id' => NULL,
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
                'family_id' => NULL,
            ),
            2 => 
            array (
                'id' => 10,
                'name' => 'User Keluarga Ali',
                'email' => 'keluargaali@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$qDxxXoZQ0Q/mIk3NFS.hHuTtBF2zRSoYGbg3MlBJBan0h6s7UNCUW',
                'remember_token' => NULL,
                'photo' => 'user/user-keluarga-ali.png',
                'created_at' => '2023-10-07 21:48:46',
                'updated_at' => '2023-10-07 21:48:46',
                'family_id' => 5,
            ),
        ));
        
        
    }
}