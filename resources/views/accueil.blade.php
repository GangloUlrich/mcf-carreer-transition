@extends('layouts.template')


@section('header')
    <header class="container-fluid bg-white">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">


                <a href="https://mcfsp-uac.bj/" target="_blank" id="headerLink"><img src="{{ asset('img/logo.webp') }}"
                                                                                     alt="MCFSP-UAC" class="logo"></a>



                <div class="d-md-none">
                    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="fa-solid fa-ellipsis-vertical fa-2x"></i>
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">MCF CARREER TRANSITION</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="row gap-3">
                                <div>
                                    <a href="{{ route('register') }}" class="nav-btn-primary">Creer un compte</a>
                                </div>

                                <div>
                                    <a href="{{ route('login') }}" class="nav-btn-secondary">Se connecter</a>
                                </div>
                            </div>                   </div>
                    </div>

                </div>

                <nav class="d-none d-md-flex nav">


                    @auth
                        <a class="nav-link nav-btn-secondary" href="{{ route('dashboard') }}">Dashboard <i
                                class="fa-solid fa-right-to-bracket"></i></a>
                    @else
                        <a class="nav-link active nav-btn-primary  " aria-current="page" href="{{ route('register') }}">Commencer
                            <i class="fa-solid fa-arrow-right"></i></a>
                        <a class="nav-link nav-btn-secondary" href="{{ route('login') }}">Connexion <i
                                class="fa-solid fa-right-to-bracket"></i></a>
                    @endauth


                </nav>


            </div>
        </div>

    </header>

@endsection

@section('content')

    <div class="container-fluid" id="hero">
        <h1 class="text-white text-center">MCF CARREER TRANSITION PLATFORM</h1>
        <div class="text-center text-white">Répertoire des intérêts des boursiers pour la transition vers l'emploi</div>
    </div>

    <div class="container">

        <div class="d-flex flex-column align-items-center  gap-5 ">
            <div class="col-xl-8 col-12 text-center pt-5">
                Cette liste permet d'avoir une base de données exhaustive des informations d'ordre académiques et
                professionnelles, ainsi que des intérêts et besoins d'accompagnements de tous les boursiers MCF pour la
                transition vers l'emploi. Merci de faciliter la constitution de cette base de données et de contribuer à
                la création d'une offre de services pour la transition adaptée à vos besoins respectifs.
            </div>

            <div>
                <a href="{{ route('register') }}" class="nav-btn-primary">S'inscrire <i
                        class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>

    </div>

@endsection

