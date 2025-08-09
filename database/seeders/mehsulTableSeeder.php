<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\mehsulModel;
use Faker\Generator;
use App\Models\mehsuldetayModel;
class mehsulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        mehsulModel::truncate();
        mehsuldetayModel::truncate();
        for($i=1;$i<30;$i++){
            $mehsul_adi = $faker->sentence(2);
            $mehsul = mehsulModel::create([
                "mehsul_adi"=>$mehsul_adi,
                "mehsul_slug"=>str_slug($mehsul_adi),
                "aciqlama"=>$faker->sentence(20),
                "qiymet"=>$faker->randomFloat(2,1,20)
            ]);

            $detay = $mehsul->detay()->create([
                "goster_slider"=>rand(0,1),
                "goster_gunun_furseti"=>rand(0,1),
                "goster_one_cixan"=>rand(0,1),
                "goster_cox_satan"=>rand(0,1),
                "goster_endirimli"=>rand(0,1)
            ]);
        }
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");
    }
}
