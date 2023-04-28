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
                'account_no' => '1-1001',
                'name' => 'Kas',
                'currency_id' => 1,
                ''
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
