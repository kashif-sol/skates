<?php

namespace App\Http\Controllers;

use App\Models\Tab1;
use App\Models\Tab2;
use App\Models\Tab3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class TabsController extends Controller
{
    //
    public function index(){
        return view('tabs.index');
    }
    public function result(){
        $tab1=Tab1::all();
        $tab2=Tab2::all();
        $tab3=Tab3::all();
        $tab=$tab1->toArray();
        $tab_2=$tab2->toArray();
        $tab_3=$tab3->toArray();
        return view('tabs.result',compact('tab','tab_2','tab_3'));
    }
    public function save(Request $request){
      $size=$request->size;
      $figure1=$request->figure1;
      $figure2=$request->figure2;
      
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
    public function update(Request $request)
    { 
         
        $tab_type = $request->tab_type;

        if($tab_type == "tab1")
        {
            $priority = $request->priority;
            $multiple = $request->multiple;
              
            foreach($priority as $key => $row)
            {
                 
                
                if($row != null)
                {
                   
                    Tab1::where('size', $key)->update([
                        'priority' => $row
                        ]);
                }
                
                 
               
            }
          
             
            foreach($multiple as $key2 => $row2)
            {
               
                if($row2 != null)
                {
                   
                    Tab1::where('size', $key2)->update([
                        'multiple' => $row2
                     
                        ]);
                      
                }
                
            }
        }
        else if($tab_type == "tab2"){
            $figure_1 = $request->figure;
            $priority = $request->priority;
            $multiple = $request->multiple;
         
          
       
        foreach($multiple as $key2 => $row2)
            {
               
                if($row2 != null)
                {
                   
                    Tab2::where('size', $key2)->update([
                        'multiple' => $row2
                     
                        ]);
                      
                }
                
            }
            foreach($priority as $key3 => $row3)
            {
               
                if($row3 != null)
                {
                   
                    Tab2::where('size', $key3)->update([
                        'priority' => $row3
                     
                        ]);
                      
                }
                
            }
      
         
         
        }
        else if($tab_type == "tab3"){
            $priority = $request->priority;
            $multiple = $request->multiple;
         
          
        foreach($priority as $key => $row)
        {
             
            
            if($row != null)
            {
               
                Tab3::where('size', $key)->update([
                    'priority' => $row
                    ]);
            }
            
             
           
        }
        foreach($multiple as $key5 => $row5)
        {
             
            
            if($row5 != null)
            {
              
                Tab3::where('size', $key5)->update([
                    'multiple' => $row5
                    ]);
            }
            
             
           
        }
      
         
         
        }
        
       /// $stock->save();
        return redirect()->back()->with('status','Student Updated Successfully');
    }







    public function storet2(Request $request){
        // 
            $size=$request->size;
         $figure1=$request->figure1;
         $size1=$request->size1;
         $figure2=$request->figure2;
         $size2=$request->size2;
         $figure3=$request->figure3;
         $size3=$request->size3;
         $figure4=$request->figure4;
         $size4=$request->size4;
         $figure5=$request->figure5;
         $size5=$request->size5;
         $figure6=$request->figure6;
         $size6=$request->size6;
         $figure7=$request->figure7;
         $size7=$request->size7;
         $figure8=$request->figure8;
         $size8=$request->size8;
         $figure9=$request->figure9;
         $size9=$request->size9;
         $figure10=$request->figure10;
         $size10=$request->size10;
         $figure11=$request->figure11;
         $size11=$request->size11;
         $figure12=$request->figure12;
         $size12=$request->size12;
         $figure13=$request->figure13;
         $size13=$request->size13;
         $figure14=$request->figure14;
         $size14=$request->size14;
         $figure15=$request->figure15;
         $size15=$request->size15;
         $figure16=$request->figure16;
         $size16=$request->size16;
         $figure17=$request->figure17;
         $size17=$request->size17;
         $figure18=$request->figure18;

         $store1=[
         'size'=>$size,
         'figure'=>$figure1,
         ];
             
           
            $store2 = [
                'size'=>$size1,
                'figure'=>$figure2,
         ];
         $store3 = [
                    'size'=>$size2,
                    'figure'=>$figure3,
                    
             ];
              $store4 = [
                    'size'=>$size3,
                    'figure'=>$figure4,
        
    ];
     $store5 = [
                'size'=>$size4,
                'figure'=>$figure5,
    ];
     $store6 = [
                'size'=>$size5,
                'figure'=>$figure6,        
    ];
     $store7 = [
        'size'=>$size6,
        'figure'=>$figure7,
    ];
     $store8 = [
        'size'=>$size7,
        'figure'=>$figure8,
        
    ];
     $store9 = [
        'size'=>$size8,
        'figure'=>$figure9,
    ];
     $store10 = [
        'size'=>$size9,
        'figure'=>$figure10,
        
    ];
     $store11 = [
        'size'=>$size10,
        'figure'=>$figure11,
        
    ];
     $store12 = [
        'size'=>$size11,
        'figure'=>$figure12,
        
    ];
     $store13 = [
        'size'=>$size12,
        'figure'=>$figure13,        
    ];
     $store14 = [
        'size'=>$size13,
        'figure'=>$figure14,        
    ];
     $store15 = [
        'size'=>$size14,
        'figure'=>$figure15,        
    ];
     $store16 = [
        'size'=>$size15,
        'figure'=>$figure16,
        
    ];
     $store17 = [
        'size'=>$size16,
        'figure'=>$figure17,
        
    ];
     $store18 = [
        'size'=>$size17,
        'figure'=>$figure18,
        
    ];
    
    
        
        if(count(array_filter($store1))==2 ){
          
            Tab2::insert($store1);
        }
    
        if(count(array_filter($store2))==2){
            
            Tab2::insert($store2);
        }
    
            if(count(array_filter($store3))==2){
                Tab2::insert($store3);
            }
                if(count(array_filter($store4))==2){
                    Tab2::insert($store4);
                }
    
                    if(count(array_filter($store5))==2){
                        Tab2::insert($store5);
                    }
                        if(count(array_filter($store6))==2){
                            Tab2::insert($store6);
                        }
                            if(count(array_filter($store7))==2){
                                Tab2::insert($store7);
                            }
                                if(count(array_filter($store8))==2){
                                    Tab2::insert($store8);
                                }
                                    if(count(array_filter($store9))==2){
                                        Tab2::insert($store9);
                                    }
                                        if(count(array_filter($store10))==2){
                                            Tab2::insert($store10);
                                        }
                                            if(count(array_filter($store11))==2){
                                                Tab2::insert($store11);
                                            }
                                                if(count(array_filter($store12))==2){
                                                    Tab2::insert($store12);
                                                }
                                                    if(count(array_filter($store13))==2){
                                                        Tab2::insert($store13);
                                                    }
                                                        if(count(array_filter($store14))==2){
                                                            Tab2::insert($store14);
                                                        }
                                                            if(count(array_filter($store15))==2){
                                                                Tab2::insert($store15);
                                                            }
                                                                if(count(array_filter($store16))==2){
                                                                    Tab2::insert($store16);
                                                                }
                                                                    if(count(array_filter($store17))==2){
                                                                        Tab2::insert($store17);
                                                                    }
                                                                        if(count(array_filter($store18))==2){
                                                                            Tab2::insert($store18);
                                                                    
                                                                        }
    
    return redirect('result');
    
        }
        public function storet3(Request $request){
            // 
                $size=$request->size;
             $figure1=$request->figure1;
             $size1=$request->size1;
             $figure2=$request->figure2;
             $size2=$request->size2;
             $figure3=$request->figure3;
             $size3=$request->size3;
             $figure4=$request->figure4;
             $size4=$request->size4;
             $figure5=$request->figure5;
             $size5=$request->size5;
             $figure6=$request->figure6;
             $size6=$request->size6;
             $figure7=$request->figure7;
             $size7=$request->size7;
             $figure8=$request->figure8;
             $size8=$request->size8;
             $figure9=$request->figure9;
             $size9=$request->size9;
             $figure10=$request->figure10;
             $size10=$request->size10;
             $figure11=$request->figure11;
             $size11=$request->size11;
             $figure12=$request->figure12;
             $size12=$request->size12;
             $figure13=$request->figure13;
             $size13=$request->size13;
             $figure14=$request->figure14;
             $size14=$request->size14;
             $figure15=$request->figure15;
             $size15=$request->size15;
             $figure16=$request->figure16;
             $size16=$request->size16;
             $figure17=$request->figure17;
             $size17=$request->size17;
             $figure18=$request->figure18;
    
             $store1=[
             'size'=>$size,
             'hockey'=>$figure1,
             ];
                 
               
                $store2 = [
                    'size'=>$size1,
                    'hockey'=>$figure2,
             ];
             $store3 = [
                        'size'=>$size2,
                        'hockey'=>$figure3,
                        
                 ];
                  $store4 = [
                        'size'=>$size3,
                        'hockey'=>$figure4,
            
        ];
         $store5 = [
                    'size'=>$size4,
                    'hockey'=>$figure5,
        ];
         $store6 = [
                    'size'=>$size5,
                    'hockey'=>$figure6,        
        ];
         $store7 = [
            'size'=>$size6,
            'hockey'=>$figure7,
        ];
         $store8 = [
            'size'=>$size7,
            'hockey'=>$figure8,
            
        ];
         $store9 = [
            'size'=>$size8,
            'hockey'=>$figure9,
        ];
         $store10 = [
            'size'=>$size9,
            'hockey'=>$figure10,
            
        ];
         $store11 = [
            'size'=>$size10,
            'hockey'=>$figure11,
            
        ];
         $store12 = [
            'size'=>$size11,
            'hockey'=>$figure12,
            
        ];
         $store13 = [
            'size'=>$size12,
            'hockey'=>$figure13,        
        ];
         $store14 = [
            'size'=>$size13,
            'hockey'=>$figure14,        
        ];
         $store15 = [
            'size'=>$size14,
            'hockey'=>$figure15,        
        ];
         $store16 = [
            'size'=>$size15,
            'hockey'=>$figure16,
            
        ];
         $store17 = [
            'size'=>$size16,
            'hockey'=>$figure17,
            
        ];
         $store18 = [
            'size'=>$size17,
            'hockey'=>$figure18,
            
        ];
        
        
            
            if(count(array_filter($store1))==2 ){
              
                Tab3::insert($store1);
            }
        
            if(count(array_filter($store2))==2){
                
                Tab3::insert($store2);
            }
        
                if(count(array_filter($store3))==2){
                    Tab3::insert($store3);
                }
                    if(count(array_filter($store4))==2){
                        Tab3::insert($store4);
                    }
        
                        if(count(array_filter($store5))==2){
                            Tab3::insert($store5);
                        }
                            if(count(array_filter($store6))==2){
                                Tab3::insert($store6);
                            }
                                if(count(array_filter($store7))==2){
                                    Tab3::insert($store7);
                                }
                                    if(count(array_filter($store8))==2){
                                        Tab3::insert($store8);
                                    }
                                        if(count(array_filter($store9))==2){
                                            Tab3::insert($store9);
                                        }
                                            if(count(array_filter($store10))==2){
                                                Tab3::insert($store10);
                                            }
                                                if(count(array_filter($store11))==2){
                                                    Tab3::insert($store11);
                                                }
                                                    if(count(array_filter($store12))==2){
                                                        Tab3::insert($store12);
                                                    }
                                                        if(count(array_filter($store13))==2){
                                                            Tab3::insert($store13);
                                                        }
                                                            if(count(array_filter($store14))==2){
                                                                Tab3::insert($store14);
                                                            }
                                                                if(count(array_filter($store15))==2){
                                                                    Tab3::insert($store15);
                                                                }
                                                                    if(count(array_filter($store16))==2){
                                                                        Tab3::insert($store16);
                                                                    }
                                                                        if(count(array_filter($store17))==2){
                                                                            Tab3::insert($store17);
                                                                        }
                                                                            if(count(array_filter($store18))==2){
                                                                                Tab3::insert($store18);
                                                                        
                                                                            }
        
        return redirect('result');
        
            }
}
