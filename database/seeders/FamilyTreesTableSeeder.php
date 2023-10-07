<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FamilyTreesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('family_trees')->delete();
        
        \DB::table('family_trees')->insert(array (
            0 => 
            array (
                'id' => 10,
                'family_id' => 4,
                'family_tree_id' => NULL,
                'name' => 'Keluarga 1',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => '2023-10-07 09:50:50',
                'updated_at' => '2023-10-07 09:50:50',
            ),
            1 => 
            array (
                'id' => 11,
                'family_id' => 4,
                'family_tree_id' => 10,
                'name' => 'Keluarga 1.1',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => '2023-10-07 09:51:02',
                'updated_at' => '2023-10-07 09:51:02',
            ),
            2 => 
            array (
                'id' => 12,
                'family_id' => 4,
                'family_tree_id' => 10,
                'name' => 'Keluarga 1.2',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => '2023-10-07 09:51:14',
                'updated_at' => '2023-10-07 09:51:14',
            ),
            3 => 
            array (
                'id' => 13,
                'family_id' => 4,
                'family_tree_id' => 10,
                'name' => 'Keluarga 1.3',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => '2023-10-07 09:51:30',
                'updated_at' => '2023-10-07 09:51:30',
            ),
            4 => 
            array (
                'id' => 14,
                'family_id' => 4,
                'family_tree_id' => 13,
                'name' => 'Keluarga 1.3.1',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => '2023-10-07 09:51:44',
                'updated_at' => '2023-10-07 09:51:44',
            ),
            5 => 
            array (
                'id' => 15,
                'family_id' => 4,
                'family_tree_id' => 13,
                'name' => 'Keluarga 1.3.2',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => '2023-10-07 09:51:53',
                'updated_at' => '2023-10-07 09:51:53',
            ),
            6 => 
            array (
                'id' => 16,
                'family_id' => 4,
                'family_tree_id' => 13,
                'name' => 'Keluarga 1.3.4',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => '2023-10-07 09:52:01',
                'updated_at' => '2023-10-07 09:52:09',
            ),
            7 => 
            array (
                'id' => 17,
                'family_id' => 2,
                'family_tree_id' => NULL,
                'name' => 'Keluarga 1',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 18,
                'family_id' => 2,
                'family_tree_id' => 17,
                'name' => 'Keluarga 1.1',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 19,
                'family_id' => 2,
                'family_tree_id' => 17,
                'name' => 'Keluarga 1.2',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 20,
                'family_id' => 2,
                'family_tree_id' => 17,
                'name' => 'Keluarga 1.3',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 21,
                'family_id' => 2,
                'family_tree_id' => 20,
                'name' => 'Keluarga 1.3.1',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 22,
                'family_id' => 2,
                'family_tree_id' => 20,
                'name' => 'Keluarga 1.3.2',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 23,
                'family_id' => 2,
                'family_tree_id' => 20,
                'name' => 'Keluarga 1.3.4',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 24,
                'family_id' => 5,
                'family_tree_id' => NULL,
                'name' => 'Keluarga 1',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 25,
                'family_id' => 5,
                'family_tree_id' => 24,
                'name' => 'Keluarga 1.1',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 26,
                'family_id' => 5,
                'family_tree_id' => 24,
                'name' => 'Keluarga 1.2',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 27,
                'family_id' => 5,
                'family_tree_id' => 24,
                'name' => 'Keluarga 1.3',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 28,
                'family_id' => 5,
                'family_tree_id' => 27,
                'name' => 'Keluarga 1.3.1',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 29,
                'family_id' => 5,
                'family_tree_id' => 27,
                'name' => 'Keluarga 1.3.2',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 30,
                'family_id' => 5,
                'family_tree_id' => 27,
                'name' => 'Keluarga 1.3.4',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 31,
                'family_id' => 6,
                'family_tree_id' => NULL,
                'name' => 'Keluarga 1',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 32,
                'family_id' => 6,
                'family_tree_id' => 31,
                'name' => 'Keluarga 1.1',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 33,
                'family_id' => 6,
                'family_tree_id' => 31,
                'name' => 'Keluarga 1.2',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 34,
                'family_id' => 6,
                'family_tree_id' => 31,
                'name' => 'Keluarga 1.3',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 35,
                'family_id' => 6,
                'family_tree_id' => 34,
                'name' => 'Keluarga 1.3.1',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 36,
                'family_id' => 6,
                'family_tree_id' => 34,
                'name' => 'Keluarga 1.3.2',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 37,
                'family_id' => 6,
                'family_tree_id' => 34,
                'name' => 'Keluarga 1.3.4',
                'birth_date' => NULL,
                'death_date' => NULL,
                'place_of_death' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}