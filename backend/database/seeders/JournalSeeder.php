<?php

namespace Database\Seeders;

use App\Models\AccountLevelOne;
use App\Models\AccountLevelTwo;
use App\Models\Journal;
use Illuminate\Database\Seeder;

class JournalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menentukan jumlah data yang ingin dibuat
        $count = 5;

        // Membuat factory dengan Faker

        // Mengambil data ChartOfAccount untuk foreign key
        $accountLevelOne = AccountLevelOne::all();
        $accountLevelTwo = AccountLevelTwo::all();

        $merge = $accountLevelOne->concat($accountLevelTwo);

        // Membuat 1 juta data FactBalance acak
        for ($i = 1; $i <= $count; $i++) {
            $data = $merge->random();

            Journal::create([
                'account_no' => $data->account_no,
                'type' => fake()->randomElement([
                    "DEBIT",
                    "KREDIT",
                ]),
                'amount' => fake()->randomNumber(6),
                'notes' => fake()->realText(200, 2),
                'created_at' => fake()->dateTimeBetween('2023-01-01', 'now')->format('Y-m-d'),
            ]);
        }
    }
}
