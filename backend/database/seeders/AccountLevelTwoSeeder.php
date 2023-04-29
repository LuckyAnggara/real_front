<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountLevelTwoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account_level_twos')->insert([
            [
                'category_id' => 1,
                'account_level_one_id' => 1,
                'account_no' => '11001001',
                'name' => 'Kas Kantor',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'account_level_one_id' => 1,
                'account_no' => '11001002',
                'name' => 'Kas Toko',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'account_level_one_id' => 2,
                'account_no' => '11002001',
                'name' => 'Bank BCA',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'account_level_one_id' => 2,
                'account_no' => '11002002',
                'name' => 'Bank BRI',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'account_level_one_id' => 3,
                'account_no' => '12001001',
                'name' => 'Piutang Usaha',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'account_level_one_id' => 3,
                'account_no' => '12001002',
                'name' => 'Piutang Wasel',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'account_level_one_id' => 4,
                'account_no' => '13001001',
                'name' => 'Persediaan Dagang Gudang A',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'account_level_one_id' => 4,
                'account_no' => '13001002',
                'name' => 'Persediaan Dagang Gudang B',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]); //
    }
}
