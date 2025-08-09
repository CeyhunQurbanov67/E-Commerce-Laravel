<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\istifadeci;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Mail\istifadeciQeydiyyatMail;
use Illuminate\Support\Facades\Mail;
use App\Models\userdetay;

class istifadeciController extends BaseController
{
    use ValidatesRequests;
    public function __construct()
    {
        $this->middleware("guest")->except("cixis");
    }

    public function daxilol(){
        return view("istifadeci.daxilol");
    }

    public function daxilolpost(){
        $this->validate(request(),[
            "email"=>"required|email",
            "password"=>"required"
        ]);
        if(auth()->attempt(["email"=>request("email"),
            "password"=>request("password")],
            request()->has("benihatirla")))
        {
            request()->session()->regenerate();
            return redirect()->intended("/");
        }
        else{
            $errors = ["email"=>"Xetali Sehife"];
            return back()->withErrors($errors);
        }
    }

    public function qeydiyyat(){
        return view("istifadeci.qeydiyyat");
    }

    public function qeydiyyatpost(){
        $this->validate(request(),[
            "adsoyad"=> "required|min:5|max:50",
            "email"=> "required|email|unique:istifadeci",
            "password"=>"required|confirmed|min:5|max:50"
        ]);
        $istifadeci = istifadeci::create([
            "adsoyad" => request("adsoyad"),
            "email"=> request("email"),
            "password"=> Hash::make(request("password")),
            "aktivasiya"=> Str::random(60),
            "active"=> 0
        ]);
        $istifadeci->userdetay()->save(new userdetay());
        Mail::to(request("email"))->send(new istifadeciQeydiyyatMail($istifadeci));
        auth()->login($istifadeci);
        return redirect()->route("MainPage");
    }

    public function aktivasiya($key){
        $istifadeci = istifadeci::where("aktivasiya",$key)->first();
        if(!is_null($istifadeci)){
            $istifadeci->aktivasiya = null;
            $istifadeci->active = 1;
            $istifadeci->save();
            return redirect()->to("/")
                ->with("mesaj","Istifadeci qeydiyyatiniz aktivlesdirildi")
                ->with("mesaj_nov","success");
        }
        else{
            return redirect()->to("/")
                ->with("mesaj","Istifadeci qeydiyyatiniz aktivlesdirilmedi")
                ->with("mesaj_nov","warning");
        }
    }

    public function cixis(){
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route("MainPage");
    }
}
