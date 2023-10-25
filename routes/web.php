<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollectionsController;
use Yajra\DataTables\Facades\DataTables;


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
// RAFA SURYAPUTRA - 6706223162
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User

});
Route::get('/user', [UserController::class, 'index'])->name('user.daftarPengguna');
Route::get('/userRegistration', [UserController::class, 'create'])->name('user.registrasi');
Route::post('/userStore', [UserController::class, 'store'])->name('user.daftarPengguna');
Route::get('/userView/{user}', [UserController::class, 'show'])->name('user.infoPengguna');

//Koleksi buku
Route::get('/koleksi', [CollectionsController::class, 'index'])->name('koleksi.daftarKoleksi');
Route::get('/koleksiTambah', [CollectionsController::class, 'create'])->name('koleksi.registrasi');
Route::post('/koleksiStore', [CollectionsController::class, 'store'])->name('koleksi.daftarKoleksi');
Route::get('/koleksiView/{collection}', [CollectionsController::class, 'show'])->name('koleksi.infoKoleksi');
Route::get('/users', [UsersController::class, 'index'])->name('user.daftarPengguna');
Route::get('/getAllCollections', [CollectionsController::class, 'getAllCollections'])->name('koleksi.daftarKoleksi');

//require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
