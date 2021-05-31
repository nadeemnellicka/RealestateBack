<?php

namespace App\Http\Erp\Realestate\Models;


use Illuminate\Database\Eloquent\Model;
use App\Http\Erp\Realestate\Models\RealContracts;

class RealRentalTracker extends Model
{
    protected $guarded = [];

    public function contract()
    {
    	return $this->hasOne(RealContracts::class, 'id', 'contract_id')->with('unit','tenant')->with('property');
    }





}
