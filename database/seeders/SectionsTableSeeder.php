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
                'id' => 1,
                'page_id' => 1,
                'name' => 'selamat-datang',
                'title' => 'Selamat Datang di Bureng surabaya',
                'subtitle' => '-',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget nulla facilisi etiam dignissim. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Odio aenean sed adipiscing diam donec. Fermentum et sollicitudin ac orci phasellus egestas. Volutpat sed cras ornare arcu. Congue mauris rhoncus aenean vel. Urna condimentum mattis pellentesque id nibh tortor id aliquet lectus. In dictum non consectetur a erat nam at lectus urna. Id cursus metus aliquam eleifend.</p>',
                'created_at' => '2023-10-07 21:08:51',
                'updated_at' => '2023-10-10 07:37:17',
            ),
            1 => 
            array (
                'id' => 2,
                'page_id' => 1,
                'name' => 'pohon-keluarga',
                'title' => 'Pohon Keluarga',
                'subtitle' => 'Silsilah Keluarga Bureng',
                'body' => '<p><br></p>',
                'created_at' => '2023-10-07 21:09:20',
                'updated_at' => '2023-10-07 21:13:31',
            ),
            2 => 
            array (
                'id' => 3,
                'page_id' => 1,
                'name' => 'kegiatan',
                'title' => 'Kegiatan',
                'subtitle' => 'Kegiatan di Bureng Surabaya',
                'body' => '<p><br></p>',
                'created_at' => '2023-10-07 21:09:39',
                'updated_at' => '2023-10-07 21:14:27',
            ),
            3 => 
            array (
                'id' => 4,
                'page_id' => 1,
                'name' => 'waktu-sholat',
                'title' => 'Jadwal Sholat Hari ini',
                'subtitle' => '-',
                'body' => '<p><br></p>',
                'created_at' => '2023-10-07 21:09:49',
                'updated_at' => '2023-10-07 21:14:52',
            ),
            4 => 
            array (
                'id' => 5,
                'page_id' => 1,
                'name' => 'galeri',
                'title' => 'Galeri Kegiatan',
                'subtitle' => 'Dokumentasi Kegiatan Kami',
                'body' => '<p><br></p>',
                'created_at' => '2023-10-07 21:10:25',
                'updated_at' => '2023-10-07 21:16:35',
            ),
            5 => 
            array (
                'id' => 6,
                'page_id' => 1,
                'name' => 'berita',
                'title' => 'Update & Berita',
                'subtitle' => 'Artikel dan berita tentang bureng surabaya',
                'body' => '<p><br></p>',
                'created_at' => '2023-10-07 21:10:42',
                'updated_at' => '2023-10-07 21:16:03',
            ),
            6 => 
            array (
                'id' => 8,
                'page_id' => 2,
                'name' => 'header',
                'title' => 'Sejarah',
                'subtitle' => '',
                'body' => '<p><br></p>',
                'created_at' => '2023-10-07 21:28:07',
                'updated_at' => '2023-10-07 21:28:23',
            ),
            7 => 
            array (
                'id' => 9,
                'page_id' => 2,
                'name' => 'content',
                'title' => 'Sejarah Bureng Surabaya',
                'subtitle' => 'Sekilas Tentang Kami',
                'body' => '<p><br></p>',
                'created_at' => '2023-10-07 21:29:24',
                'updated_at' => '2023-10-07 21:39:26',
            ),
            8 => 
            array (
                'id' => 10,
                'page_id' => 3,
                'name' => 'header',
                'title' => 'silsilah',
                'subtitle' => '-',
                'body' => '<p><br></p>',
                'created_at' => '2023-10-07 21:30:29',
                'updated_at' => '2023-10-07 21:31:06',
            ),
            9 => 
            array (
                'id' => 11,
                'page_id' => 4,
                'name' => 'header',
                'title' => 'Galeri',
                'subtitle' => '-',
                'body' => '<p><br></p>',
                'created_at' => '2023-10-07 21:31:26',
                'updated_at' => '2023-10-07 21:31:32',
            ),
            10 => 
            array (
                'id' => 12,
                'page_id' => 5,
                'name' => 'header',
                'title' => 'Kegiatan',
                'subtitle' => '-',
                'body' => '<p><br></p>',
                'created_at' => '2023-10-07 21:31:48',
                'updated_at' => '2023-10-07 21:32:05',
            ),
            11 => 
            array (
                'id' => 13,
                'page_id' => 6,
                'name' => 'header',
                'title' => 'berita',
                'subtitle' => '-',
                'body' => '<p><br></p>',
                'created_at' => '2023-10-07 21:32:19',
                'updated_at' => '2023-10-07 21:32:25',
            ),
        ));
        
        
    }
}