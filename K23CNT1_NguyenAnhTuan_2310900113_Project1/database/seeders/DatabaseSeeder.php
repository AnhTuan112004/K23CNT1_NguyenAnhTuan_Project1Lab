<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            nat_QUAN_TRITableSeeder::class,
            nat_LOAI_SAN_PHAMTableSeeder::class,
            nat_SAN_PHAMTableSeeder::class,
            nat_KHACH_HANGTableSeeder::class,
            nat_HOA_DONTableSeeder::class,
            nat_CT_HOA_DONTableSeeder::class,
            nat_TIN_TUC::class

        ]);
        
    }
}