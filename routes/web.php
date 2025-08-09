<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPage;
use App\Http\Controllers\kategoriyaController;
use App\Http\Controllers\mehsulController;
use App\Http\Controllers\istifadeciController;
use App\Http\Controllers\sebetController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\odenisController;
use App\Http\Controllers\sifarislerController;
use App\Http\Controllers\Idareetme\istifadeciController as AdminIstifadeci;
use App\Http\Controllers\Idareetme\esasSehifeController as AdminEsasSehife;
use App\Http\Controllers\Idareetme\AdminKategoriyaController as Kategoriya;
use App\Http\Controllers\Idareetme\mehsulController as Mehsul;
use App\Http\Controllers\Idareetme\sifarisController as Sifaris;

Route::group(["prefix"=>"Idareetme"],function(){
    Route::redirect("/","/Idareetme/qeydiyyat");
    Route::get("/qeydiyyat",[AdminIstifadeci::class,"qeydiyyat"])->name("Idareetme.qeydiyyat");
    Route::match(["get","post"],"/qeydiyyat",[AdminIstifadeci::class,"qeydiyyat"]);
    Route::get("/cixis",[AdminIstifadeci::class,"cixis"])->name("Idareetme.cixis");
    Route::get("/esassehife", [AdminEsasSehife::class, "index"])->name("Idareetme.esassehife");

        Route::group(["prefix"=>"istifadeci"],function(){
            Route::match(["get","post"],"/",[AdminIstifadeci::class,"index"])->name("Idareetme.istifadeci");
            Route::get("/update/{id}",[AdminIstifadeci::class,"CreateOrUpdate"])->name("Idareetme.istifadeci.update");
            Route::get("/yeni",[AdminIstifadeci::class,"CreateOrUpdate"])->name("Idareetme.istifadeci.yeni");
            Route::post("/save/{id?}",[AdminIstifadeci::class,"save"])->name("Idareetme.istifadeci.save");
            Route::get("/sil/{id}",[AdminIstifadeci::class,"sil"])->name("Idareetme.istifadeci.sil");
        });

    Route::group(["prefix"=>"kategoriya"],function(){
        Route::match(["get","post"],"/",[Kategoriya::class,"index"])->name("Idareetme.kategoriya");
        Route::get("/update/{id}",[Kategoriya::class,"CreateOrUpdate"])->name("Idareetme.kategoriya.update");
        Route::get("/yeni",[Kategoriya::class,"CreateOrUpdate"])->name("Idareetme.kategoriya.yeni");
        Route::post("/save/{id?}",[Kategoriya::class,"save"])->name("Idareetme.kategoriya.save");
        Route::get("/sil/{id}",[Kategoriya::class,"sil"])->name("Idareetme.kategoriya.sil");
    });

    Route::group(["prefix"=>"mehsul"],function(){
        Route::match(["get","post"],"/",[Mehsul::class,"index"])->name("Idareetme.mehsul");
        Route::get("/update/{id}",[Mehsul::class,"CreateOrUpdate"])->name("Idareetme.mehsul.update");
        Route::get("/yeni",[Mehsul::class,"CreateOrUpdate"])->name("Idareetme.mehsul.yeni");
        Route::post("/save/{id?}",[Mehsul::class,"save"])->name("Idareetme.mehsul.save");
        Route::get("/sil/{id}",[Mehsul::class,"sil"])->name("Idareetme.mehsul.sil");
    });

    Route::group(["prefix"=>"sifaris"],function(){
        Route::match(["get","post"],"/",[Sifaris::class,"index"])->name("Idareetme.sifaris");
        Route::get("/update/{id}",[Sifaris::class,"CreateOrUpdate"])->name("Idareetme.sifaris.update");
        Route::get("/yeni",[Sifaris::class,"CreateOrUpdate"])->name("Idareetme.sifaris.yeni");
        Route::post("/save/{id?}",[Sifaris::class,"save"])->name("Idareetme.sifaris.save");
        Route::get("/sil/{id}",[Sifaris::class,"sil"])->name("Idareetme.sifaris.sil");
    });
});

Route::get("/",[MainPage::class,"index"])->name("MainPage");

Route::get("/kategoriya/{slug}",[kategoriyaController::class,"index"])->name("kategoriya");

Route::get("/mehsul/{slug}",[mehsulController::class,"index"])->name("mehsul");
Route::post("/axtar",[mehsulController::class,"axtar"])->name("axtar");
Route::get("/axtar",[mehsulController::class,"axtar"])->name("axtar");

Route::group(["prefix"=>"istifadeci"],function()
{
    Route::get("/daxilol",[istifadeciController::class,"daxilol"])
        ->name("istifadeci.daxilol");
    Route::post("/daxilol",[istifadeciController::class,"daxilolpost"])
        ->name("istifadeci.daxilolpost");
    Route::get("/qeydiyyat",[istifadeciController::class,"qeydiyyat"])
        ->name("istifadeci.qeydiyyat");
    Route::post("/qeydiyyat",[istifadeciController::class,"qeydiyyatpost"])
        ->name("istifadeci.qeydiyyatpost");
    Route::get("/aktivlesdir/{key}",[istifadeciController::class,"aktivasiya"])
        ->name("aktivasiya");
    Route::post("/cixis",[istifadeciController::class,"cixis"])->name("istifadeci.cixis");
});

Route::get("/login",function(){
    return redirect()->route("istifadeci.daxilol");
})->name("login");

Route::group(["prefix"=>"sebet"],function(){
    Route::get("/",[sebetController::class,"index"])->name("sebet");
    Route::post("/elave_et",[sebetController::class,"elave_et"])->name("sebet.elave_et");
    Route::delete("/sil/{id}",[sebetController::class,"sil"])->name("sebet.sil");
    Route::delete("/bosalt",[sebetController::class,"bosalt"])->name("sebet.bosalt");
    Route::patch("/guncelle/{id}",[sebetController::class,"guncelle"])->name("sebet.guncelle");
});

Route::get("/odenis",[odenisController::class,"index"])->name("odenis");
Route::post("/odenis",[odenisController::class,"post"])->name("odenispost");

Route::group(["middleware"=>"auth"],function(){
    Route::get("/sifarisler",[sifarislerController::class,"index"])->name("sifarisler");
    Route::get("/sifarisdetay/{id}",[sifarislerController::class,"detay"])->name("sifarisdetay");
});












































