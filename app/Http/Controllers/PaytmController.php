<?php

namespace App\Http\Controllers;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Transection;
use Illuminate\Http\Request;

class PaytmController extends Controller
{
    public function paytmPayment(Request $request)
    {
        $payment = PaytmWallet::with('receive');
        $order_id =  uniqid().'_'.rand();
        $payment->prepare([
          'order' => $order_id,
          'user' => uniqid().'_'.rand(10,1000),
          'mobile_number' => '123456789',
          'email' => 'paytmtest@gmail.com',
          'amount' => $request->amount,
          'callback_url' => route('paytm.callback'),
        ]);
        Transection::create([
          'order_id' => $order_id,
          'fund_id' => $request->fund_id,
          'amount' => $request->amount
        ]);
        return $payment->receive();
    }


    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paytmCallback()
    {
        $transaction = PaytmWallet::with('receive');
      
        
        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
        
        if($transaction->isSuccessful()){
          Transection::where('order_id', $response['ORDERID'])
                    ->update([
                      'tnxt_id' => $response['TXNID'],
                      'status' => $response['STATUS']
                    ]);
          //Transaction Successful
          return redirect('/')->with('success', 'Thank you !! Payment Recieved Successfully.');
        }else if($transaction->isFailed()){
          //Transaction Failed
          return redirect('/')->with('error', 'Transection Failed!! Try again later');
        }else if($transaction->isOpen()){
          //Transaction Open/Processing
          return redirect('/')->with('warning', 'Transection in Processing !! We ll update you once done. Thank you');
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        $transaction->getTransactionId(); // Get transaction id
    }

    /**
     * Paytm Payment Page
     *
     * @return Object
     */
    public function paytmPurchase()
    {
        return view('payment-page');
    } 
}
