<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sifarisler', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("sebet_id")->unsigned();
            $table->string("adsoyad",50)->nullable();
            $table->string("telefon",15)->nullable();
            $table->string("adress",200)->nullable();
            $table->decimal("mebleg",10,2);
            $table->string("bank",30)->nullable();
            $table->string("kredit",20)->nullable();
            $table->string("veziyyet",50)->nullable();

            $table->timestamp("CREATED_TIMESTAMP")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->timestamp("UPDATED_TIMESTAMP")->default(DB::raw("CURRENT_TIMESTAMP ON
            UPDATE CURRENT_TIMESTAMP"));
            $table->timestamp("silinme_tarixi")->nullable();

            $table->unique("sebet_id");
            $table->foreign("sebet_id")->references("id")->on("sebet")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sifarisler');
    }
};
