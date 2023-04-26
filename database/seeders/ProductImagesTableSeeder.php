<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_images')->delete();
        
        \DB::table('product_images')->insert(array (
            0 => 
            array (
                'id' => 48,
                'product_id' => 5,
                'image' => 'product/daging-sapi-segar-1682484578OnOWJruq.jpg',
                'is_main' => 0,
                'created_at' => '2023-04-26 11:49:38',
                'updated_at' => '2023-04-26 11:49:38',
            ),
            1 => 
            array (
                'id' => 49,
                'product_id' => 6,
                'image' => 'product/susu-sapi-segar-1682484882m69QTWWz.jpg',
                'is_main' => 0,
                'created_at' => '2023-04-26 11:54:42',
                'updated_at' => '2023-04-26 11:54:42',
            ),
        ));
        
        
    }
}