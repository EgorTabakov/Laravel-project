<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoPagesController extends Controller
{
    public function about()
    {
        return view('InfoPages.about');
    }
}
