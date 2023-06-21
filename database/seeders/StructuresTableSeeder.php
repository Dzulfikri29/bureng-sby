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
                'name' => 'John Doer',
                'position' => 'Direktur Utama',
                'photo' => 'structure/muhammad-rifai-1682323417.jpg',
                'created_at' => '2023-04-24 07:41:55',
                'updated_at' => '2023-04-27 16:20:31',
                'structure_id' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Jane Smith',
                'position' => 'Wakil Direktur',
                'photo' => 'structure/agus-muhaimin-1682323526.jpg',
                'created_at' => '2023-04-24 07:50:41',
                'updated_at' => '2023-04-26 11:35:04',
                'structure_id' => 4,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Michael Lee',
                'position' => 'Manager Keuangan',
                'photo' => 'structure/alimuddin-1682323556.jpg',
                'created_at' => '2023-04-24 07:52:04',
                'updated_at' => '2023-04-26 11:35:33',
                'structure_id' => 5,
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'Robert Williams',
                'position' => 'Manager Produksi',
                'photo' => 'structure/nur-ali-1682323630.jpg',
                'created_at' => '2023-04-24 07:52:33',
                'updated_at' => '2023-04-26 11:36:02',
                'structure_id' => 5,
            ),
        ));
        
        
    }
}