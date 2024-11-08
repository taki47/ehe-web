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
                'slug' => 'kitti-halo',
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
                'slug' => 'ehe',
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
                'slug' => 'kitti-net',
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
                'slug' => 'kitti-netz',
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
                'slug' => 'ehe',
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
                'slug' => 'ehe',
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
                'slug' => null,
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
            52 => 
            array (
                // 'id' => 53,
                'name' => 'menu_index_1',
                'readable' => 'KITTI Háló hu menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            53 => 
            array (
                // 'id' => 54,
                'name' => 'menu_create_1',
                'readable' => 'KITTI Háló hu menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            54 => 
            array (
                // 'id' => 55,
                'name' => 'menu_edit_1',
                'readable' => 'KITTI Háló hu menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            55 => 
            array (
                // 'id' => 56,
                'name' => 'menu_order_1',
                'readable' => 'KITTI Háló hu menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            56 => 
            array (
                // 'id' => 57,
                'name' => 'menu_delete_1',
                'readable' => 'KITTI Háló hu menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            57 => 
            array (
                // 'id' => 58,
                'name' => 'news_index_1',
                'readable' => 'KITTI Háló hu hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            58 => 
            array (
                // 'id' => 59,
                'name' => 'news_create_1',
                'readable' => 'KITTI Háló hu hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            59 => 
            array (
                // 'id' => 60,
                'name' => 'news_edit_1',
                'readable' => 'KITTI Háló hu hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            60 => 
            array (
                // 'id' => 61,
                'name' => 'news_approval_1',
                'readable' => 'KITTI Háló hu hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            61 => 
            array (
                // 'id' => 62,
                'name' => 'news_archive_1',
                'readable' => 'KITTI Háló hu hírek archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            62 => 
            array (
                // 'id' => 63,
                'name' => 'news_delete_1',
                'readable' => 'KITTI Háló hu hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            63 => 
            array (
                // 'id' => 64,
                'name' => 'foreign_news_index_1',
                'readable' => 'KITTI Háló hu külföldi hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            64 => 
            array (
                // 'id' => 65,
                'name' => 'foreign_news_create_1',
                'readable' => 'KITTI Háló hu külföldi hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            65 => 
            array (
                // 'id' => 66,
                'name' => 'foreign_news_edit_1',
                'readable' => 'KITTI Háló hu külföldi hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            66 => 
            array (
                // 'id' => 67,
                'name' => 'foreign_news_approval_1',
                'readable' => 'KITTI Háló hu külföldi hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            67 => 
            array (
                // 'id' => 68,
                'name' => 'foreign_news_archive_1',
                'readable' => 'KITTI Háló hu külföldi hírek archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            68 => 
            array (
                // 'id' => 69,
                'name' => 'foreign_news_delete_1',
                'readable' => 'KITTI Háló hu külföldi hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            69 => 
            array (
                // 'id' => 70,
                'name' => 'events_index_1',
                'readable' => 'KITTI Háló hu események listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            70 => 
            array (
                // 'id' => 71,
                'name' => 'events_create_1',
                'readable' => 'KITTI Háló hu események létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            71 => 
            array (
                // 'id' => 72,
                'name' => 'events_edit_1',
                'readable' => 'KITTI Háló hu események szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            72 => 
            array (
                // 'id' => 73,
                'name' => 'events_approval_1',
                'readable' => 'KITTI Háló hu események jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            73 => 
            array (
                // 'id' => 74,
                'name' => 'events_archive_1',
                'readable' => 'KITTI Háló hu események archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            74 => 
            array (
                // 'id' => 75,
                'name' => 'events_delete_1',
                'readable' => 'KITTI Háló hu események törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            75 => 
            array (
                // 'id' => 76,
                'name' => 'pages_index_1',
                'readable' => 'KITTI Háló hu oldalak listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            76 => 
            array (
                // 'id' => 77,
                'name' => 'pages_create_1',
                'readable' => 'KITTI Háló hu oldalak létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            77 => 
            array (
                // 'id' => 78,
                'name' => 'pages_edit_1',
                'readable' => 'KITTI Háló hu oldalak szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            78 => 
            array (
                // 'id' => 79,
                'name' => 'pages_approval_1',
                'readable' => 'KITTI Háló hu oldalak jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            79 => 
            array (
                // 'id' => 80,
                'name' => 'pages_archive_1',
                'readable' => 'KITTI Háló hu oldalak archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            80 => 
            array (
                // 'id' => 81,
                'name' => 'pages_delete_1',
                'readable' => 'KITTI Háló hu oldalak törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:01:54',
                'updated_at' => '2024-11-04 12:01:54',
            ),
            81 => 
            array (
                // 'id' => 82,
                'name' => 'menu_index_2',
                'readable' => 'E.H.E. hu menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            82 => 
            array (
                // 'id' => 83,
                'name' => 'menu_create_2',
                'readable' => 'E.H.E. hu menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            83 => 
            array (
                // 'id' => 84,
                'name' => 'menu_edit_2',
                'readable' => 'E.H.E. hu menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            84 => 
            array (
                // 'id' => 85,
                'name' => 'menu_order_2',
                'readable' => 'E.H.E. hu menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            85 => 
            array (
                // 'id' => 86,
                'name' => 'menu_delete_2',
                'readable' => 'E.H.E. hu menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            86 => 
            array (
                // 'id' => 87,
                'name' => 'news_index_2',
                'readable' => 'E.H.E. hu hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            87 => 
            array (
                // 'id' => 88,
                'name' => 'news_create_2',
                'readable' => 'E.H.E. hu hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            88 => 
            array (
                // 'id' => 89,
                'name' => 'news_edit_2',
                'readable' => 'E.H.E. hu hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            89 => 
            array (
                // 'id' => 90,
                'name' => 'news_approval_2',
                'readable' => 'E.H.E. hu hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            90 => 
            array (
                // 'id' => 91,
                'name' => 'news_archive_2',
                'readable' => 'E.H.E. hu hírek archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            91 => 
            array (
                // 'id' => 92,
                'name' => 'news_delete_2',
                'readable' => 'E.H.E. hu hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            92 => 
            array (
                // 'id' => 93,
                'name' => 'foreign_news_index_2',
                'readable' => 'E.H.E. hu külföldi hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            93 => 
            array (
                // 'id' => 94,
                'name' => 'foreign_news_create_2',
                'readable' => 'E.H.E. hu külföldi hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            94 => 
            array (
                // 'id' => 95,
                'name' => 'foreign_news_edit_2',
                'readable' => 'E.H.E. hu külföldi hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            95 => 
            array (
                // 'id' => 96,
                'name' => 'foreign_news_approval_2',
                'readable' => 'E.H.E. hu külföldi hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            96 => 
            array (
                // 'id' => 97,
                'name' => 'foreign_news_archive_2',
                'readable' => 'E.H.E. hu külföldi hírek archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            97 => 
            array (
                // 'id' => 98,
                'name' => 'foreign_news_delete_2',
                'readable' => 'E.H.E. hu külföldi hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            98 => 
            array (
                // 'id' => 99,
                'name' => 'events_index_2',
                'readable' => 'E.H.E. hu események listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            99 => 
            array (
                // 'id' => 100,
                'name' => 'events_create_2',
                'readable' => 'E.H.E. hu események létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            100 => 
            array (
                // 'id' => 101,
                'name' => 'events_edit_2',
                'readable' => 'E.H.E. hu események szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            101 => 
            array (
                // 'id' => 102,
                'name' => 'events_approval_2',
                'readable' => 'E.H.E. hu események jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            102 => 
            array (
                // 'id' => 103,
                'name' => 'events_archive_2',
                'readable' => 'E.H.E. hu események archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            103 => 
            array (
                // 'id' => 104,
                'name' => 'events_delete_2',
                'readable' => 'E.H.E. hu események törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            104 => 
            array (
                // 'id' => 105,
                'name' => 'pages_index_2',
                'readable' => 'E.H.E. hu oldalak listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            105 => 
            array (
                // 'id' => 106,
                'name' => 'pages_create_2',
                'readable' => 'E.H.E. hu oldalak létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            106 => 
            array (
                // 'id' => 107,
                'name' => 'pages_edit_2',
                'readable' => 'E.H.E. hu oldalak szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            107 => 
            array (
                // 'id' => 108,
                'name' => 'pages_approval_2',
                'readable' => 'E.H.E. hu oldalak jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            108 => 
            array (
                // 'id' => 109,
                'name' => 'pages_archive_2',
                'readable' => 'E.H.E. hu oldalak archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            109 => 
            array (
                // 'id' => 110,
                'name' => 'pages_delete_2',
                'readable' => 'E.H.E. hu oldalak törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:02:17',
                'updated_at' => '2024-11-04 12:02:17',
            ),
            110 => 
            array (
                // 'id' => 111,
                'name' => 'menu_index_3',
                'readable' => 'KITTI Net en menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            111 => 
            array (
                // 'id' => 112,
                'name' => 'menu_create_3',
                'readable' => 'KITTI Net en menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            112 => 
            array (
                // 'id' => 113,
                'name' => 'menu_edit_3',
                'readable' => 'KITTI Net en menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            113 => 
            array (
                // 'id' => 114,
                'name' => 'menu_order_3',
                'readable' => 'KITTI Net en menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            114 => 
            array (
                // 'id' => 115,
                'name' => 'menu_delete_3',
                'readable' => 'KITTI Net en menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            115 => 
            array (
                // 'id' => 116,
                'name' => 'news_index_3',
                'readable' => 'KITTI Net en hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            116 => 
            array (
                // 'id' => 117,
                'name' => 'news_create_3',
                'readable' => 'KITTI Net en hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            117 => 
            array (
                // 'id' => 118,
                'name' => 'news_edit_3',
                'readable' => 'KITTI Net en hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            118 => 
            array (
                // 'id' => 119,
                'name' => 'news_approval_3',
                'readable' => 'KITTI Net en hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            119 => 
            array (
                // 'id' => 120,
                'name' => 'news_archive_3',
                'readable' => 'KITTI Net en hírek archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            120 => 
            array (
                // 'id' => 121,
                'name' => 'news_delete_3',
                'readable' => 'KITTI Net en hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            121 => 
            array (
                // 'id' => 122,
                'name' => 'foreign_news_index_3',
                'readable' => 'KITTI Net en külföldi hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            122 => 
            array (
                // 'id' => 123,
                'name' => 'foreign_news_create_3',
                'readable' => 'KITTI Net en külföldi hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            123 => 
            array (
                // 'id' => 124,
                'name' => 'foreign_news_edit_3',
                'readable' => 'KITTI Net en külföldi hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            124 => 
            array (
                // 'id' => 125,
                'name' => 'foreign_news_approval_3',
                'readable' => 'KITTI Net en külföldi hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            125 => 
            array (
                // 'id' => 126,
                'name' => 'foreign_news_archive_3',
                'readable' => 'KITTI Net en külföldi hírek archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            126 => 
            array (
                // 'id' => 127,
                'name' => 'foreign_news_delete_3',
                'readable' => 'KITTI Net en külföldi hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            127 => 
            array (
                // 'id' => 128,
                'name' => 'events_index_3',
                'readable' => 'KITTI Net en események listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            128 => 
            array (
                // 'id' => 129,
                'name' => 'events_create_3',
                'readable' => 'KITTI Net en események létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            129 => 
            array (
                // 'id' => 130,
                'name' => 'events_edit_3',
                'readable' => 'KITTI Net en események szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            130 => 
            array (
                // 'id' => 131,
                'name' => 'events_approval_3',
                'readable' => 'KITTI Net en események jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            131 => 
            array (
                // 'id' => 132,
                'name' => 'events_archive_3',
                'readable' => 'KITTI Net en események archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            132 => 
            array (
                // 'id' => 133,
                'name' => 'events_delete_3',
                'readable' => 'KITTI Net en események törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            133 => 
            array (
                // 'id' => 134,
                'name' => 'pages_index_3',
                'readable' => 'KITTI Net en oldalak listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            134 => 
            array (
                // 'id' => 135,
                'name' => 'pages_create_3',
                'readable' => 'KITTI Net en oldalak létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            135 => 
            array (
                // 'id' => 136,
                'name' => 'pages_edit_3',
                'readable' => 'KITTI Net en oldalak szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            136 => 
            array (
                // 'id' => 137,
                'name' => 'pages_approval_3',
                'readable' => 'KITTI Net en oldalak jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            137 => 
            array (
                // 'id' => 138,
                'name' => 'pages_archive_3',
                'readable' => 'KITTI Net en oldalak archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            138 => 
            array (
                // 'id' => 139,
                'name' => 'pages_delete_3',
                'readable' => 'KITTI Net en oldalak törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:03:58',
                'updated_at' => '2024-11-04 12:03:58',
            ),
            139 => 
            array (
                // 'id' => 140,
                'name' => 'menu_index_4',
                'readable' => 'KITTI-Netz de menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            140 => 
            array (
                // 'id' => 141,
                'name' => 'menu_create_4',
                'readable' => 'KITTI-Netz de menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            141 => 
            array (
                // 'id' => 142,
                'name' => 'menu_edit_4',
                'readable' => 'KITTI-Netz de menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            142 => 
            array (
                // 'id' => 143,
                'name' => 'menu_order_4',
                'readable' => 'KITTI-Netz de menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            143 => 
            array (
                // 'id' => 144,
                'name' => 'menu_delete_4',
                'readable' => 'KITTI-Netz de menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            144 => 
            array (
                // 'id' => 145,
                'name' => 'news_index_4',
                'readable' => 'KITTI-Netz de hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            145 => 
            array (
                // 'id' => 146,
                'name' => 'news_create_4',
                'readable' => 'KITTI-Netz de hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            146 => 
            array (
                // 'id' => 147,
                'name' => 'news_edit_4',
                'readable' => 'KITTI-Netz de hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            147 => 
            array (
                // 'id' => 148,
                'name' => 'news_approval_4',
                'readable' => 'KITTI-Netz de hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            148 => 
            array (
                // 'id' => 149,
                'name' => 'news_archive_4',
                'readable' => 'KITTI-Netz de hírek archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            149 => 
            array (
                // 'id' => 150,
                'name' => 'news_delete_4',
                'readable' => 'KITTI-Netz de hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            150 => 
            array (
                // 'id' => 151,
                'name' => 'foreign_news_index_4',
                'readable' => 'KITTI-Netz de külföldi hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            151 => 
            array (
                // 'id' => 152,
                'name' => 'foreign_news_create_4',
                'readable' => 'KITTI-Netz de külföldi hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            152 => 
            array (
                // 'id' => 153,
                'name' => 'foreign_news_edit_4',
                'readable' => 'KITTI-Netz de külföldi hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            153 => 
            array (
                // 'id' => 154,
                'name' => 'foreign_news_approval_4',
                'readable' => 'KITTI-Netz de külföldi hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            154 => 
            array (
                // 'id' => 155,
                'name' => 'foreign_news_archive_4',
                'readable' => 'KITTI-Netz de külföldi hírek archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            155 => 
            array (
                // 'id' => 156,
                'name' => 'foreign_news_delete_4',
                'readable' => 'KITTI-Netz de külföldi hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            156 => 
            array (
                // 'id' => 157,
                'name' => 'events_index_4',
                'readable' => 'KITTI-Netz de események listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            157 => 
            array (
                // 'id' => 158,
                'name' => 'events_create_4',
                'readable' => 'KITTI-Netz de események létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            158 => 
            array (
                // 'id' => 159,
                'name' => 'events_edit_4',
                'readable' => 'KITTI-Netz de események szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            159 => 
            array (
                // 'id' => 160,
                'name' => 'events_approval_4',
                'readable' => 'KITTI-Netz de események jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            160 => 
            array (
                // 'id' => 161,
                'name' => 'events_archive_4',
                'readable' => 'KITTI-Netz de események archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            161 => 
            array (
                // 'id' => 162,
                'name' => 'events_delete_4',
                'readable' => 'KITTI-Netz de események törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            162 => 
            array (
                // 'id' => 163,
                'name' => 'pages_index_4',
                'readable' => 'KITTI-Netz de oldalak listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            163 => 
            array (
                // 'id' => 164,
                'name' => 'pages_create_4',
                'readable' => 'KITTI-Netz de oldalak létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            164 => 
            array (
                // 'id' => 165,
                'name' => 'pages_edit_4',
                'readable' => 'KITTI-Netz de oldalak szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            165 => 
            array (
                // 'id' => 166,
                'name' => 'pages_approval_4',
                'readable' => 'KITTI-Netz de oldalak jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            166 => 
            array (
                // 'id' => 167,
                'name' => 'pages_archive_4',
                'readable' => 'KITTI-Netz de oldalak archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            167 => 
            array (
                // 'id' => 168,
                'name' => 'pages_delete_4',
                'readable' => 'KITTI-Netz de oldalak törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:18',
                'updated_at' => '2024-11-04 12:04:18',
            ),
            168 => 
            array (
                // 'id' => 169,
                'name' => 'menu_index_5',
                'readable' => 'E.H.E. en menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            169 => 
            array (
                // 'id' => 170,
                'name' => 'menu_create_5',
                'readable' => 'E.H.E. en menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            170 => 
            array (
                // 'id' => 171,
                'name' => 'menu_edit_5',
                'readable' => 'E.H.E. en menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            171 => 
            array (
                // 'id' => 172,
                'name' => 'menu_order_5',
                'readable' => 'E.H.E. en menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            172 => 
            array (
                // 'id' => 173,
                'name' => 'menu_delete_5',
                'readable' => 'E.H.E. en menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            173 => 
            array (
                // 'id' => 174,
                'name' => 'news_index_5',
                'readable' => 'E.H.E. en hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            174 => 
            array (
                // 'id' => 175,
                'name' => 'news_create_5',
                'readable' => 'E.H.E. en hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            175 => 
            array (
                // 'id' => 176,
                'name' => 'news_edit_5',
                'readable' => 'E.H.E. en hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            176 => 
            array (
                // 'id' => 177,
                'name' => 'news_approval_5',
                'readable' => 'E.H.E. en hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            177 => 
            array (
                // 'id' => 178,
                'name' => 'news_archive_5',
                'readable' => 'E.H.E. en hírek archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            178 => 
            array (
                // 'id' => 179,
                'name' => 'news_delete_5',
                'readable' => 'E.H.E. en hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            179 => 
            array (
                // 'id' => 180,
                'name' => 'foreign_news_index_5',
                'readable' => 'E.H.E. en külföldi hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            180 => 
            array (
                // 'id' => 181,
                'name' => 'foreign_news_create_5',
                'readable' => 'E.H.E. en külföldi hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            181 => 
            array (
                // 'id' => 182,
                'name' => 'foreign_news_edit_5',
                'readable' => 'E.H.E. en külföldi hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            182 => 
            array (
                // 'id' => 183,
                'name' => 'foreign_news_approval_5',
                'readable' => 'E.H.E. en külföldi hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            183 => 
            array (
                // 'id' => 184,
                'name' => 'foreign_news_archive_5',
                'readable' => 'E.H.E. en külföldi hírek archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            184 => 
            array (
                // 'id' => 185,
                'name' => 'foreign_news_delete_5',
                'readable' => 'E.H.E. en külföldi hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            185 => 
            array (
                // 'id' => 186,
                'name' => 'events_index_5',
                'readable' => 'E.H.E. en események listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            186 => 
            array (
                // 'id' => 187,
                'name' => 'events_create_5',
                'readable' => 'E.H.E. en események létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            187 => 
            array (
                // 'id' => 188,
                'name' => 'events_edit_5',
                'readable' => 'E.H.E. en események szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            188 => 
            array (
                // 'id' => 189,
                'name' => 'events_approval_5',
                'readable' => 'E.H.E. en események jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            189 => 
            array (
                // 'id' => 190,
                'name' => 'events_archive_5',
                'readable' => 'E.H.E. en események archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            190 => 
            array (
                // 'id' => 191,
                'name' => 'events_delete_5',
                'readable' => 'E.H.E. en események törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            191 => 
            array (
                // 'id' => 192,
                'name' => 'pages_index_5',
                'readable' => 'E.H.E. en oldalak listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            192 => 
            array (
                // 'id' => 193,
                'name' => 'pages_create_5',
                'readable' => 'E.H.E. en oldalak létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            193 => 
            array (
                // 'id' => 194,
                'name' => 'pages_edit_5',
                'readable' => 'E.H.E. en oldalak szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            194 => 
            array (
                // 'id' => 195,
                'name' => 'pages_approval_5',
                'readable' => 'E.H.E. en oldalak jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            195 => 
            array (
                // 'id' => 196,
                'name' => 'pages_archive_5',
                'readable' => 'E.H.E. en oldalak archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            196 => 
            array (
                // 'id' => 197,
                'name' => 'pages_delete_5',
                'readable' => 'E.H.E. en oldalak törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:31',
                'updated_at' => '2024-11-04 12:04:31',
            ),
            197 => 
            array (
                // 'id' => 198,
                'name' => 'menu_index_6',
                'readable' => 'E.H.E. de menüben elemek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            198 => 
            array (
                // 'id' => 199,
                'name' => 'menu_create_6',
                'readable' => 'E.H.E. de menüben elemek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            199 => 
            array (
                // 'id' => 200,
                'name' => 'menu_edit_6',
                'readable' => 'E.H.E. de menüben elemek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            200 => 
            array (
                // 'id' => 201,
                'name' => 'menu_order_6',
                'readable' => 'E.H.E. de menüben sorrend módosítása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            201 => 
            array (
                // 'id' => 202,
                'name' => 'menu_delete_6',
                'readable' => 'E.H.E. de menüben elemek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            202 => 
            array (
                // 'id' => 203,
                'name' => 'news_index_6',
                'readable' => 'E.H.E. de hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            203 => 
            array (
                // 'id' => 204,
                'name' => 'news_create_6',
                'readable' => 'E.H.E. de hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            204 => 
            array (
                // 'id' => 205,
                'name' => 'news_edit_6',
                'readable' => 'E.H.E. de hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            205 => 
            array (
                // 'id' => 206,
                'name' => 'news_approval_6',
                'readable' => 'E.H.E. de hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            206 => 
            array (
                // 'id' => 207,
                'name' => 'news_archive_6',
                'readable' => 'E.H.E. de hírek archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            207 => 
            array (
                // 'id' => 208,
                'name' => 'news_delete_6',
                'readable' => 'E.H.E. de hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            208 => 
            array (
                // 'id' => 209,
                'name' => 'foreign_news_index_6',
                'readable' => 'E.H.E. de külföldi hírek listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            209 => 
            array (
                // 'id' => 210,
                'name' => 'foreign_news_create_6',
                'readable' => 'E.H.E. de külföldi hírek létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            210 => 
            array (
                // 'id' => 211,
                'name' => 'foreign_news_edit_6',
                'readable' => 'E.H.E. de külföldi hírek szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            211 => 
            array (
                // 'id' => 212,
                'name' => 'foreign_news_approval_6',
                'readable' => 'E.H.E. de külföldi hírek jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            212 => 
            array (
                // 'id' => 213,
                'name' => 'foreign_news_archive_6',
                'readable' => 'E.H.E. de külföldi hírek archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            213 => 
            array (
                // 'id' => 214,
                'name' => 'foreign_news_delete_6',
                'readable' => 'E.H.E. de külföldi hírek törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            214 => 
            array (
                // 'id' => 215,
                'name' => 'events_index_6',
                'readable' => 'E.H.E. de események listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            215 => 
            array (
                // 'id' => 216,
                'name' => 'events_create_6',
                'readable' => 'E.H.E. de események létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            216 => 
            array (
                // 'id' => 217,
                'name' => 'events_edit_6',
                'readable' => 'E.H.E. de események szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            217 => 
            array (
                // 'id' => 218,
                'name' => 'events_approval_6',
                'readable' => 'E.H.E. de események jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            218 => 
            array (
                // 'id' => 219,
                'name' => 'events_archive_6',
                'readable' => 'E.H.E. de események archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            219 => 
            array (
                // 'id' => 220,
                'name' => 'events_delete_6',
                'readable' => 'E.H.E. de események törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            220 => 
            array (
                // 'id' => 221,
                'name' => 'pages_index_6',
                'readable' => 'E.H.E. de oldalak listázása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            221 => 
            array (
                // 'id' => 222,
                'name' => 'pages_create_6',
                'readable' => 'E.H.E. de oldalak létrehozása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            222 => 
            array (
                // 'id' => 223,
                'name' => 'pages_edit_6',
                'readable' => 'E.H.E. de oldalak szerkesztése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            223 => 
            array (
                // 'id' => 224,
                'name' => 'pages_approval_6',
                'readable' => 'E.H.E. de oldalak jóváhagyása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            224 => 
            array (
                // 'id' => 225,
                'name' => 'pages_archive_6',
                'readable' => 'E.H.E. de oldalak archiválása, újraaktiválása',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
            225 => 
            array (
                // 'id' => 226,
                'name' => 'pages_delete_6',
                'readable' => 'E.H.E. de oldalak törlése',
                'guard_name' => 'web',
                'created_at' => '2024-11-04 12:04:41',
                'updated_at' => '2024-11-04 12:04:41',
            ),
        ));
    }
}