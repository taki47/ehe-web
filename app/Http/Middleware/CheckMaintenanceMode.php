<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting; // Importáld a szükséges modellt
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next): Response
    {
        // Lekérdezzük a karbantartási mód beállítást
        $maintenanceMode = Setting::where('id', 1)->first();

        // Ha a karbantartási mód be van kapcsolva
        if ($maintenanceMode && $maintenanceMode->value === '2') {
            if (!$request->is('admin/*') && !$request->is('login')) {
                return response()->view('errors.503'); // Karbantartási oldal
            }
        }

        return $next($request); // Folytatjuk a kérést
    }
}

