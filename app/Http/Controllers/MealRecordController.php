<?php

namespace App\Http\Controllers;

use App\Models\FoodRegistration;
use App\Models\MealRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealRecordController extends Controller
{
    /**
     * 記録画面に遷移
     */
    public function index()
    {
        return view('meal_records.index');
    }

    /**
     * 追加画面に遷移(追加)
     */
    public function create()
    {
        $foods =  Auth::user()->food_registrations;

        return view('meal_records.create', ['foods' => $foods]);
    }

    /**
     * 確認画面の完了ボタンをクリックしたときに保存する
     */
    public function store(Request $request)
    {
    }

    /**
     * 追加画面の各食品データの登録ボタンをクリック時に食事確認画面に表示させる
     */
    public function add(Request $request)
    {
        $foodID = $request->input('food_id');
        $foods = FoodRegistration::find($foodID);
        // dd($foods);
        if ($foods) {
            $mealRecord = MealRecord::create([
                'user_id' => Auth::id(),
                'food_name' => $foods->food_name,
                'grams' => $foods->grams,
                'calory' =>  $foods->calory,
            ]);
            // dd($mealRecord);
            return to_route('meal_records.show', ['id' => $mealRecord->id]);
        } else {
            echo "エラー";
        }
    }

    /**
     * 確認画面に遷移
     */
    public function show($id)
    {
        return view('meal_records.show');
    }

    /**
     * 確認画面に遷移(編集)
     */
    public function detail()
    {
        return view('meal_records.detail');
    }

    /**
     * 確認画面に遷移(編集)
     */
    public function edit()
    {
        return view('meal_records.edit');
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
    public function destroy(string $id)
    {
    }
}
