<div class="col-lg-6">
    <div class="posts-md row">
        @foreach ($articles->take(2) as $article)
            <div class="entry col-6">
                <div class="entry-image">
                    <a href="{{ route("news.show",[app()->getLocale(), $article->menu->slug, $article->slug]) }}">
                        <img src="{{ $article->cover_path."/".$article->cover }}" alt="">
                    </a>
                    <div class="entry-categories">
                        <a href="javascript:void(0)" class="bg-fashion">{{ $article->menu->name }}</a>
                    </div>
                </div>
                <div class="entry-title nott">
                    <h3 class="mb-2">
                        <a href="{{ route("news.show",[app()->getLocale(), $menu->slug, $article->slug]) }}">
                            {{ $article->title }}
                        </a>
                    </h3>
                </div>
                <div class="entry-meta">
                    <ul>
                        <li><a href="javascript:void(0)">{{ $article->createdUser->name }}</a></li>
                        <li><i class="icon-time"></i><a href="javascript:void(0)">{{ \Carbon\Carbon::parse($article->created_at)->isoFormat('LLLL') }}</a></li>
                    </ul>
                </div>
                <div class="entry-content clearfix">
                    <p>
                        {{ $article->lead }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="col-lg-6">
    <div class="posts-sm row col-mb-30">
        @foreach ($articles->skip(2) as $article)
            <div class="entry col-12">
                <div class="grid-inner row align-items-center g-0">
                    <div class="col-auto">
                        <div class="entry-image">
                            <a href="{{ route("news.show",[app()->getLocale(), $menu->slug, $article->slug]) }}">
                                <img src="{{ $article->cover_path."/".$article->cover }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col ps-3">
                        <div class="entry-title">
                            <h4>
                                <a href="{{ route("news.show",[app()->getLocale(), $menu->slug, $article->slug]) }}">
                                    {{ $article->title }}
                                </a>
                                <div class="entry-categories">
                                    <a href="javascript:void(0)" class="bg-fashion">{{ $article->menu->name }}</a>
                                </div>
                            </h4>
                        </div>
                        <div class="entry-meta">
                            <ul>
                                <li><a href="javascript:void(0)">{{ $article->createdUser->name }}</a></li>
                                <li><i class="icon-time"></i><a href="javascript:void(0)">{{ \Carbon\Carbon::parse($article->created_at)->isoFormat('LLLL') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="entry col-12">
            @if ( $foreignnews )
                @if ( $category=="all" )
                    <a href="{{ route("foreignnews.index", [app()->getLocale(), "all"]) }}" class="btn btn-secondary">{{ \App\Models\Translation::getTranslation('home.news.more') }} >></a>
                @else
                    <a href="{{ route("foreignnews.index", [app()->getLocale(), $menu->slug]) }}" class="btn btn-secondary">{{ \App\Models\Translation::getTranslation('home.news.more') }} >></a>
                @endif
            @else
                @if ( $category=="all" )
                    <a href="{{ route("news.index", [app()->getLocale(), "all"]) }}" class="btn btn-secondary">{{ \App\Models\Translation::getTranslation('home.news.more') }} >></a>
                @else
                    <a href="{{ route("news.index", [app()->getLocale(), $menu->slug]) }}" class="btn btn-secondary">{{ \App\Models\Translation::getTranslation('home.news.more') }} >></a>
                @endif
            @endif
            
        </div>
    </div>
</div>