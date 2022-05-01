<?php

namespace App\Http\Controllers;

use App\Models\Crypto;

class CryptoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cryptos.index')->with([
            'cryptos' => Crypto::sortable(['rank' => 'asc'])->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $json = file_get_contents("https://api.coincap.io/v2/assets");
        $raw = json_decode($json);

        $add = 0;
        $update = 0;
        foreach($raw->data as $rawCrypto) {
            $crypto = Crypto::where('name', $rawCrypto->symbol);
            if (!$crypto) {
                Crypto::factory()->create([
                    'name'      => $rawCrypto->symbol,
                    'full'      => $rawCrypto->name,
                    'value'     => $rawCrypto->priceUsd,
                    'percent24' => $rawCrypto->changePercent24Hr,
                    'rank'      => $rawCrypto->rank
                ]);
                $add++;
            }
            else {
                $crypto->update([
                    'value'     => $rawCrypto->priceUsd,
                    'percent24' => $rawCrypto->changePercent24Hr,
                    'rank'      => $rawCrypto->rank
                ]);
                $update++;
            }
        }

        return redirect('/cryptos')->with([
            'success' => $add . ' added / ' . $update . ' updated'
        ]);
    }
}
