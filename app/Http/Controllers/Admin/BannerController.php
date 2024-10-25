<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use Carbon\Carbon;
use App\Models\Media;
use App\Models\Banner;
use App\Models\MediaUsage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Language;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( !Auth::user()->can("banner_index") )
            abort(403);

        $banners = Banner::with("mediaUsages.media")->get();

        return view("Admin.Banner.index", compact("banners"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ( !Auth::user()->can("banner_create") )
            abort(403);

        $medias = Media::where("type", "image")->where("status", 1)->get();
        $languages = Language::where("status", 1)->get();

        return view("Admin.Banner.create", compact("medias", "languages"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        try {
            // Begin a database transaction
            DB::beginTransaction();

            // Insert data into the banners table
            $bannerId = DB::table('banners')->insertGetId([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'language_id' => $request->language,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);

            // banner-media link
            $mediaUsage = new MediaUsage();
            $mediaUsage->media_type = "image";
            $mediaUsage->media_id = $request->media;
            $mediaUsage->content_type = "banner";
            $mediaUsage->content_id = $bannerId;
            $mediaUsage->save();

            // Log the creation of the resource
            Helper::log("Banner", "CREATE", $bannerId, "Létrehozás");

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();
            Log::error('An error occurred while inserting data: ' . $e->getMessage());
            
            // Return an error response to the user or perform additional error handling
            return back()->withErrors('Hiba történt adatbázis művelet során! Részletek a laravel.log fájlban')->withInput();
        }


        return redirect()->route("banner.index")->with("success", "A banner létrehozása sikerült!");
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
        if ( !Auth::user()->can("banner_edit") )
            abort(403);

        $banner = Banner::with('mediaUsages.media')->findOrFail($id);
        $medias = Media::where("type", "image")->where("status", 1)->get();
        $languages = Language::where("status", 1)->get();

        return view("Admin.Banner.edit", compact("banner", "medias", "languages"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, string $id)
    {
        $banner = Banner::with('mediaUsages.media')->findOrFail($id);

        try {
            // Begin a database transaction
            DB::beginTransaction();

            $log = [];
            $updateData = [];

            // modify banners table
            if ( $banner->title != $request->title ) {
                $log[] = "Cím: ".$banner->title." -> ".$request->title;
                $updateData["title"] = $request->title;
            }

            if ( $banner->description != $request->description ) {
                $log[] = "Leírás: ".$banner->description." -> ".$request->description;
                $updateData["description"] = $request->description;
            }

            if ( $banner->link != $request->link ) {
                $log[] = "Link: ".$banner->link." -> ".$request->link;
                $updateData["link"] = $request->link;
            }

            if ( $banner->language_id != $request->language ) {
                $log[] = "Nyelv: ".Helper::get_name_from_id(Language::class, $banner->language->id)." -> ".Helper::get_name_from_id(Language::class, $request->language);
                $updateData["language_id"] = $request->language;
            }

            if ( $banner->status != $request->status ) {
                $log[] = "Státusz: ".$banner->status." -> ".$request->status;
                $updateData["status"] = $request->status;
            }

            // modify media_usages
            if ( $banner->mediaUsages[0]->media->id != $request->media ) {
                $mediaUsage = $banner->mediaUsages[0];
                $log[] = "Média: " . Helper::get_name_from_id(Media::class, $mediaUsage->media_id) . " -> " . Helper::get_name_from_id(Media::class, $request->media);
                
                $mediaUsage->media_id = $request->media;
                $mediaUsage->save();
            }

            if ( !empty($updateData) ) {
                $updateData["updated_by"] = Auth::user()->id;
                $updateData["updated_at"] = Carbon::now();

                DB::table('banners')->where('id', $id)->update($updateData);
            }
            
            if ( !empty($log) )
                Helper::log("Banner", "MODIFY", $id, json_encode($log));

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();
            Log::error('An error occurred while inserting data: ' . $e->getMessage());
            
            // Return an error response to the user or perform additional error handling
            return back()->withErrors('Hiba történt adatbázis művelet során! Részletek a laravel.log fájlban')->withInput();
        }

        return redirect()->route("banner.index")->with("success", "A banner módosítása sikerült!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ( !Auth::user()->can("banner_delete") )
            abort(403);

        $banner = Banner::findOrFail($id);
        $banner->delete();

        Helper::log("Banner", "DELETE", $id, "Törlés");

        return redirect()->route("banner.index")->with("success", "A banner törlése sikerült!");
    }
}
