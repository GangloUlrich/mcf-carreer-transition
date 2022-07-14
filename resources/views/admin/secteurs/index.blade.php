@extends('admin.layouts.template')


@section("content")
    <div class="container-fluid p-0">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3"> <i class="fa-solid fa-angles-left"></i> Retour</a>
        <a href="{{ route('secteurs.create') }}" class="btn btn-primary mb-3"> <i class="fa-solid fa-plus"></i> Nouveau secteur</a>
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Secteurs</h1>
            <span class="badge bg-success text-white ms-2" href="upgrade-to-pro.html">
                 Liste des secteurs
              </span>
        </div>


        @if(Session::has('message'))

            <div class="alert alert-success">{{ Session::get('message') }}</div>

        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <table class="table table-hover my-0">
                            <thead>
                            <tr>
                                <th>Libelle </th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(sizeof($secteurs) > 0 )

                                @foreach ($secteurs as $secteur)

                                    <tr>
                                        <td>{{ $secteur->libelle}}</td>
                                        <td><a class="btn btn-success me-3"
                                               href="{{ route('secteurs.edit', ['secteur'=> $secteur]) }}">Modifier</a>
                                            <a class="btn btn-danger" data-bs-toggle="modal"
                                               data-bs-target="#{{Str::words($secteur->libelle,1)}}"
                                               href="javascript:void(0)">Supprimer</a>


                                            <div class="modal fade" id="{{Str::words($secteur->libelle,1)}}" tabindex="-1"
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

                                                            <div class="text-regular h3 text-center mb-4">Etes-vous sur de vouloir supprimé le secteur : <br> <strong class="text-danger">{{ $secteur->libelle }}</strong></div>


                                                            <form method="post" class="d-flex justify-content-center" action="{{ route('secteurs.destroy', ['secteur'=> $secteur]) }}">
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
                                    <td colspan="2">Aucune entree</td>
                                </tr>

                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div></div></div>
@endsection
