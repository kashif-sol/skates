<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function store(Request $request)
    { $settings=Setting::all();
        $post = new Setting();
        $post->name = $request->name;
        $post->description = $request->description;
        // dd($post);
        $post->save();
        return redirect()->back()->with('status', 'New Setting Created');
    }
    public function index(){
    }
}
