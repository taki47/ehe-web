@extends('Layouts.admin')

@section('title') Nyelvek @endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @can("role_create")
        <a href="{{ route("languages.create") }}" class="btn btn-primary">+ Új nyelv</a>
    @endcan
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Név</th>
            <th>Nyelv kód</th>
            <th>Zászló</th>
        </tr>
        @foreach ($languages as $language)
            <tr style="cursor: pointer;" 
                @if(Auth::user()->can('language_edit')) 
                    onClick="document.location.href='{{ route('languages.edit', $language->id) }}'" 
                @else 
                    style="pointer-events: none; opacity: 0.5;" 
                @endif>
                <td>{{ $language->id }}</td>
                <td>{{ $language->name }}</td>
                <td>{{ $language->lang_code }}</td>
                <td>
                    <img src="/images/flags/{{ $language->flag }}" style="max-width:50px;">
                </td>
            </tr>
        @endforeach
    </table>
@endsection