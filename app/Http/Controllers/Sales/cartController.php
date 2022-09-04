<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{product,customer,item,manager,work};
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;

class cartController extends Controller
{
    public function cartView()
    {
        return view('cart');
    }
    public function index()
    {
        $customers = customer::all();
        $products = product::all();
        $cart = Cart::content();
        // return view('admin.products.index2',compact('customers'));
    }
    public function addToCart(Request $request)
    {
        $product = product::findOrFail($request->product_id);

        Cart::add($product->id,
        $product->name,
        $request->quantity,
        $product->price
    );
    return back()->with('message', 'added to cart');
    }
    public function checkout(Request $request)
    {
        $workerId = Auth::guard('work')->id();
        $cart = Cart::content();
        $products = product::select('id','quantity')
        ->whereIn('id',$cart->pluck('id'))->pluck('quantity','id');
        foreach($cart as $cartProduct){
            $product = product::find($cartProduct->id);
            if($product && $product->quantity < $cartProduct->qty){

                return back()->with('message',' insufficient quantity in stock');

            }
            foreach($cart as $cartProduct){
                item::create([
                    'product_id'=>$cartProduct->id,
                    'work_id'=> $workerId,//Auth::guard('work')->id(),
                    'sale_type'=>'credit',//$request->sale_type,
                    'price'=>$cartProduct->price,
                    'quantity'=>$cartProduct->qty,
                    'customer_id'=> 2//$request->customer
                ]);
            }
            
            Cart::destroy();
            return back()->with('message','sale completed');


        }

    }
}
