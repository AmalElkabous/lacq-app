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
    <form method="post" id="modalModal" action="{{ url('/matrices') }}" enctype="multipart/form-data">
        <div class="modal fade bd-example-modal-lg" id="modalEditMatrice" tabindex="-1" role="dialog"
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
                            <div class="form-group input-group-sm col-md-4">
                                <label for="name">{{ __('Nom') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            </div>
                            <div class="form-group input-group-sm col-md-4">
                                <label for="code">{{ __('code') }}</label>
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror"
                                    name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>
                            </div>
                            <div class="form-group input-group-sm col-md-4">
                                <label for="delai">{{ __('délai') }}</label>
                                <input id="delai" type="text" class="form-control @error('delai') is-invalid @enderror"
                                    name="delai" value="{{ old('delai') }}" required autocomplete="delai" autofocus>
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
        <div class="card-header">{{ __('La liste des Matrices') }}
            <input id="searchInput" type="text" class="ml-3 d-inline  form-control form-control-sm col-2">
            @if (Auth::user()->role_id <= 2)
                <button class="btn btn-success btn-sm float-right" onclick="addMatriceBlade()">Ajouter une matrice</button>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive-sm ">
                <table class="table table-striped table-sm ">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Code</th>
                            <th class="text-center">délai</th>
                            @if (Auth::user()->role_id <= 2)
                                <th class="text-right pr-4">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listMatrice as $matrice)
                            <tr>
                                <td class="text-center">{{ $matrice->id }}</td>
                                <td class="text-center"><span class="badge badge-success">{{ $matrice->name }}</span>
                                </td>
                                <td class="text-center">{{ $matrice->code }}</td>
                                <td class="text-center">{{ $matrice->delai }}</td>
                                @if (Auth::user()->role_id <= 2)
                                    <td class="text-right">
                                        <div class="d-inline p-2">
                                            <button class="btn btn-primary btn-sm btnAction"
                                                onclick="openEditMatriceModal({{ $matrice->id }})"><i
                                                    class="fa fa-edit"></i></button>
                                        </div>
                                        <form class="d-inline p-2 formDelete" method="POST"
                                            action="{{ url('/matrices/' . $matrice->id) }}">
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
            @if ($listMatrice instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="d-flex justify-content-center mt-2">
                    {!! $listMatrice->links('pagination::bootstrap-4') !!}
                </div>
            @endif
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".formDelete").click(function(event) {
                if(!confirm('Are you sure that you want to delete this matrice') ){
                    event.preventDefault();
                } 
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });


        //_method:PATCH
        function addMatriceBlade() {
            $("#method").remove();
            $('#modalModal').attr('action', '{{ url('/matrices') }}');
            $("#modalModal")[0].reset();
            $("#ModalTitle").text("Ajouter un matrice");
            $('#modalEditMatrice').modal('show');

        }

        function openEditMatriceModal(id) {
            $("#modalModal")[0].reset();
            $("#ModalTitle").text("Modifier");
            $('#modalModal').append("<input id='method' type='hidden' name='_method' value='PATCH'/>");
            //$("#password-confirm").hide();
            var user_id = id;
            $.get('/matrices/' + user_id + '/edit', function(data) {
                data = JSON.parse(data);
                $('#modalModal').attr('action', '{{ url('/matrices') }}' + "/" + data.id);
                $("#name").val(data.name);
                $("#code").val(data.code);
                $("#delai").val(data.delai);
            })
            $('#modalEditMatrice').modal('show');
        }
        document.getElementById("searchInput").addEventListener("keyup", e => {
            $('table').preloader({
                text: 'Loading'
            })
            $.ajax({
                url: "{{ url('/matrices/search') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    buffer: $("#searchInput").val(),
                },
                success: function(response) {

                    $(".card-body").html($(response).find(".card-body").html())
                    $('table').preloader('remove')
                },
            });
        })
    </script>
@endsection
