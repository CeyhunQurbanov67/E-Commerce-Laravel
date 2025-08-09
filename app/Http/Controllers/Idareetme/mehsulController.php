<?php

namespace App\Http\Controllers\Idareetme;

use App\Http\Controllers\Controller;
use App\Models\istifadeci;
use App\Models\mehsuldetayModel;
use App\Models\mehsulModel;
use App\Models\userdetay;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class mehsulController extends Controller
{
    use ValidatesRequests;
    public function index(){
        if(request()->filled("axtarilan")){
            request()->flash();
            $axtarilan = request("axtarilan");
            $siyahi = mehsulModel::where("mehsul_adi","like","%$axtarilan%")
                ->orWhere("aciqlama","like","%$axtarilan%")
                ->orderByDesc("id")->paginate(8);
        }
        else{
            $siyahi = mehsulModel::orderByDesc("id")->paginate(8);
        }
        return view("Idareetme.mehsul.index",compact("siyahi"));
    }

    public function CreateOrUpdate($id = 0)
    {
        $x = new mehsulModel();
        if($id > 0) {
            $x = mehsulModel::find($id);
        }
        return view("Idareetme.mehsul.form",compact("x"));
    }

    public function save($id = 0)
    {
        $this->validate(request(),[
            "mehsul_adi"=>"required",
        ]);
        $data = request()->only(["mehsul_adi","mehsul_slug","aciqlama","qiymet"]);
        if(!request()->filled("mehsul_slug")){
            $data["mehsul_slug"] = str_slug($data["mehsul_adi"]);
        }
        if($id>0){
            $entry = mehsulModel::where("id",$id)->firstOrFail();
            $entry->update($data);
        }

        else{
            $entry = mehsulModel::create($data);
        }

        if(request()->hasFile("mehsul_sekli"))
        {
            $this->validate(request(),[
                "mehsul_sekli"=>"image|mimes:jpeg,png,jpg,gif|max:2048"
            ]);
            $mehsul_sekli = request()->file("mehsul_sekli");
            $fayl_adi = $entry->id . "." . time() . "." . $mehsul_sekli->extension();

            if($mehsul_sekli->isValid())
            {
                $mehsul_sekli->move(public_path("uploads/mehsullar"),$fayl_adi);

                mehsuldetayModel::updateOrCreate(
                    ["mehsul_id"=>$entry->id],
                    ["mehsul_sekli"=>$fayl_adi]
                );
            }
        }

        return redirect()->route("Idareetme.mehsul")
            ->with("mesaj","Bu erazi bos buraxila bilmez");
    }

    public function sil($id)
    {

        $mehsul = mehsulModel::find($id);
        $mehsul->detay()->delete();
        $mehsul->kategoriyalar()->detach();
        $mehsul->delete();
        return redirect()->route("Idareetme.mehsul");
    }
}
