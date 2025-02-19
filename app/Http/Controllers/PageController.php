<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;

class PageController extends Controller
{
    public function getPage($page): View
    {
        $pages = Config::get('pages');

        if (isset($pages[$page])) {
            $pageContent = $pages[$page];
        } else {
            abort(404);
        }

        return view('pages', $pageContent);
    }
}
