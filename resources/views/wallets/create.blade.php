@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">{{ __('New') }}</i></div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ route('wallets.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{__('Name')}}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('group') }}"/>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('User') }}</label>
                                <div class="col-md-6">
                                    <select id="user_id" class="form-select @error('user_id') is-invalid @enderror" name="user_id" aria-label="{{ __('Select user') }}" required>
                                        <option selected>{{ __('Select user') }}</option>
                                        @foreach($users as $id => $name)
                                            <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('wallets.index')}}" class="btn btn-secondary" role="button">{{ __('Cancel')}}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
