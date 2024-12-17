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
        Schema::create('natdondh', function (Blueprint $table) {
           // $table->id();
            $table->string('natSoDH')->primary();
            $table->date('natNgayDH');
            $table->string('natMaNCC');
            $table->foreign('natMaNCC')->references('natMaNCC')->on('natnhacc');
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('natdondh');
    }
};
