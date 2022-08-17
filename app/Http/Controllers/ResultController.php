<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Sqft;
use App\Models\Tab1;
use App\Models\Tab2;
use App\Models\Tab3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    //
    public function store(Request $request){
        $length=$request->length;
        $width=$request->width;
        $total_sqfeet=$length * $width;
        $ice_sheets=$request->ice_sheets;
        $sqfeets  = Sqft::with('skatersSqft:id,ofskaterssqfts,ofrentalskatersneeded,sqfts_id')->where('max_sqft','>=',$total_sqfeet )->where('min_sqft','<=',$total_sqfeet )->first();

        $sqfeets = $sqfeets->toArray();
        $skates_per_sqft = $sqfeets["skaters_sqft"][0]["ofskaterssqfts"];
        $rental_skates_needed = $sqfeets["skaters_sqft"][0]["ofrentalskatersneeded"];
        $skates_per_session = ($total_sqfeet * $skates_per_sqft ) / 100;
        $no_rental_skates  = $skates_per_session * $rental_skates_needed;
        $email=$request->email;
            $value= $no_rental_skates * $ice_sheets;
            $total_rental_skates =  $value;
            $figure_7= 70;
            $percentagefigure=($figure_7 / 100)*$value;
            $percentagefigures=number_format($percentagefigure);
            $toalpercentagefigure=intval($percentagefigures);
            $figure_3= 30;
            $percentagefigure3=($figure_3 / 100)*$value;
            $percentagefigures3=number_format($percentagefigure3);
            $toalpercentagefigure3=intval($percentagefigures3);
            $sum = Tab1::sum('multiple');
             $sums=number_format($sum);
         $totalmultiple=intval($sums);
       
        $remainder_7 = $toalpercentagefigure % $totalmultiple;
        $quotient_7 = ($toalpercentagefigure - $remainder_7) / $totalmultiple;
     
            $remainder_3 = $toalpercentagefigure3 % $totalmultiple;
            $quotient_3 = ($toalpercentagefigure3 - $remainder_3) / $totalmultiple;
          
            $sumedpriorirty = Tab1::sum('priority');
            $figure_value= $sumedpriorirty*$quotient_7;
            $figure_value=number_format($figure_value);
            $hockey_value=$sumedpriorirty*$quotient_3;
            $hockey_value=number_format($hockey_value);
       $vendor = DB::Table('tab_1')->get();
       $arr=[];
       $fig=[];
       $hock=[];

     foreach($vendor as $data){
        $size= $data->size;
       $figure= $data->priority * $quotient_7;
       $hockey= $data->priority * $quotient_3;
       
array_push($arr,$size,$figure ,$hockey );
       

     }
     $chunckedArray=array_chunk($arr,3);
// 

    $sumt2 = Tab2::sum('multiple');
    $sumedt2=number_format($sumt2);
    $totalmultiplet2=intval($sumedt2);
    $remainder_7t2 = $total_rental_skates  % $totalmultiplet2;
    $quotient_7t2 = ($total_rental_skates - $remainder_7t2) / $totalmultiplet2; 
    $remainder_3t2 = $total_rental_skates % $totalmultiplet2;
    $quotient_3t2 = ($total_rental_skates - $remainder_3t2) / $totalmultiplet2;

 
  $vendort2 = DB::Table('tab_2')->get();
      $arrt2=[];
      $testf=2;
 foreach($vendort2 as $datat2){
       $sizet2= $datat2->size;
      $resultf=$datat2->priority;
      $figuret2=intval($resultf);
    //   
      $figuret2= $figuret2*$quotient_7t2;
    $resulth=$datat2->priority;
    $hockeyt2=intval($resulth);
    
      $hockeyt2= $hockeyt2*$quotient_3t2;
      
array_push($arrt2,$sizet2,$figuret2 ,$hockeyt2 );
    }
$chunckedArrayt2=array_chunk($arrt2,3);
$sumt3 = Tab3::sum('multiple');
$sumedt3=number_format($sumt3);
        $totalmultiplet3=intval($sumedt3);
  $remainder_7t3 = $total_rental_skates % $totalmultiplet3;
       $quotient_7t3 = ($toalpercentagefigure - $remainder_7t3) / $totalmultiplet3;
     
    $remainder_3t3 = $toalpercentagefigure3 % $totalmultiplet3;
           $quotient_3t3 = ($toalpercentagefigure3 - $remainder_3t3) / $totalmultiplet3;
 $sumedpriorirtyt2 = Tab2::sum('priority');
       
  $vendort3 = DB::Table('tab_3')->get();
      $arrt3=[];
 foreach($vendort3 as $datat3){
       $sizet3= $datat3->size;
      $result3=$datat3->priority;
      $figuret3=intval($result3);
      $figuret3= $figuret3*$quotient_7t3;
    $resulth3=$datat3->priority;
    $hockeyt3=intval($resulth3);
      $hockeyt3= $hockeyt3*$quotient_3t3;
      
array_push($arrt3,$sizet3,$figuret3 ,$hockeyt3 );

    }
$chunckedArrayt3=array_chunk($arrt3,3);

        
    


      
        
        // $store = new Result([
        //     'ice_sheets'=>$ice_sheets,
        //     'total_sqfeet'=> $total_sqfeet,
        //     'no_skates'=>$skates_per_session,
        //     'no_rental_skates'=>$no_rental_skates,
        //     'email'=>$email,
        // ]);
        // $store->save();
        
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
            // '70%figure'=>$percentagefigures,
            // '30%figure'=>$percentagefigures3,
            // 'figure_value'=>$figure_value,
            // 'hockey_value'=>$hockey_value,
            // 'quotient_7'=>$quotient_7,
            // 'quotient_3'=>$quotient_3,
            'Tab1'=>$chunckedArray,
            'Tab2'=>$chunckedArrayt2,
            'Tab3'=>$chunckedArrayt3,
        //    'size'=>$sizee,
        //    'figure'=>$figure,
        //    'size'=>$arr,
        //    'figure'=>$fig,
        //    'hockey'=>$hock,
        // 'Tab1'=>$vendor,

        );
    

        return response()->json(['res_arr'=>$res_arr]);

    
            





    }
}
// }
