<?php

namespace App\Http\Erp\Realestate\Models;

use Illuminate\Database\Eloquent\Model;

class RealMasters extends Model
{
   public function types(){
    	return $this->hasMany(MasterLocationPincode::class);
    }
}
