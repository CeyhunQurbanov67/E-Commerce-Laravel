<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mehsulModel;

class mehsulController extends Controller
{
    public function index($slug){
        $mehsul = mehsulModel::where("mehsul_slug",$slug)->firstOrFail();
         return view("mehsul",compact("mehsul"));
    }

    public function axtar(){
        $axtar = request()->input("axtar");
        $mehsullar = mehsulModel::where("mehsul_adi","like","%$axtar%")
        ->orWhere("aciqlama","like","%$axtar%")
        ->paginate(2);
        request()->flash();
        return view("axtar",compact("mehsullar"));
    }
}
