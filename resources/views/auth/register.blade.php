@extends('layouts.template')

@section('header')
    <header class="container-fluid bg-white">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">


                <a href="https://mcfsp-uac.bj/" target="_blank" id="headerLink"><img src="{{ asset('img/logo.webp') }}"
                                                                                     alt="MCFSP-UAC" class="logo"></a>

                <nav class="d-none d-md-flex nav">
                    <a class="nav-link active nav-btn-primary  " aria-current="page" href="{{ route('register') }}">Commencer
                        <i class="fa-solid fa-arrow-right"></i></a>

                    @auth
                        <a class="nav-link nav-btn-secondary" href="{{ route('dashboard') }}">Dashboard <i
                                class="fa-solid fa-right-to-bracket"></i></a>
                    @else
                        <a class="nav-link nav-btn-secondary" href="{{ route('login') }}">Connexion <i
                                class="fa-solid fa-right-to-bracket"></i></a>
                    @endauth


                </nav>


            </div>
        </div>

    </header>
@endsection

@section('content')
    {{--    hero--}}
    <div class="container-fluid" id="hero">
        <h1 class="text-white text-center">MCF CARREER TRANSITION PLATFORM</h1>
        <div class="text-center text-white">Répertoire des intérêts des boursiers pour la transition vers l'emploi</div>
    </div>


    {{--content--}}
    <div class="container-fluid">
        <div class="container">
            <form action="" method="post" accept-charset="UTF-8" enctype="multipart/form-data"
                  class="d-flex flex-column gap-5">


                {{--Etapes--}}

                <div class="steps">
                    <ul>
                        <li>
                            <span>1</span>

                            Informations
                        </li>

                        <li>
                            <span>2</span>
                            Documents
                        </li>

                        <li>
                            <span>3</span>
                            Finalisation
                        </li>
                    </ul>
                </div>


                {{--Etape1--}}
                <div class="stepcontent d-flex flex-column gap-5">
                    <div class="col-12 d-flex justify-content-between">
                        <h2>Informations personnelles</h2>
                        <h2>Etape 1 sur 3</h2>
                    </div>

                    <div class="row">

                        <div class="col-12 col-lg-6">
                            <label for="lastname" class="form-label">Nom</label>
                            <input type="text" name="lastname" id="lastname" class="mcf-input form-control">
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="firstname" class="form-label">Prénoms</label>
                            <input type="text" name="firstname" id="firstname" class="mcf-input form-control">
                        </div>


                    </div>

                    <div class="row align-items-center ">
                        <div class="col-12 col-lg-6">
                            <label for="birthdate" class="form-label">Date de naissance</label>
                            <input type="date" name="birthdate" id="birthdate" class="mcf-input form-control">
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="row ps-lg-5">
                                <div class="col-12"><label for="sexe" class="form-label">Sexe</label></div>
                                <div class="col-2 form-check">
                                    <input class="form-check-input" type="radio" name="sexe"
                                           id="sexe">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Masculin
                                    </label>
                                </div>

                                <div class="col-2 form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                           id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Féminin
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-end">

                        <div class="col-3 d-flex">
                            <button class="btn-secondary  btn  me-3"><i class="fa-solid fa-arrow-left"></i> Précédent
                            </button>
                            <button class="btn-primary btn  ">Suivant <i class="fa-solid fa-arrow-right"></i></button>
                        </div>

                    </div>


                </div>

                {{--Etape2--}}

                <div class="stepcontent d-flex flex-column gap-5">
                    <div class="col-12 d-flex justify-content-between">
                        <h2>Informations académiques</h2>
                        <h2>Etape 2 sur 3</h2>
                    </div>


                    <div class="row align-items-center ">
                        <div class="col-12 col-lg-6">
                            <label for="ecole" class="form-label">Etablissement de formation</label>

                            <select class="form-select mcf-input" name="ecole" id="ecole"
                                    aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="filiere" class="form-label">Filière de formation</label>

                            <select class="form-select mcf-input" name="filiere" id="filiere"
                                    aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12 col-lg-6">
                            <label for="secteur" class="form-label">Secteur d'intérêt professionnel
                            </label>

                            <select class="form-select mcf-input" name="secteur" id="secteur"
                                    aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="cv" class="form-label" title="merci de vous faire aider d'un Peer Coach pour sa finalisation si nécessaire">Dernière version de votre CV </label>
                            <input type="file" name="cv" id="cv" class="mcf-input form-control">
                        </div>

                    </div>

                    <div class="row justify-content-end">

                        <div class="col-3 d-flex">
                            <button class="btn-secondary  btn  me-3"><i class="fa-solid fa-arrow-left"></i> Précédent
                            </button>
                            <button class="btn-primary btn  ">Suivant <i class="fa-solid fa-arrow-right"></i></button>
                        </div>

                    </div>


                </div>

                {{--Etape3--}}

                <div class="stepcontent d-flex flex-column gap-5">
                    <div class="col-12 d-flex justify-content-between">
                        <h2>Informations du compte</h2>
                        <h2>Etape 3 sur 3</h2>
                    </div>

                    <div class="row">

                        <div class="col-12 col-lg-6">
                            <label for="phone" class="form-label">Numéro de téléphone</label>
                            <input type="tel" name="firstname" id="phone" class="mcf-input form-control">
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" name="email" id="email" class="mcf-input form-control">
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12 col-lg-6">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" id="password" class="mcf-input form-control">
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="passwordconfirm" class="form-label">Confirmation du mot de passe</label>
                            <input type="password" name="passwordconfirm" id="passwordconfirm"
                                   class="mcf-input form-control">
                        </div>

                    </div>


                    <div class="row justify-content-end">

                        <div class="col-3 d-flex">
                            <button class="btn-secondary  btn  me-3"><i class="fa-solid fa-arrow-left"></i> Précédent
                            </button>
                            <button class="btn-success btn  ">Enregistrer <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>

                    </div>


                </div>

            </form>
        </div>
    </div>
@endsection
