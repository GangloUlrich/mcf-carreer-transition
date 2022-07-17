@extends('admin.layouts.template')

@section('content')
    <div class="container-fluid p-0">
        <a href="{{ route('ecoles.show',['ecole' => $ecole]) }}" class="btn btn-secondary mb-3"> <i class="fa-solid fa-angles-left"></i> Retour</a>


        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Filières</h1>
            <span class="badge bg-warning text-white ms-2" href="upgrade-to-pro.html">
     Creer un nouvelle filière
  </span>
        </div>


        @if(Session::has('message'))

            <div class="alert alert-success">{{ Session::get('message') }}</div>

        @endif


        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Modfier une filiere</h5>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('ecoles.filieres.update',['ecole' => $ecole, 'filiere' => $filiere]) }}" method='POST'>

                            @csrf()
                            @method('PUT')
                            <div class="mb-3">
                                <input type="text" name='libelle'
                                       class="form-control @error('libelle') is-invalid @enderror"
                                       placeholder="libelle" value="{{ old('libelle',$filiere->libelle) }}">
                                @error('libelle')
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
                                <th>N</th>
                                <th>Libelle</th>
                                <th>Actions</th>
                            </tr>


                            @if(sizeof($filieres) > 0 )

                                @foreach ($filieres as $filiere)

                                    <tr>
                                        <td>{{ $loop->index }}</td>
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
