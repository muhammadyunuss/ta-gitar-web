<?php

use App\Http\Controllers\BillOfMaterialController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ModelProdukController;
use App\Http\Controllers\ProdukGitarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiOrderController;
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

Route::get('/dashboard', function () {
    return view('beranda');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('bahan-baku')->group(function () {
        Route::resource('material', MaterialController::class);
        Route::resource('model-produk', ModelProdukController::class);
        Route::resource('produk-gitar', ProdukGitarController::class);
    });

    Route::prefix('order')->group(function () {
        Route::resource('customer', CustomerController::class);
        Route::resource('transaksi-order', TransaksiOrderController::class);
        Route::prefix('transaksi-order')->group(function () {
            Route::get('create-detail/{id}', [TransaksiOrderController::class, 'createDetail'])->name('transaksi-order.create-detail');
            Route::post('save-detail', [TransaksiOrderController::class, 'storeDetail'])->name('transaksi-order.save-detail');
            Route::get('edit-detail/{id}', [TransaksiOrderController::class, 'editDetail'])->name('transaksi-order.edit-detail');
            Route::put('update-detail/{id}', [TransaksiOrderController::class, 'updateDetail'])->name('transaksi-order.update-detail');
        });
    });

    Route::prefix('produksi')->group(function () {
        Route::resource('bill-of-material', BillOfMaterialController::class);
        Route::prefix('bill-of-material')->group(function () {
            Route::get('create-detail/{id}', [BillOfMaterialController::class, 'createDetail'])->name('bill-of-material.create-detail');
            Route::post('save-detail', [BillOfMaterialController::class, 'storeDetail'])->name('bill-of-material.save-detail');
            Route::get('edit-detail/{id}', [BillOfMaterialController::class, 'editDetail'])->name('bill-of-material.edit-detail');
            Route::put('update-detail/{id}', [BillOfMaterialController::class, 'updateDetail'])->name('bill-of-material.update-detail');
            Route::get('get-ajax-bahan-baku/{id}', [BillOfMaterialController::class, 'getAjaxBahanBaku']);
        });
    });

});



require __DIR__.'/auth.php';
