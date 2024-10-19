@extends('Layouts.admin')

@section('title') Szerepkörök @endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route("roles.create") }}" class="btn btn-primary">+ Új szerepkör</a>
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Név</th>
        </tr>
        @foreach ($roles as $role)
            <tr style="cursor:pointer" onClick="document.location.href='{{ route("roles.edit", $role->id) }}';">
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
            </tr>
        @endforeach
    </table>
@endsection