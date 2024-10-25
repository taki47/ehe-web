<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media')->delete();
        
        \DB::table('media')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Banner1',
                'file_name' => 'banner1.webp',
                'file_path' => '/uploads/image/2024/10/25',
                'type' => 'image',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => '1',
                'created_at' => '2024-10-25 08:09:20',
                'updated_at' => '2024-10-25 08:09:20',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Banner2',
                'file_name' => 'banner2.webp',
                'file_path' => '/uploads/image/2024/10/25',
                'type' => 'image',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => '1',
                'created_at' => '2024-10-25 08:09:25',
                'updated_at' => '2024-10-25 08:09:25',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Banner3',
                'file_name' => 'banner3.webp',
                'file_path' => '/uploads/image/2024/10/25',
                'type' => 'image',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => '1',
                'created_at' => '2024-10-25 08:09:30',
                'updated_at' => '2024-10-25 08:09:30',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Video1',
                'file_name' => '3195394-uhd-3840-2160-25fps.mp4',
                'file_path' => '/uploads/video/2024/10/25',
                'type' => 'video',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => '1',
                'created_at' => '2024-10-25 08:09:42',
                'updated_at' => '2024-10-25 08:09:42',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Video2',
                'file_name' => '4114797-uhd-3840-2160-25fps.mp4',
                'file_path' => '/uploads/video/2024/10/25',
                'type' => 'video',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => '1',
                'created_at' => '2024-10-25 08:09:48',
                'updated_at' => '2024-10-25 08:09:48',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Video3',
                'file_name' => '5752729-uhd-3840-2160-30fps.mp4',
                'file_path' => '/uploads/video/2024/10/25',
                'type' => 'video',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => '1',
                'created_at' => '2024-10-25 08:09:53',
                'updated_at' => '2024-10-25 08:09:53',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Hang1',
                'file_name' => 'art-of-samples-buzz-120-bpm-audio-logo-245396.mp3',
                'file_path' => '/uploads/audio/2024/10/25',
                'type' => 'audio',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => '1',
                'created_at' => '2024-10-25 08:10:04',
                'updated_at' => '2024-10-25 08:10:04',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Hang2',
                'file_name' => 'quartz-clock-ticking-one-minute-253102.mp3',
                'file_path' => '/uploads/audio/2024/10/25',
                'type' => 'audio',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => '1',
                'created_at' => '2024-10-25 08:10:10',
                'updated_at' => '2024-10-25 08:10:10',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Hang3',
                'file_name' => 'sunflower-street-drumloop-85bpm-163900.mp3',
                'file_path' => '/uploads/audio/2024/10/25',
                'type' => 'audio',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => '1',
                'created_at' => '2024-10-25 08:10:15',
                'updated_at' => '2024-10-25 08:10:15',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Banner4',
                'file_name' => 'palinka.webp',
                'file_path' => '/uploads/image/2024/10/25',
                'type' => 'image',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => '1',
                'created_at' => '2024-10-25 08:20:43',
                'updated_at' => '2024-10-25 08:20:43',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Banner5',
                'file_name' => 'transilvania.webp',
                'file_path' => '/uploads/image/2024/10/25',
                'type' => 'image',
                'created_by' => 1,
                'updated_by' => NULL,
                'status' => '1',
                'created_at' => '2024-10-25 08:20:48',
                'updated_at' => '2024-10-25 08:20:48',
            ),
        ));
        
        
    }
}