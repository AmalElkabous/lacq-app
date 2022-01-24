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
    <form method="post" id="modalModal" action="{{ url('/menus') }}" enctype="multipart/form-data">
        <div class="modal fade bd-example-modal-lg" id="modalEditMenu" tabindex="-1" role="dialog"
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
                                <label for="matrice">{{ __('matrice') }}</label>
                                <select id="matrice" class="form-control " name="matrice" required autocomplete="matrice"
                                    autofocus>
                                    @foreach ($listMatrice as $matrice)
                                        <option value="{{ $matrice->id }}">{{ $matrice->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group input-group-sm col-md-3">
                                <label for="name">{{ __('Nom') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            </div>
                            <div class="form-group input-group-sm col-md-3">
                                <label for="prix_ht">{{ __('prix_ht') }}</label>
                                <input id="prix_ht" type="text" class="form-control @error('prix_ht') is-invalid @enderror"
                                    name="prix_ht" value="{{ old('prix_ht') }}" required autocomplete="prix_ht" autofocus>
                            </div>
                            <div class="form-group input-group-sm col-md-3">
                                <label for="prix_supv">{{ __('prix_supv') }}</label>
                                <input id="prix_supv" type="text"
                                    class="form-control @error('prix_supv') is-invalid @enderror" name="prix_supv"
                                    value="{{ old('prix_supv') }}" required autocomplete="prix_supv" autofocus>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary btn-sm">Sauvegarder/button>
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
        <div class="card-header">{{ __('La liste des Menus') }}
            <input id="searchInput" type="text" class="ml-3 d-inline  form-control form-control-sm col-2">
            @if (Auth::user()->role_id <= 2)
                <button class="btn btn-success btn-sm float-right" onclick="addMenuBlade()">Ajouter un menu</button>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive-sm ">
                <table class="table table-striped table-sm ">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Matrice</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Prix hor tax</th>
                            <th class="text-center">Prix Supvendioner</th>
                            @if (Auth::user()->role_id <= 2)
                                <th class="text-right pr-4">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listMenu as $menu)
                            <tr>
                                <td class="text-center" id="id">{{ $menu->id }}</td>
                                <td class="text-center" id="matrice"><span
                                        class="badge badge-success">{{ $menu->matrice }}</span></td>
                                <td class="text-center" id="name">{{ $menu->name }}</td>
                                <td class="text-center" id="prix_ht">{{ $menu->prix_ht }}</td>
                                <td class="text-center" id="prix_supv">{{ $menu->prix_supv }}</td>
                                @if (Auth::user()->role_id <= 2)
                                    <td class="text-right text-nowrap">
                                        <div class="d-inline p-2">
                                            <button class="btn btn-primary btn-sm editBtn btnAction"
                                                onclick="openEditMenuModal({{ $menu->id }})"><i
                                                    class="fa fa-edit"></i></button>
                                        </div>
                                        <form class="d-inline p-2 formDelete" method="POST"
                                            action="{{ url('/menus/' . $menu->id) }}">
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
            @if ($listMenu instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="d-flex justify-content-center mt-2">
                    {!! $listMenu->links('pagination::bootstrap-4') !!}
                </div>
            @endif
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".formDelete").click(function(event) {
                if(!confirm('Are you sure that you want to delete this menu') ){
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
        /*$(".editBtn").click(function(){
            idMenu = $(this).parent().parent().parent().children("#id").html();
            matrice = $(this).parent().parent().parent().children("#matrice").children("span").html();
            name = $(this).parent().parent().parent().children("#name").html();
            prix_ht = $(this).parent().parent().parent().children("#prix_ht").html();
            prix_supv = $(this).parent().parent().parent().children("#prix_supv").html();
            $("#modalModal")[0].reset();
            $("#ModalTitle").text("Modifier");
            $('#modalModal').append("<input id='method' type='hidden' name='_method' value='PATCH'/>");
            $('#modalModal').attr('action', '{{ url('/menus') }}'+"/"+idMenu);
            $("#matrice option:contains("+matrice+")").attr('selected', 'selected');

            $("#name").val(name);
            $("#prix_ht").val(prix_ht);
            $("#prix_supv").val(prix_supv);        
            btnSaveRole = "PATCH";
            $('#modalEditMenu').modal('show');
          });*/
        function addMenuBlade() {
            $("#method").remove();
            $("#modalModal")[0].reset();
            $("#ModalTitle").text("Ajouter ");
            $('#modalModal').attr('action', '{{ url('/menus') }}');
            $('#modalEditMenu').modal('show');

        }

        function openEditMenuModal(id) {
            $("#modalModal")[0].reset();
            $("#ModalTitle").text("Modifier");
            $('#modalModal').append("<input id='method' type='hidden' name='_method' value='PATCH'/>");
            var user_id = id;
            $.get('/menus/' + user_id + '/edit', function(data) {
                data = JSON.parse(data);
                $('#modalModal').attr('action', '{{ url('/menus') }}' + "/" + data.id);
                $("#name").val(data.name);
                $("#matrice").val(data.matrice_id);
                $("#prix_ht").val(data.prix_ht);
                $("#prix_supv").val(data.prix_supv);

            })
            $('#modalEditMenu').modal('show');
        }
        document.getElementById("searchInput").addEventListener("keyup", e => {
            $('table').preloader({
                text: 'Loading'
            })
            $.ajax({
                url: "{{ url('/menus/search') }}",
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
