@extends('admin.layouts.template')

@section('content')
    <div class="container-fluid p-0">
        <a href="{{ route('ecoles.index') }}" class="btn btn-secondary mb-3"> <i class="fa-solid fa-angles-left"></i> Retour</a>
        <a href="{{ route('ecoles.index') }}" class="btn btn-primary mb-3"> <i class="fa-solid fa-align-justify"></i> Toutes les écoles</a>
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Ecoles</h1>
            <span class="badge bg-warning text-white ms-2" href="upgrade-to-pro.html">
               Modifier une école
            </span>
        </div>


        @if(Session::has('message'))

            <div class="alert alert-success">{{ Session::get('message') }}</div>

        @endif
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Modifier une école</h5>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('ecoles.update',['ecole' => $ecole]) }}" method='Post'>

                            @csrf()
                            @method('PUT')
                            <div class="mb-3">
                                <input type="text" name='nom'
                                       class="form-control @error('nom') is-invalid @enderror"
                                       placeholder="nom"
                                       value="{{old('nom', $ecole->nom)}}">
                                @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <button class="btn btn-success" name='enregistrer' type='submit'>Enregistrer

                            </button>
                        </form>
                    </div>
                </div>


            </div>

            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Liste des ecoles </h5>
                    </div>

                    <div class="card-body">
                        <table class='table table-striped'>
                            <tr class='table-success'>

                                <th>Libelle</th>
                            </tr>


                            @if(sizeof($ecoles) > 0 )

                                @foreach ($ecoles as $ecole)

                                    <tr>
                                        <td>{{ $ecole->nom}}</td>
                                    </tr>

                                @endforeach

                            @else

                                <tr>
                                    <td>Aucune entree</td>
                                </tr>
                            @endif


                        </table>
                    </div>
                </div>
            </div>

        </div>

@endsection

