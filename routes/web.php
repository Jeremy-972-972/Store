<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;

// Route::get('/', function () {
//     return view('welcome');
// });
//gestion du dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//gestion des connexions
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//gestion du panier
Route::middleware('auth')->group(function () {
Route::get('/panier',  [PanierController::class, 'index'])->name('panier.lister');
Route::get('/panier/add/{product}',  [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::get('/panier/moins/{panier}',  [PanierController::class, 'moins'])->name('panier.moins');
Route::get('/panier/remove/{panier}',  [PanierController::class, 'remove'])->name('panier.remove');

});

//gestion des favoris
Route::middleware('auth')->group(function () {
Route::get('/favoris',  [FavorisController::class, 'index'])->name('favoris.lister');
Route::get('/favoris/edit/{product}',  [FavorisController::class, 'edit'])->name('favoris.edit');
//Commande
Route::get('/commande',  [CommandeController::class, 'index'])->name('commande.lister');
Route::get('/commande/create/',  [CommandeController::class, 'create'])->name('commande.create');
Route::get('/commande/success/',  [CommandeController::class, 'success'])->name('commande.success');

});
// route commande pour url de stripe non sécurisé
Route::get('/commande/webhook/',  [CommandeController::class, 'webhook'])->name('commande.webhook');

//affichage des produits
Route::get('/',  [ProductController::class, 'index'])->name('home');
Route::get('/product/{product}',  [ProductController::class, 'show'])->name('product.detail');
Route::get('/product/category/{id}',  [ProductController::class, 'productlistBycategory'])->name('product.category');

require __DIR__.'/auth.php';
