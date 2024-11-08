@extends('Layouts.master')

@section('content')
    {{ \App\Models\Translation::getTranslation('site.notfound.title', app()->getLocale()) }}

    <br><br>

    <a href="/">{{ \App\Models\Translation::getTranslation('site.notfound.back', app()->getLocale()) }}</a>
@endsection