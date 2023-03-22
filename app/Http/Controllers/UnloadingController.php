<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnloadingController extends Controller
{
    public function index()
    {
        $title = "Bongkar Muat";
        return view('pages.unloading.list', compact('title'));
    }

}
