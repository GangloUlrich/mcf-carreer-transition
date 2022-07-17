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
                                <th>N</th>
                                <th>Libelle de la filière</th>
                                <th>Actions</th>
                            </tr>


                            @if(sizeof($filieres) > 0 )

                                @foreach ($filieres as $filiere)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $filiere->libelle}}</td>
                                        <td>
                                            <a class="btn btn-success me-3"
                                               href="{{ route('ecoles.filieres.edit',['filiere' => $filiere,'ecole' => $ecole]) }}"
                                            ><i class="fa-solid fa-pen"></i></a>
                                            <a class="btn btn-danger" data-bs-toggle="modal"
                                               data-bs-target="#{{Str::words($filiere->libelle,1)}}"
                                               href="javascript:void(0)"><i class="fa-solid fa-trash"></i></a>
                                            <div class="modal fade" id="{{Str::words($filiere->libelle,1)}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger h4 text-center" id="exampleModalLabel">
                                                                Confirmation</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="text-regular h3 text-center mb-4">Etes-vous sur de vouloir supprimé l'école : <br> <strong class="text-danger">{{ $filiere->libelle }}</strong></div>


                                                            <form method="post" class="d-flex justify-content-center" action="{{ route('ecoles.filieres.destroy', ['ecole' => $ecole, 'filiere' => $filiere]) }}">
                                                                @csrf()
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-danger me-3 "
                                                                        data-bs-dismiss="modal">Annuler
                                                                </button>
                                                                <button type="submit" class="btn btn-success"> Confirmer</button>
                                                            </form>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach

                            @else

                                <tr>
                                    <td colspan="3" class="text-center">Aucune entree</td>
                                </tr>
                            @endif


                        </table>
                    </div>
                </div>
            </div>

        </div>

@endsection
