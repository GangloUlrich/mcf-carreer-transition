@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row h-100">

                <div class="d-none d-lg-block col-lg-6 min-vh-100" id="loginHero"></div>

                <div class="col-12 col-lg-6">
                    <div class="row">

                        <div class="col-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2" id="loginContent">
                            <div class="row gap-5">
                                {{--   header--}}
                                <div>
                                    <a href="{{ route('accueil') }}" class="mcf-link"><i class="fa-solid fa-arrow-left-long"></i> Retour à la page d'accueil</a>

                                    <div  id="headerLink"><img src="{{ asset('img/logo.webp') }}" alt="MCFSP-UAC" class="logo"></div>
                                </div>

                                <div>
                                    <h1>Connectez-vous maintenant !</h1>

                                </div>

                                <div>
                                    <form method="POST" action="{{ route('login') }}" class="d-flex flex-column gap-4">
                                        @csrf()

                                        @error('email','password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div>
                                            <input type="email" name="email" id="" class="form-control mcf-input " placeholder="Email">

                                        </div>

                                        <div>
                                            <input type="password" name="password" id="" class="form-control mcf-input" placeholder="Mot de passe">

                                        </div>

                                        @if (Route::has('password.request'))
                                        <div class="text-end">
                                            <a href="{{ route('password.request') }}" class="mcf-link">Mot de passe oublié?</a>
                                        </div>
                                        @endif

                                        <div>
                                            <button type="submit" class="mcf-btn-gradient w-100">Connexion <i class="fa-solid fa-arrow-right"></i></button>
                                        </div>
                                    </form>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <div class="d-flex align-items-center"> Etes-vous nouveau ?
                                        <a href="" class="mcf-link-primary">Creer un compte</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
