<?php

namespace App\Http\Erp\Realestate\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Erp\Realestate\Models\RealProperties;
use App\Http\Erp\Realestate\Models\RealUnits;

class RealContracts extends Model
{
 	protected $guarded = [];
    protected $fillable = ['property_id','unit_id','tenant_id','start_date','end_date','rent','deposit'];
    public function property()
    {
    	return $this->hasMany(RealProperties::class, 'id', 'property_id');
    }
    public function unit()
    {
    	return $this->hasMany(RealUnits::class, 'id', 'unit_id');
    }																																			
    public static function boot() {
        parent::boot();        
        static::creating(function($model) {
            $model->company_id = 1;
            $model->branch_id =1;
            return true;
        });

        static::updating(function($model) {
            $model->company_id = 1;
            $model->branch_id =1; 
            return true;
        });
        
    }
}
