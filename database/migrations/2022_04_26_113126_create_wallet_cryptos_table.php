<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_cryptos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('amount', 14, 8);
            $table->unsignedBigInteger('wallet_id');
            $table->foreign('wallet_id')->references('id')->on('wallets');
            $table->unsignedBigInteger('crypto_id');
            $table->foreign('crypto_id')->references('id')->on('cryptos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_cryptos');
    }
};
