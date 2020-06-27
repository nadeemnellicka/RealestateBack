<?php

namespace App\Http\Erp\Realestate\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Erp\Realestate\Models\RealProperties;
use App\Http\Erp\Realestate\Models\RealUnits;
class UnitController extends Controller
{

    public function create(Request $request){
        $unit= new RealUnits;
        $unit->create($request->all());
    }
    public function update(Request $request){
        if(isset($request->id) && !empty($request->id)){
            $unit = RealUnits::find($request->id);
        }
        $unit->update($request->all());
    }
    public function List(Request $request){
        $units=RealUnits::with('type','furnish','property')->get();   
        return response()->json(['data'=>$units]); 
    }
  
}

