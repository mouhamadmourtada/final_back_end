<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
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
use App\Http\Controllers\ChauffeurController;
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


/*===========================
=           users           =
=============================*/
Route::apiResource('/clients', ClientController::class);

Route::apiResource('/chauffeurs',ChauffeurController::class);


/*===========================
=           senegalais           =
=============================*/


Route::apiResource('/senegalais', \App\Http\Controllers\API\SenegalaisController::class);
Route::group([
   'prefix' => 'senegalais',
], function() {
    Route::get('{id}/restore', [\App\Http\Controllers\API\SenegalaisController::class, 'restore']);
    Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\SenegalaisController::class, 'permanentDelete']);
});
/*=====  End of senegalais   ======*/

/*===========================
=           demandeActivations           =
=============================*/

Route::apiResource('/demandeActivations', \App\Http\Controllers\API\DemandeActivationController::class);
Route::group([
   'prefix' => 'demandeActivations',
], function() {
    Route::get('{id}/restore', [\App\Http\Controllers\API\DemandeActivationController::class, 'restore']);
    Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\DemandeActivationController::class, 'permanentDelete']);
});
/*=====  End of demandeActivations   ======*/

/*===========================
=           courses           =
=============================*/

Route::apiResource('/courses', \App\Http\Controllers\API\CourseController::class);
Route::group([
   'prefix' => 'courses',
], function() {
    Route::get('{id}/restore', [\App\Http\Controllers\API\CourseController::class, 'restore']);
    Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\CourseController::class, 'permanentDelete']);
});
/*=====  End of courses   ======*/

/*===========================
=           alerts           =
=============================*/

Route::apiResource('/alerts', \App\Http\Controllers\API\AlertController::class);
Route::group([
   'prefix' => 'alerts',
], function() {
    Route::get('{id}/restore', [\App\Http\Controllers\API\AlertController::class, 'restore']);
    Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\AlertController::class, 'permanentDelete']);
});
/*=====  End of alerts   ======*/

/*===========================
=           notes           =
=============================*/

Route::apiResource('/notes', \App\Http\Controllers\API\NoteController::class);
Route::group([
   'prefix' => 'notes',
], function() {
    Route::get('{id}/restore', [\App\Http\Controllers\API\NoteController::class, 'restore']);
    Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\NoteController::class, 'permanentDelete']);
});
/*=====  End of notes   ======*/

/*===========================
=           course_clients           =
=============================*/

Route::apiResource('/course_clients', \App\Http\Controllers\API\Course_clientController::class);
Route::group([
   'prefix' => 'course_clients',
], function() {
    Route::get('{id}/restore', [\App\Http\Controllers\API\Course_clientController::class, 'restore']);
    Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\Course_clientController::class, 'permanentDelete']);
});
/*=====  End of course_clients   ======*/

/*===========================
=           chauffeurs           =
=============================*/

Route::apiResource('/chauffeurs', \App\Http\Controllers\API\ChauffeurController::class);

/*=====  End of chauffeurs   ======*/
