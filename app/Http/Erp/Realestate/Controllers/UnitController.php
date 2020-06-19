<?php

namespace App\Http\Erp\Realestate\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Erp\Realestate\Models\RealProperties;
use App\Http\Erp\Realestate\Models\RealUnits;
class UnitController extends Controller
{

    public function create(Request $request){
            if(isset($request->id) && !empty($request->id)){
                $unit = RealUnits::find($request->id);
            }else{
                $unit= new RealUnits;
            }
            $unit->property_id = $request->property_id;
            $unit->unit_type = $request->unit_type;
            $unit->name = $request->name;
            $unit->furnish_status = $request->furnish_status;
            $unit->rent = $request->rent;
            $unit->unit_code = 0;
            $unit->company_id = 1;
            $unit->branch_id = 1;
            $unit->save(); 
    }

    public function List(Request $request){
        $properties=RealUnits::all();
        return response()->json(['data'=>$properties]); 
    }
  
}

