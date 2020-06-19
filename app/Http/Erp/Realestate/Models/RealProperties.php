<?php

namespace App\Http\Erp\Realestate\Models;

use Illuminate\Database\Eloquent\Model;

class RealProperties extends Model
{
    protected $guarded = [];
    public function property_type()
    {
    	return $this->belongsTo(RealMasters::class);
    }

}
