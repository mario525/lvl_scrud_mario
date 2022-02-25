<?php

use App\Http\Controllers\CarroController;
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
/*
Route::get('/cars', function () {
    return view('cars.index');
});

Route::get('cars/create', [CarroController::class], 'create');
*/

// grupo de rutas
Route::prefix('cars')->group(function(){
Route::get('/',[CarroController::class,'index']);
Route::any('store', [CarroController::class,"store"]);
Route::get('edit', [CarroController::class,"edit"]);
Route::post('update',[CarroController::class, 'update']);
Route::get('getBrand', [CarroController::class,"getBrand"]);
Route::get('show', [CarroController::class], 'show');
});



Route::resource('cars','\App\Http\Controllers\CarroController');

//  prueba de ADMIN

 Auth::routes();

 Route::get('/', [App\Http\Controllers\CarroController::class, 'index'])->name('home');

 Route::group(['middleware'=>'auth'], function(){
Route::get('/home', [App\Http\Controllers\CarroController::class, 'index'])->name('home');
 });



