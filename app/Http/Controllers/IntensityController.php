<?php

namespace App\Http\Controllers;

use App\Models\Intensity;
use Illuminate\Http\Request;

class IntensityController extends Controller
{
    public function index(){
        $obj = Intensity::get();
        return view('pages.intensity.index', compact('obj'));
    }

    public function create(Request $request, $id){
        $update_id = 0;
        $obj = array();

        if ($id > 0) {
            $update_id = $id;
            $obj = Intensity::where('id', $update_id)->first();
        }
        return view('pages.intensity.create', get_defined_vars());
    }

    public function submit(Request $request, $id){
        $update_id = 0;
        if($id > 0){
            $goal = Intensity::where('id', $id)->update([
                'title' => $request->title,
                'time' => $request->time,
                'calories_burn' => $request->calories_burn,
            ]);
        }
        else{
            $goal = Intensity::create([
                'title' => $request->title,
                'time' => $request->time,
                'calories_burn' => $request->calories_burn,
            ]);
        }

        return redirect()->route('intensity.index');
    }
    public function delete(Request $request){
        Intensity::where('id', $request->id)->delete();
        echo 1;
    }
}
