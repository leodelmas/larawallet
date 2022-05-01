<?php

namespace Database\Seeders;

use App\Models\Crypto;
use Illuminate\Database\Seeder;

class CryptoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents("https://api.coincap.io/v2/assets");
        $raw = json_decode($json);

        foreach ($raw->data as $rawCrypto) {
            Crypto::factory()->create([
                'name'      => $rawCrypto->symbol,
                'full'      => $rawCrypto->name,
                'value'     => $rawCrypto->priceUsd,
                'percent24' => $rawCrypto->changePercent24Hr,
                'rank'      => $rawCrypto->rank
            ]);
        }
    }
}
