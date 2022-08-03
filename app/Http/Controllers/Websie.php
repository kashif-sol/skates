<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use App\Mail\Subscribe;
use Symfony\Component\HttpFoundation\JsonResponse;
class Websie extends Controller
{
    //
    public function index()
    {
 
      Mail::to('kamranib10@gmail.com')->send(new NotifyMail());
 
      if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
      }else{
           return response()->success('Great! Successfully send in your mail');
         }
    } 
    public function email(){
        Mail::to('kamranib10@gmailc.com')->send(new Subscribe('kamranib10@gmail.com'));
        return new JsonResponse(
            [
                'success' => true, 
                'message' => "Thank you for subscribing to our email, please check your inbox"
            ], 
            200
        );
    }
    

}