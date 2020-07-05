<?php

namespace App\Http\Erp\Realestate\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Erp\Realestate\Models\RealRentalTracker;
class RentalTrackerController extends Controller
{

    public function List(Request $request){
        $rentalTracker=RealRentalTracker::with('contract')->orderBy('start_date', 'ASC')->get();                                                                                                                 
        return response()->json(['data'=>$rentalTracker]); 
    }
  
}

