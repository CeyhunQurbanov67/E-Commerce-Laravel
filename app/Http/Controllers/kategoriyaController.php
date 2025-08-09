<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategoriyaModel;

class kategoriyaController extends Controller
{
    public function index($slug){
        $kategoriya = kategoriyaModel::where("slug",$slug)->firstOrFail();
        $alt_kategoriyalar = kategoriyaModel::where("ust_id",$kategoriya->id)->get();
        $order = request("order");
        if($order == "coxsatanlar"){
            $mehsullar = $kategoriya->mehsullar()
                ->select("mehsul.*","mehsul_detay.goster_cox_satan")
                ->distinct()
                ->join("mehsul_detay","mehsul_detay.mehsul_id","mehsul.id")
                ->orderByDesc("mehsul_detay.goster_cox_satan")
                ->paginate(2);
        }
        elseif($order = "yenimehsullar"){
            $mehsullar = $kategoriya->mehsullar()->distinct()->orderByDesc("CREATED_TIMESTAMP")->paginate(2);
        }
        else{
            $mehsullar = $kategoriya->mehsullar()->distinct()->paginate(2);
        }
        return view("kategoriya",compact("kategoriya","alt_kategoriyalar","mehsullar"));
    }
}
