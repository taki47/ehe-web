@extends('Layouts.admin')

@section('title') {{ $partnerType->readable }} @endsection

@section('content')
    @if (Auth::user()->can($type."_create"))
        <a href="{{ route('partner.create', $type) }}" class="btn btn-primary">+ Új {{ $partnerType->readable }} hozzáadása</a>
    @endif
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Kereső űrlap -->
    <form action="{{ route('partner.index', $type) }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Keresés név alapján" value="{{ request()->input('search') }}">
            <select name="status" class="form-select">
                <option value="">Státusz kiválasztása</option>
                <option value="1" {{ request()->input('status') == '1' ? 'selected' : '' }}>Aktív</option>
                <option value="0" {{ request()->input('status') == '0' ? 'selected' : '' }}>Inaktív</option>
            </select>
            <button class="btn btn-outline-secondary" type="submit">Keresés</button>
            <button class="btn btn-outline-secondary" type="button" onClick="document.location.href='{{ route("partner.index", $type) }}';">Törlés</button>
        </div>
    </form>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>
                    <a href="{{ route('partner.index', ['type' => $type, 'sort' => 'name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Név
                        @if(request('sort') == 'name')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('partner.index', ['type' => $type, 'sort' => 'link', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Link
                        @if(request('sort') == 'link')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>Kép</th>
                <th>Létrehozta</th>
                <th>
                    <a href="{{ route('partner.index', ['type' => $type, 'sort' => 'created_at', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Létrehozva
                        @if(request('sort') == 'created_at')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('partner.index', ['type' => $type, 'sort' => 'updated_at', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Módosítva
                        @if(request('sort') == 'updated_at')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
                <th>Módosította</th>
                <th>
                    <a href="{{ route('partner.index', ['type' => $type, 'sort' => 'status', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'direction'])) }}">
                        Státusz
                        @if(request('sort') == 'status')
                            <span class="badge">{{ request('direction') == 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($partners as $partner)
                <tr style="cursor: pointer;" onclick="handleRowClick(event, '{{ route('partner.edit', [$type, $partner->id]) }}')">
                    <td>{{ $partner->id }}</td>
                    <td>{{ $partner->name }}</td>
                    <td>{{ $partner->link }}</td>
                    <td><img src="{{ $partner->image_path."/".$partner->image }}" style="height:100px;object-fit: cover;"></td>
                    <td>{{ $partner->createdUser->name }}</td>
                    <td>{{ $partner->created_at }}</td>
                    <td>{{ $partner->updated_at }}</td>
                    <td>{{ ($partner->updated_by ? $partner->updatedUser->name : "") }}</td>
                    <td>{{ ($partner->status=="1" ? "Aktív" : "Inaktív") }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function handleRowClick(event, url) {
            if (!event.target.closest('input[type="checkbox"]')) {
                document.location.href = url;
            }
        }
    </script>
@endsection
