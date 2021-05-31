<?php

namespace App\Http\Erp\Realestate\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Erp\Realestate\Models\RealProperties;
class PropertyController extends Controller
{

    public function create(Request $request){
        $property= new RealProperties;
        $property->create($request->all());
    }
    public function update(Request $request){
        if(isset($request->id) && !empty($request->id)){
            $property = RealProperties::find($request->id);
        }
        $property->update($request->all());
    }

    public function List(Request $request){
        $properties=RealProperties::with('types')->get();                                                                                                                 
        return response()->json(['data'=>$properties]); 
    }
  
}

