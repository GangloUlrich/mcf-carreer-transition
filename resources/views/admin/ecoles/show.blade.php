@extends('admin.layouts.template')

@section('content')
    <div class="container-fluid p-0">
        <a href="{{ route('ecoles.index') }}" class="btn btn-secondary mb-3"> <i class="fa-solid fa-angles-left"></i> Retour</a>
        <a href="{{ route('ecoles.filieres.create',['ecole'=> $ecole->id]) }}" class="btn btn-primary mb-3"> <i class="fa-solid fa-plus"></i> Nouvelle filière</a>



        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Ecoles</h1>
            <span class="badge bg-warning text-white ms-2" href="upgrade-to-pro.html">
     Détails d'une école
  </span>
        </div>


        @if(Session::has('message'))

            <div class="alert alert-success">{{ Session::get('message') }}</div>

        @endif


        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"> Détails d'une école</h5>
                    </div>
                    <div class="card-body">
                        <h3>{{ $ecole->nom }}</h3>
                    </div>
                </div>


            </div>

            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Liste des filières </h5>
                    </div>

                    <div class="card-body">
                        <table class='table table-striped'>
                            <tr class='table-success'>

                                <th>Libelle de la filière</th>
                            </tr>


                            @if(sizeof($ecole->filieres) > 0 )

                                @foreach ($ecole->filieres as $filiere)

                                    <tr>
                                        <td>{{ $filiere->libelle}}</td>
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
