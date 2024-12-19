<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nat_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nat_san_pham')->insert([
        
            'natMaSanPham'  =>"VP001",
            'natTenSanPham' =>"Cây phú quý",
            'natHinhAnh'    => 'images/san-pham/VP001.jpg',
            'natSoLuong' => 100,
            'natDonGia' => 699000,
            'natMaLoai' => 1,
            'natTrangThai' => 0,
        ]);
        DB::table('nat_san_pham')->insert([
            'natMaSanPham' => 'VP002',
            'natTenSanPham' => 'Cây đại phú gia',
            'natHinhAnh' => 'images/san-pham/VP002.jpg',
            'natSoLuong' => 200,
            'natDonGia' => 550000,
            'natMaLoai' => 1,
            'natTrangThai' => 0,
        ]);
        DB::table('nat_san_pham')->insert([
            'natMaSanPham' => 'VP003',
            'natTenSanPham' => 'Cây hạnh phúc',
            'natHinhAnh' => 'images/san-pham/VP003.jpg',
            'natSoLuong' => 150,
            'natDonGia' => 250000,
            'natMaLoai' => 1,
            'natTrangThai' => 0,
        ]);
        DB::table('nat_san_pham')->insert([
            'natMaSanPham' => 'VP004',
            'natTenSanPham' => 'Cây vạn lộc',
            'natHinhAnh' => 'images/san-pham/VP004.jpg',
            'natSoLuong' => 300,
            'natDonGia' => 799000,
            'natMaLoai' => 1,
            'natTrangThai' => 0,
        ]);
        DB::table('nat_san_pham')->insert([
            'natMaSanPham' => 'PT001',
            'natTenSanPham' => 'Cây thiết mộc lan',
            'natHinhAnh' => 'images/san-pham/PT001.jpg',
            'natSoLuong' => 150,
            'natDonGia' => 590000,
            'natMaLoai' => 3,
            'natTrangThai' => 0,
        ]);
        DB::table('nat_san_pham')->insert([
            'natMaSanPham' => 'PT002',
            'natTenSanPham' => 'Cây trường sinh',
            'natHinhAnh' => 'images/san-pham/PT002.jpg',
            'natSoLuong' => 100,
            'natDonGia' => 150000,
            'natMaLoai' => 3,
            'natTrangThai' => 0,
        ]);
        DB::table('nat_san_pham')->insert([
            'natMaSanPham' => 'PT003',
            'natTenSanPham' => 'Cây hạnh phúc',
            'natHinhAnh' => 'images/san-pham/PT003.jpg',
            'natSoLuong' => 200,
            'natDonGia' => 299000,
            'natMaLoai' => 3,
            'natTrangThai' => 0,
        ]);
        DB::table('nat_san_pham')->insert([
            'natMaSanPham' => 'PT004',
            'natTenSanPham' => 'Cây hoa nhài',
            'natHinhAnh' => 'images/san-pham/PT004.jpg',
            'natSoLuong' => 300,
            'natDonGia' => 199000,
            'natMaLoai' => 3,
            'natTrangThai' => 0,
        ]);
    }
}
