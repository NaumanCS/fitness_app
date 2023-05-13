<?php

namespace App\Http\Controllers;

use App\Models\GeneralSettings;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    public function create()
    {
        $obj = GeneralSettings::first();
        return view('pages.general-settings.create', compact('obj'));
    }

    public function submit(Request $request)
    {
        $id = $request->id;
        if ($request->file('logo')) {
            $logoImage = rand(9, 99999) . time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/general-settings'), $logoImage);

            if (isset($id) && !empty($id)) {
                GeneralSettings::where('id', $id)->update([
                    'logo' => $logoImage,
                ]);
            } else {
                GeneralSettings::create([
                    'logo' => $logoImage,
                ]);
            }
        }
        return redirect()->route('general.settings.create');
    }

    public function delete_dropify_image(Request $request){
        if($request->id > 0){
            $fieldName = $request->fieldName;
            GeneralSettings::where('id', $request->id)->update([
                $fieldName => null,
            ]);
        }
    }
}
