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
                'account_no' => '11',
                'name' => 'Kas dan Bank',
                'type' => 'DEBIT'
            ],
            [
                'header_id' => 1,
                'account_no' => '12',
                'name' => 'Piutang',
                'type' => 'DEBIT'
            ],
            [
                'header_id' => 1,
                'account_no' => '13',
                'name' => 'Persediaan',
                'type' => 'DEBIT'
            ],
            [
                'header_id' => 1,
                'account_no' => '14',
                'name' => 'Aktiva Tetap',
                'type' => 'DEBIT'
            ],
            [
                'header_id' => 1,
                'account_no' => '15',
                'name' => 'Aktiva Lainnya',
                'type' => 'DEBIT'
            ],
            [
                'header_id' => 1,
                'account_no' => '16',
                'name' => 'Depresiasi & Amortisasi',
                'type' => 'KREDIT'
            ],
            [
                'header_id' => 1,
                'account_no' => '17',
                'name' => 'Aktiva Lancar Lainnya',
                'type' => 'DEBIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 2,
                'account_no' => '21',
                'name' => 'Utang',
                'type' => 'KREDIT'
            ],
            [
                'header_id' => 2,
                'account_no' => '22',
                'name' => 'Kewajiban Lancar Lainnya',
                'type' => 'KREDIT'
            ],
            [
                'header_id' => 2,
                'account_no' => '23',
                'name' => 'Kartu Kredit',
                'type' => 'KREDIT'
            ],
            [
                'header_id' => 2,
                'account_no' => '24',
                'name' => 'Kewajiban Jangka Panjang',
                'type' => 'KREDIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 3,
                'account_no' => '31',
                'name' => 'Ekuitas',
                'type' => 'KREDIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 4,
                'account_no' => '41',
                'name' => 'Pendapatan',
                'type' => 'KREDIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 5,
                'account_no' => '51',
                'name' => 'Harga Pokok Penjualan (Cost of Goods)',
                'type' => 'DEBIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 6,
                'account_no' => '61',
                'name' => 'Beban',
                'type' => 'DEBIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 7,
                'account_no' => '71',
                'name' => 'Pendapatan Lainnya',
                'type' => 'KREDIT'
            ],
        ]);

        DB::table('account_categories')->insert([
            [
                'header_id' => 8,
                'account_no' => '81',
                'name' => 'Beban Lainnya',
                'type' => 'DEBIT'
            ],
        ]);
    }
}
