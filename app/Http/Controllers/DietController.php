<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use Illuminate\Http\Request;

class DietController extends Controller
{
    public function index(){
        $obj = Diet::get();
        return view('pages.diet.index', compact('obj'));
    }

    public function create(Request $request, $id){
        $update_id = 0;
        $obj = array();

        if ($id > 0) {
            $update_id = $id;
            $obj = Diet::where('id', $update_id)->first();
        }
        return view('pages.diet.create', get_defined_vars());
    }

    public function submit(Request $request, $id){
        // dd($request);
        $update_id = 0;
        if($id > 0){
            $goal = Diet::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }
        else{
            $goal = Diet::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }

        $diet = Diet::get();
        return redirect()->route('diet.index');
    }
    public function delete(Request $request){
        Diet::where('id', $request->id)->delete();
        echo 1;
    }
}
