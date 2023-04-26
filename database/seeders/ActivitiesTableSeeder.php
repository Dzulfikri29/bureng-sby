<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('activities')->delete();
        
        \DB::table('activities')->insert(array (
            0 => 
            array (
                'id' => 3,
                'title' => 'Latihan Pembuatan Pakan ternak',
                'slug' => 'latihan-pembuatan-pakan-ternak',
                'body' => '<p>Pelatihan ini dirancang untuk memberikan pengetahuan dan keterampilan dalam pembuatan pakan ternak yang berkualitas tinggi. Peserta akan mempelajari tentang bahan-bahan pakan yang tepat dan berbagai teknik pengolahan yang diperlukan untuk menciptakan pakan yang seimbang dan berkualitas tinggi.</p><p>Selama pelatihan, para peserta akan belajar cara membuat pakan yang sesuai dengan jenis ternak yang dibudidayakan, seperti sapi, kambing, domba, dan ayam. Pelatihan ini juga mencakup teknik pengukuran dan pencampuran bahan-bahan pakan yang tepat, penggunaan bahan-bahan pakan yang terjangkau dan mudah didapat, serta cara mengoptimalkan ketersediaan pakan dengan biaya yang terjangkau.</p><p><br></p><p>Pelatihan ini cocok bagi peternak, petani, dan siapa saja yang tertarik dalam pembuatan pakan ternak. Para peserta akan mendapatkan pengetahuan dan keterampilan yang diperlukan untuk memproduksi pakan ternak berkualitas tinggi dan seimbang untuk meningkatkan produktivitas dan kesehatan ternak mereka.</p><p><br></p><p>Jangan lewatkan kesempatan untuk mempelajari cara membuat pakan ternak berkualitas tinggi. Daftar sekarang dan tingkatkan usaha peternakan Anda!</p>',
                'meta_title' => 'Latihan Pembuatan Pakan ternak',
                'meta_description' => 'Latihan Pembuatan Pakan ternak',
                'meta_keywords' => 'Latihan Pembuatan Pakan ternak',
                'image' => 'activity-main-image/image-1682482165.jpeg',
                'status' => 'active',
                'user_id' => 7,
                'created_at' => '2023-04-24 23:01:40',
                'updated_at' => '2023-04-26 12:18:34',
            ),
            1 => 
            array (
                'id' => 4,
                'title' => 'Inspeksi Ternak',
                'slug' => 'inspeksi-ternak',
                'body' => '<p>Inspeksi kesehatan ternak adalah suatu kegiatan penting dalam usaha peternakan. Melalui inspeksi kesehatan ternak, para peternak dapat mengidentifikasi potensi masalah kesehatan pada ternak mereka sebelum menjadi lebih serius dan menyebar ke ternak lainnya.</p><p><br></p><p>Inspeksi kesehatan ternak melibatkan berbagai teknik dan metode untuk mengidentifikasi tanda-tanda kesehatan dan penyakit pada ternak. Beberapa teknik inspeksi yang umum digunakan adalah pemeriksaan fisik, pemeriksaan suhu tubuh, pemeriksaan kondisi bulu atau bulu, pemeriksaan kotoran, dan pemeriksaan perilaku.</p><p><br></p><p>Melakukan inspeksi kesehatan ternak secara rutin dapat membantu peternak dalam mengambil tindakan preventif untuk mencegah dan mengendalikan penyakit pada ternak mereka. Selain itu, inspeksi kesehatan ternak juga dapat membantu meningkatkan produktivitas dan kesehatan ternak yang berdampak positif pada keuntungan usaha peternakan.</p><p><br></p><p>Untuk melakukan inspeksi kesehatan ternak secara efektif, peternak perlu memiliki pengetahuan dan keterampilan yang cukup. Oleh karena itu, pelatihan inspeksi kesehatan ternak sangat penting bagi peternak yang ingin memastikan kesehatan dan produktivitas ternak mereka tetap optimal.</p>',
                'meta_title' => 'Inspeksi Ternak',
                'meta_description' => 'Inspeksi Ternak',
                'meta_keywords' => 'Inspeksi Ternak',
                'image' => 'activity-main-image/image-1682377662.jpg',
                'status' => 'active',
                'user_id' => 7,
                'created_at' => '2023-04-24 23:07:42',
                'updated_at' => '2023-04-26 12:20:06',
            ),
        ));
        
        
    }
}