<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProyectoController;
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

/*Route::get('/', function () {
    return view('auth.login');
});*/

/*Route::get('/empleado', function () {
    return view('empleado.index');
});*/




/*Route::get('/proyecto', function () {
    return view('proyecto.index');
});
Route::get('/proyecto/create', [ProyectoController::class,'create']);*/
Route::resource('proyecto', ProyectoController::class);






/*Route::get('/empleado/create', [EmpleadoController::class,'create']);*/

Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('proyecto', ProyectoController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>true]);//PARA HACER DESAPARECER REGISTER Y RESET PASSWORD

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware'=> 'auth'],function () {
    Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
});