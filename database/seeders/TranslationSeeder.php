<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $translations = [
            "site.name" => [
                "hu" => "Erdélyi Hagyományokért Egyesület",
                "en" => "Association for Transylvanian Traditions",
                "de" => "Verein für siebenbürgische Traditionen"
            ],
            "site.slogan" => [
                "hu" => "Nyelvében él a nemzet",
                "en" => "The nation lives in its language.",
                "de" => "Die Nation lebt in ihrer Sprache"
            ],
            "footer.copyright" => [
                "hu" => "Copyrights © 2024 Erdélyi Hagyományokért Egyesület",
                "en" => "Copyrights © 2024 Association for Transylvanian Traditions",
                "de" => "Urheberrechte © 2024 Verein für siebenbürgische Traditionen"
            ],
            "footer.links.links" => [
                "hu" => "Linkek",
                "en" => "Links",
                "de" => "Links"
            ],
            "footer.links.term" => [
                "hu" => "Felhasználási feltételek,felhasznalasi-feltetelek",
                "en" => "Terms of use,term-of-use",
                "de" => "Nutzungsbedingungen,nutzungsbedingungen"
            ],
            "footer.links.privacy" => [
                "hu" => "Adatvédelmi tájékoztató,adatvedelmi-tajekoztato",
                "en" => "Privacy notice,privacy-notice",
                "de" => "Datenschutzhinweis,datenschutzhinweis"
            ],
            "footer.links.contacts" => [
                "hu" => "Szervezeti kapcsolatok",
                "en" => "Organizational relations",
                "de" => "Organisatorische Beziehungen"
            ],
            "footer.links.reports" => [
                "hu" => "Beszámolók",
                "en" => "Reports",
                "de" => "Berichte"
            ],
            "footer.links.login" => [
                "hu" => "Bejelentkezés",
                "en" => "Login",
                "de" => "Login"
            ]
        ];

        foreach ($translations as $key => $values) {
            foreach ($values as $lang => $value) {
                
                Translation::create([
                    "key" => $key,
                    "language" => $lang,
                    "value" => $value
                ]);

            }
        }
    }
}
