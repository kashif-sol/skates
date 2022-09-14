<?php

namespace App\Http\Controllers;

use App\Models\SkatersSqft;
use App\Models\Sqft;
use App\Models\Quotes;
use App\Models\Tab4;
use App\Models\QuoteSizes;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use App\Models\User; 
use Illuminate\Support\Facades\Mail;

class SqftController extends Controller
{
    //
    public function index()
    {
        $data = Sqft::all();
        // dd($data);
        return view('welcome', compact('data'));
    }

    public function quotes()
    {
        $quotes = Quotes::all();
        return view('quotes', compact('quotes'));
    }
    
    public function edit_quote_tab(Request $request)
    {
        QuoteSizes::where("quote_id" , $request->quoteId)->delete();
        foreach ($request->tab4 as $key => $row) {
            $size = $row[0];
            $figure = $row[1];
            $hockey = 0;
            if(isset($row[2]))
                $hockey = $row[2];
            $QuoteSizes = new QuoteSizes();
            $QuoteSizes->size = $size ;
            $QuoteSizes->figure = $figure;
            $QuoteSizes->hockey = $hockey;
            $QuoteSizes->quote_id = $request->quoteId;
            $QuoteSizes->save();

        }

        return redirect()->route('quotes_detail'  , [$request->quoteId]);
    }

    public function quote_send(Request $request)
    {
        $quote_detail = Quotes::find($request->quoteId);
        $quoteAmount = $request->quoteAmount;
        $email = $quote_detail->email;
        $quote_detail->amount = $quoteAmount;
        $quote_detail->ice_sheet = $quote_detail->ice_sheet;
        $quote_detail->save();
        $details = [
            'amount' => $quoteAmount,
            'email' =>$email
        ];
       
        Mail::to($email)->send(new \App\Mail\SendQuotePrice($details));
        return redirect()->route('quotes_detail'  , [$request->quoteId]);
    }

    public function quotes_detail($quoteId)
    {
        $quote_detail = Quotes::find($quoteId);
        $tab4_data = Tab4::where("quote_id" , $quoteId)->get();
        $ApiController = new ApiController();
        $request = new \Illuminate\Http\Request();
        $request->replace(['cont' => 1,'length' => $quote_detail->length , 'width' => $quote_detail->width , 'ice_sheets' => $quote_detail->ice_sheet]);
        $data = $ApiController->sqftcal($request);
        $quote_tab_data =  QuoteSizes::where("quote_id" , $quoteId)->get()->toArray();
        return view('quote-detail', compact('quote_detail' , 'data' , 'tab4_data' , 'quote_tab_data'));
    }

    public function create_order($quoteId)
    {
        $quote_detail = Quotes::find($quoteId);
        
        $ApiController = new ApiController();
        $request = new \Illuminate\Http\Request();
        $request->replace(['cont' => 1,'length' => $quote_detail->length , 'width' => $quote_detail->width , 'ice_sheets' => $quote_detail->ice_sheet]);
        $data = $ApiController->sqftcal($request);
        // dd($data);
        $data['tab'] = $quote_detail->tab;
        $data['customer_id'] = $quote_detail->customer_id;
        $data['add_on'] = $quote_detail->addon_on;
        $data['addon_on_2'] = $quote_detail->addon_on_2;
        $data['addon_on_3'] = $quote_detail->addon_on_3;
        $quote_tab_data =  QuoteSizes::where("quote_id" , $quoteId)->get()->toArray();
        $qty_data = [];
        if(!empty( $quote_tab_data ))
        {
            foreach( $quote_tab_data as $qtab_date)
            {
                $qty_data[] = array(
                    $qtab_date['size'],
                    $qtab_date['figure'],
                    $qtab_date['hockey']
                );
               
            }
        }else{
            if($quote_detail->tab == "TAB1")
                $qty_data = $data["Tab1"];
            else if($quote_detail->tab == "TAB2")
                $qty_data = $data["Tab2"];
            else if($quote_detail->tab == "TAB3")
                $qty_data = $data["Tab3"];
        }
        $data["quote_qty_tab"] = $qty_data;
        $order = $this->shopify_order($data);
        if($order["status"] == "success")
        {
            $quote_detail->status = 1;
            $quote_detail->save();
        }
        $quotes = Quotes::all();
        return view('quotes', compact('quotes' , 'order'));
    }

    public function shopify_order($order_detail)
    {
        
        $shop = User::first();
        $rental_skates_needed = $order_detail['no_rental_skates_needed'];
        $add_on = $order_detail["add_on"];
        $addon_on_2 = $order_detail["addon_on_2"];
        $addon_on_3 = $order_detail["addon_on_3"];
        $customer_address = $shop->api()->rest('GET', '/admin/api/2022-04/customers/'.$order_detail['customer_id'].'/addresses.json');
        $shipping_address = [];
        if(isset($customer_address["body"]["addresses"]))
        {
            $address =  $customer_address["body"]["addresses"][0] ;
            $shipping_address  = array(
                "first_name" => $address->first_name,
                "last_name" => $address->last_name,
                "address1" => $address->address1,
                "address2" => $address->address2,
                "company" => $address->company,
                "phone" => $address->phone,
                "city" => $address->city,
                "province" => $address->province,
                "country" => $address->country,
                "zip" => $address->zip
            );
        }
        $tab_details = [];
        $hockeyPid = "";
        $productsIds =  [7815410974959];
        if( $rental_skates_needed < 150)
            $productsIds =  [7815410385135];
       
        /*
        if($order_detail['tab'] == "TAB1")
        {
            $productsIds =  [7802388971759 , 7802799882479];
            $hockeyPid = 7802799882479;
        }
        elseif($order_detail['tab'] == "TAB2")
        {
            $productsIds =  [7802388971759];
        }
        elseif($order_detail['tab'] == "TAB3")
        {
            $productsIds =  [7802799882479];
        }
        */
        $line_items = [];
        $line_items_2 = [];
        $line_items_3 = [];
        foreach ($productsIds as $key => $productId) 
        {

            $product = $shop->api()->rest('GET', '/admin/api/2022-04/products/'.$productId.'.json');
            // dd($product);
            $variants = $product['body']['container']['product']['variants'];
           
            foreach ($variants as $key => $variant) 
            {
                $line_items[] = array(
                    "variant_id" => $variant['id'], 
                    "quantity" =>  $rental_skates_needed
                );

                /*
                foreach ($order_detail['quote_qty_tab'] as $key => $row) 
                {
                    $qty = $row[1];
                    if(!empty($hockeyPid) && $hockeyPid == $productId)
                    {
                        $qty = $row[2];
                    }
                    if( $variant['title'] == strtolower($row[0]))
                    {
                        $line_items[] = array(
                            "variant_id" => $variant['id'], //41533218980033,
                            "quantity" =>  $qty
                        );
                    }
                }
                */
            }
        }
        
        if(isset( $add_on) &&  $add_on == 1)
        {
            $line_items[] = array(
                "variant_id" => 43252231831791, 
                "quantity" =>  1
            );
        }
        if(isset( $addon_on_2) &&  $addon_on_2 == 1)
        {
            $line_items[] = array(
                "variant_id" => 43287282647279, 
                "quantity" =>  1
            );
        }
        if(isset( $addon_on_3) &&  $addon_on_3 == 1)
        {
            $line_items[] = array(
                "variant_id" => 43287298277615, 
                "quantity" =>  1
            );
        }

        $customer = array(
            "id" => $order_detail['customer_id'] //5995505549505
        );

        $order_data =  array(
            "order" => array(
                "financial_status " => "pending",
                "line_items" =>$line_items,
                "customer" => $customer,
              ///  "shipping_address" => $shipping_address
            )
        );
       
        $response = $shop->api()->rest('POST', '/admin/api/2022-04/orders.json',$order_data);
       
        if($response['status'] == 201 || $response['status'] == 200)
        {   
            $id = $response['body']['container']['order']['id'];
            
            return array("status" => "success" , "msg" => "Order created successfully." , "link" => 'https://vishal-app.myshopify.com/admin/orders/' . $id);
        }else{
            return array("status" => "error" , "msg" => "There is issue in creating your order. Please try again!" , "link" => "");
        }
    }

    public function store(Request $request)
    {
        $post = new Sqft();
        $post->max_sqft = $request->max_sqft;
        $post->min_sqft = $request->min_sqft;
        // dd($post);
        $post->save();
        // return view('sqft')->with('status', 'Blog Post Form Data Has Been inserted');
        return redirect('sqfts');
    }

    public function edit($id)
    {
        $vendor = Sqft::findOrFail($id);

        // $vendor  = Sqft::where($where)->first();
        return response()->json([
            'data' => $vendor
        ]);
    }
    public function update(Request $request)
    {
        // $validatedData = $request->validate([
        //     'sqft' => 'required|max:255',
        //     // 'price' => 'required'
        // ]);
        Sqft::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'max_sqft' => $request->max_sqft,
                'min_sqft' => $request->min_sqft,
                
            ],
            
        );
        return response()->json(['success' => true]);

        // Sqft::whereId($id)->update($validatedData);
        // $todo=Sqft::find($id);
        // $todo->sqft=$request->sqft;
        // $todo->save();

        // return redirect('sqfts');
    }
    public function destroy($id)
    {
        $user = Sqft::where('id', $id)->firstorfail()->delete();
        echo (" Record deleted successfully.");
        return redirect()->route('sqfts');
    }
    public function destroySkater($id)
    {
        // dd('hello');
        $user = SkatersSqft::with('sqft')->where('sqfts_id', $id)->firstorfail()->delete();
        echo (" Record deleted successfully.");
        return redirect('skaters');
    }
    public function skaters()
    {
        $dataa = Sqft::with('skatersSqft')->get();
        // dd($data);
        $user = SkatersSqft::with('sqft')->get();
        
        // $users=$user[0]['sqft'];
      

        // dd($user);

        return view('skaters', compact('dataa', 'user'));
    }
    public function create_skater(Request $request, $id)
    {
        $post = new SkatersSqft();
        $post->sqfts_id = $id;
      
        $post->ofskaterssqfts = $request->ofskaterssqfts;
        $post->ofrentalskatersneeded = $request->ofrentalskatersneeded;
        // dd($post);
        $post->save();
        return redirect()->back();
    }
    public function skater_store(Request $request)
    {
        // return $request->input();
        $skater_id = $request->sqfts_id;
        $ofskaterssqfts = $request->ofskaterssqfts;
        $ofrentalskatersneeded = $request->ofrentalskatersneeded;

        $data = SkatersSqft::where('sqfts_id','=',$skater_id)->first();
        if(empty($data))
            $data = new SkatersSqft();
        $data->sqfts_id = $skater_id;
        $data->ofskaterssqfts = $ofskaterssqfts;
        $data->ofrentalskatersneeded = $ofrentalskatersneeded;
        $data->save();
        return redirect()->route('skaters', []);
        return redirect()->back();
    }
    public function skater(Request $request)
    {
        // return $request->input();
        $dataa = Sqft::with('skatersSqft')->get();

        $data=$request->sqfts_id;
        $save=DB::table('sqfts')
        ->where('id',$data)
        ->get()->first();
        // dd($save);
        // dd($data);
        // dd($request);
        // $id=1;
        $country_data =SkatersSqft::with('sqft')->select('id','sqfts_id','ofskaterssqfts','ofrentalskatersneeded')->where('sqfts_id','=',$data)->get();
        // dd($country_data);
        // $product =  DB::table('sqfts')
        // ->where('id',$id)
        // ->get()->first();
        // dd($product);
  
        return view('skaters',compact('country_data','save','dataa'));
    }
    
    public function getResults(Request $request)
    {

    }
}
