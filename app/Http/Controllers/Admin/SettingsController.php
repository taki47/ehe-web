<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    function index() {
        $settings = Setting::all();

        return view("Admin.Settings.index")
            ->with("settings", $settings);
    }

    function update(Request $request) {
        $settings = Setting::all(); // Lekérdezi az összes beállítást

        foreach ($settings as $db_setting) {
            $id = $db_setting->id; // Az adatbázisból lekérdezett beállítás ID-ja

            // Ellenőrizzük, hogy a kérésben szerepel-e a beállítás neve
            if ($id !== "_token" && $request->has($id)) {
                // Ha van érték, frissítjük a beállítást
                $db_setting->value = $request->input($id);
            } else {
                // Ha nincs érték (pl. checkbox nem volt kipipálva), akkor 0-ra állítjuk
                $db_setting->value = 0;
            }

            $db_setting->save(); // Mentsük el a beállítást
        }

        return redirect()->route("settings.index")->with("success", "A módosítás sikerült!");
    }
}
