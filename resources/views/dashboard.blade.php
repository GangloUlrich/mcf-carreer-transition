@extends('layouts.template')

@section('header')
    <header class="container-fluid bg-white">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">


                <a href="https://mcfsp-uac.bj/" target="_blank" id="headerLink"><img src="{{ asset('img/logo.webp') }}" alt="MCFSP-UAC" class="logo"></a>

                <nav class="d-none d-md-flex nav">


                    @auth
                        <a class="nav-link nav-btn-secondary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion <i class="fa-solid fa-right-to-bracket"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a class="nav-link nav-btn-secondary" href="{{ route('login') }}">Connexion <i class="fa-solid fa-right-to-bracket"></i></a>
                        <a class="nav-link active nav-btn-primary  " aria-current="page" href="{{ route('register') }}">Commencer <i class="fa-solid fa-arrow-right"></i></a>
                    @endauth


                </nav>


            </div>
        </div>

    </header>

@endsection


@section('content')

    <div class="container-fluid" id="hero">
        <h1 class="text-white text-center">{{ auth()->user()->name}}</h1>
        <div class="text-center text-white">Mon espace personnel </div>
    </div>


    <div class="container py-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Professionnels</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link "  href="#" role="button" aria-expanded="false">Informations</a>

            </li>
            <li class="nav-item">
                <a class="nav-link "  href="#" role="button" aria-expanded="false">Comptes</a>
            </li>

        </ul>
    </div>
@endsection
