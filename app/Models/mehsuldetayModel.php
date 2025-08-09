<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mehsuldetayModel extends Model
{
    protected $table = "mehsul_detay";
    protected $guarded = [];
    public $timestamps = false;

    public function mehsul(){
        return $this->belongsTo("App\Models\mehsulModel");
    }
}
