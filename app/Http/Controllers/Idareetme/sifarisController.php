<?php

namespace App\Http\Controllers\Idareetme;

use App\Http\Controllers\Controller;
use App\Models\istifadeci;
use App\Models\sifarisler;
use App\Models\userdetay;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class sifarisController extends Controller
{
    use ValidatesRequests;
    public function index(){
        if(request()->filled("axtarilan")){
            request()->flash();
            $axtarilan = request("axtarilan");
            $siyahi = sifarisler::with("sebet.istifadeci")->where("adsoyad","like","%$axtarilan%")
                ->orWhere("id","like","%$axtarilan%")
                ->orderByDesc("CREATED_TIMESTAMP")->paginate(8);
        }
        else{
            $siyahi = sifarisler::with("sebet.istifadeci")->orderByDesc("CREATED_TIMESTAMP")->paginate(8);
        }
        return view("Idareetme.sifaris.index",compact("siyahi"));
    }

    public function CreateOrUpdate($id)
    {
        $x = sifarisler::find($id);
        return view("Idareetme.sifaris.form",compact("x"));
    }

    public function save($id)
    {
        $this->validate(request(),[
            "adsoyad"=>"required",
            "telefon"=>"required",
            "adress"=>"required"
        ]);
        $data = request()->only(["adsoyad","telefon","adress","veziyyet"]);
        $entry = sifarisler::where("id",$id)->firstOrFail();
        $entry->update($data);
        return redirect()->route("Idareetme.sifaris")
            ->with("mesaj","Guncellendi");
    }

    public function sil($id)
    {
        sifarisler::destroy($id);
        return redirect()->route("Idareetme.sifaris");
    }
}
