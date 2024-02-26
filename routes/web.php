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
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

/**
 *  食事記録用のルーティング
 */
Route::prefix('/meal_records')
    ->middleware(['auth'])
    ->controller(MealRecordController::class)
    ->name('meal_records.')
    ->group(function () {
        Route::get('/', 'index')->name('index'); // 記録一覧
        Route::get('/create', 'create')->name('create'); // 記録フォーム作成
        Route::post('/create_form', 'create_form')->name('create_form'); // 記録フォームの保存
        Route::get('/{id}/add', 'add')->name('add'); // 食品追加に遷移
        Route::post('/{meal_record_id}/{food_id}/add_food', 'add_food')->name('add_food'); // 食品追加
        Route::post('/', 'store')->name('store'); // 記録詳細の保存
        Route::get('/{id}', 'show')->name('show'); // 記録詳細に遷移
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}/form_destroy', 'form_destroy')->name('form_destroy'); // フォームの削除
        Route::delete('/{meal_record_id}/{food_id}/destroy', 'destroy')->name('destroy'); // 詳細画面の食品の削除
    });

// Route::get('meals', [MealRecordController::class, 'index']);

/**
 * 目的別にルート情報を分割する
 */
require __DIR__ . '/auth.php';
