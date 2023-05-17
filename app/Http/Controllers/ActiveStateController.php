<?php

namespace App\Http\Controllers;

use App\Models\ActiveState;
use Illuminate\Http\Request;

class ActiveStateController extends Controller
{
    public function index()
    {
        $obj = ActiveState::get();
        return view('pages.active-state.index', compact('obj'));
    }

    public function create(Request $request, $id)
    {
        $update_id = 0;
        $obj = array();

        if ($id > 0) {
            $update_id = $id;
            $obj = ActiveState::where('id', $update_id)->first();
        }
        // dd($obj);
        return view('pages.active-state.create', get_defined_vars());
    }

    public function submit(Request $request, $id)
    {
        $update_id = 0;
        if ($id > 0) {
            $goal = ActiveState::where('id', $id)->first();
            $goal->title = $request->title;
            $goal->description = $request->description;
            if ($request->image) {
                $imageName = $request->file('image')->getClientOriginalName();
                $image = $request->file('image');
                $image = rand(0, 9999) . time() . '.' . $request->image->extension();
                $request->file('image')->move(public_path('uploads/active-state'), $image);
                $goal->image = $image;
            }
            $goal->update();
        } else {
            $goal = new ActiveState;
            $goal->title = $request->title;
            $goal->description = $request->description;
            if ($request->image) {
                $imageName = $request->file('image')->getClientOriginalName();
                $image = $request->file('image');
                $image = rand(0, 9999) . time() . '.' . $request->image->extension();
                $request->file('image')->move(public_path('uploads/active-state'), $image);
                // dd($image);
                $goal->image = $image;
            }
            $goal->save();
        }
        return redirect()->route('active.state.index');
    }
    public function delete(Request $request)
    {
        ActiveState::where('id', $request->id)->delete();
        echo 1;
    }
}
