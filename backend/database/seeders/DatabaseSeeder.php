<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AccountSubDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AccountHeaderSeeder::class,
            CurrencySeeder::class,
            TaxSeeder::class,
            AccountDetailSeeder::class,
            AccountSubDetailSeeder::class,
            JournalSeeder::class
        ]);
    }
}
