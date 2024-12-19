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
        Schema::create('NAT_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('natMaSanPham', 255)->unique(); // Unique varchar(255)
            $table->string('natTenSanPham', 255); // Varchar(255)
            $table->string('natHinhAnh', 255)->nullable(); // Varchar(255) (nullable)
            $table->integer('natSoLuong'); // Integer
            $table->float('natDonGia'); // Float
            $table->bigInteger('natMaLoai')->referencs('id')->on('NAT_LOAI_SAN_PHAM');
            $table->tinyInteger('natTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NAT_SAN_PHAM');
    }
};
