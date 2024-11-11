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

    @if ( $type=="events" )
        <div class="d-flex align-items-center mt-1 mb-4 event-location entry-meta">
            <ul>
                <li>
                    <i class="fas fa-calendar-alt event-icon me-2"></i> {{ \Carbon\Carbon::parse($article->event_start_date)->isoFormat("LL") }}
                    -
                    {{ \Carbon\Carbon::parse($article->event_end_date)->isoFormat("LL") }}
                </li>
                <li>
                    <i class="fas fa-map-marker-alt location-icon me-2"></i> {{ $article->event_location }}
                </li>
            </ul>
        </div>
    @endif

    <!-- Article Introduction -->
    <p class="lead mb-4">
        {{ $article->lead }}
    </p>

    <!-- Article Body -->
    <div class="article-body">
        {{ $article->body }}
    </div>

    @if ( $type=="events" && $article->form )
        {!! $article->form !!}
    @endif
@endsection