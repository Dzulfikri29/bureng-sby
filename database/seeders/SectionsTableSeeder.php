<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sections')->delete();
        
        \DB::table('sections')->insert(array (
            0 => 
            array (
                'id' => 5,
                'page_id' => 2,
                'name' => 'bagian-1',
                'title' => 'Struktur Organisasi',
                'subtitle' => 'Struktur Organisasi Tahun 2023',
                'body' => '<p><br></p>',
                'created_at' => '2023-04-24 02:43:05',
                'updated_at' => '2023-04-26 12:09:43',
            ),
            1 => 
            array (
                'id' => 8,
                'page_id' => 1,
                'name' => 'bagian-2',
                'title' => 'Keunggulan Kami',
                'subtitle' => 'Solusi Terbaik Untuk Peternakan',
            'body' => '<p><span style="color: rgb(255, 255, 255);">Kami senantiasa berupaya memberikan nutrisi dan perawatan terbaik untuk setiap ternak, sehingga menghasilkan produk ternak yang berkualitas tinggi dan sehat. Kami juga memperhatikan keberlanjutan lingkungan dan berkomitmen untuk menggunakan praktik yang ramah lingkungan dalam operasi kami. Kami siap untuk memenuhi kebutuhan produk ternak Anda dan melayani dengan baik. Silakan hubungi kami untuk informasi lebih lanjut.</span></p>',
                'created_at' => '2023-04-24 06:14:50',
                'updated_at' => '2023-04-26 12:14:51',
            ),
            2 => 
            array (
                'id' => 9,
                'page_id' => 1,
                'name' => 'bagian-1',
                'title' => 'Profil Literasi',
                'subtitle' => 'Menyediakan Produk Ternak Berkualitas Tinggi',
                'body' => '<p>Literasi telah berpengalaman selama bertahun-tahun dalam menyediakan produk ternak berkualitas tinggi untuk memenuhi kebutuhan konsumen. Kami memiliki berbagai jenis ternak, termasuk sapi, kambing, domba, dan ayam yang dipelihara dengan kondisi yang baik dan sehat.</p>',
                'created_at' => '2023-04-24 06:15:45',
                'updated_at' => '2023-04-26 12:16:57',
            ),
            3 => 
            array (
                'id' => 10,
                'page_id' => 4,
                'name' => 'bagian-1',
                'title' => 'Kegiatan Lain',
                'subtitle' => 'Beberapa Kegiatan Lain Di literasi',
                'body' => '<p><br></p>',
                'created_at' => '2023-04-25 02:32:22',
                'updated_at' => '2023-04-26 12:22:18',
            ),
            4 => 
            array (
                'id' => 11,
                'page_id' => 4,
                'name' => 'pendaftaran',
                'title' => 'Pendaftaran Pelatihan',
                'subtitle' => 'Isi identitas Peserta Pelatihan',
                'body' => '<p><br></p>',
                'created_at' => '2023-04-25 21:05:32',
                'updated_at' => '2023-04-26 12:21:54',
            ),
        ));
        
        
    }
}