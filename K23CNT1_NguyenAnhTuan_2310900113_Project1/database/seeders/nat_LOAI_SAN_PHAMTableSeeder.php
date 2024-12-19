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
        DB::table('nat_loai_san_pham')->insert([
            'natMaLoai'  =>"L001",
            'natTenLoai' =>"cây cảnh văn phòng",
            'natTrangThai' =>0    
         ]);
         DB::table('nat_loai_san_pham')->insert([
             'natMaLoai'  =>"L002",
             'natTenLoai' =>"cây đẻ bàn",
             'natTrangThai' =>0    
          ]);
          DB::table('nat_loai_san_pham')->insert([
             'natMaLoai'  =>"L003",
             'natTenLoai' =>"cây cảnh phong thủy",
             'natTrangThai' =>0    
          ]);
          DB::table('nat_loai_san_pham')->insert([
             'natMaLoai'  =>"L004",
             'natTenLoai' =>"cây thủy canh",
             'natTrangThai' =>0    
          ]);
    }
}
