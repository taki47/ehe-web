<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('partners')->delete();
        
        \DB::table('partners')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'GWP',
                'partner_type_id' => 1,
                'image_path' => '/uploads/2024/11/11',
                'image' => 'gwp.webp',
                'link' => 'https://google.com',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-11-11 12:13:05',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ICID',
                'partner_type_id' => 1,
                'image_path' => '/uploads/2024/11/11',
                'image' => 'icid.webp',
                'link' => 'https://google.com',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-11-11 12:13:17',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Mate',
                'partner_type_id' => 1,
                'image_path' => '/uploads/2024/11/11',
                'image' => 'mate.webp',
                'link' => 'https://google.com',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-11-11 12:13:26',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'MHT',
                'partner_type_id' => 1,
                'image_path' => '/uploads/2024/11/11',
                'image' => 'mht.webp',
                'link' => 'https://google.com',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-11-11 12:13:35',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'MTA',
                'partner_type_id' => 1,
                'image_path' => '/uploads/2024/11/11',
                'image' => 'mta.webp',
                'link' => 'https://google.com',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-11-11 12:13:42',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'DE',
                'partner_type_id' => 1,
                'image_path' => '/uploads/2024/11/11',
                'image' => 'debreceni-egyetem.webp',
                'link' => 'https://google.com',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-11-11 12:13:51',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'BGA',
                'partner_type_id' => 2,
                'image_path' => '/uploads/2024/11/11',
                'image' => 'bga.webp',
                'link' => 'https://google.com',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-11-11 12:16:35',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Csoóri',
                'partner_type_id' => 2,
                'image_path' => '/uploads/2024/11/11',
                'image' => 'csoori.webp',
                'link' => 'https://google.com',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => '2024-11-11 12:16:45',
                'updated_at' => '2024-11-11 12:18:58',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'ME',
                'partner_type_id' => 2,
                'image_path' => '/uploads/2024/11/11',
                'image' => 'me.webp',
                'link' => 'https://google.com',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-11-11 12:16:53',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'NCA',
                'partner_type_id' => 2,
                'image_path' => '/uploads/2024/11/11',
                'image' => 'nca.webp',
                'link' => 'https://google.com',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-11-11 12:17:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'NEA',
                'partner_type_id' => 2,
                'image_path' => '/uploads/2024/11/11',
                'image' => 'nea.webp',
                'link' => 'https://google.com',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-11-11 12:17:07',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'NKA',
                'partner_type_id' => 2,
                'image_path' => '/uploads/2024/11/11',
                'image' => 'nka.webp',
                'link' => 'https://google.com',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-11-11 12:17:18',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}