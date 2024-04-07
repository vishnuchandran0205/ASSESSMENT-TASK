<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\productsModel;
use App\Models\categoriesModel;

use Twilio\Rest\Client;

class FrontEndController extends Controller
{
   

     public function main_panel(Request $request){
        $products = productsModel::select('products.*','categories.name as catName')
        ->join('categories','categories.id','=','products.category_id')
        ->get();
        return view('front-end.main_panel', compact('products'));
    }

    public function add_cart(Request $request)
    {
  
        $productId = $request->input('productId');
        $cart = $request->session()->get('cart', []);
        $cart[] = $productId;
        $request->session()->put('cart', $cart);
        return response()->json(['success' => true]);
    }

    public function send_msg(Request $request){
        $userPhoneNumber = $request->input('phone_number');
       // dd($userPhoneNumber);
        $twilioSid = config('services.twilio.sid');
        $twilioToken = config('services.twilio.token');
        $twilioFrom = config('services.twilio.whatsapp_from');
    
        $client = new Client($twilioSid, $twilioToken);
        $client->messages->create("whatsapp:{$userPhoneNumber}", ['from' => "whatsapp:{$twilioFrom}", 'body' => 'Your message here']);
    
        return response()->json(['success' => true]);
    }


}
