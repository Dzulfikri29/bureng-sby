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
                'institution' => 'Fakultas Peternakan UI',
                'phone' => 2147483647,
                'address' => 'Jalan Raya Jakarta Pusat',
                'activity' => 'Memaksimalkan Peternakan di Era Modern',
                'description' => '-',
                'status' => 'approve',
                'created_at' => '2023-04-25 21:28:18',
                'updated_at' => '2023-04-26 11:58:51',
            ),
            1 => 
            array (
                'id' => 13,
                'from_date' => '2023-04-27',
                'to_date' => '2023-04-27',
                'institution' => 'Komunitas Ternak Jatim',
                'phone' => 2147483647,
                'address' => 'Jalan Raya Surabaya',
                'activity' => 'Dasar Beternak Sapi',
                'description' => '-',
                'status' => 'approve',
                'created_at' => '2023-04-25 21:56:20',
                'updated_at' => '2023-04-26 11:57:45',
            ),
        ));
        
        
    }
}