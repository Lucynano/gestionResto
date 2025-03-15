<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ROUTE DE TABLE 
/*  URL: '/tables', '/tables/{id}', '/tables/create', ...
    Methode HTTP: get, post, put, delete, ...
    Methode du TableController: index, show, create, store, edit, update, destroy, ...
*/

use App\Http\Controllers\TableController;

/* 
// routes pour un CRUD complet
Route::resource('tables', TableController::class);
*/

// afficher toutes les tables

Route::get('/tables', [TableController::class, 'index'])->name('tables.index');

// afficher une table specifique

Route::get('/tables/{id}', [TableController::class, 'show'])->name('tables.show');

// pour afficher le formulaire de creation d une table 

Route::get('/tables/create', [TableController::class, 'create'])->name('tables.create');

// enregistrer une nouvelle table

Route::post('/tables', [TableController::class, 'store'])->name('tables.store');

// afficher le formulaire d edition d une table

Route::get('/tables/{id}/edit', [TableController::class, 'edit'])->name('tables.edit');

// mettre a jour une table existante 

Route::put('/tables/{id}', [TableController::class, 'update'])->name('tables.update');

// supprimer une table

Route::delete('/tables/{id}', [TableController::class, 'destroy'])->name('tables.destroy');

