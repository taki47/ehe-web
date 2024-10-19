@extends('Layouts.admin')

@section('title') Szerepkörök @endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @can("role_create")
        <a href="{{ route("roles.create") }}" class="btn btn-primary">+ Új szerepkör</a>
    @endcan
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Név</th>
        </tr>
        @foreach ($roles as $role)
            <tr style="cursor: pointer;" 
                @if(Auth::user()->can('role_edit')) 
                    onClick="document.location.href='{{ route('roles.edit', $role->id) }}'" 
                @else 
                    style="pointer-events: none; opacity: 0.5;" 
                @endif>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
            </tr>
        @endforeach
    </table>
@endsection