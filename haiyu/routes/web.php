<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('lp'))->name('top');
