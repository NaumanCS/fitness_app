<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $obj = Faq::get();
        return view('pages.faq.index', compact('obj'));
    }

    public function create(Request $request, $id)
    {
        $update_id = 0;
        $obj = array();

        if ($id > 0) {
            $update_id = $id;
            $obj = Faq::where('id', $update_id)->first();
        }
        return view('pages.faq.create', get_defined_vars());
    }

    public function submit(Request $request, $id)
    {
        $update_id = 0;
        if ($id > 0) {
            $goal = Faq::where('id', $id)->update([
                'question' => $request->question,
                'answer' => $request->answer,
            ]);
        } else {
            $goal = Faq::create([
                'question' => $request->question,
                'answer' => $request->answer,
            ]);
        }
        return redirect()->route('faq.index');
    }
    public function delete(Request $request)
    {
        Faq::where('id', $request->id)->delete();
        echo 1;
    }
}
