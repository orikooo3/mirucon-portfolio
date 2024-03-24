<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodRegistration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FoodRegistrationController extends Controller
{
    /**
     * ログインユーザーのみのデータを返す
     */
    public function index()
    {
        // $foods = Auth::user()->food_registrations()->paginate(5) //エラーになるコード

        $user =  User::with('food_registrations')->find(Auth::id());
        $foods = $user->food_registrations()->latest()->paginate(5);
        // dd($foods);
        return view('food_registrations.index', ['foods' => $foods]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('food_registrations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // var_dump($request->all());
        // $user = Auth::user();
        // $id = Auth::id();
        // dd($request, $request->food_name);
        /**
         * $requestの中身は<form>の中でname属性と紐付いているvalue属性の値が送信される
         * 例: name=food_name value="ご飯"　がリクエストされる
         * できるだけnameはカラム名と合わせるとわかりやすい
         * 'calorie' => $request->grams,は左がのkeyがカラム名になっていて、右の値が$requestで取得した値。これでもエラーにならないで値が
         * key(カラム)と紐ついてしまう
         */
        $food = FoodRegistration::create([
            'user_id' => Auth::id(),
            'food_name' => $request->food_name,
            'grams' => $request->grams,
            'calorie' => $request->calorie,
            'protein' => $request->protein,
            'fat' => $request->fat,
            'carbohydrate' => $request->carbohydrate,
        ]);
        // dd($food);
        return to_route('food_registrations.index');
    }

    /**
     * 指定ユーザーのプロファイルを表示
     */
    public function show(string $id)
    {
        $food = FoodRegistration::find($id);

        return view('food_registrations.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $food = FoodRegistration::find($id);

        return view('food_registrations.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $food = FoodRegistration::find($id);
        $food->food_name = $request->food_name;
        $food->grams = $request->grams;
        $food->calorie = $request->calorie;
        $food->protein = $request->protein;
        $food->fat = $request->fat;
        $food->carbohydrate = $request->carbohydrate;
        $food->save();

        return to_route('food_registrations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $food = FoodRegistration::find($id);
        $food->delete();

        return to_route('food_registrations.index');
    }
}
