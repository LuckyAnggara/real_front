<?php

namespace Database\Seeders;

use App\Models\Journal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JournalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Journal::create([
            'account_sub_details_id' => '1',
            'type' => 'DEBIT',
            'amount' => 500000,
            'notes' => 'Pembelian barang'
        ]);

        Journal::create([
            'account_sub_details_id' => '2',
            'type' => 'KREDIT',
            'amount' => 500000,
            'notes' => 'Pembelian barang'
        ]);

        Journal::create([
            'account_sub_details_id' => '3',
            'type' => 'DEBIT',
            'amount' => 200000,
            'notes' => 'Biaya listrik'
        ]);

        Journal::create([
            'account_sub_details_id' => '4',
            'type' => 'KREDIT',
            'amount' => 200000,
            'notes' => 'Biaya listrik'
        ]);
    }
}
