<?php

namespace App\Http\Controllers\Admin;

use App\Models\Log;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    function index() {
        $logs = Log::all();

        return view("Admin.Log.index", compact("logs"));
    }
}
