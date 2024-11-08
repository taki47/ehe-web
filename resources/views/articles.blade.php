@extends('Layouts.master')


@section('content')
    <h1 class="mb-4">{{ \App\Models\Translation::getTranslation($type.'.title') }}</h1>

    <!-- item start -->
    @foreach ($articles as $article)
        <div class="row mb-4">
            <div class="col-md-4">
                <img src="{{ $article->cover_path."/".$article->cover }}" alt="" class="img-fluid rounded">
            </div>
            <div class="col-md-8">
                <h2 class="h5">
                    <a href="{{ route($type.".show",[app()->getLocale(), $article->menu->slug, $article->slug]) }}" class="text-decoration-none">{{ $article->title }}</a>
                </h2>
                <p class="text-muted mb-1"><strong>{{ $article->createdUser->name }}</strong> - <small>{{ \Carbon\Carbon::parse($article->created_at)->isoFormat("LL") }}</small></p>
                <p>{{ $article->lead }}</p>
                <a href="{{ route($type.".show",[app()->getLocale(), $article->menu->slug, $article->slug]) }}" class="btn btn-primary btn-sm">
                    {{ \App\Models\Translation::getTranslation($type.'.more') }} &raquo;
                </a>
            </div>
        </div>
    @endforeach
    

    {{ $articles->links("vendor.pagination.bootstrap-5") }}
@endsection