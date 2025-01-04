<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class nat_LOAI_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('nat_LOAI_SAN_PHAM')->insert([
            'natMaLoai'=>'MB',
            'natTenLoai'=>'MACBOOKMACBOOK',
            'natTrangThai'=>0
        ]);
        DB::table('nat_LOAI_SAN_PHAM')->insert([
            'natMaLoai'=>'LE',
            'natTenLoai'=>'LENOVO',
            'natTrangThai'=>0
        ]);
        DB::table('nat_LOAI_SAN_PHAM')->insert([
         'natMaLoai'=>'DE',
         'natTenLoai'=>'DELL',
         'natTrangThai'=>0
     ]);
     DB::table('nat_LOAI_SAN_PHAM')->insert([
      'natMaLoai'=>'HP',
      'natTenLoai'=>'HP',
      'natTrangThai'=>0
  ]);
       
    }
}