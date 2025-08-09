<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sifarisler extends Model
{
    use SoftDeletes;
    protected $table = "sifarisler";
    protected $fillable = ["adsoyad","adress","telefon","bank","kredit","veziyyet","mebleg","sebet_id"];
    const CREATED_AT = "CREATED_TIMESTAMP";
    const UPDATED_AT  = "UPDATED_TIMESTAMP";
    const DELETED_AT = "silinme_tarixi";

    public function sebet(){
        return $this->belongsTo("App\Models\sebet");
    }

}
