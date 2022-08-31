<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FundRequest;
use App\Models\Transection;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        $allActiveRequest = FundRequest::get()
            ->map(function ($address){
                $address['amount'] = (Int)  $address['amount'] - (Int) Transection::where('fund_id', $address['id'])
                                    ->where('status', 'TXN_SUCCESS')
                                    ->sum('amount');

                $address['total'] = Transection::where('fund_id', $address['id'])
                    ->where('status', 'TXN_SUCCESS')->count();
                return $address;
            });

        return view('home', compact('allActiveRequest'));
    }

    public function raiseFund(Request $request)
    {
        if($request->isMethod('get')){
            return view('raiseFund');
        }else if($request->isMethod('post')) {
            $fundRequest = new FundRequest();
            $raiseFund = $fundRequest->raiseFund($request);
            return redirect('home')->withStatus('New Fund Created successfully');
        }
    }
}
