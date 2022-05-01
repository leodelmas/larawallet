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
                    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> {{ __('New') }}</a>
                </div>
                <div class="card mb-3">
                    <div class="card-header"><i class="fa-solid fa-user"></i> {{ __('Users') }}</div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">@sortablelink('name', __('Name'))</th>
                                    <th scope="col">@sortablelink('email', __('Email Address'))</th>
                                    <th scope="col">@sortablelink('group.name', __('Group'))</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->group->name }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id)}}" class="btn btn-sm btn-secondary"><i class="fa-regular fa-edit"></i> {{ __('Edit') }}</a>
                                            <form action="{{ route('users.destroy', $user->id)}}" method="post" style="display: inline-block">
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
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
