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
                'id' => 46,
                'product_id' => 5,
                'image' => 'product/master-gemuk-16823272033lyTi3ql.png',
                'is_main' => 0,
                'created_at' => '2023-04-24 09:06:43',
                'updated_at' => '2023-04-24 09:06:43',
            ),
            1 => 
            array (
                'id' => 47,
                'product_id' => 6,
                'image' => 'product/makanan-hewan-16823274090Jifxa7m.png',
                'is_main' => 0,
                'created_at' => '2023-04-24 09:10:09',
                'updated_at' => '2023-04-24 09:10:09',
            ),
        ));
        
        
    }
}