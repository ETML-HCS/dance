<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@php
  $title = $h2;
@endphp

@section('title',$title)

@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="form-container"  >
        @csrf

        <div class="mb-3">
            <legend>{{$p1}}</legend>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input">
            <label for="remember" class="form-check-label">Se souvenir de moi</label>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>
        
        <p class="mt-3 mb-0">
            <a href="{{ route('register') }}"">Pas de compte ? Cliquez ici pour vous inscrire</a>
        </p>
       

    </form>
@endsection
