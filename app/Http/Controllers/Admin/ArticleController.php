<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use Carbon\Carbon;
use App\ImageHelper;
use App\Models\Menu;
use App\Models\Media;
use App\Models\Article;
use App\Models\Language;
use App\Models\ArticleType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ArticleStatus;
use App\Models\ArticleRevision;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\MediaUsage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type, Request $request)
    {
        if (!Helper::userCanAccess($type.'_index_') && !Auth::user()->can("any_".$type."_index"))
            abort(403);

        $articleType = ArticleType::where("slug", $type)->first();
        $query = Article::with("language", "status")->where("article_type_id", $articleType->id);
        
        // Keresés a cím és a leírás alapján
        if ($request->has('search') && $request->input('search') != '') {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('lead', 'like', '%' . $search . '%');
            });
        }
        
        // Keresés a nyelv szerint
        if ($request->has('language_id') && $request->input('language_id') != '') {
            $query->where('language_id', $request->input('language_id'));
        }

        // Keresés a csoport szerint
        if ($request->has('menu_id') && $request->input('menu_id') != '') {
            $query->where('menu_id', $request->input('menu_id'));
        }
    
        // Keresés a státusz szerint
        if ($request->has('status') && $request->input('status') != '') {
            $query->where('article_status_id', $request->input('status'));
        }
    
        // Rendezés
        $sortField = $request->input('sort', 'created_at'); // alapértelmezett rendezési mező
        $sortDirection = $request->input('direction', 'asc'); // alapértelmezett irány


        // csoportok listához menük lekérése
        $menuIds = Helper::getAccessibleMenusForUser($type, "index");
        
        if ( !empty($menuIds) ) {
            $menus = Menu::whereNull('parent_id')
                            ->whereIn("id", $menuIds)
                            ->with("language")
                            ->orderBy('order')
                            ->get();
        } else {
            $menus = Menu::whereNull('parent_id')
                        ->orderBy('order')
                        ->with("language")
                        ->get();
        }

        // jogosultság szerinti szűrés
        if ( !empty($menuIds) )
            $query->whereIn("menu_id", $menuIds);

        // Ha a státusz piszkozat, csak a saját cikkeket mutatja
        $query->where(function($q) {
            $q->where('article_status_id', '!=', 1)
                ->orWhere(function($q2) {
                    $q2->where('article_status_id', 1)
                       ->where('created_by', '=', Auth::user()->id);
                });
        });

        $articles = $query->orderBy($sortField, $sortDirection)->paginate(50);

        // státuszok lekérése
        $statuses = ArticleStatus::all();

        return view("Admin.Article.index", compact("articles", "statuses", "type", "menus", "articleType"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($type)
    {
        $articleType = ArticleType::where("slug", $type)->first();

        // csoportok listához menük lekérése
        $menuIds = Helper::getAccessibleMenusForUser($type, "create");
        
        if ( !empty($menuIds) ) {
            $menus = Menu::whereNull('parent_id')
                            ->whereIn("id", $menuIds)
                            ->with("language")
                            ->orderBy('order')
                            ->get();
        } else {
            $menus = Menu::whereNull('parent_id')
                        ->orderBy('order')
                        ->with("language")
                        ->get();
        }

        $medias = Media::where("status", 1)->get();

        return view("Admin.Article.create", compact("articleType", "menus", "type", "medias"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request, $type)
    {
        $articleType = ArticleType::where("slug", $type)->first();

        // kép feltöltése
        $coverPath = "";
        $uploaded = "";
        if ( $request->cover ) {
            $datePath = now()->format('Y/m/d');
            $coverPath = $articleType->cover_path."/".$datePath;
            $imageHelper = new ImageHelper($request->cover, $coverPath);
            $uploaded = $imageHelper->UploadImage("new", false);
        }

        try {
            // Begin a database transaction
            DB::beginTransaction();

            // Insert data into the banners table
            $articleId = DB::table('articles')->insertGetId([
                'article_type_id' => $articleType->id,
                'language_id' => $request->language,
                'menu_id' => $request->menu_id,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'cover_path' => $coverPath,
                'cover' => $uploaded,
                'lead' => $request->lead,
                'body' => $request->body,
                'event_start_date' => $request->event_start_date,
                'event_end_date' => $request->event_end_date,
                'event_location' => $request->event_location,
                'article_status_id' => ($request->savetype=="draft" ? 1 : 2),
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);

            // insert media
            $this->setMedia($request, "article", $articleId);

            // Log the creation
            Helper::log($type, "CREATE", $articleId, "Létrehozás");

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();
            Log::error('An error occurred while inserting data: ' . $e->getMessage());
            
            // Return an error response to the user or perform additional error handling
            return back()->withErrors('Hiba történt adatbázis művelet során! Részletek a laravel.log fájlban')->withInput();
        }

        return redirect()->route("article.index", $type)->with("success", "A ".$articleType->name." létrehozása sikerült!");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $type, $operation, string $id)
    {
        $article = null;
        $revision = false;
        $mediaContentType = "article";
        if ( $request->has("revision") && $request->revision ) {
            $revision = true;
            $mediaContentType = "article_revision";
        }

        if ( $revision ) {
            $article = ArticleRevision::findOrFail($id);
        } else {
            $article = Article::findOrFail($id);
        }

        if (!Helper::userCanAccess( $type.'_'.$operation.'_'.$article->menu->id) && !Auth::user()->can("any_".$type."_".$operation))
            abort(403);

        $articleType = ArticleType::where("slug", $type)->first();

        // csoportok listához menük lekérése
        $menuIds = Helper::getAccessibleMenusForUser($type, "edit");
        
        if ( !empty($menuIds) ) {
            $menus = Menu::whereNull('parent_id')
                            ->whereIn("id", $menuIds)
                            ->with("language")
                            ->orderBy('order')
                            ->get();
        } else {
            $menus = Menu::whereNull('parent_id')
                        ->orderBy('order')
                        ->with("language")
                        ->get();
        }

        if ( $operation=="edit" ) {
            $editSettings = [
                "title" => $article->title . " módosítása",
                "approval" => false
            ];
        } else {
            $editSettings = [
                "title" => $article->title . " jóváhagyása",
                "approval" => true
            ];
        }

        $medias = Media::where("status", 1)->get();

        $useMedias = MediaUsage::where("content_type", $mediaContentType)->where("content_id", $article->id)->pluck("media_id")->toArray();

        return view("Admin.Article.editOrApproval", compact("article", "articleType", "menus", "type", "editSettings", "revision", "medias", "useMedias"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, $type, string $id)
    {
        $revision = false;
        if ( $request->has("revision") && $request->revision )
            $revision = true;

        $articleType = ArticleType::where("slug", $type)->first();
        $mediaContentType = "";
        
        if ( $revision ) {
            $article = ArticleRevision::findOrFail($id);
            $mediaContentType = "article_revision";
        } else {
            $article = Article::findOrFail($id);
            $mediaContentType = "article";
        }

        $log = [];
        $updateData = [];


        try {
            // Begin a database transaction
            DB::beginTransaction();

            // új kép feltöltése ha van
            $coverPath = "";
            $uploadedImage = "";
            if ( $request->cover ) {
                // kép feltöltése
                $datePath = now()->format('Y/m/d');
                $coverPath = $articleType->cover_path."/".$datePath;

                $imageHelper = new ImageHelper($request->cover, $coverPath);
                $uploadedImage = $imageHelper->UploadImage("upload", false, [], "");

                $updateData["cover_path"] = $coverPath;
                $updateData["cover"] = $uploadedImage;
                $log[] = "Nyitókép: ".$article->cover." -> ".$uploadedImage;
            }

            // cím módosítása
            if ( $request->title != $article->title ) {
                $log[] = "Cím: ".$article->title . " -> ".$request->title;
                $updateData["title"] = $request->title;
            }

            // leírás módosítása
            if ( $request->lead != $article->lead ) {
                $log[] = "Leírás: ".$article->lead . " -> ".$request->lead;
                $updateData["lead"] = $request->lead;
            }

            // törzs módosítása
            if ( $request->body != $article->body ) {
                $log[] = "Törzs: ".$article->body . " -> ".$request->body;
                $updateData["body"] = $request->body;
            }

            // esemény kezdő dátum módosítása
            if ( $request->has("event_start_date") && $request->event_start_date != $article->event_start_date ) {
                $log[] = "Esemény kezdő dátuma: ".$article->event_start_date . " -> ".$request->event_start_date;
                $updateData["event_start_date"] = $request->event_start_date;
            }

            // esemény befejezés dátum módosítása
            if ( $request->has("event_end_date") && $request->event_end_date != $article->event_end_date ) {
                $log[] = "Esemény befejező dátuma: ".$article->event_end_date . " -> ".$request->event_end_date;
                $updateData["event_end_date"] = $request->event_end_date;
            }

            // esemény helyszín módosítása
            if ( $request->has("event_location") && $request->event_location != $article->event_location ) {
                $log[] = "Esemény helyszín: ".$article->event_location . " -> ".$request->event_location;
                $updateData["event_location"] = $request->event_location;
            }

            // nyelv módosítása
            if ( $request->language != $article->language_id ) {
                $log[] = "Nyelv: ".Helper::get_name_from_id(Language::class, $article->language_id) . " -> ".Helper::get_name_from_id(Language::class, $request->language);
                $updateData["language_id"] = $request->language;
            }

            // csoport módosítása
            if ( $request->menu_id != $article->menu_id ) {
                $log[] = "Csoport: ".Helper::get_name_from_id(Menu::class, $article->menu_id) . " -> ".Helper::get_name_from_id(Menu::class, $request->menu_id);
                $updateData["menu_id"] = $request->menu_id;
            }

            // történt média módosítás?
            $tmp_log = $this->hasMediaChange($request, $mediaContentType);
            if ( !empty($tmp_log) )
                $log = array_merge($log, $tmp_log);

            /**
             * ha az articles táblában piszkozat, vagy jóváhagyásra vár státuszú,
             * és a módosítást piszkozatként küldte be, akkor logba nem írunk,
             * a státusz visszakerül piszkozat státuszba, és az articles táblába módosítjuk le
             */
            if ( $request->savetype=="draft" && ($article->article_status_id==1 || $article->article_status_id==2) && !empty($log) ) {
                $updateData["article_status_id"] = 1;
                $table = "articles";
                if ( $revision ) {
                    $table = "article_revisions";
                    $updateData["log"] = json_decode($article->log);
                    $updateData["log"] = array_merge($updateData["log"], $log);
                    $updateData["log"] = json_encode($updateData["log"]);
                }
                DB::table($table)->where('id', $id)->update($updateData);

                // média módosítása
                $this->setMedia($request, $mediaContentType, $article->id);
            }

            /**
             * ha az articles táblában piszkozat, és jóváhagyásra küldte be,
             * az articles táblában módosítjuk, log-ba nem írunk
             */
            if ( $request->savetype=="save" && ($article->article_status_id==1 || $article->article_status_id==2) ) {
                $updateData["article_status_id"] = 2;
                $table = "articles";
                if ( $revision ) {
                    $table = "article_revisions";
                    $updateData["log"] = json_decode($article->log);
                    $updateData["log"] = array_merge($updateData["log"], $log);
                    $updateData["log"] = json_encode($updateData["log"]);
                }
                DB::table($table)->where('id', $id)->update($updateData);

                // média módosítása
                $this->setMedia($request, $mediaContentType, $article->id);
            }

            /**
             * ha az articles táblában aktív (jóváhagyott), és módosít,
             * legyen az piszkozat, vagy beküldés jóváhagyásra, az article_revisions
             * táblába írjuk be.
             */
            if ( $article->article_status_id==3 && !empty($log) ) {
                // Insert data
                $articleId = DB::table('article_revisions')->insertGetId([
                    'article_id' => $id,
                    'language_id' => $request->language,
                    'menu_id' => $request->menu_id,
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'cover_path' => ($coverPath ? $coverPath : $article->cover_path),
                    'cover' => ($uploadedImage ? $uploadedImage : $article->cover),
                    'lead' => $request->lead,
                    'body' => $request->body,
                    'event_start_date' => ($request->has("event_start_date") ? $request->event_start_date : null),
                    'event_end_date' => ($request->has("event_end_date") ? $request->event_end_date : null),
                    'event_location' => ($request->has("event_location") ? $request->event_location : null),
                    'created_by' => Auth::user()->id,
                    'created_at' => Carbon::now(),
                    'article_status_id' => ($request->savetype=="draft" ? 1 : 2),
                    'log' => json_encode($log)
                ]);

                // média módosítása
                $this->setMedia($request, "article_revision", $articleId);
            }

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();
            Log::error('An error occurred while inserting data: ' . $e->getMessage());
            
            // Return an error response to the user or perform additional error handling
            return back()->withErrors('Hiba történt adatbázis művelet során! Részletek a laravel.log fájlban')->withInput();
        }

        if ( !empty($log) ) {
            return redirect()->route("article.index", $type)->with("success", "A ".$articleType->name." módosítva, <strong>beküldve jóváhagyásra</strong>");
        } else {
            return redirect()->route("article.index", $type)->with("success", "Nem történt módosítás");
        }
    }

    private function hasMediaChange($request, $mediaContentType) {
        $log = [];
        if ($request->media != "" && $request->media != "[]") {
            // Új médiaelemek dekódolása JSON formátumból
            $newMedias = json_decode($request->media);
            
            // Meglévő médiaelemek lekérdezése a MediaUsage táblából
            $existingMedias = MediaUsage::where("content_type", $mediaContentType)->pluck('media_id')->toArray();

            // Hozzáadandó elemek meghatározása (amelyek az új tömbben vannak, de a meglévőben nem)
            $toAdd = array_diff($newMedias, $existingMedias);
            
            // Eltávolítandó elemek meghatározása (amelyek a meglévőben vannak, de az új tömbben nem)
            $toRemove = array_diff($existingMedias, $newMedias);

            // Új médiaelemek hozzáadása
            foreach ($toAdd as $mediaId) {
                $m = Media::find($mediaId);
                $log[] = "Média hozzáadása: ".$m->name;
            }

            // Régi médiaelemek eltávolítása
            foreach ($toRemove as $mediaId) {
                $m = Media::find($mediaId);
                $log[] = "Média törlése: ".$m->name;
            }
        }

        return $log;
    }

    private function setMedia(Request $request, $mediaContentType, $articleId) {
        // Ellenőrzi, hogy a média mező nem üres
        if ($request->media != "" && $request->media != "[]") {
            // Új médiaelemek dekódolása JSON formátumból
            $newMedias = json_decode($request->media);
            
            // Meglévő médiaelemek lekérdezése a MediaUsage táblából
            $existingMedias = MediaUsage::where("content_type", $mediaContentType)->pluck('media_id')->toArray();

            // Hozzáadandó elemek meghatározása (amelyek az új tömbben vannak, de a meglévőben nem)
            $toAdd = array_diff($newMedias, $existingMedias);
            
            // Eltávolítandó elemek meghatározása (amelyek a meglévőben vannak, de az új tömbben nem)
            $toRemove = array_diff($existingMedias, $newMedias);

            // Új médiaelemek hozzáadása
            foreach ($toAdd as $mediaId) {
                $m = Media::find($mediaId);
                $log[] = "Média hozzáadása: ".$m->name;

                MediaUsage::create([
                    'media_type' => $m->type,
                    'media_id' => $mediaId,
                    'content_type' => $mediaContentType,
                    'content_id' => $articleId
                ]);
            }

            // Régi médiaelemek eltávolítása
            foreach ($toRemove as $mediaId) {
                $m = Media::find($mediaId);
                $log[] = "Média törlése: ".$m->name;

                MediaUsage::where('content_type', $mediaContentType)
                        ->where('media_id', $mediaId)
                        ->delete();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function approval(Request $request, $type, $id) {
        $operation = $request->operation; //accept v. decline v. rollback
        $revision = $request->revision; //true v. false

        $article = null;
        if ( $revision ) {
            $article = ArticleRevision::findOrFail($id);
        } else {
            $article = Article::findOrFail($id);
        }

        if (!Helper::userCanAccess( $type.'_approval_'.$article->menu->id) && !Auth::user()->can("any_".$type."_approval"))
            abort(403);

        // ha új article jóváhagyás, a státuszát átírjuk aktívra(3) vagy Elutasított(6) az articles táblában, logba beírjuk a jóváhagyást
        if ( $operation=="accept" ) {
            $article->article_status_id = 3;
            $article->save();

            /**
             * ha revision, akkor az article_revisions táblából adatok átmásolása articles táblába, log-ba beírás
             * media_usages táblában adatok szinkronizálása, ahol content_type==article_revision
             */
            if ( $revision ) {
                try {
                    // Begin a database transaction
                    DB::beginTransaction();

                    // media_usages táblában szinkronizálás
                    $revisionMediaUsages = MediaUsage::where("content_type", "article_revision")->where("content_id", $article->id)->get();
                    $articleMediaUsages = MediaUsage::where("content_type", "article")->where("content_id", $article->article_id)->get();

                    // Új média hozzáadása
                    foreach ($revisionMediaUsages as $revisionUsage) {
                        $exists = $articleMediaUsages->contains(function ($usage) use ($revisionUsage) {
                            return $usage->media_id === $revisionUsage->media_id;
                        });

                        if (!$exists) {
                            MediaUsage::create([
                                "media_type" => $revisionUsage->media_type,
                                "media_id" => $revisionUsage->media_id,
                                "content_type" => "article",
                                "content_id" => $article->article_id
                            ]);
                        }
                    }

                    // Törölt média kezelés
                    foreach ($articleMediaUsages as $articleUsage) {
                        $existsInRevision = $revisionMediaUsages->contains(function ($revisionUsage) use ($articleUsage) {
                            return $revisionUsage->media_id === $articleUsage->media_id;
                        });

                        if (!$existsInRevision) {
                            // Ha a média nem található a revision-ban, töröljük az article-ból
                            $articleUsage->delete();
                        }
                    }

                    // `article_revision` rekordok törlése a szinkronizálás után
                    MediaUsage::where("content_type", "article_revision")
                                ->where("content_id", $article->id)
                                ->delete();

                    $updateData = $article->toArray();
                    $updateData["updated_by"] = $updateData["created_by"];
                    $updateData["updated_at"] = Carbon::parse($updateData["created_at"]);
                    unset($updateData["article_id"]);
                    unset($updateData["created_by"]);
                    unset($updateData["created_at"]);
                    unset($updateData["menu"]);
                    unset($updateData["log"]);
                    unset($updateData["id"]);

                    DB::table("articles")->where('id', $article->article_id)->update($updateData);
                    
                    Helper::log($type, "MODIFY", $article->article_id, json_encode($article->log));

                    // article_revisions táblában státusz jóváhagyott (5)
                    $article->article_status_id="5";
                    $article->save();

                    // Commit the transaction if everything is successful
                    DB::commit();
                } catch (\Exception $e) {
                    // Roll back the transaction in case of an error
                    DB::rollBack();
                    Log::error('An error occurred while inserting data: ' . $e->getMessage());
                    
                    // Return an error response to the user or perform additional error handling
                    return back()->withErrors('Hiba történt adatbázis művelet során! Részletek a laravel.log fájlban')->withInput();
                }
            }

            Helper::log($type, "APPROVED", $id, "Jóváhagyás");
        } else if ( $operation=="decline" ) {
            $article->article_status_id = 6;
            $article->save();
            Helper::log($type, "DECLINED", $id, "Elutasítás");
        } else if ( $operation=="rollback" ) {
            $article->article_status_id = 2;
            $article->save();
            Helper::log($type, "ROLLBACK", $id, "Elutasítás visszavonása");
        }


        return redirect()->route("article.index", $type)->with("success", "A jóváhagyás sikerült");
    }

    function bulkAction(Request $request, $type) {
        $action = $request->action;
        $articleIds = explode(",",$request->article_ids);
        $articleType = ArticleType::where("slug", $type)->first();

        $articles = Article::whereIn('id', $articleIds)->get();
        foreach ($articles as $article) {
            $log = [];
            if ( $action=="0" ) {
                // archiválás
                $log[] = "Archiválás";
                
                Helper::log($type, "ARCHIVE", $article->id, json_encode($log));

                $article->article_status_id = 4; //archív
                $article->save();
            } else if ( $action=="1" ) {
                // újra aktiválás
                $log[] = "Újra aktiválás";
                
                Helper::log($type, "REACTIV", $article->id, json_encode($log));

                $article->article_status_id = 3; //aktív
                $article->save();
            }
        }

        return redirect()->route('article.index', $type)->with('success', 'A '.$articleType->name.' státusza frissítve.');
    }
}
