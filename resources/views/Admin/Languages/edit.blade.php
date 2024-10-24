@extends('Layouts.admin')

@section('title') {{ $language->name }} szerkesztése @endsection

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

    <form action="{{ route("languages.update", $language->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">* Név</label>
            <input type="text" class="form-control" id="name" placeholder="Név" name="name" value="{{ old() ? old("name") : $language->name }}">

            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        
        <div class="form-group">
            <label for="lang_code">* Nyelv kód</label>
            <input type="text" class="form-control" id="lang_code" placeholder="Nyelv kód" name="lang_code" value="{{ old() ? old("lang_code") : $language->lang_code }}">
            <small id="lang_codeHelp" class="form-text text-muted">(ISO-639-1 szerint. Lista: <a href="https://localizely.com/iso-639-1-list/" target="_blank">ITT</a>)</small>
            
            @if ($errors->has('lang_code'))
                <span class="text-danger">{{ $errors->first('lang_code') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="flag">Zászló</label>
            <input type="file" class="form-control" id="flag" name="flag" value=""><br>
            <img src="/images/flags/{{ $language->flag }}" style="max-width:50px;">

            @if ($errors->has('flag'))
                <span class="text-danger">{{ $errors->first('flag') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="lang_code">* Státusz</label>
            <select name="status" class="form-control">
                <option value="0" {{ old() && old("status")==0 || !old() && $language->status==0 ? "selected" : "" }}>Inaktív</option>
                <option value="1" {{ old() && old("status")==1 || !old() && $language->status==1 ? "selected" : "" }}>Aktív</option>
            </select>
            
            @if ($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Módosítás</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Törlés</button>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Törlés</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Biztosan törölni szeretnéd ezt a nyelvet?

                <form method="POST" id="deleteForm" action="{{ route("languages.destroy", $language->id) }}">
                    @csrf
                    @method("DELETE")
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onClick="$('#deleteForm').submit()">Törlés</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Mégse</button>
            </div>
        </div>
        </div>
    </div>
@endsection