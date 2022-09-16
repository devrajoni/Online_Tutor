<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\hire_tusion;
use Stripe;
use Session;
class StripeController extends Controller
{
    /**
     * payment view
     */
    public function handleGet($id)
    {
    $information =  hire_tusion::find($id);
        return view('frontend/payment', compact('information'));
    }

    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {
       $amount = $request->total_amount;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => "Making test payment."
        ]);

        Session::flash('success', 'Payment has been successfully processed.');

        return back();
    }
}
