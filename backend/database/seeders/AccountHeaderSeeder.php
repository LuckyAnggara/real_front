<?php

namespace Database\Seeders;

use App\Models\AccountHeader;
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
        AccountHeader::create([
            'header_no' => 1,
            'name' => 'Aset'
        ]);

        AccountHeader::create([
            'header_no' => 2,
            'name' => 'Kewajiban'
        ]);

        AccountHeader::create([
            'header_no' => 3,
            'name' => 'Ekuitas'
        ]);

        AccountHeader::create([
            'header_no' => 4,
            'name' => 'Pendapatan'
        ]);

        AccountHeader::create([
            'header_no' => 5,
            'name' => 'Harga Pokok Penjualan (Cost of Goods)'
        ]);

        AccountHeader::create([
            'header_no' => 6,
            'name' => 'Beban'
        ]);

        AccountHeader::create([
            'header_no' => 7,
            'name' => 'Pendapatan Lainnya'
        ]);

        AccountHeader::create([
            'header_no' => 8,
            'name' => 'Beban Lainnya'
        ]);
    }
}
