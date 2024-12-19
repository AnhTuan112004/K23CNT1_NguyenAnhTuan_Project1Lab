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
        Schema::create('NAT_CT_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('natHoaDonID')->references('id')->on('NAT_HOA_DON');
            $table->bigInteger('natSanPhamID')->references('id')->on('NAT_SAN_PHAM');
            $table->integer('natSoLuongMua');  // Số lượng mua
            $table->float('natDonGiaMua');  // Đơn giá mua
            $table->float('natThanhTien');  // Thành tiền
            $table->tinyInteger('natTrangThai'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NAT_CT_HOA_DON');
    }
};
