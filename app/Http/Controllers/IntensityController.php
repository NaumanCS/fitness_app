<?php

namespace App\Http\Controllers;

use App\Models\Intensity;
use Illuminate\Http\Request;

class IntensityController extends Controller
{
    public function index(){
        $intensity = Intensity::get();
        return view('pages.intensity.index', compact('intensity'));
    }

    public function create(Request $request, $id){
        //
    }

    public function delete($id){
        //
    }
}
