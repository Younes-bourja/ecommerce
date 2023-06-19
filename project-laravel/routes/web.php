<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', 'App\Http\Controllers\ProductController@index');

Route::resource('produit', 'App\Http\Controllers\ProductController');
Route::get('search-produit', 'App\Http\Controllers\ProductController@search');

Auth::routes();

Auth::routes(['register'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('nouveau-produit', 'App\Http\Controllers\GestionproductController@show');
Route::resource('gestion-produits','App\Http\Controllers\GestionproductController');
Route::get('edit-prix','App\Http\Controllers\GestionproductController@edit');
Route::resource('commande', 'App\Http\Controllers\CommandesController');
Route::resource('livraison-commandes', 'App\Http\Controllers\LivraisoncommandeController');
Route::resource('archives-commandes', 'App\Http\Controllers\ArchivesController');
Route::resource('commandes-annulee', 'App\Http\Controllers\AnnulerController');
Route::resource('traitement-commandes', 'App\Http\Controllers\TraitementcommandesController');
Route::resource('section', 'App\Http\Controllers\SectionsController');
Route::get('/{page}', 'App\Http\Controllers\AdminController@index');


