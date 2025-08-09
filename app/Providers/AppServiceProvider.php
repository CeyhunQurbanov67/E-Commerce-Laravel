<?php

namespace App\Providers;

use App\Models\istifadeci;
use App\Models\kategoriyaModel;
use App\Models\mehsulModel;
use App\Models\sifarisler;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        View::composer(["Idareetme.*"],function($view){
            $bitmeVaxti = now()->addMinutes(10);
            $statistika = Cache::remember("statistika",$bitmeVaxti,function(){
                return [
                    "gozleyen_sifaris" => sifarisler::where("veziyyet","Sifarisiniz qebul olundu")->count(),
                    "toplam_mehsul" => mehsulModel::count(),
                    "toplam_istifadeci" => istifadeci::count(),
                    "toplam_ust_kategoriyalar" => kategoriyaModel::whereRaw("ust_id is null")->count(),
                    "toplam_kategoriyalar" => kategoriyaModel::count()
                ];
            });
            $view->with("statistika",$statistika);
        });

    }
}
