<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('galleries')->delete();
        
        \DB::table('galleries')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Gambar 2',
                'path' => 'gallery/gallery-1696558793.jpg',
                'created_at' => '2023-10-05 18:21:32',
                'updated_at' => '2023-10-07 09:24:16',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Gambar 1',
                'path' => 'gallery/gallery-1696558838.jpg',
                'created_at' => '2023-10-05 18:21:45',
                'updated_at' => '2023-10-07 09:24:10',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Gambar 3',
                'path' => 'gallery/gallery-1696645467.jpeg',
                'created_at' => '2023-10-07 09:24:27',
                'updated_at' => '2023-10-07 09:24:27',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Gambar 4',
                'path' => 'gallery/gallery-1696645480.jpg',
                'created_at' => '2023-10-07 09:24:40',
                'updated_at' => '2023-10-07 09:24:42',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Gambar 5',
                'path' => 'gallery/gallery-1696645502.jpg',
                'created_at' => '2023-10-07 09:25:02',
                'updated_at' => '2023-10-07 09:25:03',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Gambar 6',
                'path' => 'gallery/gallery-1696645517.jpg',
                'created_at' => '2023-10-07 09:25:17',
                'updated_at' => '2023-10-07 09:25:19',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Gambar 7',
                'path' => 'gallery/gallery-1696645548.jpg',
                'created_at' => '2023-10-07 09:25:48',
                'updated_at' => '2023-10-07 09:25:50',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Gambar 8',
                'path' => 'gallery/gallery-1696645569.jpg',
                'created_at' => '2023-10-07 09:26:09',
                'updated_at' => '2023-10-07 09:26:11',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Gambar 9',
                'path' => 'gallery/gallery-1696645593.jpg',
                'created_at' => '2023-10-07 09:26:33',
                'updated_at' => '2023-10-07 09:26:35',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'Gambar 10',
                'path' => 'gallery/gallery-1696645646.jpg',
                'created_at' => '2023-10-07 09:27:26',
                'updated_at' => '2023-10-07 09:27:28',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'Gambar 11',
                'path' => 'gallery/gallery-1696645675.jpg',
                'created_at' => '2023-10-07 09:27:55',
                'updated_at' => '2023-10-07 09:27:57',
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'Gambar 12',
                'path' => 'gallery/gallery-1696645769.jpg',
                'created_at' => '2023-10-07 09:29:29',
                'updated_at' => '2023-10-07 09:29:30',
            ),
        ));
        
        
    }
}