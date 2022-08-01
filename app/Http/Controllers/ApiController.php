<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function get(){
        return view('api');
    }
    public function sqftcal(Request $request){
   
   $length=$request->length;
   $width=$request->width;
   return $length * $width;

    }
}
