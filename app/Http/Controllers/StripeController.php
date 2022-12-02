<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class StripeController extends Controller
{
    public function chargeView(){
        return view('stripe');
    }

    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));//シークレットキー
 
        $charge = Charge::create(array(
             'amount' => 100,
             'currency' => 'jpy',
             'source'=> request()->stripeToken,
         ));
       return back();
    }
}
