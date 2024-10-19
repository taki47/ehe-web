@extends('Layouts.admin')

@section('title') {{ $role->name }} szerkesztése @endsection

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

    <form action="{{ route("roles.update", $role->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">* Név</label>
            <input type="text" class="form-control" id="name" placeholder="Név" name="name" value="{{ old() ? old("name") : $role->name }}">

            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Módosítás</button>
        <a class="btn btn-danger" href="{{ route("roles.index") }}">Mégse</a>
    </form>
@endsection