<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;

class PageController extends Controller
{
    public function getPage($page): View
    {
        return view('pages');
    }
}
