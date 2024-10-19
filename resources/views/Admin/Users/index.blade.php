@extends('Layouts.admin')

@section('title') Felhasználók @endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route("users.create") }}" class="btn btn-primary">+ Új felhasználó</a>
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Név</th>
            <th>Szerepkör</th>
            <th>Utolsó belépés</th>
        </tr>
        @foreach ($users as $user)
            <tr style="cursor:pointer" onClick="document.location.href='{{ route("users.edit", $user->id) }}';">
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