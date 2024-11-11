<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use Carbon\Carbon;
use App\ImageHelper;
use App\Models\Partner;
use App\Models\PartnerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type, Request $request)
    {
        if ( !Auth::user()->can($type."_index") )
            abort(403);

        $partnerType = PartnerType::where("name", $type)->first();

        $query = Partner::where("partner_type_id", $partnerType->id);

        // Keresés a cím és a leírás alapján
        if ($request->has('search') && $request->input('search') != '') {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }
    
        // Keresés a státusz szerint
        if ($request->has('status') && $request->input('status') != '') {
            $query->where('status', $request->input('status'));
        }
    
        // Rendezés
        $sortField = $request->input('sort', 'created_at'); // alapértelmezett rendezési mező
        $sortDirection = $request->input('direction', 'asc'); // alapértelmezett irány

        $partners = $query->orderBy($sortField, $sortDirection)->get();
        
        return view("Admin.Partner.index", compact("partners", "partnerType", "type"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($type)
    {
        if ( !Auth::user()->can($type."_create") )
            abort(403);

        $partnerType = PartnerType::where("name", $type)->first();

        return view("Admin.Partner.create", compact("partnerType", "type"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($type, StorePartnerRequest $request)
    {
        $partnerType = PartnerType::where("name", $type)->first();

        $datePath = now()->format('Y/m/d');
        $path = "/uploads/".$datePath;

        try {
            // Begin a database transaction
            DB::beginTransaction();

            // kép feltöltése
            $imageHelper = new ImageHelper($request->image, $path);
            $uploaded = $imageHelper->UploadImage("new");

            // Insert data into the banners table
            $partnerId = DB::table('partners')->insertGetId([
                'name' => $request->name,
                'partner_type_id' => $partnerType->id,
                'image_path' => $path,
                'image' => $uploaded,
                'link' => $request->link,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);

            // Log the creation of the resource
            Helper::log("Partner", "CREATE", $partnerId, "Létrehozás");

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();
            Log::error('An error occurred while inserting data: ' . $e->getMessage());
            
            // Return an error response to the user or perform additional error handling
            return back()->withErrors('Hiba történt adatbázis művelet során! Részletek a laravel.log fájlban')->withInput();
        }

        return redirect()->route("partner.index", $type)->with("success", "A ".$partnerType->readable." felvétele sikerült!");
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
    public function edit($type, $id)
    {
        if ( !Auth::user()->can($type."_edit") )
            abort(403);

        $partnerType = PartnerType::where("name", $type)->first();
        $partner = Partner::findOrFail($id);

        return view("Admin.Partner.edit", compact("partnerType", "partner", "type"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($type, UpdatePartnerRequest $request, string $id)
    {
        $partnerType = PartnerType::where("name", $type)->first();
        $partner = Partner::findOrFail($id);
        $log = [];
        $datePath = now()->format('Y/m/d');
        $path = "/uploads/".$datePath;

        // ha van kép, feltöltjük
        if ( $request->image ) {
            $imageHelper = new ImageHelper($request->file("image"), $path);
            
            $uploaded = $imageHelper->UploadImage("update", false, [], $partner->image);

            $log[] = "Kép módosítás: ".$partner->image." -> ".$uploaded;
            $partner->image = $uploaded;
        }

        // ha változott a név
        if ( $partner->name != $request->name ) {
            $log[] = "Név: ".$partner->name." -> ".$request->name;
            $partner->name = $request->name;
        }

        // ha változott a link
        if ( $partner->link != $request->link ) {
            $log[] = "Link: ".$partner->link." -> ".$request->link;
            $partner->link = $request->link;
        }

        // ha változott a status
        if ( $partner->status != $request->status ) {
            $log[] = "Státusz: ".$partner->status." -> ".$request->status;
            $partner->status = $request->status;
        }

        if ( !empty($log) ) {
            $partner->updated_by = Auth::user()->id;
            $partner->save();
            Helper::log("Partner", "MODIFY", $id, json_encode($log));
        }

        return redirect()->route("partner.index", $type)->with("success", "A ".$partnerType->readable." módosítása sikerült!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($type, $id)
    {
        if ( !Auth::user()->can($type."_edit") )
            abort(403);

        $partnerType = PartnerType::where("name", $type)->first();
        $partner = Partner::findOrFail($id);

        // kép törlése
        $path = public_path().$partner->image_path."/".$partner->image;
        if ( file_exists($path) ) 
            unlink($path);

        // partner törlése
        $partner->delete();

        Helper::log("Partner", "DELETE", $id, "Törlés");

        return redirect()->route("partner.index", $type)->with("success", "A ".$partnerType->readable." törlése sikerült!");
    }
}
