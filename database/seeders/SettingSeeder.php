<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            "Karbantartási mód" => ["type" => "select|site_modes", "value" => 1],
            "Külső hírfolyamok" => ["type" => "boolean", "value" => 1],
            "Partnerek" => ["type" => "boolean", "value" => 1],
            "Felső képsor" => ["type" => "boolean", "value" => 1],
            "Cím" => ["type" => "string", "value" => "6440 Jánoshalma, Eötvös József utca 27."],
            "Telefonszám" => ["type" => "string", "value" => "+36 1 123-4567"],
            "Mobilszám" => ["type" => "string", "value" => "+36 1 123-4567"],
            "E-mail cím" => ["type" => "string", "value" => "info@ehe.hu"],
            "Karbantartás oldal" => ["type" => "tiny", "value" => "
                <h1 style=\"text-align: center;\">A honlap m&eacute;g fejleszt&eacute;s alatt &aacute;ll!</h1>
                <h5 style=\"text-align: center;\">Az Erd&eacute;lyi Hagyom&aacute;nyok&eacute;rt Egyes&uuml;let honlapja m&eacute;g fejleszt&eacute;s alatt &aacute;ll, &iacute;gy k&eacute;rj&uuml;k n&eacute;zz vissza k&eacute;sőbb.</h5>
                <p><br><br><br></p>
                <h5 style=\"text-align: center;\">T&aacute;mogat&oacute;ink:</h5>
                <table style=\"border-collapse: collapse; width: 100%;\" border=\"1\"><colgroup><col style=\"width: 12.4631%;\"><col style=\"width: 12.4631%;\"><col style=\"width: 12.4631%;\"><col style=\"width: 12.4631%;\"><col style=\"width: 12.4631%;\"><col style=\"width: 12.4631%;\"><col style=\"width: 12.4631%;\"><col style=\"width: 12.4631%;\"></colgroup>
                <tbody>
                <tr>
                <td><img class=\"img-fluid\" src=\"https://ehe.hu/ehe_site_ME_logo_szines_HU_440x270.png\" width=\"178\" height=\"109\"></td>
                <td><img class=\"img-fluid\" src=\"https://ehe.hu/ehe_site_bga_alap_logo.png\" width=\"128\" height=\"126\"></td>
                <td><img class=\"img-fluid\" src=\"https://ehe.hu/ehe_site_nca_logo_0.jpg\" width=\"254\" height=\"102\"></td>
                <td><img class=\"img-fluid\" src=\"https://ehe.hu/ehe_site_NEA.png\" width=\"242\" height=\"93\"></td>
                <td><img class=\"img-fluid\" src=\"https://ehe.hu/ehe_site_nka-logo_v2.png\"></td>
                <td><img class=\"img-fluid\" src=\"https://ehe.hu/ehe_site_low_csoori.png\" width=\"115\" height=\"115\"></td>
                <td><img class=\"img-fluid\" src=\"https://ehe.hu/ehe_site_Janoshalma.jpg\" width=\"158\" height=\"224\"></td>
                <td><img class=\"img-fluid\" src=\"https://ehe.hu/ehe_site_kitti_halo.png\"></td>
                </tr>
                </tbody>
                </table>
                <div class=\"logos mt-5\">&nbsp; &nbsp; &nbsp; &nbsp;</div>
                <p style=\"text-align: center;\"><br><br><br></p>
                <div class=\"contact mt-5\">
                <p style=\"text-align: center;\">Addig is, ha b&aacute;rmi k&eacute;rd&eacute;sed mer&uuml;lne fel, keressen minket:</p>
                <p style=\"text-align: center;\"><strong>Erd&eacute;lyi Hagyom&aacute;nyok&eacute;rt Egyes&uuml;let</strong></p>
                <p style=\"text-align: center;\">6440 J&aacute;noshalma, E&ouml;tv&ouml;s J&oacute;zsef utca 27.</p>
                <p style=\"text-align: center;\">Magyarorsz&aacute;g</p>
                <p style=\"text-align: center;\">info [kukac] ehe.hu</p>
                </div>
                <div class=\"downloads mt-5 row\">
                <div class=\"col-12 col-md-4\"><a href=\"https://ehe.hu/2023_eves_programok.pdf\" target=\"_blank\" rel=\"noopener\">2023 &eacute;ves programok</a></div>
                <div class=\"col-12 col-md-4\"><a href=\"https://ehe.hu/alapszabaly_2017_03_04_M.pdf\" target=\"_blank\" rel=\"noopener\">Alapszab&aacute;ly</a></div>
                <div class=\"col-12 col-md-4\"><a href=\"https://ehe.hu/jegyzokonyv_2023_04_15.pdf\" target=\"_blank\" rel=\"noopener\">Jegyzők&ouml;nyv 2023.04.15.</a></div>
                </div>
            "],
            "Header kódok" => ["type" => "string", "value" => ""],
        ];
        
        foreach ($settings as $setting => $data) {
            Setting::create([
                'name' => $setting,
                'type' => $data['type'],
                'value' => $data['value']
            ]);
        }        
    }
}
