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
        Schema::create('mehsul', function (Blueprint $table) {
            $table->increments("id");
            $table->string("mehsul_adi",100);
            $table->string("mehsul_slug",100);
            $table->text("aciqlama");
            $table->decimal("qiymet","6","3");
            $table->timestamp("CREATED_TIMESTAMP")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->timestamp("UPDATED_TIMESTAMP")->default(DB::raw("CURRENT_TIMESTAMP ON
            UPDATE CURRENT_TIMESTAMP"));
            $table->timestamp("silinme_tarixi")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mehsul');
    }
};
