<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wallet;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wallet::create([
            'type' => 'cash',
            'amount' => 5000000
        ]);
        Wallet::create([
            'type' => 'bank',
            'amount' => 10000000
        ]);
    }
}
