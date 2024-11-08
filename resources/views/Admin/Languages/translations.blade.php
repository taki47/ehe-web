@extends('Layouts.admin')

@section('title') Fordítások @endsection

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('languages.translations.update') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Key</th>
                    @foreach ($languages as $language)
                        <th>{{ strtoupper($language) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($translations as $key => $trans)
                    @if ( !(strpos($key,"show")>-1) )
                        <tr>
                            <td>{{ $key }}</td>
                            @foreach ($languages as $language)
                                <td>
                                    <input type="text" name="translations[{{ $key }}][{{ $language }}]"
                                        value="{{ $trans->where('language', $language)->first()->value ?? '' }}"
                                        class="form-control">
                                </td>
                            @endforeach
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Mentés</button>
    </form>
</div>
@endsection
