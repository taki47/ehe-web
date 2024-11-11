@extends('Layouts.admin')

@section('title') Új {{ $partnerType->readable }} @endsection

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

    <form action="{{ route("partner.store", $type) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">* Név</label>
            <input type="text" class="form-control" id="name" placeholder="Név" name="name" value="{{ old() ? old("name") : "" }}" autofocus>

            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="link">* Link</label>
            <input type="text" class="form-control" id="link" placeholder="Link" name="link" value="{{ old() ? old("link") : "" }}">
            <small id="linkHelp" class="form-text text-muted">Külső link esetén minden esetben https://-el kell kezdeni</small>

            @if ($errors->has('link'))
                <span class="text-danger">{{ $errors->first('link') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="image">Kép</label>
            <input type="file" class="form-control" id="image" placeholder="image" name="image" value="{{ old() ? old("image") : "" }}">

            @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Létrehozás</button>
        <a class="btn btn-danger" href="{{ route("partner.index", $type) }}">Mégse</a>
    </form>
@endsection