<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class sebet extends Model
{
    use SoftDeletes;
    protected $table = "sebet";
    protected $guarded = [];
    const CREATED_AT = "CREATED_TIMESTAMP";
    const UPDATED_AT  = "UPDATED_TIMESTAMP";
    const DELETED_AT = "silinme_tarixi";

    public function mehsul_sayi(){
        return DB::table("sebet_mehsul")->where("sebet_id",$this->id)->sum("eded");
    }

    public function sebet_mehsul(){
        return $this->hasMany("App\Models\sebet_mehsul");
    }

    public function istifadeci(){
        return $this->belongsTo("App\Models\istifadeci");
    }
}
