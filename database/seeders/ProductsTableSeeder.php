<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 5,
                'product_category_id' => 19,
                'name' => 'Daging sapi segar',
                'slug' => 'daging-sapi-segar',
                'short_desc' => 'Daging sapi segar biasanya dijual per kilogram dengan harga bervariasi tergantung pada jenis potongan dan kualitas dagingnya',
                'description' => '<p>Daging sapi segar biasanya dijual per kilogram dengan harga bervariasi tergantung pada jenis potongan dan kualitas dagingnya. Misalnya, harga daging sapi sirloin berkisar antara Rp <strong>120.000-150.000</strong> per kilogram, sedangkan daging sapi wagyu bisa mencapai Rp 1.500.000-2.000.000 per kilogram. Daging sapi segar adalah produk utama dari peternakan sapi yang biasanya diolah menjadi berbagai masakan enak dan bergizi.</p>',
                'price' => 120000.0,
                'status' => 'active',
                'phone' => 6285736413245,
                'created_at' => '2023-04-24 09:06:38',
                'updated_at' => '2023-04-26 14:01:55',
            ),
            1 => 
            array (
                'id' => 6,
                'product_category_id' => 21,
                'name' => 'Susu sapi segar',
                'slug' => 'susu-sapi-segar',
                'short_desc' => 'Produk olahan susu seperti keju, yoghurt, dan es krim memiliki harga yang bervariasi tergantung pada merek dan jenis produknya',
                'description' => '<p>Susu sapi segar biasanya dijual per liter dengan harga berkisar antara Rp <strong>8.000-10.000</strong>. Susu sapi segar sangat bergizi dan sering diolah menjadi produk susu olahan seperti keju, yoghurt, dan es krim.</p>',
                'price' => 10000.0,
                'status' => 'active',
                'phone' => 6285736413245,
                'created_at' => '2023-04-24 09:10:03',
                'updated_at' => '2023-04-26 14:03:00',
            ),
        ));
        
        
    }
}