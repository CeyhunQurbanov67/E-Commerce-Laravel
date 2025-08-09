<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sifarisler;

class sifarislerController extends Controller
{
    public function index(){
        $sifarisler = sifarisler::with("sebet")
            ->whereHas("sebet",function($query){
                $query->where("istifadeci_id",auth()->id());
            })->orderByDesc("CREATED_TIMESTAMP")->get();
        return view("sifarisler",compact("sifarisler"));
    }

    public function detay($id){
        $sifaris = sifarisler::with("sebet.sebet_mehsul.mehsul")
            ->whereHas("sebet",function($query){
                $query->where("istifadeci_id",auth()->id());
            })->where("id",$id)->firstOrFail();
        return view("sifarisdetay",compact("sifaris"));
    }
}
