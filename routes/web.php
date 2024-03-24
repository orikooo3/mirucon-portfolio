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

Route::get('/', function () {
    // if (Auth::user()) {
    //     return route('dashboard');
    // }
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [MealRecordController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/profile')
    ->middleware('auth')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

// Route::resource('food_registration', FoodRegistrationController::class);

/**
 * 食品登録用ルーティング
 * prefix: URLの接頭辞
 * name: 名前付きルートの接頭辞
 * middleware: リクエストが特定の条件を満たしているかどうかを確認する(auth: ログイン済みかどうか確認する、
 * verified: 登録したメールアドレスを確認する)
 * contoroller: コントローラーを定義できる
 * name: 名前付きルート
 * group: ルートをグループ化できる
 *  */
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
        Route::get('/{meal_record_id}/add', 'add')->name('add'); // 食品追加に遷移
        Route::post('/{meal_record_id}/{food_id}/add_food', 'add_food')->name('add_food'); // 食品追加
        Route::get('/{id}', 'show')->name('show'); // 記録詳細に遷移
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{record_id}/record_destroy', 'record_destroy')->name('record_destroy'); // フォームの削除
        Route::delete('/{food_id}/destroy', 'destroy')->name('destroy'); // 詳細画面の食品の削除
    });

// Route::get('meals', [MealRecordController::class, 'index']);


/**
 * 目的別にルート情報を分割する
 */
require __DIR__ . '/auth.php';
