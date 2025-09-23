<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('lp'))->name('top');
Route::get('/top', fn() => view('top'));
