@extends('Layouts.admin')

@section('title') {{ ($type == "image" ? "Képtár" : ($type=="video" ? "Videótár" : "Hangtár")) }} @endsection

@section('content')
    @php
        $canCreate = false;

        if ( $type=="image" && Auth::user()->can("media_image_create") )
            $canCreate = true;
        if ( $type=="audio" && Auth::user()->can("media_audio_create") )
            $canCreate = true;
        if ( $type=="video" && Auth::user()->can("media_video_create") )
            $canCreate = true;
    @endphp
    
    @if ( $canCreate )
        <a href="{{ route('media.create', $type) }}" class="btn btn-primary">+ Új média hozzáadása</a>
    @endif
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Név</th>
                <th>Használat</th>
                <th>Létrehozva</th>
                <th>Létrehozta</th>
                <th>Módosítva</th>
                <th>Módosította</th>
                <th>Státusz</th>
            </tr>
        </thead>
        <tbody>
            @foreach($media as $item)
                <tr style="cursor: pointer;" onClick='document.location.href="{{ route("media.edit", [$type, $item->id]) }}"'>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->media_usage_count }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->createdUser->name }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ ($item->updated_by ? $item->updatedUser->name : "") }}</td>
                    <td>{{ ($item->status=="1" ? "Aktív" : "Inaktív") }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
