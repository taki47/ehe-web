@extends('Layouts.admin')

@section('title') Bannerek @endsection

@section('content')
    @if (Auth::user()->can("banner_create"))
        <a href="{{ route('banner.create') }}" class="btn btn-primary">+ Új banner hozzáadása</a>
    @endif
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Kereső űrlap -->
    <form action="{{ route('banner.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Keresés cím vagy leírás alapján" value="{{ request()->input('search') }}">
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
                <option value="1" {{ request()->input('status') == '1' ? 'selected' : '' }}>Aktív</option>
                <option value="0" {{ request()->input('status') == '0' ? 'selected' : '' }}>Inaktív</option>
            </select>
            <button class="btn btn-outline-secondary" type="submit">Keresés</button>
            <button class="btn btn-outline-secondary" type="button" onClick="document.location.href='{{ route("banner.index") }}';">Törlés</button>
        </div>
    </form>

    <!-- Összesítő információ -->
    <div class="mb-3">
        <p>
            Összesen: {{ $banners->total() }} találat,
            Jelenleg mutatva: {{ $banners->count() }} / {{ $banners->total() }}
        </p>
    </div>

    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>
                    <a href="{{ route('banner.index', ['sort' => 'title', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Cím
                        @if(request('sort') == 'title')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('banner.index', ['sort' => 'description', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Leírás
                        @if(request('sort') == 'description')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>Média</th>
                <th>
                    <a href="{{ route('banner.index', ['sort' => 'language_id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Nyelv
                        @if(request('sort') == 'language_id')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>Létrehozta</th>
                <th>
                    <a href="{{ route('banner.index', ['sort' => 'created_at', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Létrehozva
                        @if(request('sort') == 'created_at')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>Módosítva</th>
                <th>Módosította</th>
                <th>
                    <a href="{{ route('banner.index', ['sort' => 'status', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Státusz
                        @if(request('sort') == 'status')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
                <tr style="cursor: pointer;" 
                    @if(Auth::user()->can('banner_edit')) 
                        onClick="document.location.href='{{ route('banner.edit', $banner->id) }}'" 
                    @else 
                        style="pointer-events: none; opacity: 0.5;" 
                    @endif>
                    <td>{{ $banner->id }}</td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ $banner->description }}</td>
                    <td><img src="{{ $banner->mediaUsages[0]->media->file_path."/".$banner->mediaUsages[0]->media->file_name }}" style="height:100px;object-fit: cover;"></td>
                    <td>{{ $banner->language->name }}</td>
                    <td>{{ $banner->createdUser->name }}</td>
                    <td>{{ $banner->created_at }}</td>
                    <td>{{ $banner->updated_at }}</td>
                    <td>{{ ($banner->updated_by ? $banner->updatedUser->name : "") }}</td>
                    <td>{{ ($banner->status=="1" ? "Aktív" : "Inaktív") }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Lapozás -->
    <div class="mt-3">
        {{ $banners->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }} <!-- Laravel paginációs linkek -->
    </div>
@endsection
