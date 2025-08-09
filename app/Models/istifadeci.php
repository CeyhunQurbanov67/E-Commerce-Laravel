<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class istifadeci extends Authenticatable
{
    use SoftDeletes;
    protected $table = "istifadeci";
    protected $fillable = ['adsoyad', 'email', 'password',"aktivasiya","active","admin"];
    protected $hidden = ['password', 'aktivasiya'];
    const CREATED_AT = "CREATED_TIMESTAMP";
    const UPDATED_AT  = "UPDATED_TIMESTAMP";
    const DELETED_AT = "silinme_tarixi";

    public function userdetay(){
        return $this->hasOne("App\Models\userdetay")->withDefault();
    }
}
