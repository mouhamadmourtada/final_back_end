<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

// Route::controller(TodoController::class)->group(function () {
//     Route::get('todos', 'index');
//     Route::post('todo', 'store');
//     Route::get('todo/{id}', 'show');
//     Route::put('todo/{id}', 'update');
//     Route::delete('todo/{id}', 'destroy');
// });

Route::prefix('todos')->controller(TodoController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');

});
Route::middleware('auth:api')->group(function () {



    /*===========================
        =           etudiants           =
        =============================*/

        // Route::apiResource('/etudiants', \App\Http\Controllers\API\EtudiantController::class);
        // Route::group([
        // 'prefix' => 'etudiants',
        // ], function() {
        //     Route::get('{id}/restore', [\App\Http\Controllers\API\EtudiantController::class, 'restore']);
        //     Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\EtudiantController::class, 'permanentDelete']);
        // });
        /*=====  End of etudiants   ======*/
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


