<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DemandesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth', 'verified')->group(function () {
    Route::resource('admin/users', UserController::class);
    Route::get('/admin/clients', [UserController::class, 'getClients'])->name('users.clients.getClients');
    Route::get('/admin/chauffeurs', [UserController::class, 'getChauffeurs'])->name('users.chauffeurs.getChauffeurs');
    Route::get('/admin/demandes', [DemandesController::class, 'index'])->name('demandes.index');
    Route::get('/admin/demandes/{id}', [DemandesController::class, 'show'])->name('demandes.show');
    Route::delete('/admin/demandes/{id}', [DemandesController::class, 'destroy'])->name('demandes.destroy');
    Route::delete('/admin/users/{user}/permanent-delete', [UserController::class, 'permanentDelete'])->name('users.permanent-delete');
});
    
require __DIR__.'/auth.php';
