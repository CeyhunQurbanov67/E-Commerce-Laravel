<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mehsulModel;
use Cart;
use App\Models\sebet;
use App\Models\sebet_mehsul;
use Illuminate\Support\Facades\DB;

class sebetController extends Controller
{
    public function index()
    {
        return view("sebet");
    }

    public function elave_et()
    {
        $mehsul=mehsulModel::find(request("id"));
         Cart::add([
            'id' => $mehsul->id,
            'name' => $mehsul->mehsul_adi,
            'price' => $mehsul->qiymet,
            'quantity' => 1,
            'attributes'=> [
                'rowId'=> md5($mehsul->id)
            ]
        ]);
        if(auth()->check())
        {
            $aktiv_sebet_id = session("aktiv_sebet_id");
            if(!isset($aktiv_sebet_id)) {
                $aktiv_sebet = sebet::create([
                    "istifadeci_id" => auth()->id()
                ]);
                $aktiv_sebet_id = $aktiv_sebet->id;
                session()->put("aktiv_sebet_id", $aktiv_sebet_id);
            }
            sebet_mehsul::updateOrCreate(
                ["sebet_id"=>$aktiv_sebet_id,"mehsul_id"=>$mehsul->id],
                ["eded"=>1,"qiymet"=>$mehsul->qiymet,"veziyyet"=>"gozlemede"]
            );
        }
        return redirect()->route("sebet")->with("mesaj","Mehsul sebete elave edildi");
    }

    public function sil($id)
    {
        if(auth()->check()){
            $aktiv_sebet_id = session("aktiv_sebet_id");
            sebet_mehsul::where("sebet_id",$aktiv_sebet_id)->where("mehsul_id",$id)->delete();
        }
        Cart::remove($id);
        return redirect()->route("sebet");
    }

    public function bosalt()
    {
        if(auth()->check()){
            $aktiv_sebet_id = session("aktiv_sebet_id");
            sebet_mehsul::where("sebet_id",$aktiv_sebet_id)->delete();
        }
        Cart::clear();
        return redirect()->route("sebet")->with("mesaj","Sebet bosaldildi");
    }
}
