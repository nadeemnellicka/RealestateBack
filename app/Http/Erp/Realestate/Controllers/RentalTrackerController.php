<?php

namespace App\Http\Erp\Realestate\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Erp\Realestate\Models\RealRentalTracker;
use App\Http\Erp\Realestate\Models\RealRentCollections;
class RentalTrackerController extends Controller
{

    public function List(Request $request){
        $rentalTracker=RealRentalTracker::with('contract')->orderBy('start_date', 'ASC')->get();                                                                                                                 
        return response()->json(['data'=>$rentalTracker]); 
    }


    public function collection(Request $request){
    	$collection= new RealRentCollections;
    	$collection->tracker_id=$request->id;
    	$collection->amount=$request->collected_amount;
    	$collection->save();
    	$updateTraker=RealRentalTracker::find($request->id);
    	$updateTraker->amount_paid=$updateTraker->amount_paid+$request->collected_amount;
    	if($updateTraker->amount_paid==$updateTraker->amount){
    		$updateTraker->status='paid';
    	}
    	$updateTraker->save();

    }

  
}

