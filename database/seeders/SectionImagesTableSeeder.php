<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SectionImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('section_images')->delete();
        
        \DB::table('section_images')->insert(array (
            0 => 
            array (
                'id' => 10,
                'section_id' => 9,
                'path' => 'section/bagian-1-1682318394Wklyf1X3.jpg',
                'created_at' => '2023-04-24 06:39:56',
                'updated_at' => '2023-04-24 06:39:56',
            ),
            1 => 
            array (
                'id' => 13,
                'section_id' => 8,
                'path' => 'section/bagian-2-16823197784Dlg5kFV.jpeg',
                'created_at' => '2023-04-24 07:02:58',
                'updated_at' => '2023-04-24 07:02:58',
            ),
            2 => 
            array (
                'id' => 14,
                'section_id' => 8,
                'path' => 'section/bagian-1-1682319920Jly1hWmP.jpg',
                'created_at' => '2023-04-24 07:05:20',
                'updated_at' => '2023-04-24 07:05:20',
            ),
            3 => 
            array (
                'id' => 15,
                'section_id' => 9,
                'path' => 'section/bagian-1-1682319991erqKjei5.jpg',
                'created_at' => '2023-04-24 07:06:31',
                'updated_at' => '2023-04-24 07:06:31',
            ),
            4 => 
            array (
                'id' => 16,
                'section_id' => 9,
                'path' => 'section/bagian-1-1682321280BWo9DQcy.jpeg',
                'created_at' => '2023-04-24 07:28:00',
                'updated_at' => '2023-04-24 07:28:00',
            ),
            5 => 
            array (
                'id' => 17,
                'section_id' => 13,
                'path' => 'section/header-1682493342lTXFkNrH.jpg',
                'created_at' => '2023-04-26 14:15:43',
                'updated_at' => '2023-04-26 14:15:43',
            ),
            6 => 
            array (
                'id' => 18,
                'section_id' => 9,
                'path' => 'section/bagian-1-1682498308L4JAcMxF.jpg',
                'created_at' => '2023-04-26 15:38:29',
                'updated_at' => '2023-04-26 15:38:29',
            ),
            7 => 
            array (
                'id' => 22,
                'section_id' => 14,
                'path' => 'section/background-utama-1682834401Hzy497Cq.JPG',
                'created_at' => '2023-04-30 13:00:03',
                'updated_at' => '2023-04-30 13:00:03',
            ),
            8 => 
            array (
                'id' => 23,
                'section_id' => 15,
                'path' => 'section/background-menu-1683100447noZI3KRD.JPG',
                'created_at' => '2023-05-03 14:54:10',
                'updated_at' => '2023-05-03 14:54:10',
            ),
        ));
        
        
    }
}