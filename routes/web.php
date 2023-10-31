<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

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

    App\Models\Tenant::all()->runForEach(function () {
        App\Models\User::factory()->create();
    });

    return view('welcome');
});


Route::get('/post', [PostController::class, 'index']);
Route::get('/post-2', [PostController::class, 'index2']);
Route::get('/sendmail', [PostController::class, 'sendMail']);
