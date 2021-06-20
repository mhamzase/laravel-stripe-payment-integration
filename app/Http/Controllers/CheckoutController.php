<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51J4A1MLMeI406vxHG2kLSYp0gkysfzDzLXC6at3NVfIto0IsJfw2RSF3LD2zMMzMSdtO8R8cJaeYAyu1xdsaT64t006OMNzj9q');
        		
		$amount = 100;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'USD',
			'description' => 'Payment From ByteCode Solutions',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent'));

    }

    public function afterPayment()
    {
        echo "<h1 style='color:green;'>Payment has been send Sucessfully!</h1>";
    }
}