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
                'id' => 12,
                'name' => 'Umum',
                'created_at' => '2023-04-25 10:07:48',
                'updated_at' => '2023-04-25 10:07:48',
            ),
            1 => 
            array (
                'id' => 14,
                'name' => 'Tips & Trik',
                'created_at' => '2023-04-26 12:03:31',
                'updated_at' => '2023-04-26 12:03:31',
            ),
        ));
        
        
    }
}