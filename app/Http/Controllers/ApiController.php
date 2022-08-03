<?php

namespace App\Http\Controllers;

use App\Models\Sqft;
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
   $ice_sheets =  $request->ice_sheets;
   $tot_sqfeet = $length * $width;
   $max=Sqft::pluck('max_sqft');
   $from=$max;
   $min=Sqft::pluck('min_sqft');
    $to=$min;

  
//   return response()->json(['data'=>$data]);
$sqfeets  = Sqft::with('skatersSqft:id,ofskaterssqfts,ofrentalskatersneeded,sqfts_id')->where('max_sqft','>=',$tot_sqfeet )->where('min_sqft','<=',$tot_sqfeet )->first();
$sqfeets = $sqfeets->toArray();
$skates_per_sqft = $sqfeets["skaters_sqft"][0]["ofskaterssqfts"];
$rental_skates_needed = $sqfeets["skaters_sqft"][0]["ofrentalskatersneeded"];
$skates_per_session = ($tot_sqfeet * $skates_per_sqft ) / 100;
$no_rental_skates_needed  = $skates_per_session * $rental_skates_needed;
$tot_no_rental_skates_needed  = $no_rental_skates_needed * $ice_sheets;
$mobile_skates = $tot_no_rental_skates_needed * 85;

if($no_rental_skates_needed<200){
    $total_sparx =1;
}
else{
    $total_sparx=2;
}

$ret_array = array(
    'skates_per_session'=>$skates_per_session,
    'no_rental_skates_needed'=>$no_rental_skates_needed,
    'tot_no_rental_skates_needed'=>$tot_no_rental_skates_needed,
    'mobile_skates'=>$mobile_skates,
    'tot_sqfeet'=>$tot_sqfeet,
    'total_sparx'=>$total_sparx,
    'ice_sheets'=>$ice_sheets,

    
);
return response()->json(['ret_array'=>$ret_array
]);
    }
}
