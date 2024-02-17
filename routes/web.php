<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodRegistrationController;
use App\Http\Controllers\MealRecordController;

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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('food_registration', FoodRegistrationController::class);

/**
 * 食品登録用ルーティング
 * ・prefix: URLの接頭辞
 * ・name: 名前付きルートの接頭辞
 */
Route::prefix('/food_registrations')
    ->middleware(['auth'])
    ->controller(FoodRegistrationController::class)
    ->name('food_registrations.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
        Route::post('/{id}/destroy', 'destroy')->name('destroy');
    });

/**
 *  食事記録用のルーティング
 */
Route::prefix('/meal_records')
    ->middleware(['auth'])
    ->controller(MealRecordController::class)
    ->name('meal_records.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'add')->name('add');
        Route::get('/confirm', 'confirm')->name('confirm');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}', 'update')->name('update');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
        Route::post('/{id}/destroy', 'destroy')->name('destroy');
    });

// Route::get('meals', [MealRecordController::class, 'index']);

/**
 * 目的別にルート情報を分割する
 */
require __DIR__ . '/auth.php';
