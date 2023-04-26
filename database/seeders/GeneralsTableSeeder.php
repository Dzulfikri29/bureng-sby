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
                'meta_description' => 'Pemberdayaan masyarakat peternak sapi dalam memanfaatkan potensi peternakan dan pertanian di Desa Sumbersari melalui pengembangan usaha kelompok ternak untuk peningkatan ekonomi dan kemandirian masyarakat.',
                'meta_image' => 'general/meta-image-1681453448.png',
                'meta_keywords' => 'csr, peternakan, peternakan sapi, pertanian, bina lingkungan, sapi',
                'phone' => '6285736413245',
                'email' => 'literasi@gmail.com',
                'address' => 'Sumbersari, Kec. Sambeng, Lamongan, Jawa Timur',
                'tagline' => 'Pemberdayaan masyarakat peternak sapi dalam memanfaatkan potensi peternakan dan pertanian di Desa',
                'training_registration' => 'Mau Ikut pelatihan di literasi? 
Daftar Sekarang',
                'logo' => 'general/logo-1681453448.png',
                'logo_short' => 'general/logo-short-1681453448.png',
                'logo_white' => 'general/logo-white-1681453448.png',
                'logo_short_white' => 'general/logo-short-white-1681453448.png',
                'browser_logo' => 'general/browser-logo-1681453448.png',
                'created_at' => NULL,
                'updated_at' => '2023-04-25 12:44:58',
            ),
        ));
        
        
    }
}