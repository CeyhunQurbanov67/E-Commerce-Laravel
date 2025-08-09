<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class mehsulModel extends Model
{
    use SoftDeletes;
    protected $table = "mehsul";
    const CREATED_AT = "CREATED_TIMESTAMP";
    const UPDATED_AT  = "UPDATED_TIMESTAMP";
    const DELETED_AT = "silinme_tarixi";
    protected $guarded = [];

    public function kategoriyalar(){
        return $this->belongsToMany("App\Models\kategoriyaModel","kategoriya_mehsul",
            "mehsul_id","kategoriya_id");
    }

    public function detay(){
        return $this->hasOne("App\Models\mehsuldetayModel","mehsul_id");
    }
}
