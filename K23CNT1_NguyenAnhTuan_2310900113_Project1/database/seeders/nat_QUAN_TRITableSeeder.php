<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Đảm bảo bạn đã thêm dòng này

class nat_QUAN_TRITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Mã hóa mật khẩu bằng Hash::make()
        $natMatKhau1 = Hash::make('123456a@'); // Mã hóa mật khẩu cho tài khoản anhtuan@gmail.com
        $natMatKhau2 = Hash::make('123456a@'); // Mã hóa mật khẩu cho tài khoản 0943572199

        // Thêm bản ghi vào bảng nat_QUAN_TRI với mật khẩu đã mã hóa
        DB::table('nat_QUAN_TRI')->insert([
            'natTaiKhoan' => 'anhtuan@gmail.com',
            'natMatKhau' => $natMatKhau1,
            'natTrangThai' => 0
        ]);

        DB::table('nat_QUAN_TRI')->insert([
            'natTaiKhoan' => '0943572199',
            'natMatKhau' => $natMatKhau2,
            'natTrangThai' => 0
        ]);
    }
}
