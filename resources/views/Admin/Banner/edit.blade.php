@extends('Layouts.admin')

@section('title') {{ $banner->title }} módosítása @endsection

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

    <form action="{{ route("banner.update", $banner->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="title">* Cím</label>
            <input type="text" class="form-control" id="title" placeholder="Cím" name="title" value="{{ old() ? old("title") : $banner->title }}" autofocus>

            @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="description">* Leírás</label>
            <input type="text" class="form-control" id="description" placeholder="Leírás" name="description" value="{{ old() ? old("description") : $banner->description }}" maxlength="180">

            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" class="form-control" id="link" placeholder="Link" name="link" value="{{ old() ? old("link") : $banner->link }}">

            @if ($errors->has('link'))
                <span class="text-danger">{{ $errors->first('link') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="language">Nyelv</label>
            <select name="language" class="form-control">
                <option value="">-- Válassz --</option>
                @foreach ($languages as $language)
                    <option value="{{ $language->id }}" {{ old() && old("language")==$language->id || !old() && $banner->language_id == $language->id ? "selected" : "" }}>{{ $language->name }}</option>
                @endforeach
            </select>

            @if ($errors->has('language'))
                <span class="text-danger">{{ $errors->first('language') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="status">Státusz</label>
            <select name="status" class="form-control">
                <option value="0" {{ old() && old("status")==0 || !old() && $banner->status==0 ? "selected" : "" }}>Inaktív</option>
                <option value="1" {{ old() && old("status")==1 || !old() && $banner->status==1 ? "selected" : "" }}>Aktív</option>
            </select>

            @if ($errors->has('language'))
                <span class="text-danger">{{ $errors->first('language') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input type="hidden" name="media" id="media_id" value="{{ $banner->mediaUsages[0]->media->id }}">
            <div id="mediaList">
                <img src="{{ $banner->mediaUsages[0]->media->file_path."/".$banner->mediaUsages[0]->media->file_name }}" class="img-fluid" style="max-height:100px;">
                <button class="delete-btn" type="button">&times;</button>
            </div>
            <button type="button" id="add_media_btn" class="btn btn-sm btn-primary d-none" data-toggle="modal" data-target="#mediaModal">
                Média hozzáadása
            </button>

            @if ($errors->has('media'))
                <span class="text-danger">{{ $errors->first('media') }}</span>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Módosítás</button>
        @if ( Auth::user()->can("banner_delete") )
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Törlés</button>
        @endif
    </form>

    @include('Admin.partials.mediaModal')
    
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Banner törlése</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Biztosan törölni szeretnéd ezt a bannert?

                    <form id="deleteForm" method="POST" action="{{ route("banner.destroy", $banner->id) }}">
                        @csrf
                        @method("DELETE")
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Mégse</button>
                    <button type="button" class="btn btn-danger" onClick='$("#deleteForm").submit();'>Törlés</button>
                </div>
            </div>
        </div>
    </div>
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