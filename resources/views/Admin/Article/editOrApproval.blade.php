@extends('Layouts.admin')

@section('title') {{ $editSettings["title"] }} @endsection

@section('styles')
<style>
    .delete-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    #mediaList {
        position: relative;
        display: inline-block;
    }

    .media-form-item {
        position: relative;
        margin: 5px;
    }

    .media-form-item img {
        max-height: 100px;
    }

    .media-form-item .delete-btn {
        position: absolute;
        top: 0;
        right: 0;
        background-color: red;
        color: white;
        border: none;
        font-size: 16px;
        cursor: pointer;
        padding: 2px 5px;
        border-radius: 50%;
    }
</style>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @if ( $errors->first()=="Hiba történt adatbázis művelet során! Részletek a laravel.log fájlban" )
                Hiba történt adatbázis művelet során! Részletek a laravel.log fájlban
            @else
                <strong>
                    Hiba a kitöltés során! Kérlek ellenőrizd az űrlapon található üzeneteket!
                </strong>
            @endif
        </div>
    @endif

    @if ( $editSettings["approval"] )
        @if ( $article->log )
            @php
                $logs = json_decode($article->log);
            @endphp
            <div class="alert alert-primary">
                <p>Módosította: {{ $article->createdUser->name }}</p>
                <p>Módosítva: {{ $article->created_at }}</p>
                
                <p>Módosított elemek</p>
                @foreach ($logs as $log)
                    <p class="pl-4">{{ $log }}</p>
                @endforeach

                <form method="GET" action="{{ route("article.sendApproval", ["type" => $type, "id" => "$article->id"]) }}">
                    <br>
                    <b>Időzített jóváhagyás:</b>
                    <input type="datetime-local" name="idopont" value="{{ old("idopont") }}" class="form-control">
                    <input type="hidden" name="operation" value="accept">
                    <input type="hidden" name="revision" value="true">
                

                    <p class="mt-4">
                        <button type="submit" class="btn btn-sm btn-success">Jóváhagyás</button>
                        <a href="{{ route("article.sendApproval", ["type" => $type, "id" => "$article->id", "operation" => "decline", "revision"=> "true"]) }}" class="btn btn-sm btn-danger">Elutasítás</a>
                    </p>
                </form>
            </div>
        @else
            <div class="alert alert-primary">
                <p>Létrehozta: {{ $article->createdUser->name }}</p>
                <p>Létrehozva: {{ $article->created_at }}</p>
                
                <form method="GET" action="{{ route("article.sendApproval", ["type" => $type, "id" => "$article->id"]) }}">
                    <br>
                    <b>Időzített jóváhagyás:</b>
                    <input type="datetime-local" name="idopont" value="{{ old("idopont") }}" class="form-control">
                    <input type="hidden" name="operation" value="accept">
                    <input type="hidden" name="revision" value="false">
                

                    <p class="mt-4">
                        <button type="submit" class="btn btn-sm btn-success">Jóváhagyás</button>
                        <a href="{{ route("article.sendApproval", ["type" => $type, "id" => "$article->id", "operation" => "decline", "revision"=> "false"]) }}" class="btn btn-sm btn-danger">Elutasítás</a>
                    </p>
                </form>
            </div>
        @endif
        
    @endif


    <form action="{{ route("article.update", ["type" => $articleType->slug, "id" => $article->id, "revision" => $revision]) }}" id="createForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <input type="hidden" name="savetype" id="saveType" value="">
        <div class="form-group">
            <label for="title">* Cím</label>
            <input type="text" class="form-control" id="title" placeholder="Cím" name="title" value="{{ old("title", $article->title) }}" autofocus {{ $editSettings["approval"] ? "readonly" : "" }}>

            @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="cover">Nyitókép</label>
            <input type="file" class="form-control" id="cover" name="cover" {{ $editSettings["approval"] ? "disabled" : "" }}>
            <small id="coverHelp" class="form-text text-muted">jpg, jpeg,png</small>
            <img src="{{ $article->cover_path."/".$article->cover }}" style="max-height:100px;">

            @if ($errors->has('cover'))
                <span class="text-danger">{{ $errors->first('cover') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="lead">* Leírás</label>
            <input type="text" class="form-control" id="lead" placeholder="Leírás" name="lead" value="{{ old("lead", $article->lead) }}" {{ $editSettings["approval"] ? "readonly" : "" }}>

            @if ($errors->has('lead'))
                <span class="text-danger">{{ $errors->first('lead') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="body">* Törzs</label>
            <textarea name="body" id="body" class="form-control">{{ old("body", $article->body) }}</textarea>

            @if ($errors->has('body'))
                <span class="text-danger">{{ $errors->first('body') }}</span>
            @endif
        </div>

        @if ( $type=="events" )
            <div class="form-group">
                <label for="event_start_date">* Esemény kezdő dátuma</label>
                <input type="datetime-local" name="event_start_date" id="event_start_date" class="form-control" value="{{ old("event_start_date", $article->event_start_date) }}" {{ $editSettings["approval"] ? "readonly" : "" }}>

                @if ($errors->has('event_start_date'))
                    <span class="text-danger">{{ $errors->first('event_start_date') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="event_end_date">* Esemény befejezés dátuma</label>
                <input type="datetime-local" name="event_end_date" id="event_end_date" class="form-control" value="{{ old("event_start_date", $article->event_end_date) }}" {{ $editSettings["approval"] ? "readonly" : "" }}>

                @if ($errors->has('event_end_date'))
                    <span class="text-danger">{{ $errors->first('event_end_date') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="event_location">* Esemény helyszíne</label>
                <input type="text" name="event_location" id="location" class="form-control" oninput="fetchSuggestions(this.value)" list="locationList" value="{{ old("event_location", $article->event_location) }}" {{ $editSettings["approval"] ? "readonly" : "" }}>
                <datalist id="locationList"></datalist>

                @if ($errors->has('event_location'))
                    <span class="text-danger">{{ $errors->first('event_location') }}</span>
                @endif
            </div>
        @endif

        <div class="form-group">
            <label for="form">Űrlap</label>
            <input type="text" name="form" id="form" class="form-control" value="{{ old("form", $article->form) }}" {{ $editSettings["approval"] ? "readonly" : "" }}>

            @if ($errors->has('form'))
                <span class="text-danger">{{ $errors->first('form') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="language">* Nyelv</label>
            <select name="language" id="language-select" class="form-control" {{ $editSettings["approval"] ? "disabled" : "" }}>
                <option value="">-- Válassz --</option>
                @foreach ($languages as $language)
                    <option value="{{ $language->id }}" {{ old() && old("language")==$language->id || !old() && $article->language_id==$language->id ? "selected" : "" }}>{{ $language->name }}</option>
                @endforeach
            </select>

            @if ($errors->has('language'))
                <span class="text-danger">{{ $errors->first('language') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="menu_id">* Csoport</label>
            <input type="hidden" id="menus" value="{{ json_encode($menus) }}">
            <select name="menu_id" id="menu-select" class="form-control" {{ $editSettings["approval"] ? "disabled" : "" }}>
                <option value="">-- Válassz --</option>
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}" {{ old() && old("menu_id")==$menu->id || !old() && $menu->id==$article->menu_id ? "selected" : "" }}>{{ $menu->name . " " . $menu->language->lang_code }}</option> 
                @endforeach
            </select>

            @if ($errors->has('menu_id'))
                <span class="text-danger">{{ $errors->first('menu_id') }}</span>
            @endif
        </div>
        <div class="form-group">
            <p>Média:</p>
            
            <input type="hidden" name="media" id="media_id" value="{{ old("media", json_encode($useMedias)) }}">
            <div id="mediaList" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between; flex-wrap: wrap;"></div>
            
            @if ( !$editSettings["approval"] )
                <div>
                    <button type="button" id="add_media_btn" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mediaModal">
                        Média hozzáadása
                    </button>
                </div>
            @endif

            @if ($errors->has('media'))
                <span class="text-danger">{{ $errors->first('media') }}</span>
            @endif
        </div>
        
        @if ( !$editSettings["approval"] )
            <button type="button" id="draft-btn" class="btn btn-secondary">Mentés piszkozatként</button>
            <button type="button" id="save-btn" class="btn btn-primary">Mentés és beküldés jóváhagyásra</button>
        @endif
    </form>

    @include('Admin.partials.mediaModal')
@endsection

@section('scripts')
    <script src="/assets/tinymce/tinymce.min.js"></script>
    <script>
        $(document).ready(function() {
            // visszatérő hibánál, médialista megjelenítése
            let mediaIdField = $("#media_id");
            let mediaListDiv = $("#mediaList");
            let mediaListHtml = "";

            // Ellenőrzi, hogy a media_id mező nem üres-e
            if (mediaIdField.val() != "") {
                let medias = JSON.parse(mediaIdField.val());
                
                medias.forEach(media => {
                    // Kikeresi a mediaModal-ban lévő elemet az ID alapján
                    $("#mediaModal").find(".media-item").each(function() {
                        let mediaId = $(this).data("id");
                        
                        // Ha az elem ID-ja megegyezik a `media` változó értékével
                        if (mediaId == media) {
                            $(this).addClass("d-none");
                            let imageSrc = $(this).find("img").attr("src");

                            // HTML kód hozzáadása a media listához
                            mediaListHtml += `
                                <div class='media-form-item'>
                                    <img src="${imageSrc}" class="img-fluid" style="max-height:100px;">
                                    <button class="delete-btn" type="button" data-id='${mediaId}'>&times;</button>
                                </div>
                            `;
                        }
                    });
                });

                // Megjeleníti a generált HTML-t a média listában
                mediaListDiv.html(mediaListHtml);
            }
        });

        // média választó kiválasztás
        $(".media-item").on("click", function(e) {
            e.preventDefault();

            const mediaId = $(this).data("id");
            const imageSrc = $(this).find("img").attr("src");

            let mediaIdField = $("#media_id");
            let mediaListDiv = $("#mediaList");

            let newMediaIdFieldContent = "";
            if ( mediaIdField.val()!="" ) {
                newMediaIdFieldContent = JSON.parse(mediaIdField.val());
                newMediaIdFieldContent.push(mediaId);
            } else {
                newMediaIdFieldContent = [mediaId];
            }
            mediaIdField.val(JSON.stringify(newMediaIdFieldContent));


            let newHtml = mediaListDiv.html();
            newHtml = newHtml + `
                    <div class='media-form-item'>
                        <img src="${imageSrc}" class="img-fluid" style="max-height:100px;">
                        <button class="delete-btn" type="button" data-id='${mediaId}'>&times;</button>
                    </div>
                    `;
            mediaListDiv.html(newHtml);

            // média eltűntetése a modal-ban
            $(this).addClass("d-none");
        });

        // média választó kereső
        $("#searchInput").on("keyup", function() {
            const searchTerm = $(this).val().toLowerCase();
            const mediaItems = $(".media-item");

            mediaItems.each(function() {
                const title = $(this).find(".card-title").text().toLowerCase();
                
                if (title.includes(searchTerm)) {
                    $(this).show(); // Megjelenítés, ha illeszkedik
                } else {
                    $(this).hide(); // Elrejtés, ha nem illeszkedik
                }
            });
        });

        $("#mediaList").on("click", ".delete-btn", function() {
            let dataId = $(this).data("id");
            let mediaIdField = $("#media_id");

            // Törli a megjelenített elemet
            $(this).closest(".media-form-item").remove();

            // Frissíti a media_id mezőt
            let medias = JSON.parse(mediaIdField.val() || "[]");

            // Új JSON tömb létrehozása a törölt elemek nélkül
            medias = medias.filter(media => media !== dataId);

            // Új JSON tömb visszaírása a mezőbe
            mediaIdField.val(JSON.stringify(medias));

            // modal-ban média megjelenítése
            $("#mediaModal").find(".media-item").each(function() {
                if ( $(this).data("id")==dataId )
                    $(this).removeClass("d-none");
            });
        });


        // mentés gombok
        $("#draft-btn").on("click", function() {
            $("#saveType").val("draft");
            $("#createForm").submit();
        });

        $("#save-btn").on("click", function() {
            $("#saveType").val("save");
            $("#createForm").submit();
        });

        // wysiwyg editor inicializálása
        let editor = tinymce.init({
            selector: 'textarea#body',
            plugins: [
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            readonly: {{ $editSettings["approval"] ? "true" : "false" }},
            tinycomments_mode: 'embedded',
            exportpdf_converter_options: { 'format': 'Letter', 'margin_top': '1in', 'margin_right': '1in', 'margin_bottom': '1in', 'margin_left': '1in' },
            exportword_converter_options: { 'document': { 'size': 'Letter' } },
            importword_converter_options: { 'formatting': { 'styles': 'inline', 'resets': 'inline',	'defaults': 'inline', } },
        });

        // nyelv választáskor csoport szűkítés
        document.getElementById('language-select').addEventListener('change', function() {
            const selectedLanguageId = parseInt(this.value);
            const menuSelect = document.getElementById('menu-select');
            const menus = JSON.parse(document.getElementById('menus').value);

            // Ürítjük a menü legördülőt
            menuSelect.innerHTML = '<option value="">--- Válassz ---</option>';

            // Szűrjük a menüket a kiválasztott nyelv szerint
            const filteredMenus = menus.filter(menu => menu.language_id === selectedLanguageId);

            // Feltöltjük a menü legördülőt a szűrt menükkel
            filteredMenus.forEach(menu => {
                const option = document.createElement('option');
                option.value = menu.id;
                option.textContent = menu.name+" "+menu.language.lang_code;
                menuSelect.appendChild(option);
            });
        });

        async function fetchSuggestions(query) {
            if (query.length < 3) return; // Csak 3 karakter felett kezdje a keresést
            const response = await fetch(`https://nominatim.openstreetmap.org/search?q=${query}&format=json&addressdetails=1&limit=5`);
            const data = await response.json();

            const datalist = document.getElementById('locationList');
            datalist.innerHTML = ''; // Töröld az előző ajánlásokat

            // Helyszínajánlások hozzáadása a datalist elemhez
            data.forEach(place => {
                const option = document.createElement('option');
                option.value = place.display_name; // Ezt látja a felhasználó
                datalist.appendChild(option);
            });
        }
    </script>
@endsection