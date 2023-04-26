<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TrainingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('trainings')->delete();
        
        \DB::table('trainings')->insert(array (
            0 => 
            array (
                'id' => 11,
                'from_date' => '2023-04-25',
                'to_date' => '2023-04-26',
                'institution' => 'Intive Studio',
                'phone' => 2147483647,
                'address' => 'Jl. Taman Pondok Indah Wiyung',
                'activity' => 'Pelatihan Dasar Ternak Sapi',
                'description' => '',
                'status' => 'approve',
                'created_at' => '2023-04-25 21:28:18',
                'updated_at' => '2023-04-25 21:31:58',
            ),
            1 => 
            array (
                'id' => 13,
                'from_date' => '2023-04-27',
                'to_date' => '2023-04-27',
                'institution' => 'Desa Mulyosari',
                'phone' => 2147483647,
                'address' => 'Jalan Raya Mulyosari',
                'activity' => 'Latihan  Mengembala Sapi',
                'description' => '',
                'status' => 'approve',
                'created_at' => '2023-04-25 21:56:20',
                'updated_at' => '2023-04-26 06:32:32',
            ),
        ));
        
        
    }
}