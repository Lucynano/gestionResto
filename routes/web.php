<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\View;

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

use App\Http\Controllers\RequeteController;

Route::get('/requetes/index', [RequeteController::class, 'index'])->name('requetes.index');

Route::get('/requetes/formListeCli', [RequeteController::class, 'formListeCli'])->name('requetes.formListeCli');

Route::get('/requetes/listeCli', [RequeteController::class, 'listeCli'])->name('requetes.listeCli'); // route pour listeCli

Route::get('/requetes/formAddition', [RequeteController::class, 'formAddition'])->name('requetes.formAddition');

Route::get('/requetes/addition', [RequeteController::class, 'addition'])->name('requetes.addition');

Route::get('/payer/{table_id?}', [RequeteController::class, 'payer'])->name('requetes.payer');

Route::get('/requetes/recetteTotal', [RequeteController::class, 'recetteTotal'])->name('requetes.recetteTotal');

Route::get('/requetes/histogramme', [RequeteController::class, 'histogramme'])->name('requetes.histogramme');

Route::get('/requetes/listePlat', [RequeteController::class, 'listePlat'])->name('requetes.listePlat');

// Route::get('/telecharger-pdf', [RequeteController::class, 'telechargerPDF'])->name('telecharger.pdf');

Route::get('/telecharger-pdf', function () {
    $additions = session('additions', []);
    $totalGeneral = session('totalGeneral', 0);
    $validated = session('validated', []);

    // Générer le contenu HTML avec les données
    $html = View::make('requetes.addition-pdf', compact('additions', 'totalGeneral', 'validated'))->render();

    // Créer le PDF
    $pdf = SnappyPdf::loadHTML($html);

    // Télécharger le PDF
    return $pdf->download('addition.pdf');
})->name('telecharger.pdf');







