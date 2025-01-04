<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class nat_TIN_TUC extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 10 rows of fake data into the 'nat_TIN_TUC' table
        for ($i = 0; $i < 5; $i++) {
            DB::table('nat_TIN_TUC')->insert([
                'natMaTT' => $faker->unique()->word, // Unique identifier for the news article
                'natTieuDe' => $faker->sentence, // Title of the news article
                'natMoTa' => $faker->text(200), // Description (shorter text)
                'natNoiDung' => $faker->paragraph(5), // Content (longer text)
                'natNgayDangTin' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'natNgayCapNhap' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'natHinhAnh' => $faker->imageUrl(), // Random image URL
                'natTrangThai' => $faker->numberBetween(0, 1), // Status (0 or 1, assuming binary status)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}