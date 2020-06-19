<?php

namespace App\Http\Erp\Realestate\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Erp\Realestate\Models\RealTenants;
class TenantController extends Controller
{
    public function create(Request $request){
            if(isset($request->id) && !empty($request->id)){
                $tenant = RealTenants::find($request->id);
            }else{
                $tenant= new RealTenants;
            }
            $tenant->name = $request->name;
            $tenant->national_id = $request->national_id;
            $tenant->phone = $request->phone;
            $tenant->nationality = $request->nationality;
            $tenant->tenant_code = 0;
            $tenant->company_id = 1;
            $tenant->branch_id = 1;
            $tenant->save(); 
    }

    public function List(Request $request){
        $properties=RealTenants::all();
        return response()->json(['data'=>$properties]); 
    }
  
}

