<?php

namespace App\Http\Erp\Realestate\Models;

use Illuminate\Database\Eloquent\Model;

class RealTenants extends Model
{
	protected $guarded = [];
    protected $fillable = ['name','national_id','phone','nationality'];

    public static function boot() {
        parent::boot();        
        static::creating(function($model) {
            $model->company_id =1;
            $model->branch_id =1;
            $model->tenant_code =1;
            return true;
        });
        static::updating(function($model) {
            $model->company_id = 1;
            $model->branch_id =1; 
            $model->tenant_code =1;
            return true;
        });
    }
}
