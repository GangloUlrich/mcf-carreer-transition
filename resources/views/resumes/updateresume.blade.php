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
        <div class="text-center text-white">Modifier mon curriculum vitae</div>
    </div>


    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-7">

                        <iframe src="{{ \Illuminate\Support\Facades\Storage::url($user->info->resume) }}" width="100%"
                                height="600px"></iframe>
                    </div>
                    <div class="col-12 col-lg-5">

                        <div class="row">
                            <div class="col-12 col-lg-9 offset-lg-1">
                                <div class="row gap-4 pt-lg-5">
                                    <div><i class="fa-solid fa-long-arrow-left me-3"></i> Version actuelle de mon cv
                                    </div>

                                    <h1 class="font-size-36">Nouvelle version de votre cv</h1>

                                    <form action="{{route('changeResume',['user' => $user])}}" accept-charset="UTF-8" method="POST"
                                          enctype="multipart/form-data" class="d-flex flex-column gap-3">
                                        @csrf()
                                        <div class="col-12">
                                            <label for="resume" class="form-label text-muted font-size-12"
                                                   title="merci de vous faire aider d'un Peer Coach pour sa finalisation si nécessaire"><span
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="merci de vous faire aider d'un Peer Coach pour sa finalisation si nécessaire"><i
                                                        class="fa-solid fa-circle-info"></i></span> Dernière version de
                                                votre CV (au maximum 3Mo)</label>
                                        </div>

                                        <div class="col-12 col-lg-12">

                                            <input type="file" name="resume" id="resume"
                                                   class="mcf-input form-control @error('resume') is-invalid @enderror ">

                                            @error('resume')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="nav-btn-primary w-100">Enregistrer</button>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

