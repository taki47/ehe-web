<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\ImageHelper;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;

class LanguageController extends Controller
{
    protected $imagePath;

    function __construct()
    {
        $this->imagePath = public_path("/images/flags/");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( !Auth::user()->can("language_index") )
            abort(403);

        $languages = Language::all();

        return view("Admin.Languages.index")
            ->with("languages", $languages);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ( !Auth::user()->can("language_create") )
            abort(403);

        return view("Admin.Languages.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLanguageRequest $request)
    {
        // kép feltöltése
        $imageHelper = new ImageHelper($request->file("flag"), $this->imagePath);
        $uploaded = $imageHelper->UploadImage("new");
        
        // adatbázisba rögzítés
        $language = new Language();
        $language->name = $request->name;
        $language->lang_code = $request->lang_code;
        $language->flag = $uploaded;
        $language->save();

        // log
        Helper::log("Language", "CREATE", $language->id, "Létrehozás");

        return redirect()->route("languages.index")->with("success", "A nyelv létrehozása sikerült!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ( !Auth::user()->can("language_edit") )
            abort(403);

        $language = Language::findOrFail($id);

        return view("Admin.Languages.edit")
            ->with("language", $language);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLanguageRequest $request, string $id)
    {
        $language = Language::findOrFail($id);
        $log = [];

        // ha van zászló, feltöltjük
        if ( $request->flag ) {
            $imageHelper = new ImageHelper($request->file("flag"), $this->imagePath);
            $uploaded = $imageHelper->UploadImage("update", $language->flag);

            $log[] = "Kép módosítás: ".$language->flag." -> ".$uploaded;
            $language->flag = $uploaded;
        }

        // ha változott a név
        if ( $language->name != $request->name ) {
            $log[] = "Név: ".$language->name." -> ".$request->name;
            $language->name = $request->name;
        }

        // ha változott a lang_code
        if ( $language->lang_code != $request->lang_code ) {
            $log[] = "Nyelv kód: ".$language->lang_code." -> ".$request->lang_code;
            $language->lang_code = $request->lang_code;
        }

        // ha változott a status
        if ( $language->status != $request->status ) {
            $log[] = "Státusz: ".$language->status." -> ".$request->status;
            $language->status = $request->status;
        }

        if ( !empty($log) ) {
            $language->save();
            Helper::log("Languages", "MODIFY", $id, json_encode($log));
        }

        return redirect()->route("languages.index")->with("success", "A nyelv módosítása sikerült!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ( !Auth::user()->can("language_delete") )
            abort(403);

        $language = Language::findOrFail($id);

        // kép törlése
        $path = public_path()."/images/flags/".$language->flag;
        if ( file_exists($path) ) 
            unlink($path);

        // nyelv törlése
        $language->delete();

        Helper::log("Language", "DELETE", $id, "Törlés");

        return redirect()->route("languages.index")->with("success", "A nyelv törlése sikerült!");
    }

    function translations() {
        if ( !Auth::user()->can("translation_update") )
            abort(403);

        $translations = Translation::all()->groupBy('key');
        $languages = Translation::select('language')->distinct()->pluck('language');

        return view('Admin.Languages.translations', compact('translations', 'languages'));
    }

    function translationsUpdate(Request $request) {
        if ( !Auth::user()->can("translation_update") )
            abort(403);
        
        $data = $request->input('translations');

        foreach ($data as $key => $locales) {
            foreach ($locales as $locale => $value) {
                Translation::updateOrCreate([
                        'key' => $key,
                        'language' => $locale
                    ],
                    ['value' => $value]
                );
            }
        }

        return redirect()->back()->with('success', 'Fordítások módosítása sikerült!');
    }
}
