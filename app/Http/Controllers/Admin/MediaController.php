<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\ImageHelper;
use App\Models\Media;
use App\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\MediaUsage;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    // Fájlok tárolási útvonalai
    protected $audioPath;
    protected $videoPath;
    protected $imagePath;

    // Maximális fájlméretek
    protected $maxImageSize;
    protected $maxAudioSize;
    protected $maxVideoSize;

    public function __construct()
    {
        // Fájlok tárolási útvonalainak inicializálása
        $this->audioPath = "/uploads/audio";
        $this->videoPath = "/uploads/video";
        $this->imagePath = "/uploads/image";

        // Maximális fájlméretek (kbyte)
        $this->maxImageSize = 2048; // 2 MB
        $this->maxAudioSize = 51200; // 50 MB
        $this->maxVideoSize = 51200; // 50 MB
    }

    // Média elemek listázása
    public function index($type)
    {
        if ( $type=="image" && !Auth::user()->can("media_image_index") )
            abort(403);
        if ( $type=="video" && !Auth::user()->can("media_video_index") )
            abort(403);
        if ( $type=="audio" && !Auth::user()->can("media_audio_index") )
            abort(403);

        $media = Media::where("type", $type)->withCount(['mediaUsages as media_usage_count'])->get();

        return view('Admin.Media.index', compact('media', 'type'));
    }

    // Új média elem létrehozásának űrlapja
    public function create($type)
    {
        if ( $type=="image" && !Auth::user()->can("media_image_create") )
            abort(403);
        if ( $type=="video" && !Auth::user()->can("media_video_create") )
            abort(403);
        if ( $type=="audio" && !Auth::user()->can("media_audio_create") )
            abort(403);

        return view('Admin.Media.create', compact('type'));
    }

    // Média elem tárolása
    public function store($type, Request $request)
    {
        if ( $type=="image" && !Auth::user()->can("media_image_create") )
            abort(403);
        if ( $type=="video" && !Auth::user()->can("media_video_create") )
            abort(403);
        if ( $type=="audio" && !Auth::user()->can("media_audio_create") )
            abort(403);

        // Validációs szabályok definiálása
        $rules["name"] = [
            "required",
            Rule::unique('media')->where(function ($query) use ($type) {
                return $query->where('type', $type);
            }),
        ];

        // Fájl típus szerinti validáció
        switch ($type) {
            case "image":
                $rules["file"] = 'required|mimes:jpg,jpeg,png|max:'.$this->maxImageSize;
                break;
            case "video":
                $rules["file"] = 'required|mimes:mp4,avi|max:'.$this->maxVideoSize;
                break;
            case "audio":
                $rules["file"] = 'required|mimes:mp3|max:'.$this->maxAudioSize;
                break;
            default:
                return redirect()->back()->withErrors('Invalid media type.');
        }

        // Kérések validálása
        $request->validate($rules);

        // Fájl feltöltés
        $uploaded = "";
        $file = $request->file('file');
        $datePath = now()->format('Y/m/d');
        $path = "";

        // Fájl mentése a megfelelő könyvtárba
        switch ($type) {
            case "image":
                $path = $this->imagePath . "/" . $datePath;
                $imageHelper = new ImageHelper($file, $path);
                $uploaded = $imageHelper->UploadImage("new");
                break;
            case "audio":
            case "video":
                $path = ($type == "audio") ? $this->audioPath . "/" . $datePath : $this->videoPath . "/" . $datePath;
                $fileHelper = new FileUploadHelper($file, $path);
                $uploaded = $fileHelper->UploadFile("new");
                break;
        }

        // Adatbázisba való bejegyzés
        $media = Media::create([
            'name' => $request->name,
            'file_name' => $uploaded,
            'file_path' => $path,
            'type' => $type,
            'created_by' => Auth::user()->id,
        ]);

        // Művelet naplózása
        Helper::log("Media", "CREATE", $media->id, "Létrehozás");

        // Visszairányítás a média indexhez
        return redirect()->route('media.index', $type)->with('success', 'Media uploaded successfully!');
    }

    // Média elem szerkesztése
    public function edit($type, $id)
    {
        if ( $type=="image" && !Auth::user()->can("media_image_edit") )
            abort(403);
        if ( $type=="video" && !Auth::user()->can("media_video_edit") )
            abort(403);
        if ( $type=="audio" && !Auth::user()->can("media_audio_edit") )
            abort(403);

        $media = Media::where("id", $id)->where("type", $type)->first();
        if (!$media) {
            abort(404);
        }

        return view("Admin.Media.edit", compact('media', 'type'));
    }

    // Média elem frissítése
    public function update($type, Request $request, $id)
    {
        if ( $type=="image" && !Auth::user()->can("media_image_edit") )
            abort(403);
        if ( $type=="video" && !Auth::user()->can("media_video_edit") )
            abort(403);
        if ( $type=="audio" && !Auth::user()->can("media_audio_edit") )
            abort(403);

        // Validációs szabályok definiálása
        $rules["name"] = [
            "required",
            Rule::unique('media')->where(function ($query) use ($type) {
                return $query->where('type', $type);
            })->ignore($id)
        ];

        // Fájl típus szerinti validáció, ha fájl van feltöltve
        if ($request->file) {
            switch ($type) {
                case "image":
                    $rules["file"] = 'required|mimes:jpg,jpeg,png|max:'.$this->maxImageSize;
                    break;
                case "video":
                    $rules["file"] = 'required|mimes:mp4,avi|max:'.$this->maxVideoSize;
                    break;
                case "audio":
                    $rules["file"] = 'required|mimes:mp3|max:'.$this->maxAudioSize;
                    break;
                default:
                    return redirect()->back()->withErrors('Invalid media type.');
            }
        }
        
        // Kérések validálása
        $request->validate($rules);

        // Létező rekord lekérése
        $media = Media::where("id", $id)->where("type", $type)->first();
        if (!$media) {
            abort(404);
        }

        // Módosítások előkészítése
        $log = [];
        if ($media->name != $request->name) {
            $log[] = "Név: ".$media->name. " -> ".$request->name;
            $media->name = $request->name;
        }

        if ($media->status != $request->status) {
            $log[] = "Státusz: ".$media->status. " -> ".$request->status;
            $media->status = $request->status;
        }

        // Fájl feltöltése, ha van
        if ($request->file) {
            $uploaded = "";
            $file = $request->file('file');
            $datePath = now()->format('Y/m/d');
            $path = "";

            // Fájl mentése a megfelelő könyvtárba
            switch ($type) {
                case "image":
                    $path = $this->imagePath . "/" . $datePath;
                    $imageHelper = new ImageHelper($file, $path);
                    $uploaded = $imageHelper->UploadImage("update", false, [], $media->file_path."/".$media->file_name);
                    break;
                case "audio":
                case "video":
                    $path = ($type == "audio") ? $this->audioPath . "/" . $datePath : $this->videoPath . "/" . $datePath;
                    $fileHelper = new FileUploadHelper($file, $path);
                    $uploaded = $fileHelper->UploadFile("update", $media->file_path."/".$media->file_name);
                    break;
            }

            // Fájl név frissítése
            $log[] = "Fájl módosítás: ".$media->file_name. " -> ".$uploaded;
            $media->file_path = $path;
            $media->file_name = $uploaded;
        }

        // Adatbázisba mentés, logolás
        if (!empty($log)) {
            $media->updated_by = Auth::user()->id;
            $media->save();
            Helper::log("Media", "MODIFY", $id, json_encode($log));
        }

        // Visszairányítás a média indexhez
        return redirect()->route("media.index", $type)->with("success", "A média módosítása sikerült!");
    }

    // Média elem törlése
    public function destroy($id)
    {
        if ( $type=="image" && !Auth::user()->can("media_image_delete") )
            abort(403);
        if ( $type=="video" && !Auth::user()->can("media_video_delete") )
            abort(403);
        if ( $type=="audio" && !Auth::user()->can("media_audio_delete") )
            abort(403);
    }
}
