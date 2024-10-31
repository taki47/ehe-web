@extends('Layouts.admin')

@section('title') Új banner @endsection

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

    <form action="{{ route("banner.store") }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">* Cím</label>
            <input type="text" class="form-control" id="title" placeholder="Cím" name="title" value="{{ old() ? old("title") : "" }}" autofocus>

            @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="description">* Leírás</label>
            <input type="text" class="form-control" id="description" placeholder="Leírás" name="description" value="{{ old() ? old("description") : "" }}">

            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" class="form-control" id="link" placeholder="Link" name="link" value="{{ old() ? old("link") : "" }}">

            @if ($errors->has('link'))
                <span class="text-danger">{{ $errors->first('link') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="language">Nyelv</label>
            <select name="language" class="form-control">
                <option value="">-- Válassz --</option>
                @foreach ($languages as $language)
                    <option value="{{ $language->id }}" {{ old() && old("language")==$language->id ? "selected" : "" }}>{{ $language->name }}</option>
                @endforeach
            </select>

            @if ($errors->has('language'))
                <span class="text-danger">{{ $errors->first('language') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input type="hidden" name="media" id="media_id">
            <div id="mediaList"></div>
            <button type="button" id="add_media_btn" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mediaModal">
                Média hozzáadása
            </button>

            @if ($errors->has('media'))
                <span class="text-danger">{{ $errors->first('media') }}</span>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Létrehozás</button>
        <a class="btn btn-danger" href="{{ route("banner.index") }}">Mégse</a>
    </form>

    @include('Admin.partials.mediaModal')
@endsection

@section('scripts')
    <script>
        // Valós idejű kereső funkció
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

        $(".media-item").on("click", function(e) {
            e.preventDefault();

            const mediaId = $(this).data("id");
            const imageSrc = $(this).find("img").attr("src");

            $("#media_id").val(mediaId);
            $("#mediaList").html(`
                    <img src="${imageSrc}" class="img-fluid" style="max-height:100px;">
                    <button class="delete-btn" type="button">&times;</button>
                `);

            $("#add_media_btn").addClass("d-none");

            $("#mediaModal").modal("hide");
        });

        $("#mediaList").on("click", ".delete-btn", function() {
            $("#media_id").val("");
            $("#mediaList").empty("");
            $("#add_media_btn").removeClass("d-none");
        });
    </script>
@endsection

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
</style>
@endsection