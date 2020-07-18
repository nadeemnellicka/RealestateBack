<?php

namespace App\Http\Erp\Realestate\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Erp\Realestate\Models\RealProperties;
use App\Http\Erp\Realestate\Models\RealUnits;
use App\Http\Erp\Realestate\Models\RealContracts;
use App\Http\Erp\Realestate\Models\RealRentalTracker;
use Carbon\Carbon;
class ContractController extends Controller
{

    public function create(Request $request){
            // if(isset($request->id) && !empty($request->id)){
            //     $contract = RealContracts::find($request->id);
            // }else{
                $contract= new RealContracts;
            // }
            // dd($request->property_id);
            $contract->property_id=$request->property_id;
            $contract->unit_id=$request->unit_id;
            $contract->tenant_id=$request->tenant_id;
            $contract->tenant_id=$request->tenant_id;
            $contract->start_date=$request->start_date;
            $contract->end_date=$request->end_date;
            $contract->rent=$request->rent;
            $contract->deposit=$request->deposit;
            $contract->create($request->all());
            if($contract->save()){
                $this->makeRentTracker($contract);                              
            }
    }

    public function List(Request $request){                                                                                                                             
        $properties=RealContracts::with('property','unit')->get();           
        return response()->json(['data'=>$properties]); 
    }

    public function makeRentTracker($contract){
        $today = Carbon::today();
        $end = Carbon::parse($contract->end_date);
        $start = Carbon::parse($contract->start_date);
        if($start->day!=1){
            $lastDayofMonth =  Carbon::parse($start)->endOfMonth()->toDateString();
            $length = $start->diffInDays($lastDayofMonth);
            $firstMonthRent=ROUND($contract->rent/$start->daysInMonth * $length);
            $firstRentStartDate=$start;
        }
        else{
            $rent=$contract->rent;
        }
        for($y=$start->year;$y<=$end->year;$y++){
            for($m=$start->month;$m<=12;$m++){
                 $firstEntry=($y==$start->year && $m==$start->month)?true:false;
                 $tracker= new RealRentalTracker;
                 $startDate=Carbon::createFromDate($y, $m, 1);
                 $endDate=Carbon::parse($startDate)->endOfMonth()->toDateString();
                 $tracker->contract_id=$contract->id;
                 $tracker->amount=($firstEntry)?$firstMonthRent:$contract->rent;
                 $tracker->start_date=($firstEntry)?$firstRentStartDate:$startDate;
                 $tracker->end_date= $endDate;
                 $tracker->amount_paid= 0;
                 if($today->year<$y || ($today->year==$y && $today->month<$m)){
                    $tracker->status='pending' ;
                 }elseif($today->year==$y && $today->month==$m){
                    $tracker->status='due' ;
                 }else{
                    $tracker->status='overdue' ;
                 }
                 $tracker->save();
                //last year condition
                if($y==$end->year && $m==$end->month){
                    return true;
                }
            }
        }
    }
  
}

