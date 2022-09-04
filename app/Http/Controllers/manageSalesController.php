<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{product,customer,manager,work};
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;

class manageSalesController extends Controller
{
    public function workerView()
    {
        $worker = work::find(Auth::guard('work')->id());
        $customers = customer::all();
        $products = product::where('store_id',$worker->store->getId())->get();
        $cart=cart::content();
        return view('admin.workers.index2',compact('products','cart','customers'));
    }
    public function indexView()
    {
        // $worker = work::find(Auth::guard('worker')->id());
        // $workers = product::where('store_id',$worker->store->getId())->get();
        $manager = manager::find(Auth::guard('manager')->id());
        $customers = customer::all();

        try
        {$products = product::where('store_id',$manager->store->getId())->get();
        $cart=cart::content();
        if($products){
            $cart=cart::content();
            return view('admin.products.index2',compact('products','cart','customers'));
        }
        }catch(\throwable){
            
            return view('admin.products.index2');

        }
    }
    
    public function search(Request $request)
    {
        // $request->validate([
        //     'item' => 'required',
        // ]);
        $cart=Cart::content();
        $term = $request->item;
        $user = product::take(5)->Where('name','LIKE','%'.$term.'%')->orWhere('product_code','LIKE','%'.$term.'%')->orWhere('model','LIKE','%'.$term.'%')->get();
    
        // $user = product::where(['name','!=',Null],
        // [function($query) use ($request){
        //     if(($term = $request->item)){
        //         product::Where('name','LIKE','%'.$term.'%')->orWhere('barcode','LIKE','%'.$term.'%')->get();
        //     }
        // }]);
        
        return view('search',compact('user','cart'));
    }
public function salesView($id)
{
    $product = product::find($id);
    return view('sales',compact('product'));
}



}
