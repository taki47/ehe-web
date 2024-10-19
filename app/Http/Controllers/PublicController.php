<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PublicController extends Controller
{
    function index() : View {
        return view("index");
    }
}
