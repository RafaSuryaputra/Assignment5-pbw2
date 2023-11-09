<?php

// RAFA SURYAPUTRA - 6706223162
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DetailTransactionController;

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

Route::middleware(['auth', 'verified'])->group(function() {
    // Routing ke dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Routing ke User Controller
    Route::get('/user', [UserController::class, 'index'])->name('showUser');
    Route::get('/userRegistration', [UserController::class, 'create'])->name('registerUser');
    Route::post('/userStore',[UserController::class, 'store']);
    Route::get('/userView/{user}',[UserController::class, 'show']);
    Route::post('/userUpdate', [UserController::class, 'update']);
    
    Route::get('/getAllUsers', [UserController::class,
    'getAllUsers']);
    
    // Routing ke CollectionController
    Route::get('/koleksi',[CollectionController::class, 'index'])->name('showKoleksi');
    Route::get('/koleksiTambah',[CollectionController::class, 'create'])->name('tambahKoleksi');
    Route::post('/koleksiStore',[CollectionController::class, 'store']);
    Route::get('/koleksiView/{collection}',[CollectionController::class, 'show']);
    Route::post('/koleksiUpdate', [CollectionController::class, 'update']);
    
    Route::get('/getAllCollections', [CollectionController::class,
    'getAllCollections']);
    
    // Routing ke TransactionController
    Route::get('/transaksi',[TransactionController::class, 'index'])->name('transaksi');
    Route::get('/transaksiTambah',[TransactionController::class, 'create'])->name('tambahTransaksi');
    Route::post('/transaksiStore',[TransactionController::class, 'store']);
    Route::get('/transaksiView/{transaction}',[TransactionController::class, 'show']);
    
    Route::get('/getAllTransactions', [TransactionController::class,
    'getAllTransactions']);

    // Routing ke DetailTransactionController
    Route::get('/detailTransactionKembalikan/{detailTransactionId}', [DetailTransactionController::class, 'detailTransactionKembalikan']);
    Route::post('/detailTransactionUpdate', [DetailTransactionController::class, 'update']);

    Route::get('/getAllDetailTransactions/{transactionId}', [DetailTransactionController::class, 'getAllDetailTransactions']);
});

require __DIR__.'/auth.php';
