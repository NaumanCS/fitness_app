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
        $user = auth()->user();
        $response = User::where('id', $user->id)->update($request->all());

        if ($request->file()) {
            $user = User::where('id', $user->id)->first();
            $imageName = rand(9, 99999) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/user'), $imageName);
            $user->image = $imageName;
            $response = $user->update();
        }
        if($response){
            return ['status' => true, 'message' => 'Profile Updated Successfully', 'data' => $user];
        }
        else{
            return ['status' => true, 'message' => 'Failed to update profile, try again.', 'data' => $user];
        }
    }

    public function update_profile_picture(Request $request)
    {
        requestValidate($request, [
            "image" => "required",
        ]);

        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        if ($request->file()) {
            $imageName = rand(9, 99999) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/user'), $imageName);
            $user->image = $imageName;
        }
        $response = $user->update();
        if($response){
            return ['status' => true, 'message' => 'Profile picture updated successfully', 'data' => $user];
        }
        else{
            return ['status' => false, 'message' => 'Failed to update profile picture', 'data' => $user];
        }
    }

    public function get_user_profile()
    {
        $user = auth()->user();
        return ['status' => true, 'message' => 'User Profile Data', 'data' => $user];
    }
}
