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
                'type' => 'DEBIT',
            ],
            [
                'header_no' => '2',
                'name' => 'Liabilitas',
                'type' => 'KREDIT',
            ],
            [
                'header_no' => '3',
                'name' => 'Ekuitas',
                'type' => 'KREDIT',
            ],
            [
                'header_no' => '4',
                'name' => 'Pendapatan',
                'type' => 'KREDIT',
            ],
            [
                'header_no' => '5',
                'name' => 'Beban',
                'type' => 'DEBIT',
            ],
            [
                'header_no' => '6',
                'name' => 'Pendapatan Lain-Lain',
                'type' => 'KREDIT',
            ],
            [
                'header_no' => '7',
                'name' => 'Beban Lain Lain',
                'type' => 'DEBIT',
            ],
        ];

        DB::table('account_headers')->insert($headers);
    }
}
