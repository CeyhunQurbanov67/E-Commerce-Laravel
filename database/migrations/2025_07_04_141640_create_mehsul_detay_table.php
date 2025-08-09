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
        Schema::create('mehsul_detay', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mehsul_id')->unsigned()->unique();
            $table->boolean('goster_slider')->default(0);
            $table->boolean('goster_gunun_furseti')->default(0);
            $table->boolean('goster_one_cixan')->default(0);
            $table->boolean('goster_cox_satan')->default(0);
            $table->boolean('goster_endirimli')->default(0);
            $table->string("mehsul_sekli",50);

            $table->foreign('mehsul_id')->references('id')->on('mehsul')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mehsul_detay');
    }
};
