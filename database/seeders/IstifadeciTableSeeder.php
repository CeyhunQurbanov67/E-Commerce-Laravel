<?php

namespace Database\Seeders;

use App\Models\istifadeci;
use App\Models\userdetay;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class IstifadeciTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        istifadeci::truncate();
        userdetay::truncate();

        $admin = istifadeci::create([
            "adsoyad"=> "Ceyhun Qurbanov",
            "email"=> "qurbanov66@gmail.com",
            "password"=> bcrypt("11111"),
            "active"=>1,
            "admin"=>1
        ]);

        $admin->userdetay()->create([
            "adress"=>"Gence",
            "telefon"=>"055 452 54 20"
        ]);

        for($i=0; $i<50; $i++){
            $musteri = istifadeci::create([
                "adsoyad"=> $faker->name,
                "email"=> $faker->unique()->safeEmail,
                "password"=> bcrypt("11111"),
                "active"=>1,
            ]);

            $musteri->userdetay()->create([
                "adress"=>$faker->address,
                "telefon"=>$faker->e164phoneNumber
            ]);
        }

        DB::statement("SET FOREIGN_KEY_CHECKS=1;");
    }


}
