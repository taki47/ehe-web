<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\ImageHelper;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Language;

class MenuController extends Controller
{
    protected $tilePath;

    function __construct() {
        $this->tilePath = "/images/tiles";
    }

    function index() {
        if (!Helper::userCanAccess('menu_index_') && !Auth::user()->can("any_menu_index"))
            abort(403);

            $menuIds = Helper::getAccessibleMenusForUser("menu","index");
        
        if ( !empty($menuIds) ) {
            $menus = Menu::whereNull('parent_id')
                            ->whereIn("id", $menuIds)
                            ->with('children')
                            ->orderBy('order')
                            ->get();
        } else {
            $menus = Menu::whereNull('parent_id')
                        ->with('children')
                        ->orderBy('order')
                        ->get();
        }

        return view("Admin.Menu.index", compact("menus"));
    }

    public function updateOrder(Request $request)
    {
        if (!Helper::userCanAccess('menu_order_') && !Auth::user()->can("any_menu_order"))
            abort(403);

        $orderData = $request->all();

        $menuItems = $orderData[0] ?? [];

        // Rekurzív függvény a sorrend frissítéséhez
        $this->updateMenuOrder($menuItems);

        return response()->json(["success" => true]);
    }

    /**
     * Rekurzív függvény a menüpontok sorrendjének és szülő elemének frissítésére.
     *
     * @param array $items
     * @param int|null $parentId
     */
    private function updateMenuOrder(array $items, $parentId = null)
    {
        foreach ($items as $order => $item) {
            // Ellenőrizzük, hogy az item rendelkezik-e "id" kulccsal
            if (isset($item['id'])) {
                // Menüpont frissítése az adatbázisban
                Menu::where('id', $item['id'])->update([
                    'parent_id' => $parentId,
                    'order' => $order
                ]);
            }

            // Ha vannak gyerek elemek, rekurzívan frissítjük azokat a jelenlegi elem "id"-jával mint "parent_id"
            if (!empty($item['children'])) {
                $this->updateMenuOrder($item['children'][0], $item['id']);
            }
        }
    }

    public function create()
    {
        if (!Helper::userCanAccess('menu_create_') && !Auth::user()->can("any_menu_create"))
            abort(403);
        
        // Főmenük lekérdezése a szülő kiválasztáshoz
        $menuIds = Helper::getAccessibleMenusForUser("menu", "create");

        if ( !empty($menuIds) ) {
            $menus = Menu::whereNull('parent_id')->whereIn("id",$menuIds)->orderBy('order')->get();
        } else {
            $menus = Menu::whereNull('parent_id')->orderBy('order')->get();
        }

        $languages = Language::all();

        return view('Admin.Menu.create', compact('menus', 'languages'));
    }

    public function store(StoreMenuRequest $request)
    {
        // Új menüpont létrehozása
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->parent_id = $request->parent_id;

        if ( $menu->parent_id==null || $menu->parent_id=="" ) {
            $menu->slug = Str::slug($request->name);
            $imageHelper = new ImageHelper($request->image, $this->tilePath);
            $uploadedImage = $imageHelper->UploadImage("new", true, [60,60]);

            $menu->image = $uploadedImage;
            $menu->description = $request->description;
            $menu->subdescription = $request->subdescription;
            $menu->language_id = $request->language_id;
        }
        $menu->save();

        if ( $menu->parent_id==null || $menu->parent_id=="" ) {
            // jogosultságok létrehozása
            $permissions = [
                "menu" => [
                    "index" => "menüben elemek listázása",
                    "create" => "menüben elemek létrehozása",
                    "edit" => "menüben elemek szerkesztése",
                    "order" => "menüben sorrend módosítása",
                    "delete" => "menüben elemek törlése"
                ],
                "news" => [
                    "index" => "hírek listázása",
                    "create" => "hírek létrehozása",
                    "edit" => "hírek szerkesztése",
                    "approval" => "hírek jóváhagyása",
                    "archive" => "hírek archiválása, újraaktiválása",
                    "delete" => "hírek törlése"
                ],
                "foreign_news" => [
                    "index" => "külföldi hírek listázása",
                    "create" => "külföldi hírek létrehozása",
                    "edit" => "külföldi hírek szerkesztése",
                    "approval" => "külföldi hírek jóváhagyása",
                    "archive" => "külföldi hírek archiválása, újraaktiválása",
                    "delete" => "külföldi hírek törlése"
                ],
                "events" => [
                    "index" => "események listázása",
                    "create" => "események létrehozása",
                    "edit" => "események szerkesztése",
                    "approval" => "események jóváhagyása",
                    "archive" => "események archiválása, újraaktiválása",
                    "delete" => "események törlése"
                ],
                "pages" => [
                    "index" => "oldalak listázása",
                    "create" => "oldalak létrehozása",
                    "edit" => "oldalak szerkesztése",
                    "approval" => "oldalak jóváhagyása",
                    "archive" => "oldalak archiválása, újraaktiválása",
                    "delete" => "oldalak törlése"
                ],
            ];

            // menü kezelés
            foreach ($permissions as $key => $permission) {
                foreach ($permission as $k => $p) {
                    Permission::create([
                        'name' => $key.'_'.$k.'_' . $menu->id,
                        'readable' => $menu->name.' '.$menu->language->lang_code.' '.$p,
                        'guard_name' => 'web'
                    ]);
                }
            }

            Helper::flushPermissionCache();
        }

        Helper::log("Menu", "CREATE", $menu->id, "Létrehozás");

        return redirect()->route('menu.index')->with('success', 'Új menüpont sikeresen hozzáadva.');
    }

    function edit($id)
    {
        $editMenu = Menu::findOrFail($id);
        $topLevelParentId = $editMenu->getTopLevelParentId();

        if (!Auth::user()->can('menu_edit_'.$topLevelParentId) && !Auth::user()->can("any_menu_edit"))
            abort(403);

        // Főmenük lekérdezése a szülő kiválasztáshoz
        $menuIds = Helper::getAccessibleMenusForUser("menu", "create");

        if ( !empty($menuIds) ) {
            $menus = Menu::whereNull('parent_id')->whereIn("id",$menuIds)->orderBy('order')->get();
        } else {
            $menus = Menu::whereNull('parent_id')->orderBy('order')->get();
        }

        $languages = Language::all();

        return view("Admin.Menu.edit", compact("editMenu", "menus", "languages"));
    }

    function update($id, UpdateMenuRequest $request)
    {
        $menu = Menu::findOrFail($id);

        $log = [];
        $updateData = [];

        try {
            // Begin a database transaction
            DB::beginTransaction();

            if ( $menu->name != $request->name ) {
                $log[] = "Név: ".$menu->name." -> ".$request->name;
                $updateData["name"] = $request->name;
                $updateData["slug"] = Str::slug($request->name);
            }

            if ( $menu->link != $request->link ) {
                $log[] = "Link: ".$menu->link." -> ".$request->link;
                $updateData["link"] = $request->link;
            }

            if ( $menu->parent_id != $request->parent_id ) {
                $log[] = "Szülő: ".Helper::get_name_from_id(Menu::class, $menu->parent_id)." -> ".Helper::get_name_from_id(Menu::class, $request->parent_id);
                $updateData["parent_id"] = $request->parent_id;
            }

            if ( $request->image ) {
                $imageHelper = new ImageHelper($request->file("image"), $this->tilePath);
            
                $uploaded = $imageHelper->UploadImage("update", true, [60,60], $menu->image);

                $log[] = "Kép módosítás: ".$menu->image." -> ".$uploaded;
                $menu->image = $uploaded;
                $menu->save();
            }

            if ( $menu->description != $request->description ) {
                $log[] = "Leírás: ".$menu->description." -> ".$request->description;
                $updateData["description"] = $request->description;
            }

            if ( $menu->subdescription != $request->subdescription ) {
                $log[] = "Al-leírás: ".$menu->subdescription." -> ".$request->subdescription;
                $updateData["subdescription"] = $request->subdescription;
            }

            if ( $menu->language_id != $request->language_id ) {
                $log[] = "Nyelv: ".Helper::get_name_from_id(Language::class, $menu->language_id)." -> ".Helper::get_name_from_id(Language::class, $request->language_id);
                $updateData["language_id"] = $request->language_id;
            }

            if ( $menu->status != $request->status ) {
                $log[] = "Státusz: ".$menu->status." -> ".$request->status;
                $updateData["status"] = $request->status;
            }

            if ( !empty($updateData) )
                DB::table('menus')->where('id', $id)->update($updateData);

            if ( !empty($log) )
                Helper::log("Menu", "MODIFY", $id, json_encode($log));

            // Commit the transaction if everything is successful
            DB::commit();
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();
            Log::error('An error occurred while inserting data: ' . $e->getMessage());
            
            // Return an error response to the user or perform additional error handling
            return back()->withErrors('Hiba történt adatbázis művelet során! Részletek a laravel.log fájlban')->withInput();
        }

        return redirect()->route("menu.index")->with("success", "A menü módosítása sikerült!");
    }

    public function destroy($id)
    {
        // Megkeressük a menüpontot
        $menu = Menu::findOrFail($id);

        // Rekurzív törlés a gyerek menüpontokra
        $this->deleteMenuAndChildren($menu);

        // Visszairányítjuk az admin felületre, és egy üzenetet küldünk
        return redirect()->route('menu.index')->with('success', 'A menüpont sikeresen törölve lett.');
    }

    private function deleteMenuAndChildren(Menu $menu)
    {
        // Lekérdezzük a gyerek menüpontokat
        $children = $menu->children;

        // Rekurzívan töröljük a gyerek menüpontokat
        foreach ($children as $child) {
            $this->deleteMenuAndChildren($child); // Rekurzió
        }

        // logolás
        Helper::log("Menu", "DELETE", $menu->id, "Törlés");

        // Töröljük a menüpontot
        $menu->delete();
    }
}
