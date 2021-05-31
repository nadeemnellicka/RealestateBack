<?php

namespace App\Http\Erp\Realestate\Models;

use Illuminate\Database\Eloquent\Model;

class RealProperties extends Model
{
    protected $guarded = [];
    protected $fillable = ['property_type','building_no','elecrticity_no','name','phone','national_id','rent','electricity_charges','other_expenses','address'];

    public function types(){
    	return $this->hasOne(RealMasters::class,'id','property_type');
    }

    public static function boot() {
        parent::boot();        
        static::creating(function($model) {
            $model->company_id =1;
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
