<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{work,store};

class salesPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = store::all();
        $workers = work::all();
        
        return view('admin.workers.index',compact('workers','stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.salesPerson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6',
            'phone_no'=>'required',
            'store_id'=>'required'
        ]);
        $manager = new work;
        $manager->name = $request->name;
        $manager->email = $request->email;
        $manager->password = bcrypt($request->password);
        $manager->phone_no = $request->phone_no;
        $manager->store_id = $request->store_id;
        $manager->save();
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
        $product = work::find($id);
        return view('admin.workers.edit',compact('product'));
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
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|max:8|min:6',

        ]);
        $manager = work::find($id);
        $manager->update($request->all());
        // $manager->name = $request->name;
        // $manage;r->email = $request->email;
        // $manager->password = bcrypt($request->password);
        // $manager->update()
        return to_route('salesPerson.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $del = work::find($id);
       $del->delete();
       return back();
    }
}
