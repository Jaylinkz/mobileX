<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{product,transfer,store,manager};
use Auth;

class transferController extends Controller
{
    public function barcode()
    {
        $products = product::all();
        return view('admin.barcode',compact('products'));
    }
    public function show($id)
    {
        
        $categories = store::all();
        $product = product::find($id);
        return view('admin.products.show',compact('product','categories'));

    }
    public function transferGoods(Request $request)
    {
        $request->validate([
            'product_id'=>'required',
            'store'=>'required',
            'quantity'=>'required'
        ]);
        $storeId  = manager::find(Auth::guard('manager')->id() )->store->getId();
        $name  = $request->product_id;
        $quam = product::where('id',$name)->where('store_id',$storeId)->pluck('quantity');
        $quantity = $quam->first();
        $tt = product::where('id',$name)->where('store_id',$storeId)->pluck('name');
        $transferName = $tt->first(); 
        if($quantity < 5 || $request->quantity > $quantity){

            return back()->with('message','not enough in stock, only '.$quantity.' left.');
        }
        product::where('store_id',$storeId)->where('name',$transferName)->decrement('quantity',$request->quantity);
        product::where('name',$transferName)->where('store_id',$request->store)->increment('quantity',$request->quantity);
        return back()->with('message', 'you have successfully transferred '.$request->quantity.' '.$request->product.' to'. $request->store_id);

        
        


    }
}
