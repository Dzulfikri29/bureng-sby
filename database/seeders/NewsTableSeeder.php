<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('news')->delete();
        
        \DB::table('news')->insert(array (
            0 => 
            array (
                'id' => 3,
                'slug' => 'aliquam-eleifend-mi-in-nulla-posuere-enim-lobortis-scelerisque-fermentum',
                'name' => 'Aliquam eleifend mi in nulla posuere. Enim lobortis scelerisque fermentum.',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget nulla facilisi etiam dignissim. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Odio aenean sed adipiscing diam donec. Fermentum et sollicitudin ac orci phasellus egestas. Volutpat sed cras ornare arcu. Congue mauris rhoncus aenean vel. Urna condimentum mattis pellentesque id nibh tortor id aliquet lectus. In dictum non consectetur a erat nam at lectus urna. Id cursus metus aliquam eleifend.</p><p><br></p><p>Aliquam eleifend mi in nulla posuere. Enim lobortis scelerisque fermentum dui faucibus in ornare. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Nunc mattis enim ut tellus elementum sagittis vitae et. Dui ut ornare lectus sit amet est. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Augue neque gravida in fermentum et. Amet mattis vulputate enim nulla aliquet porttitor. Mi in nulla posuere sollicitudin. Interdum varius sit amet mattis vulputate enim nulla. Sed sed risus pretium quam. Facilisi cras fermentum odio eu feugiat pretium nibh. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Tortor aliquam nulla facilisi cras. Aliquam purus sit amet luctus venenatis.</p><p><br></p><p>Orci porta non pulvinar neque laoreet. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Lacus sed viverra tellus in hac habitasse platea dictumst. Viverra mauris in aliquam sem fringilla. Urna id volutpat lacus laoreet non curabitur. Amet dictum sit amet justo donec enim diam vulputate ut. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum. Etiam tempor orci eu lobortis elementum nibh. In fermentum et sollicitudin ac orci phasellus. At ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. In iaculis nunc sed augue lacus viverra vitae. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Vitae congue eu consequat ac felis. Vel facilisis volutpat est velit egestas dui id. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. Sed nisi lacus sed viverra tellus. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt.</p><p><br></p><p>Vel quam elementum pulvinar etiam non. Enim praesent elementum facilisis leo vel. At risus viverra adipiscing at in tellus integer feugiat scelerisque. Id porta nibh venenatis cras sed felis eget. Nulla malesuada pellentesque elit eget gravida cum. Nunc sed blandit libero volutpat sed cras. Nulla aliquet enim tortor at. At lectus urna duis convallis convallis. Semper feugiat nibh sed pulvinar proin. Cras fermentum odio eu feugiat pretium nibh ipsum consequat.</p><p>Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin. Dignissim convallis aenean et tortor. Tortor at risus viverra adipiscing at in tellus integer. Vel pharetra vel turpis nunc eget lorem dolor sed viverra. Maecenas volutpat blandit aliquam etiam. Viverra justo nec ultrices dui sapien eget. Amet consectetur adipiscing elit ut aliquam. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Etiam erat velit scelerisque in dictum non. Et ligula ullamcorper malesuada proin. Feugiat pretium nibh ipsum consequat nisl. Vitae justo eget magna fermentum iaculis eu non diam. Dapibus ultrices in iaculis nunc sed augue lacus.</p>',
                'type' => 'news',
                'date' => '2023-10-01',
                'location' => 'Surabaya, Jawa Timur',
                'gallery_id' => 3,
                'created_at' => '2023-10-07 09:39:53',
                'updated_at' => '2023-10-07 09:42:09',
                'family_id' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'slug' => 'eget-nulla-facilisi-etiam-dignissim',
                'name' => 'Eget nulla facilisi etiam dignissim',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget nulla facilisi etiam dignissim. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Odio aenean sed adipiscing diam donec. Fermentum et sollicitudin ac orci phasellus egestas. Volutpat sed cras ornare arcu. Congue mauris rhoncus aenean vel. Urna condimentum mattis pellentesque id nibh tortor id aliquet lectus. In dictum non consectetur a erat nam at lectus urna. Id cursus metus aliquam eleifend.</p><p><br></p><p>Aliquam eleifend mi in nulla posuere. Enim lobortis scelerisque fermentum dui faucibus in ornare. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Nunc mattis enim ut tellus elementum sagittis vitae et. Dui ut ornare lectus sit amet est. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Augue neque gravida in fermentum et. Amet mattis vulputate enim nulla aliquet porttitor. Mi in nulla posuere sollicitudin. Interdum varius sit amet mattis vulputate enim nulla. Sed sed risus pretium quam. Facilisi cras fermentum odio eu feugiat pretium nibh. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Tortor aliquam nulla facilisi cras. Aliquam purus sit amet luctus venenatis.</p><p><br></p><p>Orci porta non pulvinar neque laoreet. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Lacus sed viverra tellus in hac habitasse platea dictumst. Viverra mauris in aliquam sem fringilla. Urna id volutpat lacus laoreet non curabitur. Amet dictum sit amet justo donec enim diam vulputate ut. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum. Etiam tempor orci eu lobortis elementum nibh. In fermentum et sollicitudin ac orci phasellus. At ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. In iaculis nunc sed augue lacus viverra vitae. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Vitae congue eu consequat ac felis. Vel facilisis volutpat est velit egestas dui id. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. Sed nisi lacus sed viverra tellus. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt.</p><p><br></p><p>Vel quam elementum pulvinar etiam non. Enim praesent elementum facilisis leo vel. At risus viverra adipiscing at in tellus integer feugiat scelerisque. Id porta nibh venenatis cras sed felis eget. Nulla malesuada pellentesque elit eget gravida cum. Nunc sed blandit libero volutpat sed cras. Nulla aliquet enim tortor at. At lectus urna duis convallis convallis. Semper feugiat nibh sed pulvinar proin. Cras fermentum odio eu feugiat pretium nibh ipsum consequat.</p><p>Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin. Dignissim convallis aenean et tortor. Tortor at risus viverra adipiscing at in tellus integer. Vel pharetra vel turpis nunc eget lorem dolor sed viverra. Maecenas volutpat blandit aliquam etiam. Viverra justo nec ultrices dui sapien eget. Amet consectetur adipiscing elit ut aliquam. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Etiam erat velit scelerisque in dictum non. Et ligula ullamcorper malesuada proin. Feugiat pretium nibh ipsum consequat nisl. Vitae justo eget magna fermentum iaculis eu non diam. Dapibus ultrices in iaculis nunc sed augue lacus.</p>',
                'type' => 'activity',
                'date' => '2023-10-02',
                'location' => 'Surabaya, Jawa Timur',
                'gallery_id' => 4,
                'created_at' => '2023-10-07 09:39:53',
                'updated_at' => '2023-10-07 09:41:42',
                'family_id' => NULL,
            ),
            2 => 
            array (
                'id' => 5,
                'slug' => 'diam-volutpat-commodo-sed-egestas-egestas-fringilla',
                'name' => 'Diam volutpat commodo sed egestas egestas fringilla',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget nulla facilisi etiam dignissim. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Odio aenean sed adipiscing diam donec. Fermentum et sollicitudin ac orci phasellus egestas. Volutpat sed cras ornare arcu. Congue mauris rhoncus aenean vel. Urna condimentum mattis pellentesque id nibh tortor id aliquet lectus. In dictum non consectetur a erat nam at lectus urna. Id cursus metus aliquam eleifend.</p><p><br></p><p>Aliquam eleifend mi in nulla posuere. Enim lobortis scelerisque fermentum dui faucibus in ornare. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Nunc mattis enim ut tellus elementum sagittis vitae et. Dui ut ornare lectus sit amet est. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Augue neque gravida in fermentum et. Amet mattis vulputate enim nulla aliquet porttitor. Mi in nulla posuere sollicitudin. Interdum varius sit amet mattis vulputate enim nulla. Sed sed risus pretium quam. Facilisi cras fermentum odio eu feugiat pretium nibh. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Tortor aliquam nulla facilisi cras. Aliquam purus sit amet luctus venenatis.</p><p><br></p><p>Orci porta non pulvinar neque laoreet. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Lacus sed viverra tellus in hac habitasse platea dictumst. Viverra mauris in aliquam sem fringilla. Urna id volutpat lacus laoreet non curabitur. Amet dictum sit amet justo donec enim diam vulputate ut. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum. Etiam tempor orci eu lobortis elementum nibh. In fermentum et sollicitudin ac orci phasellus. At ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. In iaculis nunc sed augue lacus viverra vitae. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Vitae congue eu consequat ac felis. Vel facilisis volutpat est velit egestas dui id. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. Sed nisi lacus sed viverra tellus. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt.</p><p><br></p><p>Vel quam elementum pulvinar etiam non. Enim praesent elementum facilisis leo vel. At risus viverra adipiscing at in tellus integer feugiat scelerisque. Id porta nibh venenatis cras sed felis eget. Nulla malesuada pellentesque elit eget gravida cum. Nunc sed blandit libero volutpat sed cras. Nulla aliquet enim tortor at. At lectus urna duis convallis convallis. Semper feugiat nibh sed pulvinar proin. Cras fermentum odio eu feugiat pretium nibh ipsum consequat.</p><p>Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin. Dignissim convallis aenean et tortor. Tortor at risus viverra adipiscing at in tellus integer. Vel pharetra vel turpis nunc eget lorem dolor sed viverra. Maecenas volutpat blandit aliquam etiam. Viverra justo nec ultrices dui sapien eget. Amet consectetur adipiscing elit ut aliquam. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Etiam erat velit scelerisque in dictum non. Et ligula ullamcorper malesuada proin. Feugiat pretium nibh ipsum consequat nisl. Vitae justo eget magna fermentum iaculis eu non diam. Dapibus ultrices in iaculis nunc sed augue lacus.</p>',
                'type' => 'news',
                'date' => '2023-10-03',
                'location' => 'Surabaya, Jawa Timur',
                'gallery_id' => 5,
                'created_at' => '2023-10-07 09:39:53',
                'updated_at' => '2023-10-07 09:42:44',
                'family_id' => NULL,
            ),
            3 => 
            array (
                'id' => 6,
                'slug' => 'facilisi-cras-fermentum-odio-eu-feugiat-pretium-nibh',
                'name' => 'Facilisi cras fermentum odio eu feugiat pretium nibh',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget nulla facilisi etiam dignissim. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Odio aenean sed adipiscing diam donec. Fermentum et sollicitudin ac orci phasellus egestas. Volutpat sed cras ornare arcu. Congue mauris rhoncus aenean vel. Urna condimentum mattis pellentesque id nibh tortor id aliquet lectus. In dictum non consectetur a erat nam at lectus urna. Id cursus metus aliquam eleifend.</p><p><br></p><p>Aliquam eleifend mi in nulla posuere. Enim lobortis scelerisque fermentum dui faucibus in ornare. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Nunc mattis enim ut tellus elementum sagittis vitae et. Dui ut ornare lectus sit amet est. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Augue neque gravida in fermentum et. Amet mattis vulputate enim nulla aliquet porttitor. Mi in nulla posuere sollicitudin. Interdum varius sit amet mattis vulputate enim nulla. Sed sed risus pretium quam. Facilisi cras fermentum odio eu feugiat pretium nibh. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Tortor aliquam nulla facilisi cras. Aliquam purus sit amet luctus venenatis.</p><p><br></p><p>Orci porta non pulvinar neque laoreet. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Lacus sed viverra tellus in hac habitasse platea dictumst. Viverra mauris in aliquam sem fringilla. Urna id volutpat lacus laoreet non curabitur. Amet dictum sit amet justo donec enim diam vulputate ut. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum. Etiam tempor orci eu lobortis elementum nibh. In fermentum et sollicitudin ac orci phasellus. At ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. In iaculis nunc sed augue lacus viverra vitae. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Vitae congue eu consequat ac felis. Vel facilisis volutpat est velit egestas dui id. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. Sed nisi lacus sed viverra tellus. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt.</p><p><br></p><p>Vel quam elementum pulvinar etiam non. Enim praesent elementum facilisis leo vel. At risus viverra adipiscing at in tellus integer feugiat scelerisque. Id porta nibh venenatis cras sed felis eget. Nulla malesuada pellentesque elit eget gravida cum. Nunc sed blandit libero volutpat sed cras. Nulla aliquet enim tortor at. At lectus urna duis convallis convallis. Semper feugiat nibh sed pulvinar proin. Cras fermentum odio eu feugiat pretium nibh ipsum consequat.</p><p>Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin. Dignissim convallis aenean et tortor. Tortor at risus viverra adipiscing at in tellus integer. Vel pharetra vel turpis nunc eget lorem dolor sed viverra. Maecenas volutpat blandit aliquam etiam. Viverra justo nec ultrices dui sapien eget. Amet consectetur adipiscing elit ut aliquam. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Etiam erat velit scelerisque in dictum non. Et ligula ullamcorper malesuada proin. Feugiat pretium nibh ipsum consequat nisl. Vitae justo eget magna fermentum iaculis eu non diam. Dapibus ultrices in iaculis nunc sed augue lacus.</p>',
                'type' => 'activity',
                'date' => '2023-10-04',
                'location' => 'Surabaya, Jawa Timur',
                'gallery_id' => 6,
                'created_at' => '2023-10-07 09:39:53',
                'updated_at' => '2023-10-07 09:43:04',
                'family_id' => NULL,
            ),
            4 => 
            array (
                'id' => 7,
                'slug' => 'at-risus-viverra-adipiscing-at-in-tellus-integer-feugiat-scelerisque',
                'name' => 'At risus viverra adipiscing at in tellus integer feugiat scelerisque',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget nulla facilisi etiam dignissim. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Odio aenean sed adipiscing diam donec. Fermentum et sollicitudin ac orci phasellus egestas. Volutpat sed cras ornare arcu. Congue mauris rhoncus aenean vel. Urna condimentum mattis pellentesque id nibh tortor id aliquet lectus. In dictum non consectetur a erat nam at lectus urna. Id cursus metus aliquam eleifend.</p><p><br></p><p>Aliquam eleifend mi in nulla posuere. Enim lobortis scelerisque fermentum dui faucibus in ornare. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Nunc mattis enim ut tellus elementum sagittis vitae et. Dui ut ornare lectus sit amet est. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Augue neque gravida in fermentum et. Amet mattis vulputate enim nulla aliquet porttitor. Mi in nulla posuere sollicitudin. Interdum varius sit amet mattis vulputate enim nulla. Sed sed risus pretium quam. Facilisi cras fermentum odio eu feugiat pretium nibh. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Tortor aliquam nulla facilisi cras. Aliquam purus sit amet luctus venenatis.</p><p><br></p><p>Orci porta non pulvinar neque laoreet. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Lacus sed viverra tellus in hac habitasse platea dictumst. Viverra mauris in aliquam sem fringilla. Urna id volutpat lacus laoreet non curabitur. Amet dictum sit amet justo donec enim diam vulputate ut. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum. Etiam tempor orci eu lobortis elementum nibh. In fermentum et sollicitudin ac orci phasellus. At ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. In iaculis nunc sed augue lacus viverra vitae. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Vitae congue eu consequat ac felis. Vel facilisis volutpat est velit egestas dui id. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. Sed nisi lacus sed viverra tellus. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt.</p><p><br></p><p>Vel quam elementum pulvinar etiam non. Enim praesent elementum facilisis leo vel. At risus viverra adipiscing at in tellus integer feugiat scelerisque. Id porta nibh venenatis cras sed felis eget. Nulla malesuada pellentesque elit eget gravida cum. Nunc sed blandit libero volutpat sed cras. Nulla aliquet enim tortor at. At lectus urna duis convallis convallis. Semper feugiat nibh sed pulvinar proin. Cras fermentum odio eu feugiat pretium nibh ipsum consequat.</p><p>Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin. Dignissim convallis aenean et tortor. Tortor at risus viverra adipiscing at in tellus integer. Vel pharetra vel turpis nunc eget lorem dolor sed viverra. Maecenas volutpat blandit aliquam etiam. Viverra justo nec ultrices dui sapien eget. Amet consectetur adipiscing elit ut aliquam. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Etiam erat velit scelerisque in dictum non. Et ligula ullamcorper malesuada proin. Feugiat pretium nibh ipsum consequat nisl. Vitae justo eget magna fermentum iaculis eu non diam. Dapibus ultrices in iaculis nunc sed augue lacus.</p>',
                'type' => 'news',
                'date' => '2023-10-05',
                'location' => 'Surabaya, Jawa Timur',
                'gallery_id' => 7,
                'created_at' => '2023-10-07 09:39:53',
                'updated_at' => '2023-10-07 09:43:19',
                'family_id' => NULL,
            ),
            5 => 
            array (
                'id' => 8,
                'slug' => 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit',
                'name' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget nulla facilisi etiam dignissim. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Odio aenean sed adipiscing diam donec. Fermentum et sollicitudin ac orci phasellus egestas. Volutpat sed cras ornare arcu. Congue mauris rhoncus aenean vel. Urna condimentum mattis pellentesque id nibh tortor id aliquet lectus. In dictum non consectetur a erat nam at lectus urna. Id cursus metus aliquam eleifend.</p><p><br></p><p>Aliquam eleifend mi in nulla posuere. Enim lobortis scelerisque fermentum dui faucibus in ornare. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Nunc mattis enim ut tellus elementum sagittis vitae et. Dui ut ornare lectus sit amet est. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Augue neque gravida in fermentum et. Amet mattis vulputate enim nulla aliquet porttitor. Mi in nulla posuere sollicitudin. Interdum varius sit amet mattis vulputate enim nulla. Sed sed risus pretium quam. Facilisi cras fermentum odio eu feugiat pretium nibh. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Tortor aliquam nulla facilisi cras. Aliquam purus sit amet luctus venenatis.</p><p><br></p><p>Orci porta non pulvinar neque laoreet. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Lacus sed viverra tellus in hac habitasse platea dictumst. Viverra mauris in aliquam sem fringilla. Urna id volutpat lacus laoreet non curabitur. Amet dictum sit amet justo donec enim diam vulputate ut. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum. Etiam tempor orci eu lobortis elementum nibh. In fermentum et sollicitudin ac orci phasellus. At ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. In iaculis nunc sed augue lacus viverra vitae. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Vitae congue eu consequat ac felis. Vel facilisis volutpat est velit egestas dui id. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. Sed nisi lacus sed viverra tellus. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt.</p><p><br></p><p>Vel quam elementum pulvinar etiam non. Enim praesent elementum facilisis leo vel. At risus viverra adipiscing at in tellus integer feugiat scelerisque. Id porta nibh venenatis cras sed felis eget. Nulla malesuada pellentesque elit eget gravida cum. Nunc sed blandit libero volutpat sed cras. Nulla aliquet enim tortor at. At lectus urna duis convallis convallis. Semper feugiat nibh sed pulvinar proin. Cras fermentum odio eu feugiat pretium nibh ipsum consequat.</p><p>Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin. Dignissim convallis aenean et tortor. Tortor at risus viverra adipiscing at in tellus integer. Vel pharetra vel turpis nunc eget lorem dolor sed viverra. Maecenas volutpat blandit aliquam etiam. Viverra justo nec ultrices dui sapien eget. Amet consectetur adipiscing elit ut aliquam. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Etiam erat velit scelerisque in dictum non. Et ligula ullamcorper malesuada proin. Feugiat pretium nibh ipsum consequat nisl. Vitae justo eget magna fermentum iaculis eu non diam. Dapibus ultrices in iaculis nunc sed augue lacus.</p>',
                'type' => 'activity',
                'date' => '2023-10-06',
                'location' => 'Surabaya, Jawa Timur',
                'gallery_id' => 8,
                'created_at' => '2023-10-07 09:39:53',
                'updated_at' => '2023-10-07 09:39:53',
                'family_id' => NULL,
            ),
            6 => 
            array (
                'id' => 9,
                'slug' => 'interdum-varius-sit-amet-mattis-vulputate-enim-nulla',
                'name' => 'Interdum varius sit amet mattis vulputate enim nulla',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget nulla facilisi etiam dignissim. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Odio aenean sed adipiscing diam donec. Fermentum et sollicitudin ac orci phasellus egestas. Volutpat sed cras ornare arcu. Congue mauris rhoncus aenean vel. Urna condimentum mattis pellentesque id nibh tortor id aliquet lectus. In dictum non consectetur a erat nam at lectus urna. Id cursus metus aliquam eleifend.</p><p><br></p><p>Aliquam eleifend mi in nulla posuere. Enim lobortis scelerisque fermentum dui faucibus in ornare. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Nunc mattis enim ut tellus elementum sagittis vitae et. Dui ut ornare lectus sit amet est. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Augue neque gravida in fermentum et. Amet mattis vulputate enim nulla aliquet porttitor. Mi in nulla posuere sollicitudin. Interdum varius sit amet mattis vulputate enim nulla. Sed sed risus pretium quam. Facilisi cras fermentum odio eu feugiat pretium nibh. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Tortor aliquam nulla facilisi cras. Aliquam purus sit amet luctus venenatis.</p><p><br></p><p>Orci porta non pulvinar neque laoreet. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Lacus sed viverra tellus in hac habitasse platea dictumst. Viverra mauris in aliquam sem fringilla. Urna id volutpat lacus laoreet non curabitur. Amet dictum sit amet justo donec enim diam vulputate ut. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum. Etiam tempor orci eu lobortis elementum nibh. In fermentum et sollicitudin ac orci phasellus. At ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. In iaculis nunc sed augue lacus viverra vitae. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Vitae congue eu consequat ac felis. Vel facilisis volutpat est velit egestas dui id. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. Sed nisi lacus sed viverra tellus. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt.</p><p><br></p><p>Vel quam elementum pulvinar etiam non. Enim praesent elementum facilisis leo vel. At risus viverra adipiscing at in tellus integer feugiat scelerisque. Id porta nibh venenatis cras sed felis eget. Nulla malesuada pellentesque elit eget gravida cum. Nunc sed blandit libero volutpat sed cras. Nulla aliquet enim tortor at. At lectus urna duis convallis convallis. Semper feugiat nibh sed pulvinar proin. Cras fermentum odio eu feugiat pretium nibh ipsum consequat.</p><p>Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin. Dignissim convallis aenean et tortor. Tortor at risus viverra adipiscing at in tellus integer. Vel pharetra vel turpis nunc eget lorem dolor sed viverra. Maecenas volutpat blandit aliquam etiam. Viverra justo nec ultrices dui sapien eget. Amet consectetur adipiscing elit ut aliquam. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Etiam erat velit scelerisque in dictum non. Et ligula ullamcorper malesuada proin. Feugiat pretium nibh ipsum consequat nisl. Vitae justo eget magna fermentum iaculis eu non diam. Dapibus ultrices in iaculis nunc sed augue lacus.</p>',
                'type' => 'news',
                'date' => '2023-10-07',
                'location' => 'Surabaya, Jawa Timur',
                'gallery_id' => 9,
                'created_at' => '2023-10-07 09:39:53',
                'updated_at' => '2023-10-07 09:43:37',
                'family_id' => NULL,
            ),
            7 => 
            array (
                'id' => 10,
                'slug' => 'rhoncus-aenean-vel-elit-scelerisque-mauris-pellentesque-pulvinar',
                'name' => 'Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget nulla facilisi etiam dignissim. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Odio aenean sed adipiscing diam donec. Fermentum et sollicitudin ac orci phasellus egestas. Volutpat sed cras ornare arcu. Congue mauris rhoncus aenean vel. Urna condimentum mattis pellentesque id nibh tortor id aliquet lectus. In dictum non consectetur a erat nam at lectus urna. Id cursus metus aliquam eleifend.</p><p><br></p><p>Aliquam eleifend mi in nulla posuere. Enim lobortis scelerisque fermentum dui faucibus in ornare. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Nunc mattis enim ut tellus elementum sagittis vitae et. Dui ut ornare lectus sit amet est. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Augue neque gravida in fermentum et. Amet mattis vulputate enim nulla aliquet porttitor. Mi in nulla posuere sollicitudin. Interdum varius sit amet mattis vulputate enim nulla. Sed sed risus pretium quam. Facilisi cras fermentum odio eu feugiat pretium nibh. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Tortor aliquam nulla facilisi cras. Aliquam purus sit amet luctus venenatis.</p><p><br></p><p>Orci porta non pulvinar neque laoreet. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Lacus sed viverra tellus in hac habitasse platea dictumst. Viverra mauris in aliquam sem fringilla. Urna id volutpat lacus laoreet non curabitur. Amet dictum sit amet justo donec enim diam vulputate ut. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum. Etiam tempor orci eu lobortis elementum nibh. In fermentum et sollicitudin ac orci phasellus. At ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. In iaculis nunc sed augue lacus viverra vitae. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Vitae congue eu consequat ac felis. Vel facilisis volutpat est velit egestas dui id. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. Sed nisi lacus sed viverra tellus. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt.</p><p><br></p><p>Vel quam elementum pulvinar etiam non. Enim praesent elementum facilisis leo vel. At risus viverra adipiscing at in tellus integer feugiat scelerisque. Id porta nibh venenatis cras sed felis eget. Nulla malesuada pellentesque elit eget gravida cum. Nunc sed blandit libero volutpat sed cras. Nulla aliquet enim tortor at. At lectus urna duis convallis convallis. Semper feugiat nibh sed pulvinar proin. Cras fermentum odio eu feugiat pretium nibh ipsum consequat.</p><p>Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin. Dignissim convallis aenean et tortor. Tortor at risus viverra adipiscing at in tellus integer. Vel pharetra vel turpis nunc eget lorem dolor sed viverra. Maecenas volutpat blandit aliquam etiam. Viverra justo nec ultrices dui sapien eget. Amet consectetur adipiscing elit ut aliquam. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Etiam erat velit scelerisque in dictum non. Et ligula ullamcorper malesuada proin. Feugiat pretium nibh ipsum consequat nisl. Vitae justo eget magna fermentum iaculis eu non diam. Dapibus ultrices in iaculis nunc sed augue lacus.</p>',
                'type' => 'activity',
                'date' => '2023-10-08',
                'location' => 'Surabaya, Jawa Timur',
                'gallery_id' => 10,
                'created_at' => '2023-10-07 09:39:53',
                'updated_at' => '2023-10-07 09:42:27',
                'family_id' => NULL,
            ),
            8 => 
            array (
                'id' => 11,
                'slug' => 'session-viii-lets-explore-the-differences',
                'name' => 'Session VIII : LET\'S EXPLORE THE DIFFERENCES',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae. Platea dictumst quisque sagittis purus sit amet. Malesuada bibendum arcu vitae elementum curabitur vitae. Scelerisque viverra mauris in aliquam sem fringilla ut morbi. Habitant morbi tristique senectus et netus et malesuada fames ac. At erat pellentesque adipiscing commodo elit at imperdiet dui. Sem viverra aliquet eget sit amet tellus cras. Mattis vulputate enim nulla aliquet. Cras semper auctor neque vitae tempus quam. Gravida dictum fusce ut placerat. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Ullamcorper eget nulla facilisi etiam dignissim diam. Quam pellentesque nec nam aliquam. Morbi tempus iaculis urna id volutpat lacus. At volutpat diam ut venenatis tellus. Nunc scelerisque viverra mauris in aliquam. Faucibus nisl tincidunt eget nullam. In nulla posuere sollicitudin aliquam ultrices. Elementum nisi quis eleifend quam adipiscing.</p><p>Sagittis aliquam malesuada bibendum arcu. Maecenas pharetra convallis posuere morbi leo urna molestie. Pretium nibh ipsum consequat nisl vel pretium lectus. Neque aliquam vestibulum morbi blandit cursus risus at. Pretium viverra suspendisse potenti nullam ac. Volutpat est velit egestas dui. Pretium nibh ipsum consequat nisl vel pretium lectus quam. Tempus urna et pharetra pharetra. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Faucibus nisl tincidunt eget nullam non nisi est sit. Facilisi morbi tempus iaculis urna id. Vel pharetra vel turpis nunc eget lorem dolor. Libero id faucibus nisl tincidunt eget nullam non.</p>',
                'type' => 'news',
                'date' => '2023-10-08',
                'location' => 'Bureng Surabaya',
                'gallery_id' => 15,
                'created_at' => '2023-10-08 00:36:01',
                'updated_at' => '2023-10-08 00:36:01',
                'family_id' => 5,
            ),
            9 => 
            array (
                'id' => 12,
                'slug' => 'medicoethicolegal',
                'name' => 'MEDICOETHICOLEGAL',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae. Platea dictumst quisque sagittis purus sit amet. Malesuada bibendum arcu vitae elementum curabitur vitae. Scelerisque viverra mauris in aliquam sem fringilla ut morbi. Habitant morbi tristique senectus et netus et malesuada fames ac. At erat pellentesque adipiscing commodo elit at imperdiet dui. Sem viverra aliquet eget sit amet tellus cras. Mattis vulputate enim nulla aliquet. Cras semper auctor neque vitae tempus quam. Gravida dictum fusce ut placerat. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Ullamcorper eget nulla facilisi etiam dignissim diam. Quam pellentesque nec nam aliquam. Morbi tempus iaculis urna id volutpat lacus. At volutpat diam ut venenatis tellus. Nunc scelerisque viverra mauris in aliquam. Faucibus nisl tincidunt eget nullam. In nulla posuere sollicitudin aliquam ultrices. Elementum nisi quis eleifend quam adipiscing.</p><p>Sagittis aliquam malesuada bibendum arcu. Maecenas pharetra convallis posuere morbi leo urna molestie. Pretium nibh ipsum consequat nisl vel pretium lectus. Neque aliquam vestibulum morbi blandit cursus risus at. Pretium viverra suspendisse potenti nullam ac. Volutpat est velit egestas dui. Pretium nibh ipsum consequat nisl vel pretium lectus quam. Tempus urna et pharetra pharetra. Eu non diam phasellus vestibulum lorem sed risus ultricies tristique. Faucibus nisl tincidunt eget nullam non nisi est sit. Facilisi morbi tempus iaculis urna id. Vel pharetra vel turpis nunc eget lorem dolor. Libero id faucibus nisl tincidunt eget nullam non.</p>',
                'type' => 'news',
                'date' => '2023-10-07',
                'location' => 'Malang jawa Timur',
                'gallery_id' => 14,
                'created_at' => '2023-10-08 00:36:56',
                'updated_at' => '2023-10-08 00:36:56',
                'family_id' => 5,
            ),
        ));
        
        
    }
}