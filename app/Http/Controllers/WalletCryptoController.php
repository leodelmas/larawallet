<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWalletCryptoRequest;
use App\Http\Requests\UpdateWalletCryptoRequest;
use App\Models\WalletCrypto;

class WalletCryptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWalletCryptoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWalletCryptoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WalletCrypto  $walletCrypto
     * @return \Illuminate\Http\Response
     */
    public function show(WalletCrypto $walletCrypto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WalletCrypto  $walletCrypto
     * @return \Illuminate\Http\Response
     */
    public function edit(WalletCrypto $walletCrypto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWalletCryptoRequest  $request
     * @param  \App\Models\WalletCrypto  $walletCrypto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWalletCryptoRequest $request, WalletCrypto $walletCrypto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WalletCrypto  $walletCrypto
     * @return \Illuminate\Http\Response
     */
    public function destroy(WalletCrypto $walletCrypto)
    {
        //
    }
}
