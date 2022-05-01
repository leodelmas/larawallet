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
                    <a href="{{ route('wallets.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> {{ __('New') }}</a>
                </div>
                <div class="card mb-3">
                    <div class="card-header"><i class="fa-solid fa-wallet"></i> {{ __('Wallets') }}</div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">@sortablelink('name', __('Name'))</th>
                                    <th scope="col">@sortablelink('user.name', __('User'))</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wallets as $wallet)
                                    <tr>
                                        <td>{{ $wallet->name }}</td>
                                        <td>{{ $wallet->user->name }}</td>
                                        <td>
                                            <a href="{{ route('wallets.edit', $wallet->id)}}" class="btn btn-sm btn-secondary"><i class="fa-regular fa-edit"></i> {{ __('Edit') }}</a>
                                            <form action="{{ route('wallets.destroy', $wallet->id)}}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit"><i class="fa-solid fa-trash"></i> {{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        {!! $wallets->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
