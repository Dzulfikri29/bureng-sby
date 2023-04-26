<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_categories')->delete();
        
        \DB::table('product_categories')->insert(array (
            0 => 
            array (
                'id' => 19,
                'name' => 'Makanan Mentah',
                'created_at' => '2023-04-18 05:13:43',
                'updated_at' => '2023-04-26 11:55:33',
            ),
            1 => 
            array (
                'id' => 21,
                'name' => 'Minuman',
                'created_at' => '2023-04-26 11:54:06',
                'updated_at' => '2023-04-26 11:54:06',
            ),
        ));
        
        
    }
}