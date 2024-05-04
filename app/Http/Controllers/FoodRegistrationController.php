<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodRegistration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FoodRegistrationController extends Controller
{

    public function index()
    {
        $user =  User::find(Auth::id());
        $foods = $user->food_registrations()->latest()->paginate(5)->onEachSide(1);
        return view('food_registrations.index', ['foods' => $foods]);
    }

    public function create()
    {
        return view('food_registrations.create');
    }

    public function store(Request $request)
    {
        $food = FoodRegistration::create([
            'user_id' => Auth::id(),
            'food_name' => $request->food_name,
            'grams' => $request->grams,
            'calorie' => $request->calorie,
            'protein' => $request->protein,
            'fat' => $request->fat,
            'carbohydrate' => $request->carbohydrate,
        ]);
        return to_route('food_registrations.index');
    }

    public function show(string $id)
    {
        $food = FoodRegistration::find($id);

        return view('food_registrations.show', compact('food'));
    }

    public function edit(string $id)
    {
        $food = FoodRegistration::find($id);

        return view('food_registrations.edit', compact('food'));
    }

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

    public function destroy(string $id)
    {
        $food = FoodRegistration::find($id);
        $food->delete();

        return to_route('food_registrations.index');
    }
}
