<?php

namespace App\Http\Controllers;

use App\Models\FoodRegistration;
use App\Models\FoodRegistrationMealRecord;
use App\Models\MealRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MealRecordController extends Controller
{
    /**
     * 記録一覧(完了画面)遷移
     */
    public function index()
    {
        $createForm = Auth::user()->meal_records;
        return view('meal_records.index', compact('createForm'));
    }

    /**
     * 記録フォーム作成遷移
     */
    public function create()
    {
        return view('meal_records.create');
    }

    /**
     * 記録フォーム保存
     */
    public function create_form(Request $request)
    {
        $createForm = MealRecord::create([
            'user_id' => Auth::id(),
            'meal_type' => $request->meal_type,
            'meal_time' => $request->meal_time,
        ]);
        // dd($createForm);

        return to_route('meal_records.index');
    }

    /**
     * 食品追加(入力画面)遷移
     */
    public function add($record_id)
    {
        // 記録フォームのID
        $mealRecords = MealRecord::find($record_id);
        // dd($meal_id);
        // ログイン中のユーザーが登録した食品を表示する
        $foods =  Auth::user()->food_registrations;
        // dd($mealRecords, $foods);
        return view('meal_records.add', compact('mealRecords', 'foods'));
    }

    /**
     * 食品追加(入力画面)保存
     */
    public function add_food($meal_record_id, $food_id)
    {
        // FoodRegistrationモデルのid取得
        $food_id = FoodRegistration::find($food_id);
        // if ($food_id == null) {
        //     return 'error';
        // }
        // MealRecordモデルのidとFoodRegistrationモデルのidを紐付けている
        MealRecord::find($meal_record_id)->foodRegistrations()->attach($food_id);
        return back();
    }

    /**
     * 記録詳細(確認画面)保存
     */
    public function store(Request $request)
    {
    }

    /**
     * 記録詳細(確認画面)に遷移
     */
    public function show(Request $request)
    {

        // $food_registration_id = FoodRegistrationMealRecord::get('food_registration_id'); // 中間テーブル: food_registration_idの取得
        // $meal_record_id = FoodRegistrationMealRecord::get('meal_record_id'); // 中間テーブル: meal_record_idの取得
        $mealRecords = MealRecord::findOrFail($request->id);
        // 記録詳細画面のMealRecordIDと紐付ける
        $foods = MealRecord::find($mealRecords->id)->foodRegistrations()->get(); // get(['food_name', 'grams', 'calory'])にしてたため、idを取得できてなかった
        // dd($food_name + $grams + $calory);
        // dd($foods);
        // dd(array_merge_recursive($food_name, $grams, $calory));

        // foreach ($food_records as $food_record) {
        //     dump($food_record);
        // }

        return view('meal_records.show', compact('mealRecords', 'foods'));
    }

    /**
     *
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($food_id)
    {
        // FoodRegistrationモデルのid取得
        $food_id = FoodRegistration::find($food_id);
        // dd($food_id);

        $food_record_id = FoodRegistrationMealRecord::where('food_registration_id', $food_id->id)->value('id');
        $deleteID =  FoodRegistrationMealRecord::find($food_record_id)->delete();
        // dd($deleteID);
        return back();
    }
}
