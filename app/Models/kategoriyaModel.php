<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class kategoriyaModel extends Model
{
    use SoftDeletes;
    protected $table = "kategoriya";
    protected $fillable = ["name","slug"];
    const CREATED_AT = "CREATED_TIMESTAMP";
    const UPDATED_AT  = "UPDATED_TIMESTAMP";
    const DELETED_AT = "silinme_tarixi";
    protected $guarded = [];

    public function mehsullar()
    {
        return $this->belongsToMany("App\Models\mehsulModel",
            "kategoriya_mehsul", "kategoriya_id", "mehsul_id");
    }

    public function ust_kategoriya()
    {
      return  $this->belongsTo("App\Models\kategoriyaModel","ust_id")->withDefault([
          "name"=>"ana kategoriya"
      ]);
    }
}
