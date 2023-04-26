<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialMediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('social_media')->delete();
        
        \DB::table('social_media')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'instagram',
                'user_name' => '@literasi',
                'icon' => 'instagram',
                'link' => 'https://instagram.com/literasi',
                'created_at' => '2023-04-14 06:27:36',
                'updated_at' => '2023-04-14 06:27:36',
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'facebook',
                'user_name' => 'Literasi',
                'icon' => 'facebook',
                'link' => 'https://facebook.com/literasi',
                'created_at' => '2023-04-23 04:43:19',
                'updated_at' => '2023-04-23 04:43:19',
            ),
        ));
        
        
    }
}