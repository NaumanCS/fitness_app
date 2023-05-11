<?php

namespace App\Http\Controllers;

use App\Models\GeneralSettings;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    public function create(Request $request, $id){
        $update_id = 0;
        $obj = array();

        if ($id > 0) {
            $update_id = $id;
            $obj = GeneralSettings::where('id', $update_id)->first();
        }
        return view('pages.general-setting.create', get_defined_vars());
    }

    public function submit(Request $request, $id){
        $update_id = 0;
        if($id > 0){
            $goal = GeneralSettings::where('id', $id)->update([
                'title' => $request->title,
            ]);
        }
        else{
            $goal = GeneralSettings::create([
                'title' => $request->title,
            ]);
        }
        if ($request->image) {
            $imageName = $request->file('image')->getClientOriginalName();
            $image = $request->file('image');
            $image = rand(0, 9999) . time() . '.' . $request->image->extension();
            $request->file('image')->move(public_path('uploads/general-settings'), $image);
            $goal->image = $image;
            $goal->update();
        }
        $goals = GeneralSettings::get();
        return redirect()->route('general.settings.create');
    }
}
