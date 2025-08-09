<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\sifarisler;

class odenisController extends Controller
{
    public function index(){
        if(!auth()->check()){
            return redirect()->route("istifadeci.daxilol")
                ->with("mesaj","odenis prosesi ucun profil ile giris etmelisiniz");
        }
        else if(count(Cart::getContent())==0){
            return redirect()->route("MainPage")
                ->with("mesaj","Odenis ucun sebetde hec bir mehsul yoxdur");
        }
        else{
            $userdetay = auth()->user()->userdetay;
            return view("odenis",compact("userdetay"));
        }
    }

    public function post(){
        $sifaris = request()->all();
        $sifaris["sebet_id"] = session("aktiv_sebet_id");
        $sifaris["bank"] = "Kapital";
        $sifaris["mebleg"] = Cart::gettotal();
        $sifaris["kredit"] = 1;
        $sifaris["veziyyet"] = "Sifarisiniz qebul olundu";

        sifarisler::create($sifaris);
        Cart::clear();
        session()->forget("aktiv_sebet_id");
        return redirect()->route("sifarisler")
            ->with("mesaj","Sifarisiniz qebul olundu");
    }
}
