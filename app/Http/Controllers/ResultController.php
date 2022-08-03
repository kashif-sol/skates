<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Sqft;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    //
    public function store(Request $request){
        // $request->validate([
        //     'ice_sheets' => 'required',
        //     'total_sqfeet' => 'required',
        //     'no_skates' => 'required',
        //     'no_rental_skates' => 'required',
        //     'email' => 'required',
         
        //     ]);
        
        $length=$request->length;
        $width=$request->width;
        $total_sqfeet=$length * $width;
        $sqfeets  = Sqft::with('skatersSqft:id,ofskaterssqfts,ofrentalskatersneeded,sqfts_id')->where('max_sqft','>=',$total_sqfeet )->where('min_sqft','<=',$total_sqfeet )->first();
        $sqfeets = $sqfeets->toArray();
        $skates_per_sqft = $sqfeets["skaters_sqft"][0]["ofskaterssqfts"];
        $rental_skates_needed = $sqfeets["skaters_sqft"][0]["ofrentalskatersneeded"];
        $skates_per_session = ($total_sqfeet * $skates_per_sqft ) / 100;
        $no_rental_skates  = $skates_per_session * $rental_skates_needed;
        $email=$request->email;

       
        $ice_sheets=$request->ice_sheets;
        $store = new Result([
            'ice_sheets'=>$ice_sheets,
            'total_sqfeet'=> $total_sqfeet,
            'no_skates'=>$skates_per_session,
            'no_rental_skates'=>$no_rental_skates,
            'email'=>$email,


        ]);
        $store->save();
        
        if($no_rental_skates<200){
            $total_sparx =1;
        }
        else{
            $total_sparx=2;
        }
        $res_arr = array(
            'ice_seet'=>$ice_sheets,
            'total_sqfeet'=>$total_sqfeet,
            'no_skates'=>$skates_per_session,
            'no_rental_skates'=>$no_rental_skates,
            'email'=>$email,
            'total_sparx'=>$total_sparx,
        );
        return response()->json(['res_arr'=>$res_arr]);

        
            





    }
}
