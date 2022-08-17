@extends('layouts.template')


@section('header')
    <header class="container-fluid bg-white">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">


                <a href="https://mcfsp-uac.bj/" target="_blank" id="headerLink"><img src="{{ asset('img/logo.webp') }}"
                                                                                     alt="MCFSP-UAC" class="logo"></a>

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
        <h1 class="text-white text-center">{{ $user->name}}</h1>
        <div class="text-center text-white">Nouvelle version de  mon curriculum vitae</div>
    </div>


    <div class="container py-5">
        <div class="row align-items-center justify-content-center">

            <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center flex-column gap-4">
                <!-- Button trigger modal -->
                <div class="text-success text-center font-size-16">La nouvelle version de votre curriculum vitae a été enregistrée avec succès</div>
                <button type="button" class="nav-btn-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    voir la nouvelle version
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-body">
                                <iframe src="{{ \Illuminate\Support\Facades\Storage::url($user->info->resume) }}" width="100%"
                                        height="600px"></iframe>
                            </div>
                            <div class="modal-footer">

                                <a href="{{ route('displayResume',['user' => $user]) }}" class="btn btn-primary">Vue complete</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

