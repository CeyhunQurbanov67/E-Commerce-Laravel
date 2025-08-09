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
        Schema::create('userdetay', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("istifadeci_id")->unsigned();
            $table->string("adress",200)->nullable();
            $table->string("telefon",15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdetay');
    }
};
