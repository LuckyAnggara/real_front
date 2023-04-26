<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $headers = [
            [
                'header_no' => '1',
                'name' => 'Aktiva',
            ],
            [
                'header_no' => '2',
                'name' => 'Liabilitas',
            ],
            [
                'header_no' => '3',
                'name' => 'Ekuitas',
            ],
            [
                'header_no' => '4',
                'name' => 'Pendapatan',
            ],
            [
                'header_no' => '5',
                'name' => 'Harga Pokok Penjualan',
            ],
            [
                'header_no' => '6',
                'name' => 'Pendapatan Lain-Lain',
            ],
            [
                'header_no' => '7',
                'name' => 'Beban',
            ],
            [
                'header_no' => '8',
                'name' => 'Beban Lain-Lain',
            ]
        ];

        DB::table('account_headers')->insert($headers);
    }
}
