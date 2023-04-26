<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('currencies')->insert([
            [
                'name' => 'Indonesian Rupiah',
                'abbreviation' => 'IDR',
                'rate' => 1,
                'last_update' => now()
            ],
            [
                'name' => 'United States Dollar',
                'abbreviation' => 'USD',
                'rate' => 14100,
                'last_update' => now()
            ],
            [
                'name' => 'Singapore Dollar',
                'abbreviation' => 'SGD',
                'rate' => 10200,
                'last_update' => now()
            ],
            [
                'name' => 'Japanese Yen',
                'abbreviation' => 'JPY',
                'rate' => 130,
                'last_update' => now()
            ],
            [
                'name' => 'Euro',
                'abbreviation' => 'EUR',
                'rate' => 16400,
                'last_update' => now()
            ],
            [
                'name' => 'Australian Dollar',
                'abbreviation' => 'AUD',
                'rate' => 10300,
                'last_update' => now()
            ],
            [
                'name' => 'Chinese Yuan',
                'abbreviation' => 'CNY',
                'rate' => 2000,
                'last_update' => now()
            ],
            [
                'name' => 'South Korean Won',
                'abbreviation' => 'KRW',
                'rate' => 12,
                'last_update' => now()
            ],
            [
                'name' => 'Canadian Dollar',
                'abbreviation' => 'CAD',
                'rate' => 11200,
                'last_update' => now()
            ],
            [
                'name' => 'British Pound',
                'abbreviation' => 'GBP',
                'rate' => 19300,
                'last_update' => now()
            ],
        ]);
    }
}
