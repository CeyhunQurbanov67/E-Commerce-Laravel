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
        Schema::create('istifadeci', function (Blueprint $table) {
            $table->increments("id");
            $table->string("adsoyad",100);
            $table->string("email",100)->unique();
            $table->string("password",100);
            $table->string("aktivasiya",100)->nullable();
            $table->boolean("active")->default(0);
            $table->boolean("admin")->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('istifadeci');
    }
};
