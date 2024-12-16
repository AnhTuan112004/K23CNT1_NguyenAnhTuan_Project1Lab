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
        Schema::create('natctdondh', function (Blueprint $table) {
            // $table->id();
            //$table->timestamps();
            $table->string('natMaDH');
            $table->string('natMaVTu');
            $table->integer('natSlDat');
            // Tao Khoa chinh cho 2 cot 
            $table->primary(['natMaDH','natMaVTu']);
            // khoa ngoai
            $table->foreign('natMaVTu')->references('natMaVTu')->on('natvattu');
            $table->foreign('natMaDH')->references('natMaDH')->on('natdondh');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('natctdondh');
    }
};
