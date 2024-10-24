@extends('Layouts.admin')

@section('title') Média módosítása @endsection

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

    <form action="{{ route("media.update", [$type, $media->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">* Név</label>
            <input type="text" class="form-control" id="name" placeholder="Név" name="name" value="{{ old() ? old("name") : $media->name }}">

            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="file">Fájl</label>
            <input type="file" class="form-control" id="file" name="file">
            <small id="fileHelp" class="form-text text-muted">{{ ($type == "image" ? "jpg, jpeg,png" : ($type=="video" ? "mp4, avi" : "mp3")) }}</small>

            @if ($errors->has('file'))
                <span class="text-danger">{{ $errors->first('file') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="name">* Státusz</label>
            <select name="status" class="form-control">
                <option value="0" {{ old() && old("status")=="0" || !old() && $media->status=="0" ? "selected" : "" }}>Inaktív</option>
                <option value="1" {{ old() && old("status")=="1" || !old() && $media->status=="1" ? "selected" : "" }}>Aktív</option>
            </select>

            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Módosítás</button>
        <a class="btn btn-danger" href="{{ route("media.index", $type) }}">Mégse</a>
    </form>
@endsection
