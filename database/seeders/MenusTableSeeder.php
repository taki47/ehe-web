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
                'subdescription' => '"Nyelvében él a nemzet"',
                'parent_id' => NULL,
                'order' => 0,
                'language_id' => 1,
                'created_at' => '2024-10-29 08:23:32',
                'updated_at' => '2024-10-29 08:23:32',
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
                'language_id' => 1,
                'created_at' => '2024-10-29 08:24:03',
                'updated_at' => '2024-10-29 08:24:03',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'KITTI Net',
                'image' => '1730190288kitti.webp',
                'description' => 'Micro-regional and Urban Youth Network',
                'subdescription' => 'The nation lives in its language.',
                'parent_id' => NULL,
                'order' => 0,
                'language_id' => 2,
                'created_at' => '2024-10-29 08:24:48',
                'updated_at' => '2024-10-29 08:24:48',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'EHE',
                'image' => '1730190889ehe.webp',
                'description' => 'Association for Transylvanian Traditions',
                'subdescription' => NULL,
                'parent_id' => NULL,
                'order' => 0,
                'language_id' => 2,
                'created_at' => '2024-10-29 08:34:49',
                'updated_at' => '2024-10-29 08:34:49',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'KITTI-Netz',
                'image' => '1730191053kitti.webp',
                'description' => 'Mikroregionales und städtisches Jugendnetzwerk',
                'subdescription' => 'Die Nation lebt in ihrer Sprache',
                'parent_id' => NULL,
                'order' => 0,
                'language_id' => 3,
                'created_at' => '2024-10-29 08:37:33',
                'updated_at' => '2024-10-29 08:37:33',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'EHE',
                'image' => '1730191078ehe.webp',
                'description' => 'Verein für siebenbürgische Traditionen',
                'subdescription' => NULL,
                'parent_id' => NULL,
                'order' => 0,
                'language_id' => 3,
                'created_at' => '2024-10-29 08:37:58',
                'updated_at' => '2024-10-29 08:37:58',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Egyesületről',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:10:55',
                'updated_at' => '2024-10-29 09:10:55',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Programok',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:10:59',
                'updated_at' => '2024-10-29 09:10:59',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Dokumentumtár',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:11:04',
                'updated_at' => '2024-10-29 09:11:04',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Médiatár',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:11:09',
                'updated_at' => '2024-10-29 09:11:09',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Támogatóink',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:11:14',
                'updated_at' => '2024-10-29 09:11:14',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Tagság és Partnerek',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:11:20',
                'updated_at' => '2024-10-29 09:11:20',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'About us',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 3,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:11:49',
                'updated_at' => '2024-10-29 09:11:49',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Programs',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 3,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:12:00',
                'updated_at' => '2024-10-29 09:12:00',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Documents',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 3,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:12:07',
                'updated_at' => '2024-10-29 09:12:07',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Medias',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 3,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:12:16',
                'updated_at' => '2024-10-29 09:12:16',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Our Supporters',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 3,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:12:26',
                'updated_at' => '2024-10-29 09:12:26',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Membership and Partners',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 3,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:12:36',
                'updated_at' => '2024-10-29 09:12:36',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Über Assoziation',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 5,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:13:15',
                'updated_at' => '2024-10-29 09:13:15',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Programme',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 5,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:13:22',
                'updated_at' => '2024-10-29 09:13:22',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Dokumentenbibliothek',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 5,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:13:30',
                'updated_at' => '2024-10-29 09:13:30',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Medienbibliothek',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 5,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:13:37',
                'updated_at' => '2024-10-29 09:13:37',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Unsere Unterstützer',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 5,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:13:43',
                'updated_at' => '2024-10-29 09:13:43',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Mitgliedschaft und Partner',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 5,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:13:50',
                'updated_at' => '2024-10-29 09:13:50',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Bemutatkozás',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 7,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:31:02',
                'updated_at' => '2024-10-29 09:31:02',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Vezetőség',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 7,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:31:07',
                'updated_at' => '2024-10-29 09:31:07',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Aktuális programok',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 8,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:44:34',
                'updated_at' => '2024-10-29 09:44:34',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Lezárt programok',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 8,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:44:42',
                'updated_at' => '2024-10-29 09:44:42',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Határozatok',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 9,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:45:05',
                'updated_at' => '2024-10-29 09:45:05',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Jelentések',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 9,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:45:15',
                'updated_at' => '2024-10-29 09:45:15',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Szabályzatok',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 9,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:45:23',
                'updated_at' => '2024-10-29 09:45:23',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Rendezvény jelentkezések',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 9,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:45:32',
                'updated_at' => '2024-10-29 09:45:32',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Közgyűlési',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 29,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:45:52',
                'updated_at' => '2024-10-29 09:45:52',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Elnökségi',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 29,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:45:59',
                'updated_at' => '2024-10-29 09:45:59',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Közgyűlési beszámoló',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 30,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:46:21',
                'updated_at' => '2024-10-29 09:46:21',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Elnökségi beszámoló',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 30,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:46:42',
                'updated_at' => '2024-10-29 09:46:42',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Közhasznúsági jelentések',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 30,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:46:54',
                'updated_at' => '2024-10-29 09:46:54',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Alapszabály',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 31,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 09:47:01',
                'updated_at' => '2024-10-29 09:47:01',
                'deleted_at' => NULL,
            ),
        ));
        


        \DB::table('permissions')->insert(array (
            36 => 
            array (
                'name' => 'menu_index_1',
                'readable' => 'KITTI Háló hu menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:23:32',
                'updated_at' => '2024-10-29 08:23:32',
            ),
            37 => 
            array (
                'name' => 'menu_create_1',
                'readable' => 'KITTI Háló hu menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:23:32',
                'updated_at' => '2024-10-29 08:23:32',
            ),
            38 => 
            array (
                'name' => 'menu_edit_1',
                'readable' => 'KITTI Háló hu menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:23:32',
                'updated_at' => '2024-10-29 08:23:32',
            ),
            39 => 
            array (
                'name' => 'menu_order_1',
                'readable' => 'KITTI Háló hu menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:23:32',
                'updated_at' => '2024-10-29 08:23:32',
            ),
            40 => 
            array (
                'name' => 'menu_delete_1',
                'readable' => 'KITTI Háló hu menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:23:32',
                'updated_at' => '2024-10-29 08:23:32',
            ),
            41 => 
            array (
                'name' => 'menu_index_2',
                'readable' => 'EHE hu menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:24:03',
                'updated_at' => '2024-10-29 08:24:03',
            ),
            42 => 
            array (
                'name' => 'menu_create_2',
                'readable' => 'EHE hu menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:24:03',
                'updated_at' => '2024-10-29 08:24:03',
            ),
            43 => 
            array (
                'name' => 'menu_edit_2',
                'readable' => 'EHE hu menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:24:03',
                'updated_at' => '2024-10-29 08:24:03',
            ),
            44 => 
            array (
                'name' => 'menu_order_2',
                'readable' => 'EHE hu menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:24:03',
                'updated_at' => '2024-10-29 08:24:03',
            ),
            45 => 
            array (
                'name' => 'menu_delete_2',
                'readable' => 'EHE hu menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:24:03',
                'updated_at' => '2024-10-29 08:24:03',
            ),
            46 => 
            array (
                'name' => 'menu_index_3',
                'readable' => 'KITTI Net en menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:24:48',
                'updated_at' => '2024-10-29 08:24:48',
            ),
            47 => 
            array (
                'name' => 'menu_create_3',
                'readable' => 'KITTI Net en menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:24:48',
                'updated_at' => '2024-10-29 08:24:48',
            ),
            48 => 
            array (
                'name' => 'menu_edit_3',
                'readable' => 'KITTI Net en menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:24:48',
                'updated_at' => '2024-10-29 08:24:48',
            ),
            49 => 
            array (
                'name' => 'menu_order_3',
                'readable' => 'KITTI Net en menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:24:48',
                'updated_at' => '2024-10-29 08:24:48',
            ),
            50 => 
            array (
                'name' => 'menu_delete_3',
                'readable' => 'KITTI Net en menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:24:48',
                'updated_at' => '2024-10-29 08:24:48',
            ),
            51 => 
            array (
                'name' => 'menu_index_4',
                'readable' => 'EHE en menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:34:49',
                'updated_at' => '2024-10-29 08:34:49',
            ),
            52 => 
            array (
                'name' => 'menu_create_4',
                'readable' => 'EHE en menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:34:49',
                'updated_at' => '2024-10-29 08:34:49',
            ),
            53 => 
            array (
                'name' => 'menu_edit_4',
                'readable' => 'EHE en menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:34:49',
                'updated_at' => '2024-10-29 08:34:49',
            ),
            54 => 
            array (
                'name' => 'menu_order_4',
                'readable' => 'EHE en menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:34:49',
                'updated_at' => '2024-10-29 08:34:49',
            ),
            55 => 
            array (
                'name' => 'menu_delete_4',
                'readable' => 'EHE en menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:34:49',
                'updated_at' => '2024-10-29 08:34:49',
            ),
            56 => 
            array (
                'name' => 'menu_index_5',
                'readable' => 'KITTI-Netz de menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:37:33',
                'updated_at' => '2024-10-29 08:37:33',
            ),
            57 => 
            array (
                'name' => 'menu_create_5',
                'readable' => 'KITTI-Netz de menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:37:33',
                'updated_at' => '2024-10-29 08:37:33',
            ),
            58 => 
            array (
                'name' => 'menu_edit_5',
                'readable' => 'KITTI-Netz de menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:37:33',
                'updated_at' => '2024-10-29 08:37:33',
            ),
            59 => 
            array (
                'name' => 'menu_order_5',
                'readable' => 'KITTI-Netz de menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:37:33',
                'updated_at' => '2024-10-29 08:37:33',
            ),
            60 => 
            array (
                'name' => 'menu_delete_5',
                'readable' => 'KITTI-Netz de menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:37:33',
                'updated_at' => '2024-10-29 08:37:33',
            ),
            61 => 
            array (
                'name' => 'menu_index_6',
                'readable' => 'EHE de menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:37:58',
                'updated_at' => '2024-10-29 08:37:58',
            ),
            62 => 
            array (
                'name' => 'menu_create_6',
                'readable' => 'EHE de menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:37:58',
                'updated_at' => '2024-10-29 08:37:58',
            ),
            63 => 
            array (
                'name' => 'menu_edit_6',
                'readable' => 'EHE de menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:37:58',
                'updated_at' => '2024-10-29 08:37:58',
            ),
            64 => 
            array (
                'name' => 'menu_order_6',
                'readable' => 'EHE de menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:37:58',
                'updated_at' => '2024-10-29 08:37:58',
            ),
            65 => 
            array (
                'name' => 'menu_delete_6',
                'readable' => 'EHE de menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 08:37:58',
                'updated_at' => '2024-10-29 08:37:58',
            ),
        ));
        
    }
}