<?php

use App\Http\Controllers\AppController;
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
    return view('auth.login');
});

Route::get('/home', [AppController::class, 'showHomePage'])->middleware(['auth']);
Route::get('/projects', [AppController::class, 'showProjectsPage'])->middleware(['auth']);

require __DIR__ . '/auth.php';
