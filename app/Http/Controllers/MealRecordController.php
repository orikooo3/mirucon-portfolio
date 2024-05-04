<?php

namespace App\Http\Controllers;

use App\Models\FoodRegistration;
use App\Models\FoodRegistrationMealRecord;
use App\Models\MealRecord;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Attributes\Medium;

class MealRecordController extends Controller
{
    public function record(Request $request)
    {

        $date = $request->input('date');

        $user =  User::find(Auth::id());

        $today_record = $user->meal_records()->whereDate('record_date', $date)->get();

        return view('meal_records.index', compact('today_record', 'date'));
    }

    public function dashboard()
    {
        $today = Carbon::today();

        $user =  User::find(Auth::id());

        $today_record = $user->meal_records()->whereDate('record_date', $today)->get();

        return view('dashboard', compact('today_record'));
    }

    public function index()
    {
        $date = Carbon::today()->format('Y-m-d');

        $user =  User::find(Auth::id());

        $today_record = $user->meal_records()->whereDate('record_date', $date)->get();

        return view('meal_records.index', compact('today_record', 'date'));
    }

    public function create($date)
    {
        $date = $date;

        return view('meal_records.create', compact('date'));
    }

    public function create_form(Request $request)
    {
        $createForm = MealRecord::create([
            'user_id' => Auth::id(),
            'record_date' => $request->record_date,
            'meal_type' => $request->meal_type,
            'meal_time' => $request->meal_time,
        ]);
        $date = $request->record_date;
        $user =  User::find(Auth::id());

        $today_record = $user->meal_records()->whereDate('record_date', $date)->get();

        return view('meal_records.index', compact('today_record', 'date'));
    }

    public function add($meal_record_id)
    {
        $mealRecords = MealRecord::find($meal_record_id);
        $foods =  Auth::user()->food_registrations;
        return view('meal_records.add', compact('mealRecords', 'foods'));
    }

    public function add_food($meal_record_id, $food_id)
    {
        $food = FoodRegistration::find($food_id);
        // dd($food->calorie);
        MealRecord::find($meal_record_id)->foodRegistrations()->attach($food_id, ['calorie' => $food->calorie]);

        $meal_calorie = FoodRegistrationMealRecord::where('meal_record_id', $meal_record_id)->sum('calorie');

        // dd($meal_calorie);

        $meal_record_calorie = MealRecord::find($meal_record_id);
        // dd($a->meal_calorie);
        $meal_record_calorie->meal_calorie = $meal_calorie;
        // dd($a);
        $meal_record_calorie->save();
        return back();
    }

    public function show(Request $request)
    {
        $meal_records = MealRecord::findOrFail($request->id);

        $foods = MealRecord::find($meal_records->id)->foodRegistrations()->get(); // get(['food_name', 'grams',
        return view('meal_records.show', compact('meal_records', 'foods'));
    }

    public function update(Request $request, string $id)
    {
        $record = MealRecord::find($id);
        $record->meal_type = $request->meal_type;
        $record->meal_time = $request->meal_time;
        $record->save();

        return to_route('meal_records.index');
    }

    public function record_destroy($record_id)
    {
        MealRecord::find($record_id)->delete();
        return back();
    }

    public function destroy($food_id, $meal_record_id)
    {
        // dd($meal_record_id);
        $food_id = FoodRegistration::find($food_id);
        $food_record_id = FoodRegistrationMealRecord::where('food_registration_id', $food_id->id)->value('id');
        FoodRegistrationMealRecord::find($food_record_id)->delete();

        $meal_calorie = FoodRegistrationMealRecord::where('meal_record_id', $meal_record_id)->sum('calorie');
        // dd($meal_calorie);

        $meal_record_calorie = MealRecord::find($meal_record_id);
        // dd($a->meal_calorie);
        $meal_record_calorie->meal_calorie = $meal_calorie;
        // dd($meal_record_calorie);
        $meal_record_calorie->save();
        return back();
    }
}
