<?php

namespace App\Http\Controllers;

use App\Models\SkatersSqft;
use App\Models\Sqft;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;

class SqftController extends Controller
{
    //
    public function index()
    {
        $data = Sqft::all();
        return view('sqft', compact('data'));
    }
    public function store(Request $request)
    {
        $post = new Sqft();
        $post->sqft = $request->sqft;
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
    public function update(Request $request, $id)
    {
        // $validatedData = $request->validate([
        //     'sqft' => 'required|max:255',
        //     // 'price' => 'required'
        // ]);
        Sqft::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'sqft' => $request->sqft,
            ]
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
        $data = new SkatersSqft();
        $data->sqfts_id = $skater_id;
        $data->ofskaterssqfts = $ofskaterssqfts;
        $data->ofrentalskatersneeded = $ofrentalskatersneeded;
        $data->save();
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
