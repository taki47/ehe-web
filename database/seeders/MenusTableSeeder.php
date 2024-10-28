<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'KITTI Háló',
                'image' => 'kitti.webp',
                'description' => 'Kistérségi és Települési Ifjúsági Hálózat',
                'subdescription' => 'Nyelvében él a nemzet',
                'parent_id' => NULL,
                'order' => 0,
                'created_at' => '2024-10-28 15:50:51',
                'updated_at' => '2024-10-28 15:59:41',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'EHE',
                'image' => 'ehe.webp',
                'description' => 'Erdélyi Hagyományokért Egyesület',
                'subdescription' => NULL,
                'parent_id' => NULL,
                'order' => 0,
                'created_at' => '2024-10-28 15:52:40',
                'updated_at' => '2024-10-28 15:52:40',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Teszt',
                'image' => 'placeholder.webp',
                'description' => 'Nyelvében él a nemzet',
                'subdescription' => NULL,
                'parent_id' => NULL,
                'order' => 0,
                'created_at' => '2024-10-28 15:53:03',
                'updated_at' => '2024-10-28 15:53:03',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Egyesületről',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'created_at' => '2024-10-28 15:53:41',
                'updated_at' => '2024-10-28 15:59:05',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Programok',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'created_at' => '2024-10-28 15:53:45',
                'updated_at' => '2024-10-28 15:59:41',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Dokumentumtár',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'created_at' => '2024-10-28 15:53:50',
                'updated_at' => '2024-10-28 15:59:41',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Médiatár',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'created_at' => '2024-10-28 15:53:53',
                'updated_at' => '2024-10-28 15:59:41',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Támogatóink',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'created_at' => '2024-10-28 15:53:57',
                'updated_at' => '2024-10-28 15:59:41',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Tagság és Partnerek',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'created_at' => '2024-10-28 15:54:04',
                'updated_at' => '2024-10-28 15:59:41',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Bemutatkozás',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 4,
                'order' => 0,
                'created_at' => '2024-10-28 15:55:26',
                'updated_at' => '2024-10-28 15:58:41',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Vezetőség',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 4,
                'order' => 0,
                'created_at' => '2024-10-28 15:55:35',
                'updated_at' => '2024-10-28 15:59:05',
                'deleted_at' => NULL,
            ),
        ));
        


        \DB::table('permissions')->insert(array (
            36 => 
            array (
                'name' => 'menu_index_1',
                'readable' => 'KITTI Háló menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:50:51',
                'updated_at' => '2024-10-28 15:50:51',
            ),
            37 => 
            array (
                'name' => 'menu_create_1',
                'readable' => 'KITTI Háló menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:50:51',
                'updated_at' => '2024-10-28 15:50:51',
            ),
            38 => 
            array (
                'name' => 'menu_edit_1',
                'readable' => 'KITTI Háló menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:50:51',
                'updated_at' => '2024-10-28 15:50:51',
            ),
            39 => 
            array (
                'name' => 'menu_order_1',
                'readable' => 'KITTI Háló menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:50:51',
                'updated_at' => '2024-10-28 15:50:51',
            ),
            40 => 
            array (
                'name' => 'menu_delete_1',
                'readable' => 'KITTI Háló menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:50:51',
                'updated_at' => '2024-10-28 15:50:51',
            ),
            41 => 
            array (
                'name' => 'menu_index_2',
                'readable' => 'EHE menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:52:40',
                'updated_at' => '2024-10-28 15:52:40',
            ),
            42 => 
            array (
                'name' => 'menu_create_2',
                'readable' => 'EHE menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:52:40',
                'updated_at' => '2024-10-28 15:52:40',
            ),
            43 => 
            array (
                'name' => 'menu_edit_2',
                'readable' => 'EHE menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:52:40',
                'updated_at' => '2024-10-28 15:52:40',
            ),
            44 => 
            array (
                'name' => 'menu_order_2',
                'readable' => 'EHE menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:52:40',
                'updated_at' => '2024-10-28 15:52:40',
            ),
            45 => 
            array (
                'name' => 'menu_delete_2',
                'readable' => 'EHE menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:52:40',
                'updated_at' => '2024-10-28 15:52:40',
            ),
            46 => 
            array (
                'name' => 'menu_index_3',
                'readable' => 'Teszt menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:53:03',
                'updated_at' => '2024-10-28 15:53:03',
            ),
            47 => 
            array (
                'name' => 'menu_create_3',
                'readable' => 'Teszt menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:53:03',
                'updated_at' => '2024-10-28 15:53:03',
            ),
            48 => 
            array (
                'name' => 'menu_edit_3',
                'readable' => 'Teszt menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:53:03',
                'updated_at' => '2024-10-28 15:53:03',
            ),
            49 => 
            array (
                'name' => 'menu_order_3',
                'readable' => 'Teszt menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:53:03',
                'updated_at' => '2024-10-28 15:53:03',
            ),
            50 => 
            array (
                'name' => 'menu_delete_3',
                'readable' => 'Teszt menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-28 15:53:03',
                'updated_at' => '2024-10-28 15:53:03',
            ),
        ));
        
    }
}