<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaUsagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media_usages')->delete();
        
        \DB::table('media_usages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'media_type' => 'image',
                'media_id' => 1,
                'content_type' => 'banner',
                'content_id' => 1,
                'created_at' => '2024-10-25 09:58:23',
                'updated_at' => '2024-10-25 10:16:19',
            ),
            1 => 
            array (
                'id' => 2,
                'media_type' => 'image',
                'media_id' => 2,
                'content_type' => 'banner',
                'content_id' => 2,
                'created_at' => '2024-10-25 09:58:51',
                'updated_at' => '2024-10-25 10:16:23',
            ),
            2 => 
            array (
                'id' => 3,
                'media_type' => 'image',
                'media_id' => 3,
                'content_type' => 'banner',
                'content_id' => 3,
                'created_at' => '2024-10-25 09:59:02',
                'updated_at' => '2024-10-25 09:59:02',
            ),
            3 => 
            array (
                'id' => 4,
                'media_type' => 'image',
                'media_id' => 1,
                'content_type' => 'banner',
                'content_id' => 4,
                'created_at' => '2024-10-25 09:59:55',
                'updated_at' => '2024-10-25 09:59:55',
            ),
            4 => 
            array (
                'id' => 5,
                'media_type' => 'image',
                'media_id' => 2,
                'content_type' => 'banner',
                'content_id' => 5,
                'created_at' => '2024-10-25 10:00:08',
                'updated_at' => '2024-10-25 10:00:08',
            ),
            5 => 
            array (
                'id' => 6,
                'media_type' => 'image',
                'media_id' => 3,
                'content_type' => 'banner',
                'content_id' => 6,
                'created_at' => '2024-10-25 10:00:19',
                'updated_at' => '2024-10-25 10:00:19',
            ),
            6 => 
            array (
                'id' => 7,
                'media_type' => 'image',
                'media_id' => 1,
                'content_type' => 'banner',
                'content_id' => 7,
                'created_at' => '2024-10-25 10:00:43',
                'updated_at' => '2024-10-25 10:00:43',
            ),
            7 => 
            array (
                'id' => 8,
                'media_type' => 'image',
                'media_id' => 2,
                'content_type' => 'banner',
                'content_id' => 8,
                'created_at' => '2024-10-25 10:00:59',
                'updated_at' => '2024-10-25 10:00:59',
            ),
            8 => 
            array (
                'id' => 9,
                'media_type' => 'image',
                'media_id' => 3,
                'content_type' => 'banner',
                'content_id' => 9,
                'created_at' => '2024-10-25 10:01:10',
                'updated_at' => '2024-10-25 10:01:10',
            ),
        ));
        
        
    }
}