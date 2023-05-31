<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\IuranController;

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

// Route::get('/', function () {
    // return view('welcome');
// });


// Route::get('/', function () {
    // return view('home');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/register', function () {
    return redirect(route('login'));
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');;

// Route::middleware(['auth', 'admin'])->group(function () {
    // Route::get('admin', function () {
        // return 'admin page';
    // });
// });

Route::group(['middleware' => 'auth'], function () {
	//Penghuni
	Route::get('/Penghuni', [PenghuniController::class, 'index'])->name('Penghuni')->middleware('verified');
	Route::get('/Penghuni/Tambah', [PenghuniController::class, 'create'])->name('create.Penghuni')->middleware('verified');
	Route::post('/Penghuni/Simpan', [PenghuniController::class, 'store'])->name('store.Penghuni')->middleware('verified');
	Route::get('/Penghuni/Humas/{kd_humas}', [PenghuniController::class, 'humas'])->name('humas.Penghuni')->middleware('verified');
	Route::get('/Penghuni/Show/{kd_penghuni}', [PenghuniController::class, 'show'])->name('show.Penghuni')->middleware('verified');
	
	
	//Iuran IPL
	Route::get('/Iuran', [IuranController::class, 'index'])->name('Iuran')->middleware('verified');
	Route::get('/Iuran/Tambah', [IuranController::class, 'create'])->name('create.Iuran')->middleware('verified');
	Route::post('/Iuran/Simpan', [IuranController::class, 'store'])->name('store.Iuran')->middleware('verified');
	Route::get('/Iuran/Edit/{id}', [IuranController::class, 'edit'])->name('edit.Iuran')->middleware('verified');
	Route::get('/Iuran/{id}', [IuranController::class, 'show'])->name('show.Iuran')->middleware('verified');
});

