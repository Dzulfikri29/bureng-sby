<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TutorialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tutorials')->delete();
        
        \DB::table('tutorials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Sukses Bertani Terintegrasi Tanpa Limbah',
                'slug' => 'sukses-bertani-terintegrasi-tanpa-limbah',
                'body' => '<p>Heri Sunarto adalah petani sukses yang dulunya mengolah lahan 200 m menjadi 2 hektar Kisah suksesnya bermula ketika ia menemukan sistem Integtrated Farming Zero Waste Lahan yang Heri Sunarto garap mengintegrasikan antara padi,macam macam horti ,peternakan bahkan perikanan uniknya di garap di atas tanah kritis dan gersang Buah dari kerja kerasnya selain dari nilai ekonomi yang tidak sedikit beliau mendapatkan banyak apresiasi bahkan dari Mentri Pertanian Syahrul Yasin Limpo Seperti apa kisah lengkapnya Tonton videonya di Youtube Kementerian Pertanian</p>',
                'image' => 'tutorial-main-image/image-1682834201.JPG',
                'youtube_link' => 'https://www.youtube.com/watch?v=7m9WsaqPG4M',
                'status' => 'active',
                'user_id' => 7,
                'created_at' => '2023-04-30 11:21:52',
                'updated_at' => '2023-04-30 12:56:42',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Inspirasi Bertani Vertikultur dan Beternak Ayam KUB',
                'slug' => 'inspirasi-bertani-vertikultur-dan-beternak-ayam-kub',
            'body' => '<p>Taman Teknologi Pertanian (TTP) Cigombong merupakan wadah edukasi pertanian dan peternakan yang diinisiasi Badan Litbang Pertanian, Kementerian Pertanian. Lewat gerakan bertani sayur organik di pekarangan, TTP Cigombong merangkul ibu-ibu setempat yang mayoritas bekerja di pabrik garmen, untuk beralih menjadi petani pekarangan. Dengan sistem pertanian vertikultur, para ibu diajak bertani secara organik yang hasilnya dijual untuk menambah penghasilan keluarga. Kini, para ibu di Desa Tugujaya, Cigombong dapat berdaya dan mandiri lewat sektor pertanian. Tak hanya di sektor pertanian, TTP Cigombong juga membina kaum lelaki lewat gerakan beternak ayam Kampung Unggul Balitbangtan (KUB) untuk mendongkrak perekonomian desa. Kehadiran TTP Cigombong di Desa Tugujaya, Kecamatan Cigombong, Kabupaten Bogor ini, berhasil membangun perekonomian desa lewat program kampung edukasi pertanian dan peternakan.</p>',
                'image' => 'tutorial-main-image/image-1682834232.JPG',
                'youtube_link' => 'https://www.youtube.com/watch?v=CdpETSD6lkw',
                'status' => 'active',
                'user_id' => 7,
                'created_at' => '2023-04-30 11:23:07',
                'updated_at' => '2023-04-30 12:57:13',
            ),
        ));
        
        
    }
}