<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\ActiveState;
use App\Models\Diet;
use App\Models\Faq;
use App\Models\Food;
use App\Models\GeneralSettings;
use App\Models\Goals;
use App\Models\Intensity;
use App\Models\Policy;
use Illuminate\Http\Request;

class AdminSettings extends Controller
{
    public function get_intensities()
    {
        $intesities = Intensity::get();

        return ['status' => true, 'message' => "List of all intensities added by the admin", 'data' => $intesities];
    }

    public function get_diets(){
        $diets = Diet::get();
        return ['status' => true, 'message' => "List of all diets added by the admin", 'data' => $diets];
    }

    public function get_goals(){
        $goals = Goals::get();
        return ['status' => true, 'message' => "List of all goals added by the admin", 'data' => $goals];
    }

    public function get_active_states(){
        $active_states = ActiveState::get();
        return ['status' => true, 'message' => "List of all active states added by the admin", 'data' => $active_states];
    }

    public function get_food_list(){
        $food_list = Food::get();
        return ['status'=>true, 'message'=>'List of food items added by the admin', 'data' => $food_list];
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
