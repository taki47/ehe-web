@extends('Layouts.master')


@section('content')
    <!-- Cover Image -->
    <div class="mb-4">
        <img src="{{ $article->cover_path."/".$article->cover }}" alt="" class="img-fluid rounded w-100">
    </div>

    <!-- Article Title -->
    <h1 class="mb-3">{{ $article->title }}</h1>

    <!-- Author and Date Information -->
    <p class="text-muted">
        {{ $article->createdUser->name }} &nbsp;|&nbsp; {{ \Carbon\Carbon::parse($article->created_at)->isoFormat("LL") }}
    </p>

    <!-- Article Introduction -->
    <p class="lead mb-4">
        {{ $article->lead }}
    </p>

    <!-- Article Body -->
    <div class="article-body">
        {{ $article->body }}
    </div>
@endsection