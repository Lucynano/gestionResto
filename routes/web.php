<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});

// ROUTE 
/*  URL: 'tables', 'menus'
    Methode HTTP: get, post, put, delete, ...
    Methode du TableController: index, show, create, store, edit, update, destroy, ...
*/

use App\Http\Controllers\TableController;

Route::resource('tables', TableController::class); // routes pour un CRUD complet de tables

use App\Http\Controllers\MenuController;

Route::resource('menus', MenuController::class); // routes pour un CRUD complet de menus

use App\Http\Controllers\CommandeController;

Route::resource('commandes', CommandeController::class); // routes pour un CRUD complet de commandes

use App\Http\Controllers\ReserverController;

Route::resource('reservers', ReserverController::class); // routes pour un CRUD complet de reservers


