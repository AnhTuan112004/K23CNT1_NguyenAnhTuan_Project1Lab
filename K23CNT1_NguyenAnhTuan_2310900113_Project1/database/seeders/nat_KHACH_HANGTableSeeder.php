<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class nat_KHACH_HANGTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('nat_KHACH_HANG')->insert([
            'natMaKhachHang'=>'KH001',
            'natHoTenKhachHang'=>'Nguyẽn Anh TuấnTuấn',
            'natEmail'=>'anhtuanc@gmail.com',
            'natMatKhau'=>'123456a@',
            'natDienThoai'=>'012550036',
            'natDiaChi'=>'Hà Nội-Chương Mỹ',
            'natNgayDangKy'=>'2024/12/12',
            'natTrangThai'=>0,
        ]);

        DB::table('nat_KHACH_HANG')->insert([
            'natMaKhachHang'=>'KH002',
            'natHoTenKhachHang'=>'Trần Tuấn Hưng',
            'natEmail'=>'hungtran@gmail.com',
            'natMatKhau'=>'hungyb123',
            'natDienThoai'=>'012588868',
            'natDiaChi'=>'Phú Thọ',
            'natNgayDangKy'=>'2024/12/20',
            'natTrangThai'=>0,
        ]);

        DB::table('nat_KHACH_HANG')->insert([
            'natMaKhachHang'=>'KH003',
            'natHoTenKhachHang'=>'Phan Quang Minh',
            'natEmail'=>'pminh@gmail.com',
            'natMatKhau'=>'pminh3366',
            'natDienThoai'=>'0382550508',
            'natDiaChi'=>'Phú Thọ',
            'natNgayDangKy'=>'2024/12/17',
            'natTrangThai'=>2,
        ]);

        DB::table('nat_KHACH_HANG')->insert([
            'natMaKhachHang'=>'KH004',
            'natHoTenKhachHang'=>'Phạm Tùng Quân',
            'natEmail'=>'quanpham@gmail.com',
            'natMatKhau'=>'quanpham98',
            'natDienThoai'=>'094357152',
            'natDiaChi'=>'Hà Nội',
            'natNgayDangKy'=>'2024/12/03',
            'natTrangThai'=>0,
        ]);
    }
}