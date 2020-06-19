<?php

namespace App\Http\Erp\Realestate\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Erp\Realestate\Models\RealProperties;
use App\Http\Erp\Realestate\Models\RealUnits;
use App\Http\Erp\Realestate\Models\RealContracts;
class ContractController extends Controller
{

    public function create(Request $request){
            if(isset($request->id) && !empty($request->id)){
                $contract = RealContracts::find($request->id);
            }else{
                $contract= new RealContracts;
            }
            $contract->property_id = $request->property_id;
            $contract->unit_id = $request->unit_id;
            $contract->tenant_id = $request->tenant_id;
            $contract->start_date = $request->start_date;
            $contract->end_date = $request->end_date;
            $contract->rent = $request->rent;
            $contract->deposit = $request->deposit;
            $contract->company_id = 1;
            $contract->branch_id = 1;
            $contract->save(); 
    }

    public function List(Request $request){
        $properties=RealContracts::all();
        return response()->json(['data'=>$properties]); 
    }
  
}

