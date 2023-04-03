<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Ajouter les fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ajoutez le lien vers la bibliothèque Font Awesome dans la balise  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>@yield('title')</title>
</head>

<body>

    <style>
        h1 {
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.7);
            padding-bottom: 5px;
        }

        legend {
            color: #302E2D;
            font-weight: bold;
            font-size: small;
        }

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

        .form-container80 {
            max-width: 80%;
            margin: 0 auto;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
        }

        nav {
            padding: 5px;
            margin-bottom: 20px;
        }
        
    </style>

    <!-- Ajouter une barre de navigation avec Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GestPPE : HDL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Tableau de bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fonctionnalités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    {{-- Ajouter la directive @yield('content') pour afficher le contenu des vues --}}

    <h1>@yield('title')</h1>
    @yield('content')


    <!-- Ajouter les fichiers JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>