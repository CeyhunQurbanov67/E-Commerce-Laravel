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
        Schema::create('kategoriya', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("ust_id")->nullable();
            $table->string("name",50);
            $table->string("slug",40);
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
        Schema::dropIfExists('kategoriya');
    }
};
