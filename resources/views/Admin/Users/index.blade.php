@extends('Layouts.admin')

@section('title') Felhasználók @endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @can("user_create")
        <a href="{{ route("users.create") }}" class="btn btn-primary">+ Új felhasználó</a>
    @endcan
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Név</th>
            <th>Szerepkör</th>
            <th>Utolsó belépés</th>
        </tr>
        @foreach ($users as $user)
        <tr style="cursor: pointer;" 
                @if(Auth::user()->can('user_edit')) 
                    onClick="document.location.href='{{ route('users.edit', $user->id) }}'" 
                @else 
                    style="pointer-events: none; opacity: 0.5;" 
                @endif>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    @foreach ($user->getRoleNames() as $role)
                        {{ $role }}<br>
                    @endforeach
                </td>
                <td>{{ $user->last_login }}</td>
            </tr>
        @endforeach
    </table>
@endsection