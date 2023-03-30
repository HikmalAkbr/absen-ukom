<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;
use App\Http\Middleware\Cek_login;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\jurnalController;
use App\Http\Controllers\Upload2Controller;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\laporanController;

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

Route::get('/', fn() => redirect()->route('login'));

Route::post('logout', function () {
    auth()->logout();
    return redirect('/login');
})->name('logout');

// Route::resource('/mahasiswa', mahasiswaController::class);
Route::get('/upload', [UploadController::class,'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload']);
Route::get('/upload/hapus/{id}', [UploadController::class, 'hapus']);

Route::middleware(['auth:sanctum', 'verified'])->get('/mahasiswa', function () { 
    return view('mahasiswa/index'); 
})->name('dashboard'); 

Route::middleware(['auth'])->group(function(){
    Route::get('/jurnal/index', [jurnalController::class, 'index'])->name('jurnal.index')->middleware('auth', 'can:access-user');
    Route::resource('/jurnal', jurnalController::class);
    Route::match(['get', 'post', 'put'], '/jurnal', [jurnalController::class, 'index']);
    Route::post('/jurnal/create', [jurnalController::class, 'create'])->name('jurnal.create')->middleware('auth');
    Route::post('/jurnal', [jurnalController::class, 'store']);
    Route::get('/jurnal/{id}/edit', [jurnalController::class, 'edit'])->name('jurnal.edit')->middleware('auth');
    Route::put('/jurnal/{id}/edit', [jurnalController::class, 'update'])->name('jurnal.update');
    Route::get('/jurnal/{id}', [jurnalController::class, 'destroy']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/mahasiswa/index', [AbsenController::class, 'index'])->name('mahasiswa.index')->middleware('auth', 'can:access-user');
    Route::resource('/mahasiswa', AbsenController::class);
    Route::post('/mahasiswa/create', [AbsenController::class, 'create'])->name('mahasiswa.create')->middleware('auth');
    Route::post('/mahasiswa', [AbsenController::class, 'store']);
    // Route::get('/mahasiswa/{id_absen}', [AbsenController::class, 'show']);
    Route::get('/mahasiswa/edit/{id_absen}', [AbsenController::class, 'edit'])->middleware('auth');
    Route::put('/mahasiswa/{id_absen}', [AbsenController::class, 'update']);
    Route::delete('/posts/{post}', [AbsenController::class])->middleware('auth', 'email');

    // Route::delete('/mahasiswa/{id_absen}', [AbsenController::class, 'destroy']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/index', [adminController::class, 'index'])->name('admin.index')->middleware('auth','can:access-admin');
    Route::resource('/admin', adminController::class);
    Route::get('/admin/create', [adminController::class, 'create'])->name('admin.create')->middleware('auth');
    Route::post('/admin', [adminController::class, 'store']);
    Route::match(['get', 'post', 'put'], '/admin', [adminController::class, 'index']);
    Route::get('/admin/{id}', [adminController::class, 'show']);
    Route::get('/admin/{id}/edit', [adminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}/edit', [adminController::class, 'update'])->name('admin.update');
    Route::get('/admin/{id}', [adminController::class, 'destroy']);
});
 

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::resource('admin', adminController::class);
    });
    Route::group(['middleware' => ['cek_login:0']], function () {
        Route::resource('mahasiswa', AbsenController::class);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/mahasiswa2/index', [PresensiController::class, 'index'])->name('mahasiswa2.index')->middleware('auth', 'can:access-user2');
    Route::resource('/mahasiswa2', PresensiController::class);
    Route::post('/mahasiswa2/create', [PresensiController::class, 'create'])->name('mahasiswa2.create')->middleware('auth', 'can:access-user2-panel');
    Route::post('/mahasiswa2', [PresensiController::class, 'store']);
    Route::get('/mahasiswa2/{id_absen}', [PresensiController::class, 'show']);
    Route::get('/mahasiswa2/edit/{id_absen}', [PresensiController::class, 'edit'])->middleware('auth');
    Route::put('/mahasiswa2/{id_absen}', [PresensiController::class, 'update']);
    Route::delete('/posts/{post}', [PresensiController::class])->middleware('auth', 'email');

    // Route::delete('/mahasiswa2/{id_absen}', [PresensiController::class, 'destroy']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/laporan/index', [laporanController::class, 'index'])->name('laporan.index')->middleware('auth', 'can:access-user2');
    Route::resource('/laporan', laporanController::class);
    Route::match(['get', 'post', 'put'], '/laporan', [laporanController::class, 'index']);
    Route::post('/laporan/create', [laporanController::class, 'create'])->name('laporan.create')->middleware('auth');
    Route::post('/laporan', [laporanController::class, 'store']);
    Route::get('/laporan/{id}/edit', [laporanController::class, 'edit'])->name('laporan.edit')->middleware('auth');
    Route::put('/laporan/{id}/edit', [laporanController::class, 'update'])->name('laporan.update');
    Route::get('/laporan/{id}', [laporanController::class, 'destroy']);
});

Route::get('/upload2', [Upload2Controller::class,'upload'])->name('upload2');
Route::post('/upload2/proses', [Upload2Controller::class, 'proses_upload']);
Route::get('/upload2/hapus/{id}', [Upload2Controller::class, 'hapus']);