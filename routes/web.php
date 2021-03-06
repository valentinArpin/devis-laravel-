<?php

use App\Http\Controllers\DevisController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Home Route*/
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
/*Barre de Recherche [AJAX]*/
Route::post('/', [\App\Http\Controllers\HomeController::class, 'search'])->name('home.search');

/*[Admin] Accueil*/
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

/*[Admin] Devis Route*/
Route::get('/devis/create', [\App\Http\Controllers\DevisController::class, 'create'])->name('devis.create');
Route::post('/devis', [\App\Http\Controllers\DevisController::class, 'store'])->name('devis.store');
Route::get('/devis/{devi}', [DevisController::class, 'show'])->name('devis.show');
Route::get('/devis/{devi}/edit', [DevisController::class, 'edit'])->name('devis.edit');
Route::patch('devis/{devi}', [\App\Http\Controllers\DevisController::class, 'update'])->name('devis.update');
Route::delete('devis/{devi}', [\App\Http\Controllers\DevisController::class, 'destroy'])->name('devis.destroy');

/*[Admin] Produits Routes*/
Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
Route::patch('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');
Route::delete('produits/{produit}', [ProduitController::class, 'destroy'])->name('produits.destroy');

