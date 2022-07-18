<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MCF CARREER TRANSITION</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/web.css') }}">
</head>
<body>



<header class="container-fluid bg-white">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">


                <a href="https://mcfsp-uac.bj/" target="_blank" id="headerLink"><img src="{{ asset('img/logo.webp') }}" alt="MCFSP-UAC" class="logo"></a>

                <nav class="d-none d-md-flex nav">
                    <a class="nav-link active nav-btn-primary  " aria-current="page" href="#">Commencer <i class="fa-solid fa-arrow-right"></i></a>
                    <a class="nav-link nav-btn-secondary" href="{{ route('login') }}">Connexion <i class="fa-solid fa-right-to-bracket"></i></a>

                </nav>


        </div>
    </div>

</header>

<main>
    @yield('content')
</main>

<footer class="container">

</footer>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
