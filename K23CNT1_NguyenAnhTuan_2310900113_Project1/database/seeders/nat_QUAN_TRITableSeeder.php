<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nat_QUAN_TRITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $natmatkhau = md5("123456@");
        DB::table('NAT_QUAN_TRI')->insert([
            'natTaiKhoan'=>"nguyenanhtuant647@gmail.com",
            'natMatKhau' => $natmatkhau,
            'natTrangThai' =>0
        ]);
        DB::table('NAT_QUAN_TRI')->insert([
            'natTaiKhoan'=>"0397568858",
            'natMatKhau' => $natmatkhau,
            'natTrangThai' =>0
        ]);
    }
}
