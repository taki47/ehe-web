@extends('Layouts.admin')

@section('title') Menü kezelése @endsection

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">    

    <style>
        ul.menu li { padding: 10px; margin: 5px; cursor: move; display: flex; flex-direction: row; align-items: flex-start; }
        .menu-children { padding-left: 20px; }

        .menu-item {
            list-style: none; /* Eltávolítja a felsorolási jeleket */
            margin: 10px 0; /* Függőleges távolság a menüelemek között */
            padding: 10px; /* Belső margó */
            border: 1px solid #ccc; /* Határ a menüelem körül */
            border-radius: 5px; /* Lekerekített sarkok */
            display: flex; /* Flexbox a tartalom elrendezéséhez */
            align-items: center; /* Középre igazítja a tartalmat */
            background-color: #f9f9f9; /* Háttérszín */
        }

        .menu-content {
            display: flex;
            align-items: flex-start;
            flex-direction: column;
        }

        .menu-image {
            width: 50px; /* Kép szélessége */
            height: 50px; /* Kép magassága */
            border-radius: 50%; /* Kör alakú kép */
            margin-right: 10px; /* Jobb margó a kép és a szöveg között */
        }

        .menu-details {
            flex-grow: 1; /* A részletek terjedjenek ki a rendelkezésre álló helyre */
        }

        .menu-title {
            font-size: 1.2em; /* Cím betűmérete */
            margin: 0; /* Eltávolítja a margót */
        }

        .menu-description,
        .menu-subdescription {
            font-size: 0.9em; /* Leírások betűmérete */
            margin: 5px 0; /* Margó a leírások között */
        }

        .menu-actions {
            margin-top: 10px; /* Függőleges távolság a gombok és a menü tartalom között */
            display: block;
        }

        .menu-actions .btn {
            margin-right: 5px; /* Jobb margó a gombok között */
        }
    </style>
@endsection

@section('content')
    <p>
        <a class="btn btn-sm btn-secondary" data-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapse">
        Programozott oldalak listája
        </a>
    </p>
    <div class="collapse mb-4" id="collapse">
        <div class="card card-body">
            @foreach ($urls as $url)
                <strong>{{ $url["lang"] }}</strong><br>
                
                Hírek:
                <ul>
                    @foreach ($url["news_url"] as $newurl)
                        <li>{{ $newurl }}</li>
                    @endforeach
                </ul>

                Külföldi hírek:
                <ul>
                    @foreach ($url["foreignnews_url"] as $newurl)
                        <li>{{ $newurl }}</li>
                    @endforeach
                </ul>

                Események:
                <ul>
                    @foreach ($url["events_url"] as $newurl)
                        <li>{{ $newurl }}</li>
                    @endforeach
                </ul>

                <hr>
            @endforeach
        </div>
    </div>


    @if ( \App\Helper::userCanAccess('menu_create_') || Auth::user()->can("any_menu_create") )
        <a href="{{ route("menu.create") }}" class="btn btn-sm btn-primary">Új menüpont létrehozása</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div id="menuContainer" class="mt-5">
        @foreach ($menus as $menu)
            @if (Auth::user()->can("menu_order_{$menu->id}"))
                <ul class="menu menu-list">
            @else
                <ul class="menu">
            @endif
                @include('Admin.Menu.partials.menu-item', ['menu' => $menu])
            </ul>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script src="/assets/admin/js/jquery.sortable.min.js"></script>
    <script>
        $("document").ready(function() {
            let group = $("ul.menu-list").sortable({
                group: 'serialization',
                delay: 500,
                onDrop: function ($item, container, _super) {
                    var data = group.sortable("serialize").get();

                    fetch('{{ route('menu.order') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(data)
                    }).then(response => response.json()).then(data => {
                        console.log(data);
                        if (data.success) {
                            alert('Sorrend sikeresen mentve!');
                        }
                    });

                    _super($item, container);
                }
            });
        });
    </script>
@endsection