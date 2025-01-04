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
        Schema::create('nat_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->string('natMaHoaDon', 255)->unique();
            
            // Định nghĩa khóa ngoại cho natMaKhachHang
            $table->bigInteger('natMaKhachHang')->unsigned();
            $table->foreign('natMaKhachHang')
                  ->references('id')->on('nat_KHACH_HANG')
                  ->onDelete('cascade');  // Xóa hóa đơn khi khách hàng bị xóa
            
            $table->date('natNgayHoaDon');
            $table->date('natNgayNhan');
            $table->string('natHoTenKhachHang', 255);
            $table->string('natEmail', 255);
            $table->string('natDienThoai', 255);
            $table->string('natDiaChi', 255);
            $table->float('natTongGiaTri');
            $table->tinyInteger('natTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nat_HOA_DON');
    }
};