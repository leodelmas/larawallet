@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('You are logged in!', ['name' => Auth::user()->name]) }}
                    </div>
                </div>

                @foreach ($wallets as $wallet)
                    <div class="card mb-3">
                        <div class="card-header">{{ __('Wallet') }} - <i>{{ $wallet->name }}</i></div>
                        <div class="card-body p-0">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('Crypto Full Name') }}</th>
                                        <th scope="col">{{ __('Crypto Symbol') }}</th>
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col">{{ __('Crypto Evolution Last 24 Hours') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wallet->cryptos as $walletCrypto)
                                    <tr>
                                        <td>
                                            <img src="https://assets.coincap.io/assets/icons/{{ strtolower($walletCrypto->crypto->name) }}@2x.png"style="width: 25px; height: 25px"alt="{{ $walletCrypto->crypto->name }}">
                                            {{ $walletCrypto->crypto->name }}
                                        </td>
                                        <td>{{ $walletCrypto->crypto->full }}</td>
                                        <td>{{ $walletCrypto->amount }}</td>
                                        <td>
                                            @if ($walletCrypto->crypto->percent24 > 0)
                                                <span class="text-success"><i class="fa-solid fa-arrow-up"></i> {{ $walletCrypto->crypto->percent24 }}%</span>
                                            @else
                                                <span class="text-danger"><i class="fa-solid fa-arrow-down"></i> {{ $walletCrypto->crypto->percent24 }}%</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
