<?php

namespace App\Http\Controllers\Idareetme;

use App\Http\Controllers\Controller;
use App\Models\istifadeci;
use App\Models\kategoriyaModel;
use App\Models\userdetay;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminKategoriyaController extends Controller
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
        if(request()->filled("axtarilan") || request()->filled("ust")){
            request()->flash();
            $axtarilan = request("axtarilan");
            $ust = request("ust");
            $siyahi = kategoriyaModel::with("ust_kategoriya")->where("name","like","%$axtarilan%")
                ->where("ust_id",$ust)
                ->orderByDesc("CREATED_TIMESTAMP")->paginate(8);
        }
        else{
            $siyahi = kategoriyaModel::with("ust_kategoriya")
                ->orderByDesc("CREATED_TIMESTAMP")->paginate(8);
        }
        $ust_kategoriyalar = kategoriyaModel::whereRaw("ust_id is null")->get();
        return view("Idareetme.kategoriya.index",compact("siyahi","ust_kategoriyalar"));
    }

    public function CreateOrUpdate($id = 0)
    {
        $x = new kategoriyaModel();
        if($id > 0) {
            $x = kategoriyaModel::find($id);
        }
        $kategoriyalar = kategoriyaModel::all();
        return view("Idareetme.kategoriya.form",compact("x","kategoriyalar"));
    }

    public function save($id = 0)
    {
        $this->validate(request(),[
            "name"=>"required",
            "slug"=>"unique:kategoriya,slug"
        ]);
        $data = request()->only(["name","ust_id","slug"]);
        if(!request()->filled("slug")){
            $data["slug"] = str_slug($data["name"]);
        }

        if(kategoriyaModel::whereSlug($data["slug"])->count() > 0){
            return back()->withInput()->withErrors(["slug"=>"Slug deyeri onceden qeyd edilmisdir"]);
        }

        if($id>0){
            $entry = kategoriyaModel::where("id",$id)->firstOrFail();
            $entry->update($data);
        }
        else{
            $entry = kategoriyaModel::create($data);
        }

        return redirect()->route("Idareetme.kategoriya")
            ->with("mesaj","Bu erazi bos buraxila bilmez");
    }

    public function sil($id)
    {
        $kategoriya = kategoriyaModel::find($id);
        $kategoriya->mehsullar()->detach();
        $kategoriya->delete();
        return redirect()->route("Idareetme.kategoriya");
    }
}
