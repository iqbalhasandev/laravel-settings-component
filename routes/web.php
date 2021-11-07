<?php


use App\Http\Controllers\Setting\SettingController;

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
// setting

Route::prefix('settings')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::get('/{setting}/move-up', [SettingController::class, 'move_up'])->name('admin.settings.moveUp');
    Route::get('/{setting}/move-down', [SettingController::class, 'move_down'])->name('admin.settings.moveDown');
    Route::post('/', [SettingController::class, 'store'])->name('admin.settings.store');
    Route::put('/', [SettingController::class, 'update'])->name('admin.settings.update');
    Route::delete('/{setting}/delete', [SettingController::class, 'destroy'])->name('admin.settings.delete');
    Route::get('/{setting}/unset-value', [SettingController::class, 'unsetValue'])->name('admin.settings.unsetValue');
});
