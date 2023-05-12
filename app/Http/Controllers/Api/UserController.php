<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Faq;
use App\Models\GeneralSettings;
use App\Models\Policy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update_profile(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->with('diet')->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->goal_id = $request->goal_id;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->date_of_birth = $request->date_of_birth;
        $user->height = $request->height;
        $user->height_unit = $request->height_unit;
        $user->weight = $request->weight;
        $user->weight_unit = $request->weight_unit;
        $user->target_weight = $request->target_weight;
        $user->target_weight_unit = $request->target_weight_unit;
        $user->active_id = $request->active_id;
        $user->intensity_id = $request->intensity_id;
        $user->diet_id = $request->diet_id;

        if ($request->file()) {
            $imageName = rand(9, 99999) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/user'), $imageName);
            $user->image = $imageName;
        }

        $user->update();
        return ['status' => true, 'message' => 'Profile Updated Successfully', 'data' => $user];
    }

    public function get_admin_settings()
    {
        $aboutUs = AboutUs::get();
        $policies = Policy::get();
        $faqs = Faq::get();
        $generalSettings = GeneralSettings::get();

        return ['status' => true, 'message' => "Admin added data", 'aboutUs' => $aboutUs, 'policies' => $policies, 'faqs' => $faqs, 'generalSettings' => $generalSettings];
    }
}
