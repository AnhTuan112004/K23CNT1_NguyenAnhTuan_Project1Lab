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
        Schema::create('natvattu', function (Blueprint $table) {
           // $table->id();
            $table->string('natMaVTu')->primary();
            $table->string('natTenVTu')->unique();
            $table->string('natDvTinh');
            $table->float('natPhanTram');
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('natvattu');
    }
};
