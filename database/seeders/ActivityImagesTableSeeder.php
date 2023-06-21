<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ActivityImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('activity_images')->delete();
        
        \DB::table('activity_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'activity_id' => 5,
                'path' => 'activity/-16831101682Ajz4WZj.JPG',
                'created_at' => '2023-05-03 17:36:11',
                'updated_at' => '2023-05-03 17:36:11',
            ),
            1 => 
            array (
                'id' => 2,
                'activity_id' => 5,
                'path' => 'activity/-1683110170ndXBVgMo.JPG',
                'created_at' => '2023-05-03 17:36:12',
                'updated_at' => '2023-05-03 17:36:12',
            ),
            2 => 
            array (
                'id' => 3,
                'activity_id' => 5,
                'path' => 'activity/-1683110177rXW5ZbuD.JPG',
                'created_at' => '2023-05-03 17:36:18',
                'updated_at' => '2023-05-03 17:36:18',
            ),
            3 => 
            array (
                'id' => 4,
                'activity_id' => 6,
                'path' => 'activity/-1683110224RNPQhMYW.JPG',
                'created_at' => '2023-05-03 17:37:06',
                'updated_at' => '2023-05-03 17:37:06',
            ),
            4 => 
            array (
                'id' => 5,
                'activity_id' => 7,
                'path' => 'activity/-16831102596Hr3gnYK.JPG',
                'created_at' => '2023-05-03 17:37:41',
                'updated_at' => '2023-05-03 17:37:41',
            ),
            5 => 
            array (
                'id' => 6,
                'activity_id' => 7,
                'path' => 'activity/-1683110260COblkM5Y.JPG',
                'created_at' => '2023-05-03 17:37:42',
                'updated_at' => '2023-05-03 17:37:42',
            ),
        ));
        
        
    }
}