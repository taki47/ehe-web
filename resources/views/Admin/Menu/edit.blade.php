@extends('Layouts.admin')

@section('title') {{ $editMenu->name }} módosítása @endsection

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

    <form action="{{ route('menu.update', $editMenu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">* Menüpont Neve:</label>
            <input type="text" id="name" name="name" required class="form-control" autofocus value="{{ old("name", $editMenu->name) }}">

            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="link">* Link:</label>
            <input type="text" id="link" name="link" required class="form-control" value={{ old("link", $editMenu->link) }}>
            <small id="linkHelp" class="form-text text-muted">Külső link esetén minden esetben https://-el kell kezdeni</small>

            @if ($errors->has('link'))
                <span class="text-danger">{{ $errors->first('link') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="parent_id">* Szülő Menüpont:</label>
            <select id="parent_id" name="parent_id" class="form-control">
                @if ( Auth::user()->can("any_menu_create") )
                    <option value="">Nincs (főmenü)</option>
                @endif
                @foreach ($menus as $menu)
                    @include('Admin.Menu.partials.menu-option', ['menu' => $menu, 'prefix' => ''])
                @endforeach
            </select>

            @if ($errors->has('parent_id'))
                <span class="text-danger">{{ $errors->first('parent_id') }}</span>
            @endif
        </div>

        @if ( Auth::user()->can("any_menu_create") )
            @php
                $extraFieldClass = (old('parent_id') != '' || !old() && $editMenu->parent_id != '') ? 'd-none' : '';
            @endphp

            <div class="form-group {{ $extraFieldClass }}" id="image-field">
                <label for="image">Kép:</label>
                <input type="file" name="image" id="image" class="form-control">

                <img src="/images/tiles/{{ $editMenu->image }}">

                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>

            <div class="form-group {{ $extraFieldClass }}" id="description-field">
                <label for="description">* Leírás:</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ old() ? old("description") : $editMenu->description }}">

                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="form-group {{ $extraFieldClass }}" id="subdescription-field">
                <label for="subdescription">Al-leírás:</label>
                <input type="text" name="subdescription" id="subdescription" class="form-control" value="{{ old() ? old("subdescription") : $editMenu->subdescription }}">

                @if ($errors->has('subdescription'))
                    <span class="text-danger">{{ $errors->first('subdescription') }}</span>
                @endif
            </div>

            <div class="form-group {{ $extraFieldClass }}" id="language-field">
                <label for="language_id">* Nyelv:</label>
                <select name="language_id" class="form-control">
                    <option value="">-- Válassz --</option>
                    @foreach ($languages as $language)
                        <option value="{{ $language->id }}" {{ old() && old("language_id")==$language->id || !old() && $editMenu->language_id == $language->id ? "selected" : "" }}>{{ $language->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('subdescription'))
                    <span class="text-danger">{{ $errors->first('subdescription') }}</span>
                @endif
            </div>
        @endif

        <div class="form-group">
            <label for="link">* Státusz:</label>
            <select name="status" class="form-control">
                <option value="0" {{ old() && old("status")==0 || !old() && $editMenu->status==0 ? "selected" : "" }}>Inaktív</option>
                <option value="1" {{ old() && old("status")==1 || !old() && $editMenu->status==1 ? "selected" : "" }}>Aktív</option>
            </select>
            <small id="linkHelp" class="form-text text-muted">Külső link esetén minden esetben https://-el kell kezdeni</small>

            @if ($errors->has('link'))
                <span class="text-danger">{{ $errors->first('link') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Módosítás</button>
    </form>
@endsection

@section('scripts')
    <script>
        $("#parent_id").on("change", function() {
            let value = $(this).val();

            if ( value=="" ) {
                // szülő elem
                $("#image-field").removeClass("d-none");
                $("#description-field").removeClass("d-none");
                $("#subdescription-field").removeClass("d-none");
                $("#language-field").removeClass("d-none");
            } else {
                $("#image-field").addClass("d-none");
                $("#description-field").addClass("d-none");
                $("#subdescription-field").addClass("d-none");
                $("#language-field").addClass("d-none");
            }
        });
    </script>
@endsection