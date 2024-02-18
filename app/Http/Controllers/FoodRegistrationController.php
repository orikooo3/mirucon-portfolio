<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodRegistration;
use Illuminate\Support\Facades\Auth;

class FoodRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods =  Auth::user()->food_registrations;
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
        // $user = Auth::user();
        // $id = Auth::id();
        // dd($request, $request->food_name);
        FoodRegistration::create([
            'user_id' => Auth::id(),
            'food_name' => $request->food_name,
            'grams' => $request->grams,
            'calory' => $request->calory,
            'protein' => $request->protein,
            'fat' => $request->fat,
            'carbohydrate' => $request->carbohydrate,
        ]);

        return to_route('food_registrations.index');
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
        $food->calory = $request->calory;
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
