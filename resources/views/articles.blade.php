@extends('Layouts.master')


@section('content')
    <h1 class="mb-4">
        {{ \App\Models\Translation::getTranslation($type.'.title') }}
        @if ( $type!="events" )
            - {{ $articles[0]->menu->name }}
        @endif
    </h1>

    <!-- item start -->
    @foreach ($articles as $article)
        <div class="row mb-4">
            <div class="col-md-4">
                <img src="{{ $article->cover_path."/".$article->cover }}" alt="" class="img-fluid rounded">
            </div>
            <div class="col-md-8">
                <h2 class="h5">
                    @if ( $type=="events" )
                        <a href="{{ route($type.".show",[app()->getLocale(), $article->slug]) }}" class="text-decoration-none">{{ $article->title }}</a>
                    @else
                        <a href="{{ route($type.".show",[app()->getLocale(), $article->menu->slug, $article->slug]) }}" class="text-decoration-none">{{ $article->title }}</a>
                    @endif
                </h2>
                <p class="text-muted mb-1"><strong>{{ $article->createdUser->name }}</strong> - <small>{{ \Carbon\Carbon::parse($article->created_at)->isoFormat("LL") }}</small></p>
                <p>{{ $article->lead }}</p>

                @if ( $type=="events" )
                    <div class="d-flex align-items-center mt-1 mb-4 event-location entry-meta">
                        <ul>
                            <li>
                                <i class="fas fa-calendar-alt event-icon me-2"></i> {{ \Carbon\Carbon::parse($article->event_start_date)->isoFormat("LL") }}
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt location-icon me-2"></i> {{ $article->event_location }}
                            </li>
                        </ul>
                    </div>

                    <a href="{{ route($type.".show",[app()->getLocale(), $article->slug]) }}" class="btn btn-primary btn-sm">
                        {{ \App\Models\Translation::getTranslation($type.'.more') }} &raquo;
                    </a>
                @else
                    <a href="{{ route($type.".show",[app()->getLocale(), $article->menu->slug, $article->slug]) }}" class="btn btn-primary btn-sm">
                        {{ \App\Models\Translation::getTranslation($type.'.more') }} &raquo;
                    </a>
                @endif
            </div>
        </div>
    @endforeach
    

    {{ $articles->links("vendor.pagination.bootstrap-5") }}
@endsection