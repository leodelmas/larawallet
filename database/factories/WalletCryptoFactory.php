<?php

namespace Database\Factories;

use App\Models\Crypto;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WalletCrypto>
 */
class WalletCryptoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string,mixed>
     */
    public function definition()
    {
        return [
            'crypto_id' => $this->faker->numberBetween(1, Crypto::count()),
            'wallet_id' => $this->faker->numberBetween(1, Wallet::count()),
            'amount'    => $this->faker->randomFloat(4, 0.0001, 100000)
        ];
    }
}
