<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WalletCrypto;

class WalletCryptoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        WalletCrypto::factory(300)->create();
    }
}
