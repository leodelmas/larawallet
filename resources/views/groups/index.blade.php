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
                    <a href="{{ route('groups.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> {{ __('New') }}</a>
                </div>
                <div class="card mb-3">
                    <div class="card-header"><i class="fa-solid fa-users"></i> {{ __('Groups') }}</div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">@sortablelink('name', __('Name'))</th>
                                    <th scope="col">{{ __('Users') }}</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                    <tr>
                                        <td>{{ $group->name }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($group->users as $user)
                                                    <li>{{ $user->name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('groups.edit', $group->id)}}" class="btn btn-sm btn-secondary"><i class="fa-regular fa-edit"></i> {{__('Edit')}}</a>
                                            <form action="{{ route('groups.destroy', $group->id)}}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit"><i class="fa-solid fa-trash"></i> {{__('Delete')}}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        {!! $groups->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
