<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class natVattuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('natvattu')->insert([
            'natMaVTu'=>'DD01',
            'natTenVTu'=>'Đầu DVD Hitachi 1 cửa',
            'natDvTinh'=>'Bộ',
            'natPhanTram'=>40,
        ]);
        DB::table('natvattu')->insert([
            'natMaVTu'=>'DD02',
            'natTenVTu'=>'Đầu DVD Hitachi 2 cửa',
            'natDvTinh'=>'Bộ',
            'natPhanTram'=>50,
        ]);
    }
}
