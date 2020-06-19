<?php

namespace App\Http\Erp\Realestate\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Erp\Realestate\Models\RealProperties;
class PropertyController extends Controller
{

    public function create(Request $request){
     // $valid = validator($request->only('name', 'type'), [
     //        'property_type'=>'required',
     //        'name' => 'required|string|max:255',
     //        'type' => 'required|string|max:255',
     //    ]);
        // if ($valid->fails()) {
        //     $jsonError=response()->json($valid->errors()->all(), 400);
        //     return response(['status'=>'error','message'=>$jsonError]);
        // }
            if(isset($request->id) && !empty($request->id)){
                $property = RealProperties::find($request->id);
            }else{
                $property= new RealProperties;
            }
            $property->property_type = $request->property_type;
            $property->name = $request->name;
            $property->building_no = $request->building_no;
            $property->address = $request->address;
            $property->phone = $request->phone;
            $property->national_id = $request->national_id;
            $property->elecrticity_no = $request->elecrticity_no;
            $property->rent = $request->rent;
            $property->electricity_charges = $request->electricity_charges;
            $property->other_expenses = $request->other_expenses;
            $property->company_id = 1;
            $property->branch_id = 1;
            $property->save(); 
    }

    public function List(Request $request){
        $properties=RealProperties::all();
        return response()->json(['data'=>$properties]); 
    }
  
}

