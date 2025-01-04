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
        Schema::create('nat_TIN_TUC', function (Blueprint $table) {
            $table->id();
            $table->string('natMaTT')->unique(); // Assuming 'natMaTT' is unique, add unique constraint if needed
            $table->string('natTieuDe');
            $table->text('natMoTa'); // 'text' type is better for longer descriptions
            $table->longText('natNoiDung'); // 'longText' for potentially larger content
            $table->dateTime('natNgayDangTin'); // Store as datetime
            $table->dateTime('natNgayCapNhap'); // Store as datetime
            $table->string('natHinhAnh');
            $table->tinyInteger('natTrangThai'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nat_TIN_TUC');
    }
};