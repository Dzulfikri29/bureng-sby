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
                'name' => 'Master Gemuk',
                'slug' => 'master-gemuk',
                'short_desc' => 'Pada vitamin jenis yang satu ini sudah memberikan bukti nyata kepada beberapa penggunanya. Bahkan, banyak juga dari para pengguna Premix Master Gemuk yang merasa puas dengan hasil akhirnya.',
                'description' => '<p>Tidak dipungkiri, kalau ada beberapa para peternak yang merasa sudah capek ketika harus membuat <strong>vitamin sapi agar cepat gemuk</strong> secara alami. Alahasil yang dilakukan adalah membeli secara instan.&nbsp;</p><p>Padahal, di saat membeli vitamin untuk sapi tidak boleh dilakukan secara sembarangan. Untuk para peternak yang ingin membeli vitamin bisa langsung saja memilih produk dari Premix Master Gemuk dari <a href="https://ctsindonesia.co.id/premix-master-gemuk" rel="noopener noreferrer" target="_blank">CTS Indonesia</a>.&nbsp;</p><p>Pada vitamin jenis yang satu ini sudah memberikan bukti nyata kepada beberapa penggunanya. Bahkan, banyak juga dari para pengguna Premix Master Gemuk yang merasa puas dengan hasil akhirnya.&nbsp;</p>',
                'price' => 250000.0,
                'status' => 'active',
                'phone' => 6285736413245,
                'created_at' => '2023-04-24 09:06:38',
                'updated_at' => '2023-04-25 02:29:56',
            ),
            1 => 
            array (
                'id' => 6,
                'product_category_id' => 19,
                'name' => 'Makanan Hewan',
                'slug' => 'makanan-hewan',
                'short_desc' => '',
            'description' => '<p>ARTUPIC adalah Distributor resmi PT. Mensana.</p><p>Dan team dokter hewan PT.Mensana rutin merawat kesehatan ayam petelur di peternakan milik Artupic lokasi Bogor dengan luas 5 hektar.</p><p>Semua obat dari kami dijamin ASLI dan TEPAT GUNA karena pengalaman kami di lapangan.</p><p><br></p><p>PIRETAMAS 250 gram</p><p>Untuk mencegah stress pada ayam saat kondisi sakit, dapat meningkatkan daya tahan tubuh dan menurunkan panas tubus saat terinfeksi penyakir seperti gumboro CRD atau lainnya.</p><p>lNDlKASl =</p><ul><li>Mencegah stress saat kondisi sakit</li><li>meningkatkan daya tahan tubuh</li><li>menurunkan panas tubuh pada saat infeksi penyakit (gumboro, CRD, dll)</li></ul><p>KANDUNGAN per Kg =</p><p>Paracetamol 100gr</p><p>Vitamin C 200gr</p><p>Sorbitol 700gr</p><p>ATURAN PAKAI dan DOSIS =</p><p>diberikan lewat air minum</p><p>unggas : 1gr/ ltr air minum selama 3-5 hari berturut-turut.</p><p>PERHATIAN =</p><p>.+ Simpan obat ditempat sejuk dan terlindung dari sinar matahari.</p><p>.+ Harus dengan resep dokter hewan.</p><p>.+ Obat hanya untuk hewan</p><p>KEMASAN = Sachet @250gr (1 ember isi 40 sachet @250 gram)</p><p>Produsen = PT. Mensana Aneka Satwa</p>',
                'price' => 500000.0,
                'status' => 'active',
                'phone' => 6285736413245,
                'created_at' => '2023-04-24 09:10:03',
                'updated_at' => '2023-04-24 09:10:16',
            ),
        ));
        
        
    }
}