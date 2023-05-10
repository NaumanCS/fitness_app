<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        requestValidate($request, [
            "phone" => "required|exists:users,phone",
            "password" => "required"
        ]);

        $user = User::where('email', $request->phone)->first();
        if (!$user){
            return response(['status' => false, 'message' => 'Phone address does not exist'], 200);
        }

        if (!Hash::check($request->password, $user->password)){
            return response(['status' => false, 'message' => 'Invalid phone or password. Please try again'], 200);
        }

        return ['code' => 200, 'status' => true, 'message' => 'Login Successfully', 'data' => $user, 'access_token' => $user->createToken($request->phone)->plainTextToken];
    }

    public function register(Request $request){
        requestValidate($request, [
            "email" => "required|email|unique:users,email",
            "name" => "required",
            "password" => "required",
            "phone" => "required|unique:users,phone",
            "country" => "required",
            "codeSendInMail" => "required",
            // "role" => "in:customer,admin,business",
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->role = 'basicUser';
        // $user->image = $request->name;
        $user->save();


        if ($request->file()) {
            $imageName = rand(9, 99999) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/user'), $imageName);
            $user->image = $imageName;
        }
        $token = rand(1000, 9999);
        return ['status' => true, 'message' => 'Registration Successful'];
        // PasswordReset::insert([
        //     'email' => $user->email,
        //     'token' => $token
        // ]);
        // if ($request->codeSendInMail == true) {
        //     Mail::send('mails.forgot-password', ['user' => $user, 'token' => $token], function ($m) use ($user, $token) {
        //         $m->from('info@timelink-admin.cs24ryk.com', 'Tech mart');

        //         $m->to($user->email, $user->name)->subject('OTP Verification Email');
        //     });

        //     return ['status' => true, 'message' => 'Registration Successful OTP has been sent on your Email please check your inbox, also check spam list'];
        // } else {
        //     $token = rand(1000, 9999);
        //     PasswordResetWithPhone::create([
        //         'phone' => $user->phone,
        //         'token' => $token
        //     ]);

        //     $account_sid = getenv("TWILIO_SID");
        //     $auth_token = getenv("TWILIO_TOKEN");
        //     $twilio_number = getenv("TWILIO_FROM");

        //     $client = new Client($account_sid, $auth_token);
        //     $client->messages->create($user->phone, [
        //         'from' => $twilio_number,
        //         'body' => 'Hi '.$user->name.' Your Tech Mart OTP is '.$token]);

        //     return ['status' => true, 'message' => 'Registration Successful OTP has been sent on your Phone please check your inbox'];
        // }

    }
}
