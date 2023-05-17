<?php

namespace App\Http\Controllers;

use App\Models\Goals;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    public function index()
    {
        $obj = Goals::get();
        return view('pages.goals.index', compact('obj'));
    }

    public function create(Request $request, $id)
    {
        $update_id = 0;
        $obj = array();

        if ($id > 0) {
            $update_id = $id;
            $obj = Goals::where('id', $update_id)->first();
        }
        return view('pages.goals.create', get_defined_vars());
    }

    public function submit(Request $request, $id)
    {
        // dd($request);
        $update_id = 0;
        if ($id > 0) {
            $goal = Goals::where('id', $id)->first();
            $goal->title = $request->title;
            if ($request->image) {
                $imageName = $request->file('image')->getClientOriginalName();
                $image = $request->file('image');
                $image = rand(0, 9999) . time() . '.' . $request->image->extension();
                $request->file('image')->move(public_path('uploads/goals'), $image);
                $goal->image = $image;
            }
            $goal->update();
        } else {
            $goal = new Goals;
            $goal->title = $request->title;
            if ($request->image) {
                $imageName = $request->file('image')->getClientOriginalName();
                $image = $request->file('image');
                $image = rand(0, 9999) . time() . '.' . $request->image->extension();
                $request->file('image')->move(public_path('uploads/goals'), $image);
                $goal->image = $image;
            }
            $goal->save();
        }
        return redirect()->route('goals.index');
    }
    public function delete(Request $request)
    {
        Goals::where('id', $request->id)->delete();
        echo 1;
    }
}
