<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodRegistrationController;
use App\Http\Controllers\MealRecordController;
use App\Http\Controllers\CalculateModalController;
use Illuminate\Support\Facades\Auth;

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

/** メソッド一覧
 * group: ルートをグループ化できる
 * prefix: URLの接頭辞
 * name: 名前付きルートの接頭辞
 * middleware: リクエストが特定の条件を満たしているかどうかを確認する(auth: ログイン済みかどうか確認する、
 * verified: 登録したメールアドレスを確認する)
 * contoroller: コントローラーを定義できる
 * name: 名前付きルート
 */

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [MealRecordController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/profile')
    ->middleware('auth')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

Route::prefix('/food_registrations')
    ->middleware(['auth'])
    ->controller(FoodRegistrationController::class)
    ->name('food_registrations.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

Route::prefix('/meal_records')
    ->middleware(['auth'])
    ->controller(MealRecordController::class)
    ->name('meal_records.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create/{date}', 'create')->name('create');
        Route::get('/record/{date?}', 'record')->name('record');
        Route::post('/create_form', 'create_form')->name('create_form');
        Route::get('/{meal_record_id}/add', 'add')->name('add');
        Route::post('/{meal_record_id}/{food_id}/add_food', 'add_food')->name('add_food');
        Route::get('/{id}', 'show')->name('show');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{record_id}/record_destroy', 'record_destroy')->name('record_destroy');
        Route::delete('/{food_id}/{meal_record_id}/destroy', 'destroy')->name('destroy');
    });

/**
 * 目的別にルート情報を分割する
 */
require __DIR__ . '/auth.php';
