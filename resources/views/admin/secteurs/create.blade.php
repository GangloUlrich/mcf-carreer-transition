@extends('admin.layouts.template')

@section('content')
<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Secteurs</h1>
						<span class="badge bg-warning text-white ms-2" href="upgrade-to-pro.html">
     Creer un nouveau secteur
  </span>
					</div>


                    @if(Session::has('message'))

                    <div class="bg-success">{{ Session::get('message') }}</div>

                    @endif
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Nouveau secteur</h5>
								</div>
								<div class="card-body">

                                <form action="{{ route('secteurs.store') }}" method='Post'>

                                @csrf()
                                <div class="mb-3">
                                <input type="text" name='libelle' class="form-control @error('libelle') is-invalid @enderror" placeholder="libelle">
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
                                    <h5 class="card-title mb-0">Liste des secteurs </h5>
                                </div>

                                <div class="card-body">
                                    <table class='table table-striped'>
                                        <tr class='table-success'>

                                        <th>Libelle</th>
                                        </tr>
                                        

                                        @if(sizeof($secteurs) > 0 ) 

                                        @foreach ($secteurs as $secteur) 

<tr>
    <td>{{ $secteur->libelle}}</td>
</tr>

@endforeach 

@else 

<tr><td>Aucune entree</td></tr>
                                        @endif

                                        
                                    </table>
                                </div>
                            </div>
					</div>

				</div>

@endsection
