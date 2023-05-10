<?php

namespace App\Http\Controllers;

use App\Models\ActiveState;
use Illuminate\Http\Request;

class ActiveStateController extends Controller
{
    public function index(){
        $active_state = ActiveState::get();
        return view('pages.active-state.index', compact('active_state'));
    }

    public function create(Request $request, $id){
        //
    }

    public function delete($id){
        //
    }
}
