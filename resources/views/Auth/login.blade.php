@extends('Layouts.empty')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <form method="POST" id="form" action="{{ route("loginAttempt") }}">
        @csrf
        <input type="hidden" name="gRecaptchaResponse" id="gRecaptchaResponse" value="">
        <input type="hidden" name="siteKey" id="siteKey" value="{{ env("GCAPTCHA_SITE_KEY") }}">
        
        <h1>Bejelentkezés</h1>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Jelszó" required autofocus />
        </div>
        
        <div class="mt-4">
            @if ( env("APP_ENV")=="prod" )
                <button type="submit" class="btn btn-secondary g-recaptcha" data-sitekey="{{ env("GCAPTCHA_SITE_KEY") }}" data-callback="sendForm">Bejelentkezés</button>
            @else
                <button type="submit" class="btn btn-secondary">Bejelentkezés</button>
            @endif
        </div>
    </form>
@endsection