<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class natNhaCCTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
            foreach(range(1,100) as $index)
            {
                DB::table('natnhacc')->insert([
                    'natMaNCC'=>$faker->uuid(),
            // 'MaNCC'=>$faker->word(15),
                    'natTenNCC'=>$faker->sentence(5),
                    'natDiachi'=>$faker->address(),
                    'natDienthoai'=>$faker->phoneNumber(10),
                    'natemail'=>$faker->email(),
                    'natstatus'=>$faker->boolean()
                ]);
            }
    }
}
