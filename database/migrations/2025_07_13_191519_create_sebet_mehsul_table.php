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
        Schema::create('sebet_mehsul', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("sebet_id")->unsigned();
            $table->integer("mehsul_id")->unsigned();;
            $table->integer("eded");
            $table->decimal("qiymet",5,2);
            $table->string("veziyyet",30);
            $table->timestamp("CREATED_TIMESTAMP")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->timestamp("UPDATED_TIMESTAMP")->default(DB::raw("CURRENT_TIMESTAMP ON
            UPDATE CURRENT_TIMESTAMP"));
            $table->timestamp("silinme_tarixi")->nullable();
            $table->foreign("sebet_id")->references("id")->on("sebet")->onDelete("cascade");
            $table->foreign("mehsul_id")->references("id")->on("mehsul")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sebet_mehsul');
    }
};
