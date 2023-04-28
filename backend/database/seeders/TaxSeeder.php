<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Tax::create([
            'name' => 'Tax Pertambahan Nilai (PPN)',
            'rate' => 10
        ]);

        Tax::create([
            'name' => 'Tax Penghasilan (PPh) Pasal 21',
            'rate' => 5
        ]);

        Tax::create([
            'name' => 'Tax Penghasilan (PPh) Pasal 22',
            'rate' => 2
        ]);

        Tax::create([
            'name' => 'Tax Bumi dan Bangunan (PBB)',
            'rate' => 0.5
        ]);

        Tax::create([
            'name' => 'Tax Kendaraan Bermotor (PKB)',
            'rate' => 2
        ]);
    }
}
