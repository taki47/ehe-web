@extends('Layouts.admin')

@section('title') Bannerek @endsection

@section('content')
    @if (Auth::user()->can("banner_create"))
        <a href="{{ route('banner.create') }}" class="btn btn-primary">+ Új banner hozzáadása</a>
    @endif
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Cím</th>
                <th>Leírás</th>
                <th>Média</th>
                <th>Nyelv</th>
                <th>Létrehozta</th>
                <th>Létrehozva</th>
                <th>Módosítva</th>
                <th>Módosította</th>
                <th>Státusz</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
                <tr style="cursor: pointer;" 
                    @if(Auth::user()->can('banner_edit')) 
                        onClick="document.location.href='{{ route('banner.edit', $banner->id) }}'" 
                    @else 
                        style="pointer-events: none; opacity: 0.5;" 
                    @endif>
                    <td>{{ $banner->id }}</td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ $banner->description }}</td>
                    <td><img src="{{ $banner->mediaUsages[0]->media->file_path."/".$banner->mediaUsages[0]->media->file_name }}" style="height:100px;object-fit: cover;"></td>
                    <td>{{ $banner->language->name }}</td>
                    <td>{{ $banner->createdUser->name }}</td>
                    <td>{{ $banner->created_at }}</td>
                    <td>{{ $banner->updated_at }}</td>
                    <td>{{ ($banner->updated_by ? $banner->updatedUser->name : "") }}</td>
                    <td>{{ ($banner->status=="1" ? "Aktív" : "Inaktív") }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
