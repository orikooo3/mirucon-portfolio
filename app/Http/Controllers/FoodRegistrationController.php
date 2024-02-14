<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodRegistration;

class FoodRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods =  FoodRegistration::all();
        // dd($foods);
        return view('food_registrations.index', compact('foods'));
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
        // dd($request, $request->food_name);
        FoodRegistration::create([
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
