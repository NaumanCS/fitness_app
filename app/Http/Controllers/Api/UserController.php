<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Faq;
use App\Models\Food;
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
            $user_data = User::where('id', $user->id)->with('diet', 'intensity', 'active', 'goal')->first();
            return ['status' => true, 'message' => 'Profile Updated Successfully', 'data' => $user_data];
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
        $user = User::where('id', $id)->with('diet', 'intensity', 'active', 'goal')->first();
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
        $id = auth()->user()->id;
        $user = User::where('id', $id)->with('diet', 'intensity', 'active', 'goal')->first();
        return ['status' => true, 'message' => 'User Profile Data', 'data' => $user];
    }

    public function update_goal(Request $request){
        requestValidate($request, [
            "goal_id" => "required",
        ]);
        $id = auth()->user()->id;
        $response = User::where('id', $id)->update([
            'goal_id' => $request->goal_id,
        ]);
        if($response){
            $user_data = User::where('id', $id)->with('diet', 'intensity', 'active', 'goal')->first();
            return ['status' => true, 'message' => 'Goal Updated Successfully', 'data'=>$user_data];
        }
        else{
            return ['status' => false, 'message' => 'Fail to update goal'];
        }
    }

    public function update_calories(Request $request){
        requestValidate($request, [
            "food_id" => "required",
            "eaten_calories" => "required",
        ]);
        $id = auth()->user()->id;

        $food = Food::where('id', $request->food_id)->first();
        $remaining_calories = $food->calories - $request->eaten_calories;

        $user = User::where('id', $id)->with('diet', 'intensity', 'active', 'goal')->first();
        if($user->remaining_calories == null){
            $user->eaten_calories += $request->eaten_calories;
            $user->remaining_calories = $remaining_calories;
            $user->save();
        }
        else{
            $user->eaten_calories += $request->eaten_calories;
            $user->remaining_calories -= $request->eaten_calories;
            $user->save();
        }

        return ['status' => true, 'message' => 'Calories updated successfully', 'data'=>$user ];
    }
}
