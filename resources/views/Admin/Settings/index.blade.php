@extends('Layouts.admin')

@section('title') Weboldal beállítások @endsection

@section('styles')
    <link href="/assets/summernote/summernote.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form method="POST" action="{{ route("settings.update") }}">
        @csrf

        <table class="table table-hover">
            @foreach ($settings as $setting)
                <tr>
                    <th>
                        {{ $setting->name }}
                    </th>
                    <td>
                        @if( strpos($setting->type, 'select') === 0 )
                            @php
                                $relatedData = null;
                                $relation = explode('|', $setting->type)[1];
                                $modelName = ucfirst(Str::camel(Str::singular($relation)));
                                $relatedData = app("App\\Models\\$modelName")::all();
                            @endphp

                            <select name="{{ $setting->id }}" class="form-control">
                                @foreach($relatedData as $item)
                                    <option value="{{ $item->id }}" {{ $setting->value == $item->id ? "selected" : "" }} >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        @elseif( $setting->type=="boolean" )
                            <input type="checkbox" name="{{ $setting->id }}" value="1" {{ $setting->value=="1" ? "checked" : "" }}>
                        @elseif( $setting->type=="tiny" )
                            <textarea name="{{ $setting->id }}" class="textarea summernote">{{ $setting->value }}</textarea>
                        @else
                            <input type="text" name="{{ $setting->id }}" value="{{ $setting->value }}" class="form-control">
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

        <input type="submit" class="btn btn-primary" value="Módosítás">
    </form>
@endsection

@section('scripts')
    <script type="text/javascript" src="/assets/summernote/summernote-functions.js"></script>
@endsection