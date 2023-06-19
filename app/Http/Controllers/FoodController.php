<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $obj = Food::get();
        return view('pages.food.index', compact('obj'));
    }

    public function create(Request $request, $id)
    {
        $update_id = 0;
        $obj = array();

        if ($id > 0) {
            $update_id = $id;
            $obj = Food::where('id', $update_id)->first();
        }
        return view('pages.food.create', get_defined_vars());
    }

    public function submit(Request $request, $id)
    {
        // dd($request);
        $update_id = 0;
        if ($id > 0) {
            $food = Food::where('id', $id)->first();
            $food->title = $request->title;
            $food->description = $request->description;
            $food->calories = $request->calories;
            if ($request->image) {
                $imageName = $request->file('image')->getClientOriginalName();
                $image = $request->file('image');
                $image = rand(0, 9999) . time() . '.' . $request->image->extension();
                $request->file('image')->move(public_path('uploads/foods'), $image);
                $food->image = $image;
            }
            $food->update();
        } else {
            $food = new Food;
            $food->title = $request->title;
            $food->description = $request->description;
            $food->calories = $request->calories;

            if ($request->image) {
                $imageName = $request->file('image')->getClientOriginalName();
                $image = $request->file('image');
                $image = rand(0, 9999) . time() . '.' . $request->image->extension();
                $request->file('image')->move(public_path('uploads/foods'), $image);
                $food->image = $image;
            }
            $food->save();
        }
        return redirect()->route('food.index');
    }

    // if ($id > 0) {
    //     $goal = Goals::where('id', $id)->first();
    //     $goal->title = $request->title;
    //     if ($request->image) {
    //         $imageName = $request->file('image')->getClientOriginalName();
    //         $image = $request->file('image');
    //         $image = rand(0, 9999) . time() . '.' . $request->image->extension();
    //         $request->file('image')->move(public_path('uploads/goals'), $image);
    //         $goal->image = $image;
    //     }
    //     $goal->update();
    // } else {
    //     $goal = new Goals;
    //     $goal->title = $request->title;
    //     if ($request->image) {
    //         $imageName = $request->file('image')->getClientOriginalName();
    //         $image = $request->file('image');
    //         $image = rand(0, 9999) . time() . '.' . $request->image->extension();
    //         $request->file('image')->move(public_path('uploads/goals'), $image);
    //         $goal->image = $image;
    //     }
    //     $goal->save();
    // }
    public function delete(Request $request)
    {
        Food::where('id', $request->id)->delete();
        echo 1;
    }
}
