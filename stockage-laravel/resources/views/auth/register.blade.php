@extends('layouts.app')

@section('content')

    <style>       
        body {
            background-image: url('https://picsum.photos/1920/1080');
            background-size: cover;
        }
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
        }
        nav{
            padding: 5px;
            margin-bottom: 20px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center; font-weight: bolder; " >{{ __('Inscription') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Champ pour le nom de l'utilisateur -->
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Nom') }}</label>

                                <div>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="form-control @error('name') is-invalid @enderror">

                                    @error('name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Champ pour l'adresse e-mail de l'utilisateur -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Adresse e-mail') }}</label>

                                <div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror">

                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Champ pour le mot de passe de l'utilisateur -->
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Mot de passe') }}</label>

                                <div>
                                    <input id="password" type="password" name="password" required class="form-control @error('password') is-invalid @enderror">

                                    @error('password')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Champ pour confirmer le mot de passe de l'utilisateur -->
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">{{ __('Confirmer le mot de passe') }}</label>

                                <div>
                                    <input id="password-confirm" type="password" name="password_confirmation" required class="form-control">
                                </div>
                            </div>

                            <!-- Bouton pour soumettre le formulaire -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">{{ __('S\'inscrire') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 