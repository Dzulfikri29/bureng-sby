<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blogs')->delete();
        
        \DB::table('blogs')->insert(array (
            0 => 
            array (
                'id' => 4,
                'title' => 'Tips Sukses Memulai Usaha Peternakan Sapi',
                'slug' => 'tips-sukses-memulai-usaha-peternakan-sapi',
                'body' => '<p><img src="http://ternak-terpadu.test/storage/blog/budidaya-sapijpg-1682485496iaO5Yjqm.jpg"></p><p><br></p><p>Peternakan sapi merupakan salah satu usaha yang menjanjikan di Indonesia. Namun, tidak semua orang bisa sukses dalam menjalankan usaha peternakan sapi. Beberapa faktor seperti kurangnya pengetahuan dan pengalaman, serta kurangnya modal bisa menjadi hambatan dalam menjalankan usaha peternakan sapi. Berikut ini adalah beberapa tips sukses memulai usaha peternakan sapi:</p><ol><li>Pelajari dan pahami jenis sapi yang akan dipelihara Sebelum memulai usaha peternakan sapi, ada baiknya untuk mempelajari jenis sapi yang akan dipelihara terlebih dahulu. Setiap jenis sapi memiliki karakteristik dan kebutuhan yang berbeda, sehingga pemilihan jenis sapi yang tepat sangat penting untuk meraih kesuksesan dalam usaha peternakan sapi.</li><li>Perhatikan kesehatan sapi Kesehatan sapi menjadi faktor kunci dalam menghasilkan sapi yang berkualitas tinggi. Pastikan sapi selalu mendapatkan pakan yang bergizi, air yang cukup, vaksinasi dan pengobatan yang tepat. Perhatikan juga kondisi kandang dan lingkungan peternakan agar tetap bersih dan sehat.</li><li>Pilih bibit sapi yang berkualitas Pilih bibit sapi yang berasal dari peternakan yang terpercaya dan memiliki rekam jejak yang baik. Pastikan bibit sapi yang dipilih memiliki kualitas yang baik serta bebas dari penyakit.</li><li>Atur keuangan dengan baik Usaha peternakan sapi membutuhkan modal yang besar, terutama untuk pembelian bibit sapi dan pengembangan peternakan. Oleh karena itu, atur keuangan dengan baik dan jangan sampai terjerat hutang.</li><li>Manfaatkan teknologi yang ada Manfaatkan teknologi yang ada untuk meningkatkan produktivitas peternakan. Beberapa teknologi yang bisa digunakan antara lain sistem pemberian pakan otomatis, sensor kesehatan sapi, dan sistem manajemen peternakan.</li></ol><p>Dengan memperhatikan beberapa tips di atas, Anda dapat memulai usaha peternakan sapi dengan lebih sukses dan efektif. Ingatlah bahwa peternakan sapi membutuhkan perencanaan dan pengelolaan yang baik agar dapat menghasilkan sapi yang berkualitas tinggi dan menguntungkan.</p>',
                'meta_title' => 'Tips Sukses Memulai Usaha Peternakan Sapi',
                'meta_description' => 'Tips Sukses Memulai Usaha Peternakan Sapi',
                'meta_keywords' => 'Tips Sukses Memulai Usaha Peternakan Sapi',
                'image' => 'blog-main-image/image-1682485508.jpeg',
                'status' => 'active',
                'user_id' => 7,
                'created_at' => '2023-04-25 10:07:48',
                'updated_at' => '2023-04-26 12:05:08',
                'blog_category_id' => 12,
            ),
            1 => 
            array (
                'id' => 5,
                'title' => 'Mengenal Lebih Dekat Peternakan Sapi',
                'slug' => 'mengenal-lebih-dekat-peternakan-sapi',
                'body' => '<p>Peternakan sapi menjadi salah satu jenis usaha peternakan yang populer di Indonesia. Selain menghasilkan daging dan susu sapi yang berkualitas tinggi, peternakan sapi juga memberikan manfaat ekonomi yang besar bagi masyarakat. Namun, sebelum memulai usaha peternakan sapi, ada baiknya untuk memahami beberapa hal penting terkait dengan peternakan sapi.</p><p><br></p><p><img src="http://ternak-terpadu.test/storage/blog/bd27e64b-f13f-41a5-9b1b-677226f8fc42jpeg-1682485278gvZlx5Dd.jpeg"></p><p><br></p><p><br></p><p>Pertama-tama, kita perlu memilih jenis sapi yang tepat untuk dijadikan bibit peternakan. Beberapa jenis sapi yang sering dijadikan bibit peternakan antara lain sapi perah, sapi potong, dan sapi perah potong. Setiap jenis sapi memiliki karakteristik dan kebutuhan yang berbeda, sehingga sebelum membeli bibit sapi, kita harus memahami jenis sapi yang akan dipelihara.</p><p><br></p><p>Selain memilih jenis sapi yang tepat, kita juga perlu memperhatikan aspek kesehatan sapi. Sapi yang sehat dan terawat dengan baik akan menghasilkan daging dan susu yang berkualitas tinggi. Beberapa hal yang perlu diperhatikan dalam menjaga kesehatan sapi antara lain memberikan pakan yang bergizi, memberikan air yang cukup, membersihkan kandang secara rutin, dan memberikan vaksinasi.</p><p><br></p><p>Selanjutnya, setelah sapi tumbuh dan berkembang, kita dapat memanfaatkan hasil ternak sapi untuk dijual atau diolah menjadi produk olahan seperti daging sapi, susu sapi, dan produk olahan lainnya. Untuk memperoleh hasil yang maksimal, kita perlu memilih teknik pemotongan dan pengolahan yang tepat sesuai dengan jenis sapi dan potongannya.</p><p><br></p><p>Terakhir, usaha peternakan sapi juga perlu memperhatikan aspek keamanan dan kebersihan dalam pengolahan dan pemasaran produk sapi. Keamanan dan kebersihan produk sangat penting untuk memperoleh kepercayaan konsumen, sehingga dapat meningkatkan keuntungan usaha peternakan sapi.</p><p>Dari beberapa hal penting di atas, dapat disimpulkan bahwa usaha peternakan sapi memerlukan perencanaan dan pengelolaan yang baik agar dapat menghasilkan sapi yang berkualitas tinggi dan menguntungkan. Oleh karena itu, bagi Anda yang ingin memulai usaha peternakan sapi, pastikan untuk memahami seluruh aspek terkait dengan peternakan sapi. Dengan demikian, usaha peternakan sapi dapat memberikan manfaat yang besar bagi masyarakat dan ekonomi Indonesia secara keseluruhan.</p>',
                'meta_title' => 'Mengenal Lebih Dekat Peternakan Sapi',
                'meta_description' => 'Mengenal Lebih Dekat Peternakan Sapi',
                'meta_keywords' => 'Mengenal Lebih Dekat Peternakan Sapi',
                'image' => 'blog-main-image/image-1682392264.jpeg',
                'status' => 'active',
                'user_id' => 7,
                'created_at' => '2023-04-25 10:11:04',
                'updated_at' => '2023-04-26 12:03:31',
                'blog_category_id' => 14,
            ),
        ));
        
        
    }
}