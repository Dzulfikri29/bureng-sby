<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StructuresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('structures')->delete();
        
        \DB::table('structures')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'Muhammad Rifa\'i',
                'position' => 'Kepala Desa',
                'photo' => 'structure/muhammad-rifai-1682323417.jpg',
                'created_at' => '2023-04-24 07:41:55',
                'updated_at' => '2023-04-24 08:03:38',
                'structure_id' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Agus Muhaimin',
                'position' => 'Sekretaris Desa',
                'photo' => 'structure/agus-muhaimin-1682323526.jpg',
                'created_at' => '2023-04-24 07:50:41',
                'updated_at' => '2023-04-24 08:05:26',
                'structure_id' => 4,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Alimuddin',
                'position' => 'Ketua RW 01',
                'photo' => 'structure/alimuddin-1682323556.jpg',
                'created_at' => '2023-04-24 07:52:04',
                'updated_at' => '2023-04-24 08:05:56',
                'structure_id' => 5,
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'Nur Ali',
                'position' => 'Ketua RW 02',
                'photo' => 'structure/nur-ali-1682323630.jpg',
                'created_at' => '2023-04-24 07:52:33',
                'updated_at' => '2023-04-24 08:07:10',
                'structure_id' => 5,
            ),
        ));
        
        
    }
}