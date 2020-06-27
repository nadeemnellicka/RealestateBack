<?php

namespace App\Http\Erp\Realestate\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Erp\Realestate\Models\RealTenants;
class TenantController extends Controller
{
    public function create(Request $request){
        $tenant= new RealTenants;
        $tenant->create($request->all());
    }
    public function update(Request $request){
        if(isset($request->id) && !empty($request->id)){
            $tenant = RealTenants::find($request->id);
            $tenant->udpate($request->all());
        }
    }

    public function List(Request $request){
        $tenant=RealTenants::all();
        return response()->json(['data'=>$tenant]); 
    }
  
}

