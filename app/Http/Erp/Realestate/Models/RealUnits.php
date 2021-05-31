<?php

namespace App\Http\Erp\Realestate\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Contracts\Activity;
use Illuminate\Support\Facades\Auth;
use App\User;

class RealUnits extends Model
{
	protected $guarded = [];
    protected $fillable = ['property_id','unit_type','furnish_status','name','rent'];

    public function type(){
    	return $this->hasOne(RealMasters::class,'id','unit_type');
    }
    public function furnish(){
    	return $this->hasOne(RealMasters::class,'id','furnish_status');
    }
    public function property(){
    	return $this->hasOne(RealProperties::class,'id','property_id');
    }

    public static function boot() {
        parent::boot();        
        static::creating(function($model) {
            $model->company_id =1;
            $model->branch_id =1;
            $model->unit_code =1;
           // activity()
           // ->performedOn($model)
           // ->causedBy(Auth::user())
           // ->withProperties($model)
           // ->log('edited');
            return true;
        });

        static::updating(function($model) {
            $model->company_id = 1;
            $model->branch_id =1; 
            $model->unit_code =1;
            return true;
        });
    }
}
