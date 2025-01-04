<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class nat_CT_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('nat_CT_HOA_DON')->insert([
            'natHoaDonID'=>1,
            'natSanPhamID'=>1,
            'natSoLuongMua'=>12,
            'natDonGiaMua'=>699000,
            'natThanhTien'=>699000 * 12,
            'natTrangThai'=>0,
        ]);

        DB::table('nat_CT_HOA_DON')->insert([
            'natHoaDonID'=>2,
            'natSanPhamID'=>2,
            'natSoLuongMua'=>20,
            'natDonGiaMua'=>550000,
            'natThanhTien'=>550000 * 20,
            'natTrangThai'=>0,
        ]);

        DB::table('nat_CT_HOA_DON')->insert([
            'natHoaDonID'=>3,
            'natSanPhamID'=>5,
            'natSoLuongMua'=>5,
            'natDonGiaMua'=>590000,
            'natThanhTien'=>590000 *  5,
            'natTrangThai'=>0,
        ]);

        DB::table('nat_CT_HOA_DON')->insert([
            'natHoaDonID'=>4,
            'natSanPhamID'=>8,
            'natSoLuongMua'=>3,
            'natDonGiaMua'=>199000,
            'natThanhTien'=>199000 * 3,
            'natTrangThai'=>0,
        ]);
    }
}