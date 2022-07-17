@extends('layouts.template')

@section('content')

    <section class="min-vh-100 bg-dark text-center">
        <div class="container p-5">
            <h1 class="display-2 text-white fw-bold ">MCF CARREER TRANSITION PROJECT</h1>

            <div class="col-12">
                <div class="row justify-content-center gap-4">


                    <div>
                        <a href="{{ route('login') }}" class="btn btn-warning w-50 me-3">Login</a>
                    </div>

                    <div>
                        <a href="{{ route('register') }}" class="btn btn-success w-50">Register</a>
                    </div>



                    <div class="container">
                        <form action="">

                            <div>
                                <input type="text" class="form-control" name="">
                            </div>

                            <div>
                                <input type="text" class="form-control" name="" placeholder="Email">
                            </div>

                            <div>
                                <input type="date" class="form-control" name="" placeholder="Date de naissance">
                            </div>

                            <div>
                                <input type="text" class="form-control" name="">
                            </div>

                        </form>
                    </div>


                </div>
            </div>
        </div>

    </section>

@endsection
