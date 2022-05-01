<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home')->with([
            'wallets' => Wallet::where('user_id', $user->id)->get()
        ]);
    }
}
