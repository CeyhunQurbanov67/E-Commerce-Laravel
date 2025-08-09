<?php

namespace App\Http\Controllers\Idareetme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\istifadeci;
use Illuminate\Support\Facades\Hash;
use App\Models\userdetay;

class istifadeciController extends Controller
{
    use ValidatesRequests;
    public function qeydiyyat(){
        if(request()->isMethod("POST"))
        {
            $this->validate(request(),[
                "email"=>"required",
                "password"=>"required"
            ]);
            $credentials = [
                "email"=>request("email"),
                "password"=>request("password"),
                "admin"=> 1
            ];
            if(Auth::guard("admin")->attempt($credentials,request()->has("rememberme"))){
                return redirect()->route("Idareetme.esassehife");
            }
            else{
                return back()->withInput()->withErrors(["email"=>"Xetali"]);
            }
        }
        return view("Idareetme.qeydiyyat");
    }

    public function cixis()
    {
        Auth::guard("admin")->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route("Idareetme.qeydiyyat");
    }

    public function index(){
        if(request()->filled("axtarilan")){
            request()->flash();
            $axtarilan = request("axtarilan");
            $siyahi = istifadeci::where("adsoyad","like","%$axtarilan%")
            ->orWhere("email","like","%$axtarilan%")
            ->orderByDesc("CREATED_TIMESTAMP")->paginate(8);
        }
        else{
            $siyahi = istifadeci::orderByDesc("CREATED_TIMESTAMP")->paginate(8);
        }
        return view("Idareetme.istifadeci.index",compact("siyahi"));
    }

    public function CreateOrUpdate($id = 0)
    {
        $x = new istifadeci();
        if($id > 0) {
            $x = istifadeci::find($id);
        }
        return view("Idareetme.istifadeci.form",compact("x"));
    }

    public function save($id = 0)
    {
      $this->validate(request(),[
          "adsoyad"=>"required",
          "email"=>"required|email"
      ]);
      $data = request()->only(["adsoyad","email"]);
      if(request()->filled("password")){
          $data["password"] = Hash::make(request("password"));
      }

      if(request()->has("active") && request("active")==1){
          $data["active"] = 1;
      }
      else{
          $data["active"] = 0;
      }

      if(request()->has("admin") && request("admin")==1){
          $data["admin"] = 1;
      }
      else{
          $data["admin"] = 0;
      }

      if($id>0){
          $entry = istifadeci::where("id",$id)->firstOrFail();
          $entry->update($data);

          userdetay::updateOrCreate(
              ["istifadeci_id"=>$entry->id],
              [
                  "telefon"=>request("telefon"),
                  "adress"=>request("adress")
              ]
          );
      }

      else{
          $entry = istifadeci::create($data);
      }
      return redirect()->route("Idareetme.istifadeci")
          ->with("mesaj","Bu erazi bos buraxila bilmez");
    }

    public function sil($id)
    {
        istifadeci::destroy($id);
        return redirect()->route("Idareetme.istifadeci");
    }
}
