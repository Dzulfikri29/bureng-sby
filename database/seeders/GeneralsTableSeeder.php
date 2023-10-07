<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GeneralsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('generals')->delete();
        
        \DB::table('generals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'website_name' => 'Bureng Surabaya',
                'meta_description' => 'Lorem ipsum dolor sit amProvide rehab facility dolor sit amet, consectetur adipisicing elit tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostr ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'meta_image' => 'general/meta-image-1696645912.jpg',
                'meta_keywords' => 'Lorem ipsum dolor sit amProvide rehab facility dolor sit amet, consectetur adipisicing elit tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostr ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'phone' => '0315058199',
                'email' => 'info@youremailid.com',
                'logo' => 'general/logo-1696646171.png',
                'logo_short' => 'general/logo-short-1696474552.png',
                'logo_white' => 'general/logo-white-1696646028.png',
                'logo_short_white' => 'general/logo-short-white-1696474552.png',
                'address' => 'New Street Town No 20x lake New York City, NY-101 US',
                'tagline' => 'Lorem ipsum dolor sit amProvide rehab facility dolor sit amet, consectetur adipisicing elit tempor incididunt',
                'browser_logo' => 'general/browser-logo-1696474552.png',
                'created_at' => NULL,
                'updated_at' => '2023-10-07 09:36:11',
            ),
        ));
        
        
    }
}