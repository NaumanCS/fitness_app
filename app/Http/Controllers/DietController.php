<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use Illuminate\Http\Request;

class DietController extends Controller
{
    public function index(){
        $diets = Diet::get();
        return view('pages.diet.index', compact('diets'));
    }

    public function create(Request $request, $id){
        //
    }

    public function delete($id){
        //
    }
}
