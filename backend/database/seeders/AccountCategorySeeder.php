<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account_categories')->insert([
            [
                'header_id' => 1,
                'account_id' => '1-1',
                'name' => 'Kas dan Bank',
                'type' => 'DEBIT'
            ],
            [
                'header_id' => 1,
                'account_id' => '1-2',
                'name' => 'Piutang',
                'type' => 'DEBIT'
            ],
            [
                'header_id' => 1,
                'account_id' => '1-3',
                'name' => 'Persediaan',
                'type' => 'DEBIT'
            ],
            [
                'header_id' => 1,
                'account_id' => '1-4',
                'name' => 'Aktiva Tetap',
                'type' => 'DEBIT'
            ],
            [
                'header_id' => 1,
                'account_id' => '1-5',
                'name' => 'Aktiva Lainnya',
                'type' => 'DEBIT'
            ],
            [
                'header_id' => 1,
                'account_id' => '1-6',
                'name' => 'Depresiasi & Amortisasi',
                'type' => 'KREDIT'
            ],
            [
                'header_id' => 1,
                'account_id' => '1-7',
                'name' => 'Aktiva Lancar Lainnya',
                'type' => 'DEBIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 2,
                'account_id' => '2-1',
                'name' => 'Hutang',
                'type' => 'KREDIT'
            ],
            [
                'header_id' => 2,
                'account_id' => '2-2',
                'name' => 'Kewajiban Lancar Lainnya',
                'type' => 'KREDIT'
            ],
            [
                'header_id' => 2,
                'account_id' => '2-3',
                'name' => 'Kartu Kredit',
                'type' => 'KREDIT'
            ],
            [
                'header_id' => 2,
                'account_id' => '2-4',
                'name' => 'Kewajiban Jangka Panjang',
                'type' => 'KREDIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 3,
                'account_id' => '3-1',
                'name' => 'Ekuitas',
                'type' => 'KREDIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 4,
                'account_id' => '4-1',
                'name' => 'Pendapatan',
                'type' => 'KREDIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 5,
                'account_id' => '5-1',
                'name' => 'Harga Pokok Penjualan (Cost of Goods)',
                'type' => 'DEBIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 6,
                'account_id' => '6-1',
                'name' => 'Beban',
                'type' => 'DEBIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 7,
                'account_id' => '7-1',
                'name' => 'Pendapatan Lainnya',
                'type' => 'KREDIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 8,
                'account_id' => '8-1',
                'name' => 'Beban Lainnya',
                'type' => 'DEBIT'
            ],
        ]);
    }
}
