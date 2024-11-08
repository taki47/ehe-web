<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('banners')->delete();
        
        \DB::table('banners')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Csatlakozz közösségünkhöz!',
                'description' => 'Lépj be a színes közösségünkbe! Együtt változást hozhatunk. Regisztrálj még ma, hogy naprakész maradhass tevékenységeinkről és eseményeinkről.',
                'link' => "/",
                'created_by' => 1,
                'updated_by' => 1,
                'language_id' => 1,
                'status' => '1',
                'created_at' => '2024-10-25 09:58:23',
                'updated_at' => '2024-10-25 10:11:18',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Közelgő események',
                'description' => 'Ne hagyd ki izgalmas közelgő eseményeinket! Nézd meg a naptárunkat workshopokkal, találkozókkal és közösségi összejövetelekkel, amelyeket minden tagunk számára szervezünk.',
                'link' => "/",
                'created_by' => 1,
                'updated_by' => 1,
                'language_id' => 1,
                'status' => '1',
                'created_at' => '2024-10-25 09:58:51',
                'updated_at' => '2024-10-25 10:14:33',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Ö volunteerálj velünk',
                'description' => 'Tegyél a közösségedért önkéntesként! Fedezd fel a hasznos lehetőségeket, hogy segíts másoknak, és értékes tapasztalatokat szerezhess.',
                'link' => "/",
                'created_by' => 1,
                'updated_by' => 1,
                'language_id' => 1,
                'status' => '1',
                'created_at' => '2024-10-25 09:59:02',
                'updated_at' => '2024-10-25 10:16:38',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Join our community!',
                'description' => 'Join our colorful community! Together we can make a difference. Sign up today to stay updated on our activities and events.',
                'link' => "/",
                'created_by' => 1,
                'updated_by' => 1,
                'language_id' => 2,
                'status' => '1',
                'created_at' => '2024-10-25 09:59:55',
                'updated_at' => '2024-10-25 10:17:16',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Upcoming Events',
                'description' => 'Don\'t miss out on our exciting upcoming events! Check out our calendar of workshops, meetings, and community gatherings that we host for all our members.',
                'link' => "/",
                'created_by' => 1,
                'updated_by' => 1,
                'language_id' => 2,
                'status' => '1',
                'created_at' => '2024-10-25 10:00:08',
                'updated_at' => '2024-10-25 10:17:44',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'You volunteer with us',
                'description' => 'Volunteer for your community! Explore useful opportunities to help others and gain valuable experience.',
                'link' => "/",
                'created_by' => 1,
                'updated_by' => 1,
                'language_id' => 2,
                'status' => '1',
                'created_at' => '2024-10-25 10:00:19',
                'updated_at' => '2024-10-25 10:18:02',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Treten Sie unserer Community bei!',
                'description' => 'Treten Sie unserer bunten Community bei! Gemeinsam können wir etwas bewirken. Melden Sie sich noch heute an, um über unsere Aktivitäten und Veranstaltungen auf dem Laufenden zu bleiben.',
                'link' => "/",
                'created_by' => 1,
                'updated_by' => 1,
                'language_id' => 3,
                'status' => '1',
                'created_at' => '2024-10-25 10:00:43',
                'updated_at' => '2024-10-25 10:18:27',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Kommende Veranstaltungen',
                'description' => 'Verpassen Sie nicht unsere aufregenden bevorstehenden Veranstaltungen! Schauen Sie sich unseren Kalender mit Workshops, Meetings und Community-Treffen an, die wir für alle unsere.',
                'link' => "/",
                'created_by' => 1,
                'updated_by' => 1,
                'language_id' => 3,
                'status' => '1',
                'created_at' => '2024-10-25 10:00:59',
                'updated_at' => '2024-10-25 10:18:42',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Du ehrenamtlich bei uns',
                'description' => 'Machen Sie sich ehrenamtlich für Ihre Gemeinde engagiert! Entdecken Sie nützliche Möglichkeiten, anderen zu helfen und wertvolle Erfahrungen zu sammeln.',
                'link' => "/",
                'created_by' => 1,
                'updated_by' => 1,
                'language_id' => 3,
                'status' => '1',
                'created_at' => '2024-10-25 10:01:10',
                'updated_at' => '2024-10-25 10:18:56',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}