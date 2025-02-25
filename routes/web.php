<?php

use App\Livewire\PageContents;
use Illuminate\Support\Facades\Route;

Route::get('/', PageContents::class);
Route::get('/{name}', PageContents::class);
