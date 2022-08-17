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
                                    <a href="{{ route('login') }}" class="mcf-link"><i class="fa-solid fa-arrow-left-long"></i> Retour à la page de connexion</a>

                                    <div  id="headerLink"><img src="{{ asset('img/logo.webp') }}" alt="MCFSP-UAC" class="logo"></div>
                                </div>

                                <div>
                                    <h1>Réinitialisation du mot de passe</h1>

                                </div>

                                <div>
                                    <form method="POST" action="{{ route('password.update') }}" class="d-flex flex-column gap-4" id="resetPasswordForm">
                                        @csrf()

                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">



                                        <div>
                                            <input type="email" name="email" id="" class="form-control mcf-input @error('email') is-invalid
                                            @enderror " placeholder="Email" value="{{ old('email', $request->email) }}">
                                            @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div>
                                            <input type="password" name="password" id="" class="form-control mcf-input  @error('password') is-invalid
                                            @enderror" placeholder="Mot de passe">
                                            @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror

                                        </div>


                                        <div>
                                            <input type="password" name="password_confirmation" id="" class="form-control mcf-input  @error('password') is-invalid
                                            @enderror" placeholder="Confirmation du mot de passe">
                                            @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror

                                        </div>



                                        <div>
                                            <button type="submit" class="mcf-btn-gradient w-100"> <i class="fa-solid fa-spinner fa-spin-pulse me-3 d-none" id="spinner"></i> Réinitialiser <i
                                                    class="fa-solid fa-arrow-right"></i></button>
                                        </div>
                                    </form>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <div class="d-flex align-items-center"> Avez-vous déjà un compte ?
                                        <a href="{{ route('login') }}" class="mcf-link-primary">connexion</a>
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

@push('scripts')
    <script>

        $(function(){

            $('#resetPasswordForm').submit(function(){
                $('#spinner').removeClass('d-none');
            });

        });
    </script>
@endpush
