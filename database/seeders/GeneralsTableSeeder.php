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
                'website_name' => 'Literasi',
                'meta_description' => 'Temukan peternakan sapi modern yang menyediakan produk sapi berkualitas dan berkelanjutan. Nikmati daging sapi segar dan susu sapi murni yang dihasilkan secara etis dan sehat.',
                'meta_image' => 'general/meta-image-1681453448.png',
                'meta_keywords' => 'peternakan sapi,daging sapi,susu sapi,ternak sapi,pakan sapi,kesehatan sapi,sapi potong,sapi perah,manajemen peternakan sapi,kandang sapi,hewan ternak,beternak sapi,peternakan sapi modern,budidaya sapi,pembibitan sapi',
                'phone' => '6285736413245',
                'email' => 'literasi@gmail.com',
                'address' => 'Sumbersari, Kec. Sambeng, Lamongan, Jawa Timur',
                'tagline' => 'Membangun Keberlanjutan Masa Depan Melalui Integrasi dan Inovasi Teknologi Dalam Industri Peternakan',
                'training_registration' => 'Mari bergabung dengan pelatihan kami dan tingkatkan keterampilan Anda dalam bidang yang Anda minati!',
                'logo' => 'general/logo-1681453448.png',
                'logo_short' => 'general/logo-short-1681453448.png',
                'logo_white' => 'general/logo-white-1681453448.png',
                'logo_short_white' => 'general/logo-short-white-1681453448.png',
                'browser_logo' => 'general/browser-logo-1681453448.png',
                'created_at' => NULL,
                'updated_at' => '2023-04-26 11:33:34',
            ),
        ));
        
        
    }
}