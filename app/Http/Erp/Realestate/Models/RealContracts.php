<?php

namespace App\Http\Erp\Realestate\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Erp\Realestate\Models\RealProperties;

class RealContracts extends Model
{
 	protected $guarded = [];
    protected $fillable = ['property_id','unit_id','tenant_id','start_date','end_date','rent','deposit'];
    public function property()
    {
    	return $this->hasOne(RealProperties::class, 'property_id', 'id');
    }
    // public static function boot() {
    //     parent::boot();        
    //     static::creating(function($model) {
    //         $model->company_id = 1;
    //         $model->branch_id =1;
    //         return true;
    //     });

    //     static::updating(function($model) {
    //         $model->company_id = 1;
    //         $model->branch_id =1; 
    //         return true;
    //     });
        
    // }
}
