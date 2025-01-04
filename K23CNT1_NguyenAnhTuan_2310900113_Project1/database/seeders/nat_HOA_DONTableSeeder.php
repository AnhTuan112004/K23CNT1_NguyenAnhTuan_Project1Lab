<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class nat_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('nat_HOA_DON')->insert([
            'natMaHoaDon'=>'HD001',
            'natMaKhachHang'=>1,
            'natNgayHoaDon'=>'2024/12/12',
            'natNgayNhan'=>'2024/12/12',
            'natHoTenKhachHang'=>'Nguyẽn Anh Tuấn',
            'natEmail'=>'anhtuanc@gmail.com',
            'natDienThoai'=>'012550036',
            'natDiaChi'=>'Hà Nội-Chương Mỹ',
            'natTongGiaTri'=>'790000',
            'natTrangThai'=>2,
        ]); 

        DB::table('nat_HOA_DON')->insert([
            'natMaHoaDon'=>'HD002',
            'natMaKhachHang'=>2,
            'natNgayHoaDon'=>'2024/12/20',
            'natNgayNhan'=>'2024/12/21',
            'natHoTenKhachHang'=>'Trần Tuấn Hưng',
            'natEmail'=>'hungtran@gmail.com',
            'natDienThoai'=>'012588868',
            'natDiaChi'=>'Phú Thọ',
            'natTongGiaTri'=>'125000',
            'natTrangThai'=>0,
        ]);

        DB::table('nat_HOA_DON')->insert([
            'natMaHoaDon'=>'HD003',
            'natMaKhachHang'=>3,
            'natNgayHoaDon'=>'2024/12/17',
            'natNgayNhan'=>'2024/12/17',
            'natHoTenKhachHang'=>'Phan Quang Minh',
            'natEmail'=>'pminh@gmail.com',
            'natDienThoai'=>'0382550508',
            'natDiaChi'=>'Phú Thọ',
            'natTongGiaTri'=>'999000',
            'natTrangThai'=>1,
        ]);

        DB::table('nat_HOA_DON')->insert([
            'natMaHoaDon'=>'HD004',
            'natMaKhachHang'=>1,
            'natNgayHoaDon'=>'2024/12/12',
            'natNgayNhan'=>'2024/12/12',
            'natHoTenKhachHang'=>'Vũ Tiến Đức',
            'natEmail'=>'vuducc@gmail.com',
            'natDienThoai'=>'012550036',
            'natDiaChi'=>'Yên Bái-Yên Bình',
            'natTongGiaTri'=>'660000',
            'natTrangThai'=>1,
        ]);

        DB::table('nat_HOA_DON')->insert([
            'natMaHoaDon'=>'HD005',
            'natMaKhachHang'=>4,
            'natNgayHoaDon'=>'2024/12/03',
            'natNgayNhan'=>'2024/12/04',
            'natHoTenKhachHang'=>'Phạm Tùng Quân',
            'natEmail'=>'quanpham@gmail.com',
            'natDienThoai'=>'094357152',
            'natDiaChi'=>'Hà Nội',
            'natTongGiaTri'=>'777999',
            'natTrangThai'=>1,
        ]);
   
}}