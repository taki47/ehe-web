@extends('Layouts.admin')

@section('title') Új nyelv @endsection

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

    <form action="{{ route("languages.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">* Név</label>
            <input type="text" class="form-control" id="name" placeholder="Név" name="name" value="{{ old("name") }}">

            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="lang_code">* Nyelv kód</label>
            <input type="text" class="form-control" id="lang_code" placeholder="Nyelv kód" name="lang_code" value="{{ old("lang_code") }}">
            <small id="lang_codeHelp" class="form-text text-muted">(ISO-639-1 szerint. Lista: <a href="https://localizely.com/iso-639-1-list/" target="_blank">ITT</a>)</small>
            
            @if ($errors->has('lang_code'))
                <span class="text-danger">{{ $errors->first('lang_code') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="flag">* Zászló</label>
            <input type="file" class="form-control" id="flag" name="flag" value="">

            @if ($errors->has('flag'))
                <span class="text-danger">{{ $errors->first('flag') }}</span>
            @endif
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Létrehozás</button>
        <a class="btn btn-danger" href="{{ route("languages.index") }}">Mégse</a>
    </form>
@endsection