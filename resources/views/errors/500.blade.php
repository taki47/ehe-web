@extends('Layouts.error')

@section('content')
    {{ \App\Models\Translation::getTranslation('site.error.title', app()->getLocale()) }}

    <br><br>
    
    <a href="/">{{ \App\Models\Translation::getTranslation('site.error.back', app()->getLocale()) }}</a>
@endsection