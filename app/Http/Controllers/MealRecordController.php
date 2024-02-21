<?php

namespace App\Http\Controllers;

use App\Models\FoodRegistration;
use App\Models\MealRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MealRecordController extends Controller
{
    /**
     * 記録一覧遷移
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
        dd($createForm);

        return to_route('meal_records.index');
    }

    /**
     * 食品追加遷移
     */
    public function add()
    {
        $foods =  Auth::user()->meal_records;
        // dd($foods);
        return view('meal_records.add', ['foods' => $foods]);
    }

    /**
     * 食品追加保存
     */
    public function add_food($id)
    {
        $foods =  Auth::user()->food_registrations;
        $mealRecord = MealRecord::find();
        $mealRecord->foodregistrations()->attach($id);
        dd($mealRecord);
        return view('meal_records.add', ['foods' => $foods]);
    }

    /**
     * 詳細画面保存
     */
    public function store(Request $request)
    {
    }

    /**
     * 詳細画面に遷移
     */
    public function show($id)
    {
        // Log::debug($id);
        $foods = Auth::user()->food_registrations;
        return view('meal_records.show', compact('foods'));
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
    public function destroy(string $id)
    {
        $food = FoodRegistration::find($id);

        $food->delete();

        return to_route('meal_records.show');
    }
}
