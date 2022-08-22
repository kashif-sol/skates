<?php

namespace App\Http\Controllers;

use App\Models\Sqft;
use App\Models\Tab1;
use App\Models\Tab2;
use App\Models\Tab3;
use App\Models\Quotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    //

    public function get(){
        return view('api');
    }

    public function quote(Request $request)
    {
        $quotes = new Quotes();
        $quotes->ice_sheet = $request->ice_sheets;
        $quotes->length = $request->length;
        $quotes->width = $request->width;
        $quotes->tab = $request->tab;
        $quotes->user_id = 1;
        $quotes->email = $request->email;
        $quotes->customer_id = $request->custId;
        $quotes->save();
        $ret_array = array(
            "status" => true,
            "message" => "Your Quote submitted."
        );
        return response()->json(['data'=>$ret_array]);
    }

    public function sqftcal(Request $request){
   
        $length=$request->length;
        $width=$request->width;
        $total_sqfeet=$length * $width;
        $ice_sheets=$request->ice_sheets;
        $sqfeets  = Sqft::with('skatersSqft:id,ofskaterssqfts,ofrentalskatersneeded,sqfts_id')->where('max_sqft','>=',$total_sqfeet )->where('min_sqft','<=',$total_sqfeet )->first();

        $sqfeets = $sqfeets->toArray();
        $skates_per_sqft = $sqfeets["skaters_sqft"][0]["ofskaterssqfts"];
        $rental_skates_needed = $sqfeets["skaters_sqft"][0]["ofrentalskatersneeded"];
     
        $skates_per_session = ($total_sqfeet * $skates_per_sqft ) / 100;
        $no_rental_skates  = round($skates_per_session * $rental_skates_needed);
       
        // dd($no_rental_skates);
             $email=$request->email;
            $value= $no_rental_skates * $ice_sheets;
            $total_rental_skates =  $value;
            $figure_7= 70;
            $percentagefigure=round(($figure_7 / 100)*$value);
           
            $percentagefigures=number_format($percentagefigure);
            $toalpercentagefigure=intval($percentagefigures);
            // dd($toalpercentagefigure);
            $figure_3= 30;
            $percentagefigure3=round(($figure_3 / 100)*$value);
            $percentagefigures3=number_format($percentagefigure3);
            $toalpercentagefigure3=intval($percentagefigures3);
            $sum = Tab1::sum('multiple');
             $sums=number_format($sum);
         $totalmultiple=intval($sums);
        
        //  dd($totalmultiple);
        $remainder_7 = $toalpercentagefigure % $totalmultiple;
        $quotient_7 = ($toalpercentagefigure - $remainder_7) / $totalmultiple;
        
        $remainder_3 = $toalpercentagefigure3 % $totalmultiple;
        
            $quotient_3 = ($toalpercentagefigure3 - $remainder_3) / $totalmultiple;
           
            $sumedpriorirty = Tab1::sum('priority');
            $figure_value= $sumedpriorirty*$quotient_7;
            $figure_value=number_format($figure_value);
            $hockey_value=$sumedpriorirty*$quotient_3;
            $hockey_value=number_format($hockey_value);
       $vendor = DB::Table('tab_1')->orderBy('priority')->get();
       $arr=[];
       $fig=[];
       $hock=[];
     $rem_reminder = 0;
     $rem_reminder3 = 0;
     foreach($vendor as $data){
        $size= $data->size;
       $figure= $data->multiple * $quotient_7;
    // 
       $hockey= $data->multiple * $quotient_3;
        
       if($remainder_7 > 0 &&  $remainder_7 > -1)
       {
        $rem_reminder = $remainder_7 - $figure ;  
       
        if( $rem_reminder < 0) 
        {
            $figure = $figure + $remainder_7;
        }
       }
      
       if($remainder_3 > 0 && $rem_reminder3 > -1)
       {
        $rem_reminder3 = $remainder_3 - $hockey ;  // 1 - 6 = -5 All done 
        
        if( $rem_reminder3 < 0) 
        {
            $hockey = $hockey + $remainder_3;
        }
       }
       
array_push($arr,$size,$figure  , intval($hockey));
       

     }
     $chunckedArray=array_chunk($arr,3);
// 

$sumt2 = Tab2::sum('multiple');
$sumedt2=number_format($sumt2);
        $totalmultiplet2=intval($sumedt2);
  $remainder_7t2 = $total_rental_skates % $totalmultiplet2;
       $quotient_7t2 = ($total_rental_skates - $remainder_7t2) / $totalmultiplet2;
     
    $remainder_3t2 = $total_rental_skates % $totalmultiplet2;
 
           $quotient_3t2 = ($total_rental_skates - $remainder_3t2) / $totalmultiplet2;
 $sumedpriorirtyt2 = Tab2::sum('priority');
  $vendort2 = DB::Table('tab_2')->orderBy('priority')->get();
      $arrt2=[];
      $testf=2;
      $rem_reminder = 0;
     $rem_reminder3 = 0;
 foreach($vendort2 as $datat2){
       $sizet2= $datat2->size;
      $resultf=$datat2->multiple;
      $figuret2=intval($resultf);
    //   
      $figuret2= $figuret2*$quotient_7t2;
    $resulth=$datat2->multiple;
    $hockeyt2=intval($resulth);
    
      $hockeyt2= $hockeyt2*$quotient_3t2;

      if($remainder_7t2 > 0 &&  $remainder_7t2 > -1)
       {
        $rem_reminder = $remainder_7t2 - $figuret2 ;  
       
        if( $rem_reminder < 0) 
        {
            $figuret2 = $figuret2 + $remainder_7t2;
        }
       }
      
array_push($arrt2,$sizet2,$figuret2  );
    }
$chunckedArrayt2=array_chunk($arrt2,2);
$sumt3 = Tab3::sum('multiple');
$sumedt3=number_format($sumt3);
        $totalmultiplet3=intval($sumedt3);
  $remainder_7t3 = $total_rental_skates % $totalmultiplet3;
       $quotient_7t3 = ($total_rental_skates - $remainder_7t3) / $totalmultiplet3;
     
    $remainder_3t3 = $total_rental_skates % $totalmultiplet3;
           $quotient_3t3 = ($total_rental_skates - $remainder_3t3) / $totalmultiplet3;
 $sumedpriorirtyt2 = Tab2::sum('priority');
       
  $vendort3 = DB::Table('tab_3')->orderBy('priority')->get();
      $arrt3=[];
      $rem_reminder = 0;
     $rem_reminder3 = 0;
 foreach($vendort3 as $datat3){
       $sizet3= $datat3->size;
      $result3=$datat3->multiple;
      $figuret3=intval($result3);
      $figuret3= $figuret3*$quotient_7t3;
    $resulth3=$datat3->multiple;
    $hockeyt3=intval($resulth3);
      $hockeyt3= $hockeyt3*$quotient_3t3;
      

     if($remainder_7t3 > 0 &&  $remainder_7t3 > -1)
     {
      $rem_reminder = $remainder_7t3 - $figuret3 ;  
     
      if( $rem_reminder < 0) 
      {
          $figuret3 = $figuret3 + $remainder_7t3;
      }
     }
array_push($arrt3,$sizet3,$figuret3  );

    }
$chunckedArrayt3=array_chunk($arrt3,2);


        if($no_rental_skates<200){
            $total_sparx =1;
        }
        else{
            $total_sparx=2;
        }
$ret_array = array(
    'skates_per_session'=>$skates_per_session,
    'no_rental_skates_needed'=>$no_rental_skates,
    'total_sparx'=>$total_sparx,
    'ice_sheets'=>$ice_sheets,
    // new line 
    'total_sqfeet'=>$total_sqfeet,
    'no_skates'=>$skates_per_session,
    'no_rental_skates'=>$no_rental_skates,
    'Tab1'=>$chunckedArray,
    'Tab2'=>$chunckedArrayt2,
    'Tab3'=>$chunckedArrayt3,    
);

if(isset($request->cont) && $request->cont == 1)
    return $ret_array;
return response()->json(['ret_array'=>$ret_array
]);
    }
}
