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
                'title' => 'Makani Sapi',
                'slug' => 'makani-sapi',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut ipsum ornare, aliquam dolor vel, vulputate est. Sed accumsan auctor suscipit. Donec malesuada libero augue, a aliquam magna finibus at. Vestibulum pellentesque mauris nec arcu pellentesque congue. Vestibulum blandit finibus ante, ac convallis dui condimentum eget. Sed sollicitudin efficitur lacus, sit amet mollis lacus. Quisque sodales luctus neque, vitae dapibus est volutpat vel. Cras ligula augue, placerat et metus quis, aliquet pulvinar leo. Aliquam luctus, ipsum vitae porta aliquet, mi lorem cursus odio, tincidunt tempus metus ligula sit amet massa. Nam ac urna consectetur, sodales velit at, egestas elit. Vestibulum a turpis tincidunt, scelerisque nibh ut, faucibus purus. Morbi sodales nulla diam, et fermentum mi interdum at. Phasellus condimentum nunc sed leo feugiat dignissim. Morbi ut convallis erat, in dapibus justo. Maecenas nec consequat ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p>',
                'meta_title' => 'Makani sapi',
                'meta_description' => 'Makani sapi',
                'meta_keywords' => 'Makani sapi',
                'image' => 'activity-main-image/image-1682377717.jpg',
                'status' => 'active',
                'user_id' => 7,
                'created_at' => '2023-04-24 23:01:40',
                'updated_at' => '2023-04-24 23:08:37',
            ),
            1 => 
            array (
                'id' => 4,
                'title' => 'Pawai sapi',
                'slug' => 'pawai-sapi',
                'body' => '<p>Proin vitae odio malesuada, pulvinar mauris eu, congue nunc. Ut dapibus elit vitae sapien porta convallis. Praesent aliquet ornare sapien, dictum ultricies nunc sollicitudin in. Vivamus a urna risus. Fusce iaculis sem nulla, ac tincidunt justo congue sit amet. Vivamus pretium turpis ipsum, id iaculis elit commodo eu. Cras tempor et sem et aliquet. Mauris luctus dui molestie, tincidunt dolor sodales, rutrum metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat tempus dui in efficitur. Aliquam fermentum, massa at mattis scelerisque, purus magna scelerisque nisl, a feugiat sem magna non arcu. Donec efficitur eleifend sollicitudin. Ut magna velit, elementum ut tincidunt at, mollis ut odio. Ut placerat quis augue in sodales. Nullam eu dui et est tempus bibendum eu sit amet justo.</p>',
                'meta_title' => 'Pawai Sapi',
                'meta_description' => 'Pawai Sapi',
                'meta_keywords' => 'Pawai Sapi, sapi, sapii',
                'image' => 'activity-main-image/image-1682377662.jpg',
                'status' => 'active',
                'user_id' => 7,
                'created_at' => '2023-04-24 23:07:42',
                'updated_at' => '2023-04-25 09:41:55',
            ),
        ));
        
        
    }
}