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
        Schema::create('nat_KHACH_HANG', function (Blueprint $table) {
            $table->id();
            $table->string('natMaKhachHang',255)->unique();
            $table->string('natHoTenKhachHang',255);
            $table->string('natEmail',255)->unique();
            $table->string('natMatKhau',255);
            $table->string('natDienThoai',255)->unique();
            $table->string('natDiaChi',255);
            $table->date('natNgayDangKy');
            $table->tinyInteger('natTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nat_KHACH_HANG');
    }
};