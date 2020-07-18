<?php

namespace App\Http\Erp\Realestate\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Erp\Realestate\Models\RealProperties;
use App\Http\Erp\Realestate\Models\RealUnits;
use App\Http\Erp\Realestate\Models\RealContracts;
use App\Http\Erp\Realestate\Models\RealRentalTracker;
use Illuminate\Support\Facades\DB;
class ReportController extends Controller
{

  public function propertyReport(Request $request){                         
                $data = DB::select( DB::raw("
                        SELECT a.*,c.name AS property_type,COUNT(b.id) as unit_count,SUM(b.rent) as budgetted_rent FROM real_properties AS a 
                        LEFT JOIN real_units AS b ON a.id=b.property_id
                        LEFT JOIN real_masters AS c ON c.id=a.property_type
                        LEFT JOIN real_masters AS d ON d.id=b.unit_type
                        LEFT JOIN real_contracts AS e ON e.unit_id=b.id
                        GROUP BY a.id
                    ") );
        return response()->json(['data'=>$data]); 
    }  
    public function unitReport(Request $request){   
    dd($_GET);                      
                $data = DB::select( DB::raw("
                        SELECT a.*,c.name AS property_type,COUNT(b.id) as unit_count,SUM(b.rent) as budgetted_rent FROM real_properties AS a 
                        LEFT JOIN real_units AS b ON a.id=b.property_id
                        LEFT JOIN real_masters AS c ON c.id=a.property_type
                        LEFT JOIN real_masters AS d ON d.id=b.unit_type
                        LEFT JOIN real_contracts AS e ON e.unit_id=b.id
                        GROUP BY a.id
                    ") );
        return response()->json(['data'=>$data]); 
    }
  
}

