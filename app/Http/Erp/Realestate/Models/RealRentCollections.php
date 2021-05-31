<?php

namespace App\Http\Erp\Realestate\Models;

use Illuminate\Database\Eloquent\Model;

class RealRentCollections extends Model
{
    protected $guarded = [];
    protected $fillable = ['tracker_id','amount'];
}
