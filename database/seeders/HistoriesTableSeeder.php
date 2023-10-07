<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HistoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('histories')->delete();
        
        \DB::table('histories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'header' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin commodo porta justo in fringilla. In nunc augue, volutpat sodales volutpat ac, maximus in justo. Vivamus dapibus libero pretium Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin commodo porta justo in fringilla. In nunc augue, volutpat sodales volutpat ac, maximus in justo. Vivamus dapibus libero pretium',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin commodo porta justo in fringilla. In nunc augue, volutpat sodales volutpat ac, maximus in justo. Vivamus dapibus libero pretium nibh elementum posuere. Vestibulum volutpat dui tempor, eleifend turpis vel, posuere quam. Donec dignissim nunc eu sem commodo ullamcorper. Vestibulum ornare viverra mattis.</p><p>Morbi at velit ligula. Curabitur mollis ex tellus, at commodo turpis accumsan vel. Nullam finibus elit tempor dui eleifend faucibus. Cras risus tellus, tincidunt nec orci non, malesuada sollicitudin urna. Sed rhoncus egestas cursus. Vestibulum nec ultrices tortor. Pellentesque porta justo ut massa vestibulum, nec pharetra risus malesuada.</p><p>Vel quam elementum pulvinar etiam non. Enim praesent elementum facilisis leo vel. At risus viverra adipiscing at in tellus integer feugiat scelerisque. Id porta nibh venenatis cras sed felis eget. Nulla malesuada pellentesque elit eget gravida cum. Nunc sed blandit libero volutpat sed cras. Nulla aliquet enim tortor at. At lectus urna duis convallis convallis. Semper feugiat nibh sed pulvinar proin. Cras fermentum odio eu feugiat pretium nibh ipsum consequat.</p>',
                'first_gallery_id' => 10,
                'second_gallery_id' => 2,
                'created_at' => '2023-10-06 09:00:35',
                'updated_at' => '2023-10-07 09:46:51',
            ),
        ));
        
        
    }
}