<?php

namespace App\Http\Controllers;

use App\Models\FoodRegistration;
use App\Models\MealRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealRecordController extends Controller
{
    /**
     * 記録一覧
     */
    public function index()
    {
        $createForm = Auth::user()->meal_records;
        return view('meal_records.index', compact('createForm'));
    }

    /**
     * 記録フォーム作成
     */
    public function create()
    {
        $foods =  Auth::user()->food_registrations;

        return view('meal_records.create', ['foods' => $foods]);
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
     * 食品追加
     */
    public function add()
    {
        $foods =  Auth::user()->food_registrations;

        return view('meal_records.add', ['foods' => $foods]);
    }

    public function add_food()
    {
        $foods =  Auth::user()->food_registrations;

        return view('meal_records.add', ['foods' => $foods]);
    }

    /**
     * 確認画面の完了ボタンをクリックしたときに保存する
     */
    public function store(Request $request)
    {
    }

    /**
     * 確認画面に遷移
     */
    public function show($id)
    {
        $foods = Auth::user()->food_registrations;
        return view('meal_records.show', compact('foods'));
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
        $food = FoodRegistration::find($id);
        dd($food);
        $food->delete();

        return to_route('meal_records.show');
    }
}
