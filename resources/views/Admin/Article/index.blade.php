@extends('Layouts.admin')

@section('title') Hírek @endsection

@section('content')
    @if (\App\Helper::userCanAccess('news_create_') || Auth::user()->can("any_news_create"))
        <a href="{{ route('article.create', $type) }}" class="btn btn-primary">+ Új hírek hozzáadása</a>
    @endif
    
    @if (session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif

    <!-- Kereső űrlap -->
    <form action="{{ route('article.index', $type) }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Keresés cím vagy leírás alapján" value="{{ request()->input('search') }}">
            <select name="menu_id" class="form-select">
                <option value="">Csoport kiválasztása</option>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" {{ request()->input('menu_id') == $menu->id ? 'selected' : '' }}>
                        {{ $menu->name }} {{ $menu->language->lang_code }}
                    </option>
                @endforeach
            </select>
            <select name="language_id" class="form-select">
                <option value="">Nyelv kiválasztása</option>
                @foreach($languages as $language)
                    <option value="{{ $language->id }}" {{ request()->input('language_id') == $language->id ? 'selected' : '' }}>
                        {{ $language->name }}
                    </option>
                @endforeach
            </select>
            <select name="status" class="form-select">
                <option value="">Státusz kiválasztása</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ request()->input('status') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-secondary" type="submit">Keresés</button>
            <button class="btn btn-outline-secondary" type="button" onClick="document.location.href='{{ route("article.index", $type) }}';">Törlés</button>
        </div>
    </form>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>
                    <a href="{{ route('article.index', ['type' => $type, 'sort' => 'title', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Cím
                        @if(request('sort') == 'title')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('article.index', ['type' => $type, 'sort' => 'lead', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Leírás
                        @if(request('sort') == 'lead')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('article.index', ['type' => $type, 'sort' => 'language_id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Nyelv
                        @if(request('sort') == 'language_id')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('article.index', ['type' => $type, 'sort' => 'menu_id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Csoport
                        @if(request('sort') == 'menu_id')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('article.index', ['type' => $type, 'sort' => 'article_status_id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Státusz
                        @if(request('sort') == 'article_status_id')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('article.index', ['type' => $type, 'sort' => 'created_by', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Létrehozta
                        @if(request('sort') == 'created_by')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('article.index', ['type' => $type, 'sort' => 'created_at', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Létrehozva
                        @if(request('sort') == 'created_at')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('article.index', ['type' => $type, 'sort' => 'updated_by', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Módosította
                        @if(request('sort') == 'updated_by')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('article.index', ['type' => $type, 'sort' => 'updated_at', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Módosítva
                        @if(request('sort') == 'updated_at')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>
                    Nyitókép
                </th>
                @if ( \App\Helper::userCanAccess('news_approval_') || Auth::user()->can("any_news_approval") )
                    <th>Műveletek</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($news as $new)
                <tr style="cursor: pointer;" onClick="{{ (\App\Helper::userCanAccess('news_edit_'.$new->menu->id) || Auth::user()->can("any_news_edit")) && ($new->article_status_id==3 || $new->article_status_id==1 || $new->article_status_id==2) ? "document.location.href='".route("article.editOrApproval", ["type" => $type, "id" => $new->id, "operation" => "edit"])."'" : "" }}">
                    <td>{{ $new->id }}</td>
                    <td>{{ $new->title }}</td>
                    <td>{{ $new->lead }}</td>
                    <td>{{ $new->language->name }}</td>
                    <td>{{ $new->menu->name }}</td>
                    <td>{{ $new->status->name }}</td>
                    <td>{{ $new->createdUser->name }}</td>
                    <td>{{ $new->created_at }}</td>
                    <td>{{ $new->updated_by ? $new->updatedUser->name : "" }}</td>
                    <td>{{ $new->updated_at }}</td>
                    <td>
                        @if ($new->cover)
                            <img src="{{ $new->cover_path }}/{{ $new->cover }}" style="max-height:100px;">
                        @endif
                    </td>
                    @if ( \App\Helper::userCanAccess('news_approval_'.$new->menu->id) || Auth::user()->can("any_news_approval") )
                        <td>
                            @if ( $new->article_status_id==2 )
                                <a href="{{ route("article.editOrApproval", ["type" => $type, "id" => $new->id, "operation" => "approval"]) }}" class="btn btn-sm btn-primary">Jóváhagyás</a>
                            @endif
                            @if ( $new->article_status_id=="6" )
                                <a href="{{ route("article.sendApproval", ["type" => $type, "id" => $new->id, "operation" => "rollback", "revision" => false]) }}" class="btn btn-sm btn-primary">Elutasítás visszavonása</a>
                            @endif
                        </td>
                    @endif
                </tr>

                <!-- jóváhagyásra váró módosítások lekérése -->
                @php
                    $pendingApprovals = $new->pendingApprovals();
                @endphp
                @if ( count($pendingApprovals)>0 )
                    <tr>
                        <td></td>
                        <td colspan="10"><strong>Módosításra váró tételek</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="10">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Cím
                                        </th>
                                        <th>
                                            Leírás
                                        </th>
                                        <th>
                                            Nyelv
                                        </th>
                                        <th>
                                            Csoport
                                        </th>
                                        <th>
                                            Státusz
                                        </th>
                                        <th>
                                            Létrehozta
                                        </th>
                                        <th>
                                            Létrehozva
                                        </th>
                                        <th>
                                            Nyitókép
                                        </th>
                                        @if ( \App\Helper::userCanAccess('news_approval_'.$new->menu->id) || Auth::user()->can("any_news_approval") )
                                            <th>
                                                Műveletek
                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendingApprovals as $item)
                                    <tr style="cursor: pointer;" 
                                            @if ($item->created_by == Auth::user()->id && ($item->article_status_id==1 || $item->article_status_id==2 ))
                                                onClick="document.location.href='{{ route("article.editOrApproval", ["type" => $type, "operation" => "edit", "id" => $item->id, "revision" => true]) }}'"
                                            @endif
                                        >                                
                                            <td>
                                                {{ $item->id }}
                                            </td>
                                            <td>
                                                {{ $item->title }}
                                            </td>
                                            <td>
                                                {{ $item->lead }}
                                            </td>
                                            <td>
                                                {{ $item->language->name }}
                                            </td>
                                            <td>
                                                {{ $item->menu->name }}
                                            </td>
                                            <td>
                                                {{ $item->status->name }}
                                            </td>
                                            <td>
                                                {{ $item->createdUser->name }}
                                            </td>
                                            <td>
                                                {{ $item->created_at }}
                                            </td>
                                            <td>
                                                @if ($item->cover)
                                                    <img src="{{ $item->cover_path }}/{{ $item->cover }}" style="max-height:100px;">
                                                @endif
                                            </td>
                                            @if ( \App\Helper::userCanAccess('news_approval_'.$new->menu->id) || Auth::user()->can("any_news_approval") )
                                                <td>
                                                    @if ( $item->article_status_id==2 )
                                                        <a href="{{ route("article.editOrApproval", ["type" => $type, "id" => $item->id, "operation" => "approval", "revision" => true]) }}" class="btn btn-sm btn-primary">Jóváhagyás</a>
                                                    @endif
                                                    @if ( $item->article_status_id=="6" )
                                                        <a href="{{ route("article.sendApproval", ["type" => $type, "id" => $item->id, "operation" => "rollback", "revision" => true]) }}" class="btn btn-sm btn-primary">Elutasítás visszavonása</a>
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <!-- Lapozás -->
    <div class="mt-3">
        {{ $news->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }} <!-- Laravel paginációs linkek -->
    </div>
@endsection
