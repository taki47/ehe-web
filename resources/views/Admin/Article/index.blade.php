@extends('Layouts.admin')

@section('title') {{ $articleType->name }} @endsection

@section('content')
    @php
        $canApproval = false;
        if ( \App\Helper::userCanAccess('news_approval_') || Auth::user()->can("any_news_approval") ) {
            $canApproval = true;
        }

        $canCreate = false;
        if ( \App\Helper::userCanAccess('news_create_') || Auth::user()->can("any_news_create") ) {
            $canCreate = true;
        }

        $canEdit = false;
        if ( \App\Helper::userCanAccess('news_edit_') || Auth::user()->can("any_news_edit") ) {
            $canEdit = true;
        }

        $canArchive = false;
        if ( \App\Helper::userCanAccess('news_archive_') || Auth::user()->can("any_news_archive") ) {
            $canArchive = true;
        }
    @endphp
    

    @if ( $canCreate )
        <a href="{{ route('article.create', $type) }}" class="btn btn-primary">+ Új {{ $articleType->name }} hozzáadása</a>
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

    @if ( $canArchive )
        <!-- Státusz módosító -->
        <div class="mb-3">
            <form action="{{ route('article.bulk-actions', $type) }}" method="POST" id="bulkStatusForm">
                @csrf
                <div class="input-group">
                    <select name="action" class="form-select" required>
                        <option value="">Tömeges művelet</option>
                        <option value="0">Archiválás</option>
                        <option value="1">Újra aktiválás</option>
                    </select>
                    <input type="hidden" name="article_ids" id="selectedArticles" value="">
                    <button class="btn btn-outline-secondary" type="submit">Művelet végrehajtása</button>
                </div>
            </form>
        </div>    
    @endif

    <table class="table table-hover">
        <thead>
            <tr>
                @if ( $canArchive )
                    <th>
                        <input type="checkbox" id="select_all" onclick="toggle(this)" />
                    </th>
                @endif
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
                @if ( $canApproval )
                    <th>Műveletek</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr style="cursor: pointer;" onClick="handleRowClick(event, '{{ (\App\Helper::userCanAccess('news_edit_'.$article->menu->id) || Auth::user()->can("any_news_edit")) && ($article->article_status_id==3 || $article->article_status_id==1 || $article->article_status_id==2) ? route("article.editOrApproval", ["type" => $type, "id" => $article->id, "operation" => "edit"]) : "" }}')">
                    @if ( $canArchive )
                        <td>
                            <input type="checkbox" name="article_ids[]" value="{{ $article->id }}" onchange="updateSelectedArticles()" />
                        </td>
                    @endif
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->lead }}</td>
                    <td>{{ $article->language->name }}</td>
                    <td>{{ $article->menu->name }}</td>
                    <td>{{ $article->status->name }}</td>
                    <td>{{ $article->createdUser->name }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->updated_by ? $article->updatedUser->name : "" }}</td>
                    <td>{{ $article->updated_at }}</td>
                    <td>
                        @if ($article->cover)
                            <img src="{{ $article->cover_path }}/{{ $article->cover }}" style="max-height:100px;">
                        @endif
                    </td>
                    @if ( \App\Helper::userCanAccess('news_approval_'.$article->menu->id) || Auth::user()->can("any_news_approval") )
                        <td>
                            @if ( $article->article_status_id==2 )
                                <a href="{{ route("article.editOrApproval", ["type" => $type, "id" => $article->id, "operation" => "approval"]) }}" class="btn btn-sm btn-primary">Jóváhagyás</a>
                            @endif
                            @if ( $article->article_status_id=="6" )
                                <a href="{{ route("article.sendApproval", ["type" => $type, "id" => $article->id, "operation" => "rollback", "revision" => false]) }}" class="btn btn-sm btn-primary">Elutasítás visszavonása</a>
                            @endif
                        </td>
                    @endif
                </tr>

                <!-- jóváhagyásra váró módosítások lekérése -->
                @php
                    $pendingApprovals = $article->pendingApprovals();
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
                                        @if ( \App\Helper::userCanAccess('news_approval_'.$article->menu->id) || Auth::user()->can("any_news_approval") )
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
                                            @if ( \App\Helper::userCanAccess('news_approval_'.$article->menu->id) || Auth::user()->can("any_news_approval") )
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
        {{ $articles->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }} <!-- Laravel paginációs linkek -->
    </div>
@endsection

@section('scripts')
    <script>
        function toggle(source) {
            checkboxes = document.getElementsByName('article_ids[]');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = source.checked;
            }
            updateSelectedArticles();
        }

        function updateSelectedArticles() {
            let selected = [];
            document.querySelectorAll('input[name="article_ids[]"]:checked').forEach((checkbox) => {
                selected.push(checkbox.value);
            });
            document.getElementById('selectedArticles').value = selected.join(',');
        }

        function handleRowClick(event, url) {
            console.log(url);
            if (!event.target.closest('input[type="checkbox"]') && url!="" ) {
                document.location.href = url;
            }
        }
    </script>
@endsection