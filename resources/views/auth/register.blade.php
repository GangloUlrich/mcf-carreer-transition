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
            <form autocomplete="off" action="{{ route('register') }}" method="post" accept-charset="UTF-8"
                  enctype="multipart/form-data"
                  class="d-flex flex-column py-3 py-lg-5 gap-5">

                @csrf()
                {{--Etape1--}}
                <div class="stepcontent d-flex flex-column gap-5">
                    <div class="col-12 d-flex justify-content-between">
                        <h2>Informations personnelles</h2>

                    </div>

                    <div class="row">

                        {{--lastname--}}
                        <div class="col-12 col-lg-6">
                            <label for="lastname" class="form-label">Nom</label>
                            <input type="text" name="lastname" id="lastname"
                                   class="mcf-input form-control @error('lastname') is-invalid @enderror">

                            @error('lastname')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        {{--firstname--}}
                        <div class="col-12 col-lg-6">
                            <label for="firstname" class="form-label">Prénoms</label>
                            <input type="text" name="firstname" id="firstname"
                                   class="mcf-input form-control @error('prenom') is-invalid @enderror ">

                            @error('prenom')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                    <div class="row align-items-end ">

                        {{--Date de naissance--}}
                        <div class="col-12 col-lg-4">
                            <label for="birthdate" class="form-label">Date de naissance</label>
                            <input type="date" name="birthdate" id="birthdate"
                                   class="mcf-input form-control @error('birthdate') is-invalid @enderror ">

                            @error('birthdate')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{--Sexe--}}
                        <div class="col-12 col-lg-4">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-6">
                                    <label for="sexe" class="form-label text-start">Sexe</label>
                                    <div class="d-flex justify-content-lg-center">
                                        <div class="form-check me-3 me-lg-4">
                                            <input class="form-check-input @error('sexe') is-invalid @enderror " type="radio"
                                                   name="sexe" value="masculin"
                                                   id="sexe">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Masculin
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input @error('sexe') is-invalid @enderror" type="radio"
                                                   name="sexe" value="feminin"
                                                   id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Féminin
                                            </label>
                                        </div>
                                    </div>


                                    @error('sexe')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        {{--cohorte--}}
                        <div class="col-12 col-lg-4">
                            <label for="cohorte" class="form-label">Cohortes</label>

                            <select class="form-select mcf-input @error('cohorte') is-invalid @enderror" name="cohorte"
                                    id="cohorte"
                                    aria-label="Default select example">
                                <option value="">Choisir...</option>

                                @php
                                $cohortes = env('COHORTES');
                                $cohortes = explode(',',$cohortes);
                                @endphp

                               @foreach($cohortes as $cohorte)
                                <option value="{{ $cohorte }}">{{ str_replace('_',' ',$cohorte) }} </option>
                                @endforeach

                            </select>

                            @error('cohorte')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                {{--Etape2--}}

                <div class="stepcontent d-flex flex-column gap-5">
                    <div class="col-12 d-flex justify-content-between">
                        <h2>Informations académiques</h2>

                    </div>


                    <div class="row align-items-center ">

                        {{--Etablissement--}}
                        <div class="col-12 col-lg-6">
                            <label for="ecole" class="form-label">Etablissement de formation</label>

                            <select class="form-select mcf-input @error('ecole') is-invalid @enderror" name="ecole"
                                    id="ecole"
                                    aria-label="Default select example">
                                <option value="">Choisir...</option>

                                @if(sizeof($ecoles))

                                    @foreach($ecoles as $ecole)
                                        <option value="{{$ecole->id}}">{{ $ecole->nom}}</option>
                                    @endforeach
                                @endif
                            </select>

                            @error('universite')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{--Filiere--}}
                        <div class="col-12 col-lg-6">
                            <label for="filiere" class="form-label">Filière de formation</label>

                            <select class="form-select mcf-input @error('filiere') is-invalid @enderror" name="filiere"
                                    id="filiere"
                                    aria-label="Default select example">
                                <option value=''>Choisir...</option>
                            </select>

                            @error('filiere')

                            <span class="invalid-feedback">{{ $message }}</span>

                            @enderror


                        </div>
                    </div>

                    <div class="row">

                        {{--Secteur--}}
                        <div class="col-12 col-lg-6">
                            <label for="secteur" class="form-label">Secteur d'intérêt professionnel
                            </label>

                            <select class="form-select mcf-input @error('secteur') is-invalid @enderror " name="secteur"
                                    id="secteur"
                                    aria-label="Default select example">
                                <option value="">Choisir...</option>
                                @if(sizeof($secteurs))
                                    @foreach($secteurs as $secteur)
                                        <option value="{{$secteur->id}}">{{ $secteur->libelle}}</option>
                                    @endforeach
                                @endif
                            </select>

                            @error('secteur')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{--curriculum vitae--}}
                        <div class="col-12 col-lg-6">
                            <label for="resume" class="form-label"
                                   title="merci de vous faire aider d'un Peer Coach pour sa finalisation si nécessaire">Dernière
                                version de votre CV <span class="text-danger">(au maximum 3Mo)
                                </span></label>
                            <input type="file" name="resume" id="resume"
                                   class="mcf-input form-control @error('resume') is-invalid @enderror ">

                            @error('resume')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                </div>

                {{--Etape3--}}

                <div class="stepcontent d-flex flex-column gap-5">
                    <div class="col-12 d-flex justify-content-between">
                        <h2>Informations du compte</h2>

                    </div>

                    <div class="row">

                        {{--telephone--}}
                        <div class="col-12 col-lg-6">
                            <label for="phone" class="form-label">Numéro de téléphone</label>
                            <input type="tel" name="phone" id="phone"
                                   class="mcf-input form-control @error('phone') is-invalid @enderror " maxlength="8">
                            @error('phone')

                            <span class="invalid-feedback">{{ $message }}</span>

                            @enderror
                        </div>

                        {{--Adresse email--}}
                        <div class="col-12 col-lg-6">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" name="email" id="email"
                                   class="mcf-input form-control @error('email') is-invalid @enderror ">

                            @error('email')

                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row gy-3">
                        <div class="col-12 text-muted font-size-12">Le mot de passe doit contenir au moins une lettre
                            majuscule , une lettre miniscule , des chiifres et des symboles.
                        </div>
                        {{--Mot de passe--}}
                        <div class="col-12 col-lg-6">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" id="password"
                                   class="mcf-input form-control @error('password') is-invalid @enderror">

                            @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{--confirmation du mot de passe--}}
                        <div class="col-12 col-lg-6">
                            <label for="password_confirmation" class="form-label">Confirmation du mot de passe</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="mcf-input form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>


                </div>


                <div>
                    <button class="nav-btn-primary w-100">Soumettre et creer un compte</button>
                </div>

            </form>
        </div>
    </div>

@endsection



@push('scripts')

    <script>
        $(function () {

            /*Setup ajax headers*/

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*get selected value */


            $('#ecole').change(function () {

                var valueEcole = $("#ecole").val();

                /*get value from ajax*/

                var requestType = "POST"
                var requestUrl = "/list/filieres"
                var requestData = {
                    'id': valueEcole
                }
                $.ajax({
                    type: requestType,
                    url: requestUrl,
                    data: requestData,
                    success: function (filieres) {
                        var countResult = filieres.length;
                        var filiereError;

                        console.log(countResult);
                        if (countResult > 0) {
                            $("#filiereError").remove();
                            $('#filiere').html("");

                            let out = "<option value=''>Choisir...</option>";

                            for (let i = 0; i < filieres.length; i++) {
                                out += "<option value='" + filieres[i].id + "'>" + filieres[i].libelle + "</option>"
                            }

                            document.getElementById('filiere').innerHTML = out;


                        } else {
                            $("#filiereError").remove();
                            filiereError = $("<span>").text('Aucune filière associée à cet établissement').attr('id', 'filiereError').addClass("text-danger");

                            $('#filiere').after(filiereError);
                            $('#filiere').html("");
                        }


                    },
                    error: function (error) {

                        var errorFiliere = error.responseJSON.message;
                        $("#filiereError").remove();
                        $('#errorFiliere').append(errorFiliere);


                    },

                });

            });


            /*retrieve value to select filieres*/

        });
    </script>

@endpush
