<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountLevelOneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account_level_ones')->insert([
            [
                'category_id' => 1,
                'account_no' => '11001',
                'name' => 'Kas',
                'header' => '1',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'account_no' => '11002',
                'name' => 'Bank',
                'header' => '1',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'account_no' => '12001',
                'name' => 'Piutang Dagang',
                'header' => '1',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'account_no' => '13001',
                'name' => 'Persediaan Dagang',
                'header' => '1',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'account_no' => '14001',
                'name' => 'Aktiva Tetap',
                'header' => '0',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 8,
                'account_no' => '18001',
                'name' => 'Utang Jangka Pendek',
                'header' => '0',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 12,
                'account_no' => '31001',
                'name' => 'Modal',
                'header' => '0',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 12,
                'account_no' => '31002',
                'name' => 'Prive',
                'header' => '0',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 13,
                'account_no' => '41001',
                'name' => 'Pendapatan Usaha',
                'header' => '0',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
