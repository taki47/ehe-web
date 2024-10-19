@extends('Layouts.admin')

@section('title') Új felhasználó @endsection

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

    <form action="{{ route("users.store") }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">* Név</label>
            <input type="text" class="form-control" id="name" placeholder="Név" name="name" value="{{ old() ? old("name") : "" }}">

            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Jelszó</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Jelszó">

            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="passwordConfirm">Jelszó újra</label>
            <input type="password" class="form-control" id="passwordConfirm" name="password_confirmation" placeholder="Jelszó újra">
        </div>
        <div class="form-group">
            <label for="role">* Szerepkör</label>
            <select name="role[]" multiple class="form-control">
                <option value=""></option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}" 
                        {{ (old('role') && in_array($role->name, old('role'))) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>            

            @if ($errors->has('role'))
                <span class="text-danger">{{ $errors->first('role') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Létrehozás</button>
        <a class="btn btn-danger" href="{{ route("users.index") }}">Mégse</a>
    </form>
@endsection