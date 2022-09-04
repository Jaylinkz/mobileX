<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rate;

class exchangeRateController extends Controller
{
    public function updateRate(Request $req)
    {
        $req->validate([

            'exchange_rate'=>'required',

        ]);
        

        $rates = rate::take(1);
        if($rates){
            $rates->delete();
            rate::create($req->all());
            return back();
        }elseif($rates == null){
            rate::create($req->all());
            return back();
        }
        return 'error';
    }

}
