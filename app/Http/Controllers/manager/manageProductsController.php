<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{product,category,store,rate,manager};
use Picqer\Barcode\BarcodeGeneratorHTML;
use Auth;





class manageProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $rate = rate::take(1);
       $manager = manager::find(Auth::guard('manager')->id());
        $categories = category::all();
        try{
            $products = product::where('store_id',$manager->store->getId())->get();
            if($products){

                return view('admin.managers.index',compact('products','categories','rate'));

            }
        }catch(\throwable $th){

            return view('admin.managers.index',compact('categories','rate'));

        }
    
        //->orderBy('id','desc')->paginate(10);;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'color'=>'required',
        //     'name'=>'required',
        //     'cost_price'=>'required',
        //     'quantity'=>'required',
        //     'model'=>'required',
        //     'profit_percentage'=>'required'
        // ]);


        $productCode = rand(1234567890,50);
        $redColor = [255, 0, 0];
        // $generator = DNS1D::getBarcodeHTML($productCode, 'PHARMA');
        $generator = new BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($productCode, $generator::TYPE_STANDARD_2_5, 60);

       $rate = rate::where('id','=',1)->first()->pluck('exchange_rate')->get(0);
    //    dd($rate);
    //   dd($rateOne = $rate[0]['exchange_rate']);
       $price1 =  $request->cost_price * $rate;
       $price2 =  $request->profit_percentage/100 * $price1;
       $price3 = $price1 + $price2;
       $store_id = manager::find(Auth::guard('manager')->id());
        $product = new product;
        $product->name = $request->name;
        $product->model = $request->model;
        $product->price = $price3;
        $product->cost_price = $price1;
        $product->product_code = $productCode;
        $product->barcode = $barcode;
        $product->color = $request->color;
        $product->reorder_quantity = $request->r_quantity;
        $product->quantity= $request->quantity;
        $product->store_id = $store_id->store->getId();
        $product->save();
        if($request->has('categories')){
            $product->category()->attach($request->categories);
        }
        return back();
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

     //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = product::find($id);
        return view('admin.edit')->with('edit',$dit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required',
            'model'=> 'required',
            'quantity'=> 'required',
        ]);
        $product = Product::find($id);
        $product->update([
            'name'=> $request->name,
            'model'=> $request->model,
            'quantity'=> $quantity,
        ]);
        return to_route('Admin.categories.index')->with('success','category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $des = product::find($id);
        $des->destroy();
        return back();
    }
    
}
