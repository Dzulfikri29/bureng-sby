<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('activities')->delete();
        
        \DB::table('activities')->insert(array (
            0 => 
            array (
                'id' => 6,
                'title' => 'Lokasi',
                'slug' => 'lokasi',
                'user_id' => 7,
                'created_at' => '2023-05-03 17:36:38',
                'updated_at' => '2023-05-03 17:36:38',
            ),
            1 => 
            array (
                'id' => 7,
                'title' => 'Kegiatan',
                'slug' => 'kegiatan',
                'user_id' => 7,
                'created_at' => '2023-05-03 17:37:16',
                'updated_at' => '2023-05-03 17:37:16',
            ),
            2 => 
            array (
                'id' => 5,
                'title' => 'Produksi',
                'slug' => 'produksi',
                'user_id' => 7,
                'created_at' => '2023-05-03 17:35:40',
                'updated_at' => '2023-05-03 17:35:40',
            ),
        ));
        
        
    }
}