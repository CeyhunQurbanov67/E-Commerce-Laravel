<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriyaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("kategoriya")->truncate();

        $id1 = DB::table("kategoriya")->insertGetId(["name" => "Elektronika", "slug" => "elektronika"]);
        DB::table("kategoriya")->insert(["name" => "Komputer", "slug" => "komputer", "ust_id" => $id1]);
        DB::table("kategoriya")->insert(["name" => "Telefon", "slug" => "telefon", "ust_id" => $id1]);
        DB::table("kategoriya")->insert(["name" => "Televizor", "slug" => "televizor", "ust_id" => $id1]);
        DB::table("kategoriya")->insert(["name" => "Paltaryuyan", "slug" => "paltaryuyan", "ust_id" => $id1]);

        $id2 = DB::table("kategoriya")->insertGetId(["name" => "Qida", "slug" => "qida"]);
        DB::table("kategoriya")->insert(["name" => "Terevez", "slug" => "terevez","ust_id"=>$id2]);
        DB::table("kategoriya")->insert(["name" => "Meyve", "slug" => "meyve","ust_id"=>$id2]);
        DB::table("kategoriya")->insert(["name" => "Sud", "slug" => "sud","ust_id"=>$id2]);
        DB::table("kategoriya")->insert(["name" => "Heyvan", "slug" => "heyvan","ust_id"=>$id2]);

        $id3 = DB::table("kategoriya")->insertGetId(["name" => "Geyim", "slug" => "geyim"]);
        DB::table("kategoriya")->insert(["name" => "Salvar", "slug" => "salvar","ust_id"=>$id3]);
        DB::table("kategoriya")->insert(["name" => "Kofta", "slug" => "kofta","ust_id"=>$id3]);
        DB::table("kategoriya")->insert(["name" => "Ayaqqabi", "slug" => "ayaqqabi","ust_id"=>$id3]);
        DB::table("kategoriya")->insert(["name" => "Palto", "slug" => "palto","ust_id"=>$id3]);

       DB::statement("SET FOREIGN_KEY_CHECKS=1");
    }

}
