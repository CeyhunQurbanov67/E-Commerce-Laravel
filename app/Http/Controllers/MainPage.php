<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategoriyaModel;
use App\Models\mehsuldetayModel;
use App\Models\mehsulModel;

class MainPage extends Controller
{
    public function index(){
        $kategoriyalar = kategoriyaModel::whereRaw("ust_id is null")->get();

        $mehsul_slider = mehsuldetayModel::with("mehsul")
            ->where("goster_slider",1)->take(4)->get();

        $mehsul_gunun_furseti = mehsulModel::select("mehsul.*")->
        join("mehsul_detay","mehsul_detay.mehsul_id","mehsul.id")
        ->where("mehsul_detay.goster_gunun_furseti",1)
            ->orderBy("UPDATED_TIMESTAMP","desc")->first();

        $mehsul_one_cixan = mehsulModel::select("mehsul.*")->
        join("mehsul_detay","mehsul_detay.mehsul_id","mehsul.id")
            ->where("mehsul_detay.goster_one_cixan",1)
            ->orderBy("UPDATED_TIMESTAMP","desc")->take(4)->get();

        $mehsul_cox_satan = mehsulModel::select("mehsul.*")->
        join("mehsul_detay","mehsul_detay.mehsul_id","mehsul.id")
            ->where("mehsul_detay.goster_cox_satan",1)
            ->orderBy("UPDATED_TIMESTAMP","desc")->take(4)->get();

        $mehsul_endirimli = mehsulModel::select("mehsul.*")->
        join("mehsul_detay","mehsul_detay.mehsul_id","mehsul.id")
            ->where("mehsul_detay.goster_endirimli",1)
            ->orderBy("UPDATED_TIMESTAMP","desc")->take(4)->get();

        return view("MainPage",compact("kategoriyalar","mehsul_slider",
            "mehsul_gunun_furseti","mehsul_one_cixan","mehsul_cox_satan","mehsul_endirimli"));
    }
}
