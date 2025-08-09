<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sebet_mehsul extends Model
{
    use SoftDeletes;
    protected $table = "sebet_mehsul";
    protected $guarded = [];
    const CREATED_AT = "CREATED_TIMESTAMP";
    const UPDATED_AT  = "UPDATED_TIMESTAMP";
    const DELETED_AT = "silinme_tarixi";

    public function mehsul(){
        return $this->belongsTo("App\Models\mehsulModel");
    }
}
