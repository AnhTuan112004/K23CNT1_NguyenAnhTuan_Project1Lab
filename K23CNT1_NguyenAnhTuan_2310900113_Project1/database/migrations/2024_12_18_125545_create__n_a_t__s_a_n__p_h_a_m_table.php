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
        Schema::create('nat_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('natMaSanPham',255)->unique();
            $table->string('natTenSanPham',255);
            $table->string('natHinhAnh',255);
            $table->Integer('natSoLuong');
            $table->float('natDonGia');
            $table->bigInteger('natMaLoai')->references('id')->on('nat_LOAI_SAN_PHAM');
            $table->string('natMoTa',1000);
            $table->tinyInteger('natTrangThai');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nat_SAN_PHAM');
    }
};