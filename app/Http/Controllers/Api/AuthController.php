<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        requestValidate($request, [
            "email" => "required|email|exists:users,email",
            "password" => "required"
        ]);

        $user = User::where('email', $request->email)->where('role', 'user')->with('goal', 'active', 'diet', 'intensity')->first();
        if (!$user) {
            return response(['status' => false, 'message' => 'Email address does not exist'], 200);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response(['status' => false, 'message' => 'Invalid email or password. Please try again'], 200);
        }

        return ['code' => 200, 'status' => true, 'message' => 'Login Successfully', 'data' => $user, 'access_token' => $user->createToken($request->email)->plainTextToken];
    }

    public function register(Request $request)
    {
        requestValidate($request, [
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required",
            "phone" => "required|unique:users,phone",
            "goal_id" => "required",
            "gender" => "required",
            "age" => "required",
            "height" => "required",
            "height_unit" => "required",
            "weight" => "required",
            "weight_unit" => "required",
            "target_weight" => "required",
            "target_weight_unit" => "required",
            "active_id" => "required",
            "intensity_id" => "required",
            "diet_id" => "required",
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->goal_id = $request->goal_id;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->height = $request->height;
        $user->height_unit = $request->height_unit;
        $user->weight = $request->weight;
        $user->weight_unit = $request->weight_unit;
        $user->target_weight = $request->target_weight;
        $user->target_weight_unit = $request->target_weight_unit;
        $user->active_id = $request->active_id;
        $user->intensity_id = $request->intensity_id;
        $user->diet_id = $request->diet_id;
        $user->role = 'user';
        $user->save();

        $data = User::where('id', $user->id)->with('goal', 'active', 'diet', 'intensity')->first();

        $token = rand(1000, 9999);
        return ['status' => true, 'message' => 'Registration Successful', 'data' => $data];
    }

    public function changePassword(Request $request)
    {
        requestValidate($request, [
            "old_password" => "required",
            "new_password" => "required",
        ]);

        $user = auth()->user();
        if (!Hash::check($request->password, $user->password)) {
            return response(['status' => false, 'message' => 'Invalid email or password. Please try again'], 200);
        } else {
            $user = User::where('id', $user->id)->update([
                'password' => $request->new_password,
            ]);

            return response(['status' => true, 'message' => 'Password Updated Successfully', 'data' => $user], 200);
        }
    }
}
