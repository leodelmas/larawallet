@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->get('success'))
                    <div class="alert alert-success mb-3">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="mb-3">
                    <a href="{{ route('cryptos.import') }}" class="btn btn-primary"><i class="fa-solid fa-download"></i> {{ __('Import') }}</a>
                </div>
                <div class="card mb-3">
                    <div class="card-header"><i class="fa-solid fa-money-bill"></i> {{ __('Cryptocurrencies') }}</div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">@sortablelink('rank', __('Crypto Rank'))</th>
                                    <th scope="col">@sortablelink('full', __('Crypto Full Name'))</th>
                                    <th scope="col">@sortablelink('name', __('Crypto Symbol'))</th>
                                    <th scope="col">@sortablelink('value', __('Crypto Value'))</th>
                                    <th scope="col">@sortablelink('percent24', __('Crypto Evolution Last 24 Hours'))</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cryptos as $crypto)
                                    <tr>
                                        <td>
                                            {{ $crypto->rank }}
                                        </td>
                                        <td>
                                            <img src="https://assets.coincap.io/assets/icons/{{ strtolower($crypto->name) }}@2x.png"style="width: 25px; height: 25px"alt="{{ $crypto->full }}">
                                            {{ $crypto->full }}
                                        </td>
                                        <td>{{ $crypto->name }}</td>
                                        <td>${{ round($crypto->value, 2) }}</td>
                                        <td>
                                            @if ($crypto->percent24 > 0)
                                                <span class="text-success"><i class="fa-solid fa-arrow-up"></i> {{ $crypto->percent24 }}%</span>
                                            @else
                                                <span class="text-danger"><i class="fa-solid fa-arrow-down"></i> {{ $crypto->percent24 }}%</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        {!! $cryptos->appends(Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
