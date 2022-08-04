<?php

namespace App\Http\Controllers;

use App\Models\Tab1;
use Illuminate\Http\Request;

class TabsController extends Controller
{
    //
    public function index(){
        return view('tabs.index');
    }
    public function storet1(Request $request){
    // 
        $size2=$request->size2;
     $figure9=$request->figure9;
     $figure10=$request->figure10;
     $size3=$request->size3;
     $figure11=$request->figure11;
     $figure12=$request->figure12;
     $size4=$request->size4;
 $figure13=$request->figure13;
 $figure14=$request->figure14;
 $size5=$request->size5;
 $figure15=$request->figure15;
 $figure16=$request->figure16;
 $size6=$request->size6;
 $figure17=$request->figure17;
 $figure18=$request->figure18;
 $size7=$request->size7;
 $figure19=$request->figure19;
 $figure20=$request->figure20;
 $size8=$request->size8;
 $figure21=$request->figure21;
 $figure22=$request->figure22;
 $size9=$request->size9;
 $figure23=$request->figure23;
 $figure24=$request->figure24;
 $size10=$request->size10;
 $figure25=$request->figure25;
 $figure26=$request->figure26;
 $size11=$request->size11;
 $figure27=$request->figure27;
 $figure28=$request->figure28;
$size12=$request->size12;
 $figure29=$request->figure29;
 $figure30=$request->figure30;
 $size13=$request->size13;
 $figure31=$request->figure31;
 $figure32=$request->figure32;
$size14=$request->size14;
 $figure33=$request->figure33;
 $figure34=$request->figure34;
$size15=$request->size15;
 $figure35=$request->figure35;
 $figure36=$request->figure36;
 $size16=$request->size16;
 $figure37=$request->figure37;
 $figure38=$request->figure38;
$size17=$request->size17;
 $figure39=$request->figure39;
 $figure40=$request->figure40;
        
     $size=$request->size;
     $figure=$request->figure1;
     $figure2=$request->figure2;
     $store1=[
     'size'=>$size,
     '70%figure'=>$figure,
     '30%figure'=>$figure2,
     ];
             $size1=$request->size1;
        $figure7=$request->figure7;
        $figure8=$request->figure8;
       
        $store2 = [
            'size'=>$size1,
            '70%figure'=>$figure7,
            '30%figure'=>$figure8,     
     ];
     $store3 = [
                'size'=>$size2,
                '70%figure'=>$figure9,
                '30%figure'=>$figure10,
                
         ];
          $store4 = [
    'size'=>$size3,
    '70%figure'=>$figure11,
    '30%figure'=>$figure12,
    
];
 $store5 = [
    'size'=>$size4,
    '70%figure'=>$figure13,
    '30%figure'=>$figure14,
    
];
 $store6 = [
    'size'=>$size5,
    '70%figure'=>$figure15,
    '30%figure'=>$figure16,
    
];
 $store7 = [
    'size'=>$size6,
    '70%figure'=>$figure17,
    '30%figure'=>$figure18,
    
];
 $store8 = [
    'size'=>$size7,
    '70%figure'=>$figure19,
    '30%figure'=>$figure20,
    
];
 $store9 = [
    'size'=>$size8,
    '70%figure'=>$figure21,
    '30%figure'=>$figure22,
    
];
 $store10 = [
    'size'=>$size9,
    '70%figure'=>$figure23,
    '30%figure'=>$figure24,
    
];
 $store11 = [
    'size'=>$size10,
    '70%figure'=>$figure25,
    '30%figure'=>$figure26,
    
];
 $store12 = [
    'size'=>$size11,
    '70%figure'=>$figure27,
    '30%figure'=>$figure28,
    
];
 $store13 = [
    'size'=>$size12,
    '70%figure'=>$figure29,
    '30%figure'=>$figure30,
    
];
 $store14 = [
    'size'=>$size13,
    '70%figure'=>$figure31,
    '30%figure'=>$figure32,
    
];
 $store15 = [
    'size'=>$size14,
    '70%figure'=>$figure33,
    '30%figure'=>$figure34,
    
];
 $store16 = [
    'size'=>$size15,
    '70%figure'=>$figure35,
    '30%figure'=>$figure36,
    
];
 $store17 = [
    'size'=>$size16,
    '70%figure'=>$figure37,
    '30%figure'=>$figure38,
    
];
 $store18 = [
    'size'=>$size17,
    '70%figure'=>$figure39,
    '30%figure'=>$figure40,
    
];








    
    if(count(array_filter($store1))==3 ){
      
        tab1::insert($store1);
    }

    if(count(array_filter($store2))==3){
        
        tab1::insert($store2);
    }

        if(count(array_filter($store3))==3){
            tab1::insert($store3);
        }
            if(count(array_filter($store4))==3){
                tab1::insert($store4);
            }

                if(count(array_filter($store5))==3){
                    tab1::insert($store5);
                }
                    if(count(array_filter($store6))==3){
                        tab1::insert($store6);
                    }
                        if(count(array_filter($store7))==3){
                            tab1::insert($store7);
                        }
                            if(count(array_filter($store8))==3){
                                tab1::insert($store8);
                            }
                                if(count(array_filter($store9))==3){
                                    tab1::insert($store9);
                                }
                                    if(count(array_filter($store10))==3){
                                        tab1::insert($store10);
                                    }
                                        if(count(array_filter($store11))==3){
                                            tab1::insert($store11);
                                        }
                                            if(count(array_filter($store12))==3){
                                                tab1::insert($store12);
                                            }
                                                if(count(array_filter($store13))==3){
                                                    tab1::insert($store13);
                                                }
                                                    if(count(array_filter($store14))==3){
                                                        tab1::insert($store14);
                                                    }
                                                        if(count(array_filter($store15))==3){
                                                            tab1::insert($store15);
                                                        }
                                                            if(count(array_filter($store16))==3){
                                                                tab1::insert($store16);
                                                            }
                                                                if(count(array_filter($store17))==3){
                                                                    tab1::insert($store17);
                                                                }
                                                                    if(count(array_filter($store18))==3){
                                                                        tab1::insert($store18);
                                                                
                                                                    }

return redirect('tabs');

    }
}
