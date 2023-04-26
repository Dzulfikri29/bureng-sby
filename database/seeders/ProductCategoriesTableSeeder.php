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
                'name' => 'Vitamin Hewan',
                'created_at' => '2023-04-18 05:13:43',
                'updated_at' => '2023-04-24 09:04:56',
            ),
            1 => 
            array (
                'id' => 20,
                'name' => 'Makanan Hewan',
                'created_at' => '2023-04-24 09:10:03',
                'updated_at' => '2023-04-24 09:10:03',
            ),
        ));
        
        
    }
}