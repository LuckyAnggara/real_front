<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account_details')->insert([
            // Assets
            [
                'header_id' => 1,
                'account_no' => '1101',
                'name' => 'Kas dan Bank',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'header_id' => 1,
                'account_no' => '1102',
                'name' => 'Piutang Usaha',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'header_id' => 1,
                'account_no' => '1103',
                'name' => 'Inventori',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Liabilities
            [
                'header_id' => 2,
                'account_no' => '2101',
                'name' => 'Utang Usaha',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'header_id' => 2,
                'account_no' => '2102',
                'name' => 'Hutang Pajak',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'header_id' => 2,
                'account_no' => '2103',
                'name' => 'Pinjaman Bank',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Equity
            [
                'header_id' => 3,
                'account_no' => '3101',
                'name' => 'Modal Pemilik',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Income
            [
                'header_id' => 4,
                'account_no' => '4101',
                'name' => 'Pendapatan Penjualan',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // HPP
            [
                'header_id' => 5,
                'account_no' => '5101',
                'name' => 'Harga Pokok Penjualan',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Income
            [
                'header_id' => 6,
                'account_no' => '6101',
                'name' => 'Pendapatan Sewa Ruko',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Income
            [
                'header_id' => 7,
                'account_no' => '7101',
                'name' => 'Beban Listrik Ruko',
                'currency_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
