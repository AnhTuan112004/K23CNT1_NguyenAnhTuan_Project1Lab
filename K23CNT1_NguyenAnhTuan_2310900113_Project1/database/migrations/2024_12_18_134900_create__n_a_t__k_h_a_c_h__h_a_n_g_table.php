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
        Schema::create('NAT_KHACH_HANG', function (Blueprint $table) {
            $table->id();
            $table->string('natMaKhachHang', 255)->unique(); // Mã khách hàng duy nhất
            $table->string('natHoTenKhachHang', 255); // Họ tên khách hàng
            $table->string('natEmail', 255)->unique(); // Email duy nhất
            $table->string('natMaKhau', 255); // Mật khẩu
            $table->string('natDienThoai', 10)->unique(); // Số điện thoại duy nhất
            $table->string('natDiaChi', 255)->nullable(); // Địa chỉ
            $table->dateTime('natNgayDangKy'); // Ngày đăng ký
            $table->tinyInteger('natTrangThai'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NAT_KHACH_HANG');
    }
};
