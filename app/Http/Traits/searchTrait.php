<?php
namespace App\Http\Traits;


trait searchTrait{

public function search($req,$model,$view)
    {
        $user = $model::where(['name','!=',NULL],
        [function($query) use ($req){
            if(($term = $request->term)){
                $query->orWhere('name','LIKE','%'.$term.'%')->orWhere('barcode','LIKE','%'.$term.'%')->get();
            }
        }])->orderBy('id','desc')->paginate(10);
        return view($view,compact($user));
    }

   

}







