@extends('layouts.template')

@section('header')
    <header class="container-fluid bg-white">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">


                <a href="{{ route('accueil') }}" target="_blank" id="headerLink"><img src="{{ asset('img/logo.webp') }}" alt="MCFSP-UAC" class="logo"></a>

                <nav class="d-none d-md-flex nav">

                    <a href="{{ route('changeResumeForm',['user' => $user->id]) }}" class="nav-link mcf-nav-link-color">Ajouter un nouveau CV</a>


                    @auth
                        <a class="nav-link nav-btn-primary " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion <i class="fa-solid fa-right-to-bracket"></i></a>
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
        <h1 class="text-white text-center">{{ $user->name}}</h1>
        <div class="text-center text-white">Mon espace personnel </div>
    </div>


    <div class="container py-5">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link mcf-text-dark active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Mes informations</button>
                <button class="nav-link mcf-text-dark" id="nav-space-tab" data-bs-toggle="tab" data-bs-target="#nav-space" type="button" role="tab" aria-controls="nav-space" aria-selected="false">Espace Professionnel</button>
                <button class="nav-link mcf-text-dark" id="nav-space-tab" data-bs-toggle="tab" data-bs-target="#nav-account" type="button" role="tab" aria-controls="nav-account" aria-selected="false">Mon compte</button>


            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active py-5" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                <div class="row gap-5">
                   <div class="col-12">
                       <div class="row align-items-end">
                           <div class="col-12 col-lg-3 col-xl-4">
                               <div class="text-muted mb-0">Nom de l'utilisateur :</div>
                           </div>
                           <div class="col-12 col-lg-9 col-xl-8 font-size-18">
                               <div>{{ $user->name }}</div></div>
                       </div>
                   </div>

                    <div class="col-12">
                       <div class="row align-items-end">
                           <div class="col-12 col-lg-3 col-xl-4">
                               <div class="text-muted mb-0">Email de l'utilisateur :</div>
                           </div>
                           <div class="col-12 col-lg-9 col-xl-8 font-size-18">
                               <div>{{ $user->email }}</div></div>
                       </div>
                   </div>

                    <div class="col-12">
                       <div class="row align-items-end">
                           <div class="col-12 col-lg-3 col-xl-4">
                               <div class="text-muted mb-0">Date de naissance de l'utilisateur :</div>
                           </div>
                           <div class="col-12 col-lg-9 col-xl-8 font-size-18">
                               <div>{{ \Carbon\Carbon::parse($user->info->birthday)->locale('fr_FR')->isoFormat('LLLL')}}</div></div>
                       </div>
                   </div>

                    <div class="col-12">
                        <div class="row align-items-end">
                            <div class="col-12 col-lg-3 col-xl-4">
                                <div class="text-muted mb-0">Sexe de l'utilisateur :</div>
                            </div>
                            <div class="col-12 col-lg-9 col-xl-8 font-size-18">
                                <div>{{ $user->info->sexe }}</div></div>
                        </div>
                    </div>


                </div>



            </div>
            <div class="tab-pane fade py-5" id="nav-space" role="tabpanel" aria-labelledby="nav-space-tab">

                <div class="row gap-5">
                   <div class="col-12">
                       <div class="row align-items-end">
                           <div class="col-12 col-lg-3 col-xl-4">
                               <div class="text-muted mb-0">Etablissement de formation:</div>
                           </div>
                           <div class="col-12 col-lg-9 col-xl-8 font-size-18">
                               <div>{{ $user->info->ecole->nom }}</div></div>
                       </div>
                   </div>

                    <div class="col-12">
                       <div class="row align-items-end">
                           <div class="col-12 col-lg-3 col-xl-4">
                               <div class="text-muted mb-0">Filière de formation :</div>
                           </div>
                           <div class="col-12 col-lg-9 col-xl-8 font-size-18">
                               <div>{{ $user->info->filiere->libelle }}</div></div>
                       </div>
                   </div>

                    <div class="col-12">
                       <div class="row align-items-end">
                           <div class="col-12 col-lg-3 col-xl-4">
                               <div class="text-muted mb-0">Secteur d'intérêt professionnelle:</div>
                           </div>
                           <div class="col-12 col-lg-9 col-xl-8 font-size-18">
                               <div>{{ $user->info->secteur->libelle }}</div></div>
                       </div>
                   </div>

                    <div class="col-12">
                        <div class="row align-items-end">
                            <div class="col-12 col-lg-3 col-xl-4">
                                <div class="text-muted mb-0">Dernière version curriculum vitae :</div>
                            </div>
                            <div class="col-12 col-lg-9 col-xl-8 font-size-18">

                                <div class="d-flex align-items-center">

                                    @php

                                    $resume = str_replace('public/resumes/','',$user->info->resume);
                                        @endphp
                                    <div class="text-muted font-size-12 border-dashed me-3">{{ $resume }}</div>

                                    <a href="{{ route('displayResume',['user' => $user->id]) }}" target="_blank" class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Ouvrir le document"><i class="fa-solid fa-eye text-primary"></i></a>

                                    <a href="{{ route('changeResumeForm',['user' => $user->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier le document"><i class="fa-solid fa-pen mcf-color-orange"></i></a></div>

                            </div>
                        </div>
                    </div>


                </div>



            </div>
            <div class="tab-pane fade py-5" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">

                <div class="row gap-5">
                   <div class="col-12">
                       <div class="row align-items-end">
                           <div class="col-12 col-lg-3 col-xl-4">
                               <div class="text-muted mb-0">Numéro de téléphone de l'utilisateur:</div>
                           </div>
                           <div class="col-12 col-lg-9 col-xl-8 font-size-18">
                               <div>{{ $user->info->phone }}</div></div>
                       </div>
                   </div>

                    <div class="col-12">
                       <div class="row align-items-end">
                           <div class="col-12 col-lg-3 col-xl-4">
                               <div class="text-muted mb-0">Email de l'utilisateur :</div>
                           </div>
                           <div class="col-12 col-lg-9 col-xl-8 font-size-18">
                               <div>{{ $user->email }}</div></div>
                       </div>
                   </div>

                    <div class="col-12">
                       <div class="row align-items-end">
                           <div class="col-12 col-lg-3 col-xl-4">
                               <div class="text-muted mb-0">Mot de passe:</div>
                           </div>
                           <div class="col-12 col-lg-9 col-xl-8 font-size-18">
                               <div class="text-muted">{{ __('**********') }}</div></div>
                       </div>
                   </div>

                    <div class="col-12 col-lg-3">

                        <a class="nav-btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion <i class="fa-solid fa-right-to-bracket"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection
