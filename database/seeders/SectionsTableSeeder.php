<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sections')->delete();
        
        \DB::table('sections')->insert(array (
            0 => 
            array (
                'id' => 5,
                'page_id' => 2,
                'name' => 'bagian-1',
                'title' => 'Struktur organisasi',
                'subtitle' => 'Para pemimpin organisasi literasi',
                'body' => '<p><br></p>',
                'created_at' => '2023-04-24 02:43:05',
                'updated_at' => '2023-04-25 09:45:37',
            ),
            1 => 
            array (
                'id' => 8,
                'page_id' => 1,
                'name' => 'bagian-1',
                'title' => 'Get to Know Agrions',
                'subtitle' => 'We’re agrion expert quality farming leaderss',
                'body' => '<p>There are many variations of passages of available but the majority have suffered alteration in some form, by injected humou or words even slightly believable.s</p>',
                'created_at' => '2023-04-24 06:14:50',
                'updated_at' => '2023-04-24 06:35:44',
            ),
            2 => 
            array (
                'id' => 9,
                'page_id' => 1,
                'name' => 'bagian-2',
                'title' => 'Our Beneifts',
                'subtitle' => 'pROVIDING HIGH QUALITY PRODUCTS',
            'body' => '<p><span style="color: rgb(255, 255, 255);">There cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla sed medy fringilla vitae.</span></p>',
                'created_at' => '2023-04-24 06:15:45',
                'updated_at' => '2023-04-24 06:50:05',
            ),
            3 => 
            array (
                'id' => 10,
                'page_id' => 4,
                'name' => 'bagian-1',
                'title' => 'Our Latest Projects',
                'subtitle' => 'Our Similar Projectss',
                'body' => '<p><br></p>',
                'created_at' => '2023-04-25 02:32:22',
                'updated_at' => '2023-04-25 02:34:14',
            ),
            4 => 
            array (
                'id' => 11,
                'page_id' => 4,
                'name' => 'pendaftaran',
                'title' => 'Pendaftaran Pelatihan',
                'subtitle' => 'Isi identitas atau instansi anda',
                'body' => '<p><br></p>',
                'created_at' => '2023-04-25 21:05:32',
                'updated_at' => '2023-04-25 21:09:45',
            ),
        ));
        
        
    }
}