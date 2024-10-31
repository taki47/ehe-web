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
                'link' => '/',
                'image' => 'kitti.webp',
                'description' => 'Kistérségi és Települési Ifjúsági Hálózat',
                'subdescription' => 'Nyelvében él a nemzet',
                'parent_id' => NULL,
                'order' => 1,
                'language_id' => 1,
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:26:03',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'E.H.E.',
                'link' => '/',
                'image' => 'ehe.webp',
                'description' => 'Erdélyi Hagyományokért Egyesület',
                'subdescription' => NULL,
                'parent_id' => NULL,
                'order' => 4,
                'language_id' => 1,
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'KITTI Net',
                'link' => '/',
                'image' => '1730204627kitti.webp',
                'description' => 'Micro-regional and Urban Youth Network',
                'subdescription' => 'The nation lives in its language',
                'parent_id' => NULL,
                'order' => 2,
                'language_id' => 2,
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'KITTI-Netz',
                'link' => '/',
                'image' => '1730204670kitti.webp',
                'description' => 'Mikroregionales und städtisches Jugendnetzwerk',
                'subdescription' => 'Die Nation lebt in ihrer Sprache',
                'parent_id' => NULL,
                'order' => 3,
                'language_id' => 3,
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'E.H.E.',
                'link' => '/',
                'image' => '1730204732ehe.webp',
                'description' => 'Association for Transylvanian Traditions',
                'subdescription' => NULL,
                'parent_id' => NULL,
                'order' => 5,
                'language_id' => 2,
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'E.H.E.',
                'link' => '/',
                'image' => '1730204750ehe.webp',
                'description' => 'Verein für siebenbürgische Traditionen',
                'subdescription' => NULL,
                'parent_id' => NULL,
                'order' => 6,
                'language_id' => 3,
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Egyesületről',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:27:21',
                'updated_at' => '2024-10-29 12:27:21',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Programok',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:27:26',
                'updated_at' => '2024-10-29 12:27:26',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Dokumentumtár',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:27:31',
                'updated_at' => '2024-10-29 12:27:31',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Médiatár',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:27:35',
                'updated_at' => '2024-10-29 12:27:35',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Támogatóink',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:27:44',
                'updated_at' => '2024-10-29 12:27:44',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Tagság és Partnerek',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 1,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:27:50',
                'updated_at' => '2024-10-29 12:27:50',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Bemutatkozás',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 7,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:28:13',
                'updated_at' => '2024-10-29 12:28:13',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Vezetőség',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 7,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:28:22',
                'updated_at' => '2024-10-29 12:28:22',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Aktuális programok',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 8,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:28:34',
                'updated_at' => '2024-10-29 12:28:34',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Lezárt programok',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 8,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:28:43',
                'updated_at' => '2024-10-29 12:28:43',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Határozatok',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 9,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:28:56',
                'updated_at' => '2024-10-29 12:28:56',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Jelentések',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 9,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:29:05',
                'updated_at' => '2024-10-29 12:29:05',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Szabályzatok',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 9,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:29:15',
                'updated_at' => '2024-10-29 12:29:15',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Rendezvény jelentkezések',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 9,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:29:30',
                'updated_at' => '2024-10-29 12:29:30',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Közgyűlési',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 17,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:29:43',
                'updated_at' => '2024-10-29 12:29:43',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Elnökségi',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 17,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:29:50',
                'updated_at' => '2024-10-29 12:29:50',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Közgyűlési beszámoló',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 18,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:30:25',
                'updated_at' => '2024-10-29 12:30:25',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Elnökségi beszámoló',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 18,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:30:36',
                'updated_at' => '2024-10-29 12:30:36',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Közhasznúsági bejelentések',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 18,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:30:49',
                'updated_at' => '2024-10-29 12:30:49',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Alapszabály',
                'link' => '/',
                'image' => NULL,
                'description' => NULL,
                'subdescription' => NULL,
                'parent_id' => 19,
                'order' => 0,
                'language_id' => NULL,
                'created_at' => '2024-10-29 12:31:05',
                'updated_at' => '2024-10-29 12:31:05',
                'deleted_at' => NULL,
            ),
        ));


        \DB::table('permissions')->insert(array (
        37 => 
            array (
                'name' => 'menu_index_1',
                'readable' => 'KITTI Háló hu menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            38 => 
            array (
                'name' => 'menu_create_1',
                'readable' => 'KITTI Háló hu menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            39 => 
            array (
                'name' => 'menu_edit_1',
                'readable' => 'KITTI Háló hu menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            40 => 
            array (
                'name' => 'menu_order_1',
                'readable' => 'KITTI Háló hu menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            41 => 
            array (
                'name' => 'menu_delete_1',
                'readable' => 'KITTI Háló hu menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            42 => 
            array (
                'name' => 'news_index_1',
                'readable' => 'KITTI Háló hu hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            43 => 
            array (
                'name' => 'news_create_1',
                'readable' => 'KITTI Háló hu hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            44 => 
            array (
                'name' => 'news_edit_1',
                'readable' => 'KITTI Háló hu hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            45 => 
            array (
                'name' => 'news_approval_1',
                'readable' => 'KITTI Háló hu hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            46 => 
            array (
                'name' => 'news_delete_1',
                'readable' => 'KITTI Háló hu hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            47 => 
            array (
                'name' => 'events_index_1',
                'readable' => 'KITTI Háló hu események listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            48 => 
            array (
                'name' => 'events_create_1',
                'readable' => 'KITTI Háló hu események létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            49 => 
            array (
                'name' => 'events_edit_1',
                'readable' => 'KITTI Háló hu események szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            50 => 
            array (
                'name' => 'events_approval_1',
                'readable' => 'KITTI Háló hu események jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            51 => 
            array (
                'name' => 'events_delete_1',
                'readable' => 'KITTI Háló hu események törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            52 => 
            array (
                'name' => 'pages_index_1',
                'readable' => 'KITTI Háló hu oldalak listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            53 => 
            array (
                'name' => 'pages_create_1',
                'readable' => 'KITTI Háló hu oldalak létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            54 => 
            array (
                'name' => 'pages_edit_1',
                'readable' => 'KITTI Háló hu oldalak szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            55 => 
            array (
                'name' => 'pages_approval_1',
                'readable' => 'KITTI Háló hu oldalak jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            56 => 
            array (
                'name' => 'pages_delete_1',
                'readable' => 'KITTI Háló hu oldalak törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:22:33',
                'updated_at' => '2024-10-29 12:22:33',
            ),
            57 => 
            array (
                'name' => 'menu_index_2',
                'readable' => 'E.H.E. hu menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            58 => 
            array (
                'name' => 'menu_create_2',
                'readable' => 'E.H.E. hu menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            59 => 
            array (
                'name' => 'menu_edit_2',
                'readable' => 'E.H.E. hu menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            60 => 
            array (
                'name' => 'menu_order_2',
                'readable' => 'E.H.E. hu menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            61 => 
            array (
                'name' => 'menu_delete_2',
                'readable' => 'E.H.E. hu menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            62 => 
            array (
                'name' => 'news_index_2',
                'readable' => 'E.H.E. hu hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            63 => 
            array (
                'name' => 'news_create_2',
                'readable' => 'E.H.E. hu hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            64 => 
            array (
                'name' => 'news_edit_2',
                'readable' => 'E.H.E. hu hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            65 => 
            array (
                'name' => 'news_approval_2',
                'readable' => 'E.H.E. hu hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            66 => 
            array (
                'name' => 'news_delete_2',
                'readable' => 'E.H.E. hu hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            67 => 
            array (
                'name' => 'events_index_2',
                'readable' => 'E.H.E. hu események listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            68 => 
            array (
                'name' => 'events_create_2',
                'readable' => 'E.H.E. hu események létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            69 => 
            array (
                'name' => 'events_edit_2',
                'readable' => 'E.H.E. hu események szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            70 => 
            array (
                'name' => 'events_approval_2',
                'readable' => 'E.H.E. hu események jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            71 => 
            array (
                'name' => 'events_delete_2',
                'readable' => 'E.H.E. hu események törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            72 => 
            array (
                'name' => 'pages_index_2',
                'readable' => 'E.H.E. hu oldalak listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            73 => 
            array (
                'name' => 'pages_create_2',
                'readable' => 'E.H.E. hu oldalak létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            74 => 
            array (
                'name' => 'pages_edit_2',
                'readable' => 'E.H.E. hu oldalak szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            75 => 
            array (
                'name' => 'pages_approval_2',
                'readable' => 'E.H.E. hu oldalak jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            76 => 
            array (
                'name' => 'pages_delete_2',
                'readable' => 'E.H.E. hu oldalak törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:06',
                'updated_at' => '2024-10-29 12:23:06',
            ),
            77 => 
            array (
                'name' => 'menu_index_3',
                'readable' => 'KITTI Net en menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            78 => 
            array (
                'name' => 'menu_create_3',
                'readable' => 'KITTI Net en menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            79 => 
            array (
                'name' => 'menu_edit_3',
                'readable' => 'KITTI Net en menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            80 => 
            array (
                'name' => 'menu_order_3',
                'readable' => 'KITTI Net en menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            81 => 
            array (
                'name' => 'menu_delete_3',
                'readable' => 'KITTI Net en menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            82 => 
            array (
                'name' => 'news_index_3',
                'readable' => 'KITTI Net en hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            83 => 
            array (
                'name' => 'news_create_3',
                'readable' => 'KITTI Net en hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            84 => 
            array (
                'name' => 'news_edit_3',
                'readable' => 'KITTI Net en hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            85 => 
            array (
                'name' => 'news_approval_3',
                'readable' => 'KITTI Net en hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            86 => 
            array (
                'name' => 'news_delete_3',
                'readable' => 'KITTI Net en hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            87 => 
            array (
                'name' => 'events_index_3',
                'readable' => 'KITTI Net en események listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            88 => 
            array (
                'name' => 'events_create_3',
                'readable' => 'KITTI Net en események létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            89 => 
            array (
                'name' => 'events_edit_3',
                'readable' => 'KITTI Net en események szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            90 => 
            array (
                'name' => 'events_approval_3',
                'readable' => 'KITTI Net en események jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            91 => 
            array (
                'name' => 'events_delete_3',
                'readable' => 'KITTI Net en események törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            92 => 
            array (
                'name' => 'pages_index_3',
                'readable' => 'KITTI Net en oldalak listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            93 => 
            array (
                'name' => 'pages_create_3',
                'readable' => 'KITTI Net en oldalak létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            94 => 
            array (
                'name' => 'pages_edit_3',
                'readable' => 'KITTI Net en oldalak szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            95 => 
            array (
                'name' => 'pages_approval_3',
                'readable' => 'KITTI Net en oldalak jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            96 => 
            array (
                'name' => 'pages_delete_3',
                'readable' => 'KITTI Net en oldalak törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:23:47',
                'updated_at' => '2024-10-29 12:23:47',
            ),
            97 => 
            array (
                'name' => 'menu_index_4',
                'readable' => 'KITTI-Netz de menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            98 => 
            array (
                'name' => 'menu_create_4',
                'readable' => 'KITTI-Netz de menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            99 => 
            array (
                'name' => 'menu_edit_4',
                'readable' => 'KITTI-Netz de menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            100 => 
            array (
                'name' => 'menu_order_4',
                'readable' => 'KITTI-Netz de menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            101 => 
            array (
                'name' => 'menu_delete_4',
                'readable' => 'KITTI-Netz de menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            102 => 
            array (
                'name' => 'news_index_4',
                'readable' => 'KITTI-Netz de hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            103 => 
            array (
                'name' => 'news_create_4',
                'readable' => 'KITTI-Netz de hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            104 => 
            array (
                'name' => 'news_edit_4',
                'readable' => 'KITTI-Netz de hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            105 => 
            array (
                'name' => 'news_approval_4',
                'readable' => 'KITTI-Netz de hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            106 => 
            array (
                'name' => 'news_delete_4',
                'readable' => 'KITTI-Netz de hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            107 => 
            array (
                'name' => 'events_index_4',
                'readable' => 'KITTI-Netz de események listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            108 => 
            array (
                'name' => 'events_create_4',
                'readable' => 'KITTI-Netz de események létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            109 => 
            array (
                'name' => 'events_edit_4',
                'readable' => 'KITTI-Netz de események szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            110 => 
            array (
                'name' => 'events_approval_4',
                'readable' => 'KITTI-Netz de események jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            111 => 
            array (
                'name' => 'events_delete_4',
                'readable' => 'KITTI-Netz de események törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            112 => 
            array (
                'name' => 'pages_index_4',
                'readable' => 'KITTI-Netz de oldalak listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            113 => 
            array (
                'name' => 'pages_create_4',
                'readable' => 'KITTI-Netz de oldalak létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            114 => 
            array (
                'name' => 'pages_edit_4',
                'readable' => 'KITTI-Netz de oldalak szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            115 => 
            array (
                'name' => 'pages_approval_4',
                'readable' => 'KITTI-Netz de oldalak jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            116 => 
            array (
                'name' => 'pages_delete_4',
                'readable' => 'KITTI-Netz de oldalak törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:24:30',
                'updated_at' => '2024-10-29 12:24:30',
            ),
            117 => 
            array (
                'name' => 'menu_index_5',
                'readable' => 'E.H.E. en menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            118 => 
            array (
                'name' => 'menu_create_5',
                'readable' => 'E.H.E. en menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            119 => 
            array (
                'name' => 'menu_edit_5',
                'readable' => 'E.H.E. en menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            120 => 
            array (
                'name' => 'menu_order_5',
                'readable' => 'E.H.E. en menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            121 => 
            array (
                'name' => 'menu_delete_5',
                'readable' => 'E.H.E. en menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            122 => 
            array (
                'name' => 'news_index_5',
                'readable' => 'E.H.E. en hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            123 => 
            array (
                // 'id' => 124,
                'name' => 'news_create_5',
                'readable' => 'E.H.E. en hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            124 => 
            array (
                // 'id' => 125,
                'name' => 'news_edit_5',
                'readable' => 'E.H.E. en hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            125 => 
            array (
                // 'id' => 126,
                'name' => 'news_approval_5',
                'readable' => 'E.H.E. en hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            126 => 
            array (
                // 'id' => 127,
                'name' => 'news_delete_5',
                'readable' => 'E.H.E. en hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            127 => 
            array (
                // 'id' => 128,
                'name' => 'events_index_5',
                'readable' => 'E.H.E. en események listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            128 => 
            array (
                // 'id' => 129,
                'name' => 'events_create_5',
                'readable' => 'E.H.E. en események létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            129 => 
            array (
                // 'id' => 130,
                'name' => 'events_edit_5',
                'readable' => 'E.H.E. en események szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            130 => 
            array (
                // 'id' => 131,
                'name' => 'events_approval_5',
                'readable' => 'E.H.E. en események jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            131 => 
            array (
                // 'id' => 132,
                'name' => 'events_delete_5',
                'readable' => 'E.H.E. en események törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            132 => 
            array (
                // 'id' => 133,
                'name' => 'pages_index_5',
                'readable' => 'E.H.E. en oldalak listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            133 => 
            array (
                // 'id' => 134,
                'name' => 'pages_create_5',
                'readable' => 'E.H.E. en oldalak létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            134 => 
            array (
                // 'id' => 135,
                'name' => 'pages_edit_5',
                'readable' => 'E.H.E. en oldalak szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            135 => 
            array (
                // 'id' => 136,
                'name' => 'pages_approval_5',
                'readable' => 'E.H.E. en oldalak jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            136 => 
            array (
                // 'id' => 137,
                'name' => 'pages_delete_5',
                'readable' => 'E.H.E. en oldalak törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:32',
                'updated_at' => '2024-10-29 12:25:32',
            ),
            137 => 
            array (
                // 'id' => 138,
                'name' => 'menu_index_6',
                'readable' => 'E.H.E. de menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            138 => 
            array (
                // 'id' => 139,
                'name' => 'menu_create_6',
                'readable' => 'E.H.E. de menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            139 => 
            array (
                // 'id' => 140,
                'name' => 'menu_edit_6',
                'readable' => 'E.H.E. de menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            140 => 
            array (
                // 'id' => 141,
                'name' => 'menu_order_6',
                'readable' => 'E.H.E. de menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            141 => 
            array (
                // 'id' => 142,
                'name' => 'menu_delete_6',
                'readable' => 'E.H.E. de menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            142 => 
            array (
                // 'id' => 143,
                'name' => 'news_index_6',
                'readable' => 'E.H.E. de hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            143 => 
            array (
                // 'id' => 144,
                'name' => 'news_create_6',
                'readable' => 'E.H.E. de hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            144 => 
            array (
                // 'id' => 145,
                'name' => 'news_edit_6',
                'readable' => 'E.H.E. de hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            145 => 
            array (
                // 'id' => 146,
                'name' => 'news_approval_6',
                'readable' => 'E.H.E. de hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            146 => 
            array (
                // 'id' => 147,
                'name' => 'news_delete_6',
                'readable' => 'E.H.E. de hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            147 => 
            array (
                // 'id' => 148,
                'name' => 'events_index_6',
                'readable' => 'E.H.E. de események listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            148 => 
            array (
                // 'id' => 149,
                'name' => 'events_create_6',
                'readable' => 'E.H.E. de események létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            149 => 
            array (
                // 'id' => 150,
                'name' => 'events_edit_6',
                'readable' => 'E.H.E. de események szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            150 => 
            array (
                // 'id' => 151,
                'name' => 'events_approval_6',
                'readable' => 'E.H.E. de események jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            151 => 
            array (
                // 'id' => 152,
                'name' => 'events_delete_6',
                'readable' => 'E.H.E. de események törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            152 => 
            array (
                // 'id' => 153,
                'name' => 'pages_index_6',
                'readable' => 'E.H.E. de oldalak listázása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            153 => 
            array (
                // 'id' => 154,
                'name' => 'pages_create_6',
                'readable' => 'E.H.E. de oldalak létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            154 => 
            array (
                // 'id' => 155,
                'name' => 'pages_edit_6',
                'readable' => 'E.H.E. de oldalak szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            155 => 
            array (
                // 'id' => 156,
                'name' => 'pages_approval_6',
                'readable' => 'E.H.E. de oldalak jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
            156 => 
            array (
                // 'id' => 157,
                'name' => 'pages_delete_6',
                'readable' => 'E.H.E. de oldalak törlése',
                'guard_name' => 'web',
                'created_at' => '2024-10-29 12:25:50',
                'updated_at' => '2024-10-29 12:25:50',
            ),
        ));
        
        
    }
}