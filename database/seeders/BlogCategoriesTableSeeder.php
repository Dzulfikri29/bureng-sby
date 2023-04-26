<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_categories')->delete();
        
        \DB::table('blog_categories')->insert(array (
            0 => 
            array (
                'id' => 10,
                'name' => 'Makanan',
                'created_at' => '2023-04-22 03:55:44',
                'updated_at' => '2023-04-22 03:55:44',
            ),
            1 => 
            array (
                'id' => 11,
                'name' => 'minuman',
                'created_at' => '2023-04-23 01:16:51',
                'updated_at' => '2023-04-23 01:16:51',
            ),
            2 => 
            array (
                'id' => 12,
                'name' => 'Umum',
                'created_at' => '2023-04-25 10:07:48',
                'updated_at' => '2023-04-25 10:07:48',
            ),
            3 => 
            array (
                'id' => 13,
                'name' => 'Tips & Trik',
                'created_at' => '2023-04-25 10:11:04',
                'updated_at' => '2023-04-25 10:11:04',
            ),
        ));
        
        
    }
}