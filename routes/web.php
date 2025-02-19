<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (?string $page = '') {
    return new PageController()->getPage($page);
});

Route::get('/{page}', function (?string $page = '') {
    return new PageController()->getPage($page);
});
