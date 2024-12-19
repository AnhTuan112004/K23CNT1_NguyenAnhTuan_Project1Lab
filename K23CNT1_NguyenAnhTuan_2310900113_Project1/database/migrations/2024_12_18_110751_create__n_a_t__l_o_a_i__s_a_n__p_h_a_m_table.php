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
        Schema::create('NAT_LOAI_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('natMaLoai',255)->unique(); 
            $table->string('natTenLoai',255); 
            $table->tinyInteger('natTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NAT_LOAI_SAN_PHAM');
    }
};
