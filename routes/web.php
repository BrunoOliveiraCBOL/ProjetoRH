<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FeriasController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ResetController;
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

Route::resource('funcionarios', FuncionarioController::class);
Route::resource('holerites', FileController::class);
Route::resource('ferias', FeriasController::class);
Route::resource('roles', RoleController::class);


Route::get('holerites/download/{id}', [DownloadController::class, 'download'])
                ->name('download');


Route::get('funcionarios/reset/{id}', [ResetController::class, 'reset'])
                ->name('reset');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
