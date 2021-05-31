<?php

namespace App\Http\Erp\Realestate\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Erp\Realestate\Models\RealMasters;
class MasterController extends Controller
{
    public function types(Request $request){
        $arr=array();
        $arr[0]['name']='Unit type';
        $arr[0]['value']='unit_type';
        $arr[1]['name']='Property Type';
        $arr[1]['value']='property_type';
        $arr[2]['name']='Furnish Status';
        $arr[2]['value']='furnish_status';
        return response()->json(['types'=>$arr]); 
    }
    public function create(Request $request){
     $valid = validator($request->only('name', 'type'), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);
        if ($valid->fails()) {
            $jsonError=response()->json($valid->errors()->all(), 400);
            return response(['status'=>'error','message'=>$jsonError]);
        }
        $data = request()->only('name','type');
            if(isset($request->id) && !empty($request->id)){
                $master = RealMasters::find($request->id);
            }else{
                $master = new RealMasters;
            }
            $master->name = $request->name;
            $master->type = $request->type;
            $master->company_id = 1;
            $master->branch_id = 1;
            $master->save(); 
    }

    public function List(Request $request){
        if(isset($request->type) && !empty($request->type) && $request->type!='null'){
            $masters = RealMasters::where('type', $request->type)->get();
        }
        else{
            $masters=RealMasters::all();
        }
      
        return response()->json(['data'=>$masters]); 

    }
  
}

