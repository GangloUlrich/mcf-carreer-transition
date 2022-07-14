@extends('admin.layouts.template')


@section("content")
<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Secteurs</h1>
						<span class="badge bg-success text-white ms-2" href="upgrade-to-pro.html">
     Liste des secteurs
  </span>
					</div>


                    @if(Session::has('message'))

                    <div class="bg-success">{{ Session::get('message') }}</div>

                    @endif
					<div class="row">
						<div class="col-12">
							<div class="card">

								<div class="card-body">

                                <table class='table table-striped'>
                                        <tr class='table-success'>

                                        <th>Libelle</th>
                                        <th>Actions</th>
                                        </tr>


                                        @if(sizeof($secteurs) > 0 )

                                        @foreach ($secteurs as $secteur)

<tr>
    <td>{{ $secteur->libelle}}</td>
    <td><a href="{{ route('secteurs.edit', ['secteur'=> $secteur]) }}">Modifier</a>
    <a href="{{ route('secteurs.destroy', ['secteur'=> $secteur]) }}">Supprimer</a></td>
</tr>

@endforeach

@else

<tr><td>Aucune entree</td></tr>

                                        @endif


                                    </table>
</div>
</div></div></div></div></div></div>
@endsection
