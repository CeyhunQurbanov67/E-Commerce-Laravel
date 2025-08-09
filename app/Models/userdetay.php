<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userdetay extends Model
{
    protected $table = "userdetay";
    public $timestamps = false;
    protected $guarded = [];

    public function istifadeci(){
        return $this->belongsTo("App\Models\istifadeci");
    }
}
