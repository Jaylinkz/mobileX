<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use Carbon\Carbon;
use Auth;

class salesTrackingController extends Controller
{
    public function dailyAdmin()
    {
        $today = item::whereDate('created_at',Carbon::today())->orderBy('id','desc')->paginate(10);
        $price = item::whereDate('created_at',Carbon::today())->sum('price');
        $months = item::whereDate('created_at',Carbon::now()->addMonth())->orderBy('id','desc')->paginate(10);
        $monthsPrice = item::whereDate('created_at',Carbon::now()->addMonth())->sum('price');
        $carbonQuater = item::whereDate('created_at',Carbon::now()->addMonth())->sum('price');
        return view('stats',compact('today','price','months','monthsPrice','carbonQuater'));


    }

    public function dailyManager()
    {
        $today = item::whereDate('created_at',Carbon::today())->where('store_id',Auth::guard('manager')->id())->get();
        $price = item::whereDate('created_at',Carbon::today())->where('store_id',Auth::guard('manager')->id())->sum('price');
        $months = item::whereDate('created_at',Carbon::now()->addMonth())->where('store_id',Auth::guard('manager')->id())->get();
        $monthsPrice = item::whereDate('created_at',Carbon::now()->addMonth())->where('store_id',Auth::guard('manager')->id())->sum('price');
        $carbonQuater = item::whereDate('created_at',Carbon::now()->addMonth())->where('store_id',Auth::guard('manager')->id())->get();
        return view('stats',compact('today','price','months','monthsPrice','carbonQuater'));


    }
    public function deptPaid($id)
    {
        $credit = item::find($id);
        $credit->sale_type = 'cash';
        $credit->update();
        return back();
    }
    public function dailyView()
    {
        $today = item::whereDate('created_at',Carbon::today())->orderBy('id','desc')->paginate(10);
        return view('stats.daily',compact('today'));
    }
    public function creditSales()
    {
        $today = item::where('sale_type','credit')->orderBy('id','desc')->paginate(10);
        return view('stats.credits',compact('today'));
    }
    public function managerDailyView()
    {
        $today = item::whereDate('created_at',Carbon::today())->orderBy('id','desc')->paginate(10);
        return view('stats.daily',compact('today'));
    }


}
