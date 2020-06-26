<?php

namespace App\Http\Erp\Realestate\Models;


use Illuminate\Database\Eloquent\Model;
use App\Http\Erp\Realestate\Models\RealContracts;

class RealRentalTracker extends Model
{
    protected $guarded = [];

    public function contracts()
    {
    	return $this->hasOne(RealContracts::class, 'id', 'contract_id');
    }
}
