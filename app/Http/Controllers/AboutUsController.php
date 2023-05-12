<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $obj = AboutUs::get();
        return view('pages.about-us.index', compact('obj'));
    }

    public function create(Request $request, $id)
    {
        $update_id = 0;
        $obj = array();

        if ($id > 0) {
            $update_id = $id;
            $obj = AboutUs::where('id', $update_id)->first();
        }
        return view('pages.about-us.create', get_defined_vars());
    }

    public function submit(Request $request, $id)
    {
        $update_id = 0;
        if ($id > 0) {
            $goal = AboutUs::where('id', $id)->update([
                'heading' => $request->heading,
                'content' => $request->content,
            ]);
        } else {
            $goal = AboutUs::create([
                'heading' => $request->heading,
                'content' => $request->content,
            ]);
        }
        return redirect()->route('about.index');
    }
    public function delete(Request $request)
    {
        AboutUs::where('id', $request->id)->delete();
        echo 1;
    }
}
