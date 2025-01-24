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
        Schema::create('stuff_stocks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('stuff_id');
            $table->integer('total_avaliable');
            $table->integer('total_defec');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stuff_stocks');
    }
};
