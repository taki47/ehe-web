@extends('Layouts.admin')

@section('title') {{ $partner->name }} módosítása @endsection

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

    <form action="{{ route("partner.update", [$type, $partner->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">* Név</label>
            <input type="text" class="form-control" id="name" placeholder="Név" name="name" value="{{old("name", $partner->name) }}" autofocus>

            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="link">* Link</label>
            <input type="text" class="form-control" id="link" placeholder="Link" name="link" value="{{ old("link", $partner->link) }}">
            <small id="linkHelp" class="form-text text-muted">Külső link esetén minden esetben https://-el kell kezdeni</small>

            @if ($errors->has('link'))
                <span class="text-danger">{{ $errors->first('link') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="image">Kép</label>
            <input type="file" class="form-control" id="image" placeholder="image" name="image">
            <img src="{{ $partner->image_path."/".$partner->image }}" style="max-height:100px;">

            @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="status">Státusz</label>
            <select name="status" class="form-control">
                <option value="0" {{ old() && old("status")==0 || !old() && $partner->status==0 ? "selected" : "" }}>Inaktív</option>
                <option value="1" {{ old() && old("status")==1 || !old() && $partner->status==1 ? "selected" : "" }}>Aktív</option>
            </select>

            @if ($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Módosítás</button>
        @if ( Auth::user()->can($type."_delete") )
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Törlés</button>
        @endif
    </form>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">{{ $partnerType->readable }} törlése</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Biztosan törölni szeretnéd ezt a {{ $partnerType->readable }}-t?

                    <form id="deleteForm" method="POST" action="{{ route("partner.destroy", [$type, $partner->id]) }}">
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