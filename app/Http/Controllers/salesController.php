<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{product,sale,work,item};
use Auth;

class salesController extends Controller
{

    public function index($id)
    {
        $product = product::find($id);
        return view('admin.sales.sales',compact('product'));
    }
    public function sales(Request $request)
    {
        $quantity = product::where('id','=',$request->product_id)->pluck('quantity')->get(0);
        //  dd($request->quantity);


        if( $quantity < floatval($request->quantity))
        {
            return back()->with('message','not enough in stock');

        }
        $quantity = product::where('id','=',$request->product_id)->decrement('quantity',$request->quantity);

        $sale = new item;
        $sale->product_id = $request->product_id;
        $sale->price = $request->price;
        $sale->quantity = $request->quantity;
        $sale->sale_type = $request->sale_type;
        $sale->work_id = Auth::guard('work')->id();
        $sale->payment_method = $request->payment_method;
        $sale->save();
        return to_route('workerIndex')->with('message','sale completed successfully');




    }
}
