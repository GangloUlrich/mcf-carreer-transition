@extends('admin.layouts.template')


@section("content")
    <div class="container-fluid p-0">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3"> <i class="fa-solid fa-angles-left"></i>
            Retour</a>

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Boursiers</h1>
            <span class="badge bg-success text-white ms-2" href="upgrade-to-pro.html">
                 Liste des boursiers
              </span>
        </div>


        @if(Session::has('message'))

            <div class="alert alert-success">{{ Session::get('message') }}</div>

        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Cohorte</th>
                                <th>Etablissement de formation</th>
                                <th>Filière de formation</th>
                                <th>Secteur professionnel</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>


                            @if(sizeof($scholars) > 0)

                                @foreach($scholars as $scholar)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $scholar->name }}</td>
                                        <td>{{ str_replace('_',' ',$scholar->info->cohorte)  }}</td>
                                        <td>{{ $scholar->info->ecole->nom  }}</td>
                                        <td>{{ $scholar->info->filiere->libelle  }}</td>
                                        <td>{{ $scholar->info->secteur->libelle  }}</td>

                                        @php

                                        $identifier = Str::substr($scholar->name,1,4).'details'.$scholar->info->cohorte;
                                        $identifierModal = Str::substr($scholar->name,1,4).'detailsResume'.$scholar->info->cohorte;


                                            @endphp
                                        <td><a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="{{"#".$identifier}}"><i class="fa-solid fa-eye me-1"></i>
                                                Détails complet</a>
                                            <a href="" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="{{"#".$identifierModal}}"><i class="fa-solid fa-eye me-1"></i>
                                                voir cv</a>


                                            {{-- Details modals--}}


                                            <!-- Modal -->
                                            <div class="modal fade" id="{{$identifier}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" id="exampleModalLabel">Informations du boursier : {{$scholar->name }}</h3>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="col-12">
                                                                <div class="row gap-4">
                                                                    <div class="row gap-4">

                                                                        <div class="col-12">
                                                                            <h4 class="fw-bold ">Informations personnelles</h4>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="mb-2">Nom du boursier</div>
                                                                                <h5 class="font-size-16">{{  $scholar->info->firstname }}</h5>
                                                                            </div>

                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="mb-2">Prénoms du boursier</div>
                                                                                <h5 class="font-size-16">{{  $scholar->info->firstname }}</h5>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="mb-2">Age du boursier</div>
                                                                                <h6>{{  \Carbon\Carbon::parse($scholar->info->birthday)->age." ans"}}</h6>
                                                                            </div>

                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="mb-2">Sexe du boursier</div>
                                                                                <h6 class="font-size-16">{{ $scholar->info->sexe}}</h6>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="row gap-4">

                                                                        <div class="col-12">
                                                                            <h4 class="fw-bold">Informations académiques et professionnelles</h4>

                                                                        </div>


                                                                        <div class="row">
                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="mb-2">Cohorte</div>
                                                                                <h6 class="font-size-16">{{  str_replace('_',' ',$scholar->info->cohorte)}}</h6>
                                                                            </div>

                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="mb-2">Etablissement de formation</div>
                                                                                <h6 class="font-size-16">{{  $scholar->info->ecole->nom }}</h6>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="mb-2">Filiere de formation</div>
                                                                                <h6 class="font-size-16">{{  $scholar->info->filiere->libelle }}</h6>
                                                                            </div>

                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="mb-2">Secteur d'intérêt professionnel</div>
                                                                                <h6 class="font-size-16">{{  $scholar->info->secteur->libelle }}</h6>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="row gap-4">

                                                                        <div class="col-12">
                                                                            <h4 class="fw-bold">Contact du boursier</h4>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="mb-2">Email du boursier</div>
                                                                                <h6 class="font-size-16">{{  $scholar->email }}</h6>
                                                                            </div>

                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="mb-2">Numéro de téléphone</div>
                                                                                <h6 class="font-size-16">{{  $scholar->info->phone }}</h6>
                                                                            </div>
                                                                        </div>



                                                                    </div>

                                                                </div>
                                                            </div>



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- resume Modal -->
                                            <div class="modal fade" id="{{$identifierModal}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" id="exampleModalLabel">Curriculum vitae du boursier : {{$scholar->name }}</h3>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <iframe src="{{\Illuminate\Support\Facades\Storage::url($scholar->info->resume) }}" width="100%" height="500px"></iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{ route('displayResume',['user' => $scholar]) }}" target="_blank" class="btn btn-primary">Vue complet</a>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </td>

                                    </tr>

                                @endforeach
                            @endif

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div></div></div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
