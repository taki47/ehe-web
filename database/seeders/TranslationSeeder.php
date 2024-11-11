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
            "archive" => [
                "hu" => "Archív",
                "en" => "Archive",
                "de" => "Archiv"
            ],
            "site.error.title" => [
                "hu" => "Hiba történt! Sajnáljuk, de valami hiba lépett fel a rendszerben. Kérjük, próbálja újra később, vagy lépjen kapcsolatba ügyfélszolgálatunkkal, ha a probléma továbbra is fennáll. Köszönjük megértését!",
                "en" => "An error occurred! We are sorry, but something went wrong on our end. Please try again later, or contact our support team if the issue persists. Thank you for your understanding!",
                "de" => "Ein Fehler ist aufgetreten! Es tut uns leid, aber etwas ist auf unserer Seite schiefgelaufen. Bitte versuchen Sie es später erneut oder wenden Sie sich an unser Support-Team, wenn das Problem weiterhin besteht. Danke für Ihr Verständnis!"
            ],
            "site.error.back" => [
                "hu" => "Vissza a főoldalra",
                "en" => "Back to main page",
                "de" => "Zurück zur Hauptseite"
            ],
            "site.notfound.title" => [
                "hu" => "Hiba történt! Az oldal nem található!",
                "en" => "Oops! Page not found. Unfortunately, the page you're looking for cannot be found.",
                "de" => "Hoppla! Seite nicht gefunden. Leider können wir die von dir gesuchte Seite nicht finden."
            ],
            "site.notfound.back" => [
                "hu" => "Vissza a főoldalra",
                "en" => "Back to main page",
                "de" => "Zurück zur Hauptseite"
            ],
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
                "hu" => "Felhasználási feltételekßfelhasznalasi-feltetelek",
                "en" => "Terms of useßterm-of-use",
                "de" => "Nutzungsbedingungenßnutzungsbedingungen"
            ],
            "footer.links.privacy" => [
                "hu" => "Adatvédelmi tájékoztatóßadatvedelmi-tajekoztato",
                "en" => "Privacy noticeßprivacy-notice",
                "de" => "Datenschutzhinweisßdatenschutzhinweis"
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
            ],
            "home.news.title" => [
                "hu" => "Legfrissebb hírek",
                "en" => "Latest news",
                "de" => "Neueste Nachrichten"
            ],
            "home.news.more" => [
                "hu" => "További hírek",
                "en" => "More news",
                "de" => "Weitere Neuigkeiten"
            ],
            "home.events.title" => [
                "hu" => "Események",
                "en" => "Events",
                "de" => "Veranstaltungen"
            ],
            "home.events.more" => [
                "hu" => "További események",
                "en" => "More events",
                "de" => "Weitere Veranstaltungen"
            ],
            "home.foreignnews.title" => [
                "hu" => "Külföldi hírek",
                "en" => "Foreign news",
                "de" => "Ausländische Nachrichten"
            ],
            "home.foreignnews.more" => [
                "hu" => "További külföldi hírek",
                "en" => "More foreign news",
                "de" => "Weitere ausländische Nachrichten"
            ],
            "home.supporters.title" => [
                "hu" => "Támogatóink",
                "en" => "Supporters",
                "de" => "Unsere Unterstützer"
            ],
            "home.partners.title" => [
                "hu" => "Partnereink",
                "en" => "Partners",
                "de" => "Unsere Partner"
            ],
            "news.title" => [
                "hu" => "Hírekßhirek/{type}",
                "en" => "Newsßnews/{type}",
                "de" => "Nachrichtßnachricht/{type}"
            ],
            "news.more" => [
                "hu" => "Elolvasom",
                "en" => "Read it",
                "de" => "Lies es"
            ],
            "news.show" => [
                "hu" => "Hírekßhirek/{type}/{slug}",
                "en" => "Newsßnews/{type}/{slug}",
                "de" => "Nachrichtßnachricht/{type}/{slug}"
            ],
            "foreignnews.title" => [
                "hu" => "Külföldi hírekßkulfoldi-hirek/{type}",
                "en" => "Foreign newsßforeign-news/{type}",
                "de" => "Ausländische Nachrichtenßauslandische-nachrichten/{type}"
            ],
            "foreignnews.more" => [
                "hu" => "Elolvasom",
                "en" => "Read it",
                "de" => "Lies es"
            ],
            "foreignnews.show" => [
                "hu" => "Külföldi hírekßkulfoldi-hirek/{type}/{slug}",
                "en" => "Foreign newsßforeign-news/{type}/{slug}",
                "de" => "Ausländische Nachrichtenßauslandische-nachrichten/{type}/{slug}"
            ],
            "events.title" => [
                "hu" => "Eseményekßesemenyek",
                "en" => "Eventsßevents",
                "de" => "Ereignisseßereignisse"
            ],
            "events.more" => [
                "hu" => "Elolvasom",
                "en" => "Read it",
                "de" => "Lies es"
            ],
            "events.show" => [
                "hu" => "Eseményekßesemenyek/{slug}",
                "en" => "Eventsßevents/{slug}",
                "de" => "Ereignisseßereignisse/{slug}"
            ],
        ];

        foreach ($translations as $key => $values) {
            foreach ($values as $lang => $value) {
                if (strpos($value, "ß") !== false) {
                    $valueParts = explode("ß", $value);

                    Translation::create([
                        "key" => $key,
                        "language" => $lang,
                        "value" => $valueParts[0],
                        "is_link" => 1,
                        "url" => $valueParts[1]
                    ]);
                } else {
                    Translation::create([
                        "key" => $key,
                        "language" => $lang,
                        "value" => $value,
                        "is_link" => 0,
                        "url" => null
                    ]);
                }
            }
        }
    }
}
