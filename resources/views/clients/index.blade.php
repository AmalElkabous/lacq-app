@extends('layouts.master')
@section('content')
    <!----------------------------------------- modal foem ------------------------------------------------>
    <style>
        th {
            font-size: 11px;
        }

        td {
            font-size: 13px;
        }

        .btnAction {
            font-size: 10px;
        }

    </style>
    <form method="post" id="modalModal" action="{{ url('/clients') }}" enctype="multipart/form-data">
        <div class="modal fade bd-example-modal-lg" id="modalEditClient" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="form-row">
                            <div class="form-group input-group-sm col-md-3">
                                <label for="name">{{ __('CIN/RC') }}</label>
                                <input id="cin_rc" type="text" class="form-control @error('cin_rc') is-invalid @enderror"
                                    name="cin_rc" value="{{ old('cin_rc') }}" required autocomplete="cin_rc" autofocus>
                            </div>
                            <div class="form-group input-group-sm col-md-3">
                                <label for="zone">{{ __('Adresse') }}</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                            </div>
                            <div class="form-group input-group-sm col-md-3">
                                <label for="zone">{{ __('Exploiteur') }}</label>
                                <input id="exploiteur" type="text"
                                    class="form-control @error('exploiteur') is-invalid @enderror" name="exploiteur"
                                    value="{{ old('exploiteur') }}" required autocomplete="exploiteur" autofocus>
                            </div>
                            <div class="form-group input-group-sm col-md-3">
                                <label for="zone">{{ __('Organisme') }}</label>
                                <input id="organisme" type="text"
                                    class="form-control @error('organisme') is-invalid @enderror" name="organisme"
                                    value="{{ old('organisme') }}" required autocomplete="organisme" autofocus>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary btn-sm">Sauvegarder</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!------------------------------------------------------------------------->

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card" style="background-color: rgb(255, 255, 255)">
        <div class="card-header">{{ __('La liste des Clients') }}
            @if (Auth::user()->role_id <= 2)
                <button class="btn btn-success btn-sm float-right" onclick="addClientBlade()">Ajouter un nouveau
                    client</button>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive-sm ">
                <table class="table table-striped table-sm ">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">CIN/RC</th>
                            <th class="text-center">Adresse</th>
                            <th class="text-center ">Exploiteur</th>
                            <th class="text-center ">Organisme</th>
                            @if (Auth::user()->role_id <= 2)
                                <th class="text-right pr-4">Actions</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listClients as $client)
                            <tr>
                                <td class="text-center"><span class="badge badge-success">{{ $client->cin_rc }}</span>
                                </td>
                                <td class="text-center">{{ $client->address }}</td>
                                <td class="text-center">{{ $client->exploiteur }}</td>
                                <td class="text-center">{{ $client->organisme }}</td>
                                @if (Auth::user()->role_id <= 2)
                                    <td class="text-right">
                                        <div class="d-inline p-2">
                                            <button class="btn btn-primary btn-sm btnAction"
                                                onclick="openEditClientModal({{ $client->id }})"><i
                                                    class="fa fa-edit"></i></button>
                                        </div>
                                        <form class="d-inline p-2" method="POST"
                                            action="{{ url('/clients/' . $client->id) }}">
                                            @csrf
                                            {{ @method_field('DELETE') }}
                                            <button type="supmit" class="btn btn-danger btn-sm btnAction"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <div class="d-flex justify-content-center mt-2">
        {!! $listClients->links('pagination::bootstrap-4') !!}
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            //_method:PATCH
            function addClientBlade() {
                $("#modalModal")[0].reset();
                $("#ModalTitle").text("Ajouter un client");
                $('#modalEditClient').modal('show');
            }

            function openEditClientModal(id) {
                $("#modalModal")[0].reset();
                $("#ModalTitle").text("Modifier");
                $('#modalModal').append("<input id='method' type='hidden' name='_method' value='PATCH'/>");
                //$("#password-confirm").hide();
                var user_id = id;
                $.get('/clients/' + user_id + '/edit', function(data) {
                    data = JSON.parse(data);
                    $('#modalModal').attr('action', '{{ url('/clients') }}' + "/" + data.id);
                    $("#cin_rc").val(data.cin_rc);
                    $("#address").val(data.address);
                    $("#exploiteur").val(data.exploiteur);
                    $("#organisme").val(data.organisme);
                    $("#ref_client").val(data.ref_client);
                })
                $('#modalEditClient').modal('show');
            }
        </script>
    @endsection
