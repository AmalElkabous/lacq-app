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
    <form method="post" id="modalForm" action="{{ url('/lieus') }}" enctype="multipart/form-data">
        <div class="modal fade bd-example-modal-lg" id="modalEditLieu" tabindex="-1" role="dialog"

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
                                <label for="lieu">{{ __('Lieu') }}</label>
                                <input id="lieu" type="text" class="form-control @error('lieu') is-invalid @enderror"
                                    name="lieu" value="{{ old('lieu') }}" required autocomplete="lieu" autofocus>
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
    <div class="card" style="background-color: rgb(255, 255, 255)">
        <div class="card-header">{{ __('La liste des lieus') }}
            @if (Auth::user()->role_id <= 2)
                <button class="btn btn-success btn-sm float-right" onclick="addClientBlade()">Ajouter un nouveau
                    Lieu</button>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive-sm ">
                @include('lieus.table')
            </div>
        </div>
    </div>
        <script>
            $(document).ready(function() {
                btnSaveRole = null;
                idLieu = null;
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $("#modalForm").submit(function(event) {
                    event.preventDefault();
                    (btnSaveRole == "PATCH") ? url = "/lieus/" + idLieu: url = "/lieus";
                    $('table').preloader({
                        text: 'Loading'
                    })
                    data = $("#modalForm").serialize();
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: data,
                        success: function(response) {
                            $('table').preloader('remove')
                            renderTable();
                            $('#modalEditLieu').modal('hide');
                        },
                    });
                });
            });


            //_method:PATCH
            function addClientBlade() {
                btnSaveRole = "ADD"
                $("#modalForm")[0].reset();
                $("#ModalTitle").text("Ajouter");
                $('#modalEditLieu').modal('show');
                $("#method").remove();
            }
            function openEditModale(btn){
                btnSaveRole = "PATCH"
                idLieu = $(btn).parent().parent().parent().children("#id").children("span").html();
                nameLieu = $(btn).parent().parent().parent().children("#name").html();
                console.log(idLieu+"/"+nameLieu);
                $('#modalForm').attr('action', '{{ url("/lieus") }}' + "/" + idLieu);
                $("#modalForm")[0].reset();
                $("#ModalTitle").text("Modifier");
                $('#modalForm').append("<input id='method' type='hidden' name='_method' value='PATCH'/>");
                $("#lieu").val(nameLieu);
                $('#modalEditLieu').modal('show');
            };
            function remove(btn){
                if(confirm('Are you sure that you want to delete this lieu') ){
                    idLieu = $(btn).parent().parent().parent().children("#id").children("span").html();
                    $('table').preloader({text: 'Loading'})
                    data = "_method=DELETE&_token={{ csrf_token() }}" 
                    $.ajax({
                        url: '/lieus/'+idLieu,
                        type: "POST",
                        data: data,
                        success: function(response) {
                            $('table').preloader('remove')
                            renderTable();
                            $('#modalEditLieu').modal('hide');
                        },
                    });
                } 
            }
            function renderTable() {
                var $request = $.get('{{ url("lieus/json") }}'); // make request
                var $container = $('.table-responsive-sm');
                $container.preloader({text: 'Loading'})
                $request.done(function(data) { // success
                    $container.html(data.table);
                });
                $request.always(function() {
                    $container.preloader('remove')
                });
            }
        </script>
    @endsection
