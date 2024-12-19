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
        Schema::create('NAT_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->string('natMaHoaDon')->unique();  // Mã hóa đơn, không trùng
            $table->bigInteger('natMaKhaHang')->references('id')->on('NAT_KHACH_HANG');  // Mã khách hàng, khóa ngoại
            $table->dateTime('natNgayHoaDon');  // Ngày hóa đơn
            $table->dateTime('natNgayNhan');  // Ngày nhận
            $table->string('natHoTenKhachHang');  // Họ tên khách hàng
            $table->string('natEmail')->nullable();  // Email (nullable)
            $table->string('natDienThoai', 10);  // Số điện thoại, tối đa 10 ký tự
            $table->string('natDiaChi');  // Địa chỉ
            $table->float('natTongTriGia');  // Tổng trị giá
            $table->tinyInteger('natTrangThai');  // Trạng thái (sử dụng kiểu tinyint)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NAT_HOA_DON');
    }
};
