<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nat_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('nat_SAN_PHAM')->insert([
            'natMaSanPham' => 'HB001',
            'natTenSanPham' => 'Laptop HP',
            'natHinhAnh' => asset('img/san_pham/HB001.jpg'),
            'natSoLuong' => 100,
            'natDonGia' => 699000,
            'natMaLoai' => 2,
            'natMoTa' => 'Laptop .',
            'natTrangThai' => 0
        ]);
        
       
        
        DB::table('nat_SAN_PHAM')->insert([
            'natMaSanPham' => 'MB001',
            'natTenSanPham' => 'Laptop Apple (Macbook)',
            'natHinhAnh' => asset('img/san_pham/MB001.jpg'),
            'natSoLuong' => 100,
            'natDonGia' => 250000,
            'natMaLoai' => 1,
            'natMoTa' => 'Laptop Apple,p.',
            'natTrangThai' => 0
        ]);
        
        DB::table('nat_SAN_PHAM')->insert([
            'natMaSanPham' => 'LE001',
            'natTenSanPham' => 'Laptop Lenovo',
            'natHinhAnh' => asset('img/san_pham/LE001.jpg'),
            'natSoLuong' => 150,
            'natDonGia' => 590000,
            'natMaLoai' => 3,
            'natMoTa' => '
Laptop í.',
            'natTrangThai' => 0
        ]);

        DB::table('nat_SAN_PHAM')->insert([
            'natMaSanPham' => 'DE001',
            'natTenSanPham' => 'Laptop Dell',
            'natHinhAnh' => asset('img/san_pham/DE001.jpg'),
            'natSoLuong' => 100,
            'natDonGia' => 799000,
            'natMaLoai' => 1,
            'natMoTa' => '
Laptop D trí.',
            'natTrangThai' => 0
        ]);
        
     
        
    }
}