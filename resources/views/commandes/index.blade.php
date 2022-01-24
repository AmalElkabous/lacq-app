@extends('layouts.master')
@section('content')

    <style>
        th {
            font-size: 11px;
        }

        td {
            font-size: 13px;
        }

        .btnAction {
            font-size: 8px;
        }

    </style>
    <!---------------------------------------commantaire modal ------------------------------------------->

    <div class="modal" tabindex="-1" id="modalCommantaire" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Commantaire') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col">
                        <textarea id="commantaireInpute" class="form-control form-control-sm" name="commantaire"
                            value="{{ old('commantaire') }}" required autocomplete="commantaire"></textarea>
                        <div id="commantaireValidation" class="d-none"><small
                                class="text-danger font-weight-bold d-inline">Écrivez votre commentaire *</small></div>
                        <label id="commantaireLabel"></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="rejeterCommandeBtn" class="btn btn-primary btn-sm"
                        onclick="rejeterCommande();">Save changes</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!----------------------------------------------------------------------------------------------------->
    <!----------------------------------------- modal foem ------------------------------------------------>
    <form method="post" id="modalModal" action="{{ url('/commandes') }}" enctype="multipart/form-data">
        <div class="modal fade bd-example-modal-lg" id="modalEditCommande" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="content_modal_modifier">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="card px-2 py-2 mb-2 ">
                            <span class="mb-4">Client</span>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="client">{{ __('CIN/RC') }}</label>
                                    <select list="listClients" id="client" type="text" class="form-control form-control-sm "
                                        name="client" required autocomplete="client">
                                        @foreach ($listClients as $client)
                                            <option value="{{ $client->id }}">{{ $client->cin_rc }}</option>
                                            <option style="font-size: 12px" value="" disabled>
                                                <small>{{ $client->exploiteur }}</small>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="ref_client">{{ __('Réf Client') }}</label>
                                    <input id="ref_client" type="ref_client" class="form-control form-control-sm"
                                        name="ref_client" value="{{ old('ref_client') }}" required
                                        autocomplete="ref_client">
                                </div>
                                <div class="form-group col">
                                    <label for="commercial">{{ __('Commercial') }}</label>
                                    <input list="listCommercials" id="commercial" type="text"
                                        class="form-control form-control-sm " name="commercial" required
                                        autocomplete="commercial">
                                </div>
                                <div class="form-group col">
                                    <label for="date_reception">{{ __('Date reception') }}</label>
                                    <input id="date_reception" type="date" class="form-control form-control-sm "
                                        name="date_reception" required autocomplete="date_reception">
                                </div>
                                <div class="form-group col">
                                    <label for="lieu_id">{{ __('Lieu') }}</label>
                                    <select id="lieu_id" name="lieu_id" class='form-control form-control-sm'>
                                        @foreach ($listLieus as $lieu)
                                            <option value="{{ $lieu->id }}">{{ $lieu->lieu }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="groupRow">
                            <div class="card px-2 py-2">
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="matrice">{{ __('Matrice') }}</label>
                                        <select id="matrice" class="form-control form-control-sm" name="matrice" required
                                            autocomplete="Matrice" autofocus onchange="menuOfMatrice($(this).val())">
                                            <option value="">select..</option>
                                            @foreach ($listMatrices as $matrice)
                                                <option value="{{ $matrice->id }}">{{ $matrice->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col menu">
                                        <label for="menu">{{ __('Menu') }}</label>
                                        <select id="menu" class="form-control form-control-sm" name="menu" required
                                            autocomplete="menu" autofocus></select>
                                    </div>
                                    <div class="form-group col">
                                        <label for="date_prelevement">{{ __('Date prélevement') }}</label>
                                        <input id="date_prelevement" type="date" class="form-control form-control-sm "
                                            name="date_prelevement" required autocomplete="date_prelevement">
                                    </div>
                                    <div class="form-group col">
                                        <label for="varite">{{ __('Varièté') }}</label>
                                        <input list="listVarites" id="varite" type="text"
                                            class="form-control form-control-sm " name="varite" required
                                            autocomplete="varite">
                                    </div>
                                    <div class="form-group col">
                                        <label for="nature">{{ __('Nature') }}</label>
                                        <input list="listNatures" id="nature" type="text"
                                            class="form-control form-control-sm" name="nature"
                                            value="{{ old('nature') }}" required autocomplete="nature" autofocus>
                                    </div>
                                    <div class="form-group col">
                                        <label for="culture">{{ __('Culture') }}</label>
                                        <input list="listCultures" id="culture" type="text"
                                            class="form-control form-control-sm " name="culture" required
                                            autocomplete="culture">
                                    </div>
                                </div>
                                <div class="form-row row2">

                                    <div class="form-group col">
                                        <label for="gps_1">{{ __('GPS 1') }}</label>
                                        <input id="gps_1" type="text" class="form-control form-control-sm" name="gps_1"
                                            autocomplete="gps_1">
                                    </div>
                                    <div class="form-group col ">
                                        <label for="gps_2">{{ __('GPS 2') }}</label>
                                        <input id="gps_2" type="text" class="form-control form-control-sm " name="gps_2"
                                            autocomplete="gps_2">
                                    </div>
                                    <div id="horizon1Group" class="form-group col d-none">
                                        <label for="horizon_1">{{ __('Horizon') }}</label>
                                        <input id="horizon_1" type="number" class="form-control form-control-sm "
                                            name="horizon_1" autocomplete="horizon_1">

                                    </div>
                                    <div id="horizon2Group" class="form-group col d-none">
                                        <label for="horizon_2">{{ __('a') }}</label>
                                        <input id="horizon_2" type="number" class="form-control form-control-sm "
                                            name="horizon_2" autocomplete="horizon_2">
                                    </div>

                                    <div id="temperateurGroup" class="form-group col d-none">
                                        <label for="temperateur">{{ __('Temperateur') }}</label>
                                        <input id="temperateur" type="number" class="form-control form-control-sm "
                                            name="temperateur" autocomplete="temperateur">
                                    </div>
                                </div>
                                <div class="form-row">

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <datalist id="listCultures">
        @foreach ($listCultures as $culture)
            <option value="{{ $culture->culture }}">
        @endforeach
    </datalist>
    <datalist id="listNatures">
        @foreach ($listNatures as $nature)
            <option value="{{ $nature->nature }}">
        @endforeach
    </datalist>
    <datalist id="listVarites">
        @foreach ($listVarites as $varite)
            <option value="{{ $varite->varite }}">
        @endforeach
    </datalist>
    <datalist id="listCommercials">
        @foreach ($listCommercials as $commercial)
            <option value="{{ $commercial->name }}">{{ $commercial->zone }}</option>
        @endforeach
    </datalist>

    <!------------------------------------------------------------------------->

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card " style=" background-color: rgb(255, 255, 255)">
        <div class="card-header d-inline ">{{ __('La liste des Commandes') }}
            <select id="stateFilter" class="ml-3 d-inline  form-control form-control-sm col-2">
                <option value="0" {{ $state == 0 ? 'selected' : '' }}>Toute les commande</option>
                <option value="1" {{ $state == 1 ? 'selected' : '' }}>En cours</option>
                <option value="2" {{ $state == 2 ? 'selected' : '' }}>Valid</option>
                <option value="3" {{ $state == 3 ? 'selected' : '' }}>Rejete</option>
            </select>
            <input id="searchInput" type="text" class="ml-3 d-inline  form-control form-control-sm col-2">
            <a class="btn btn-success btn-sm float-right d-inline " href="{{ url('/commandes/create') }}">Ajouter une
                Commande</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm ">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center text-nowrap">#</th>
                            <th class="text-center text-nowrap">Code commande</th>
                            <th class="text-center text-nowrap">Date réception</th>
                            <th class="text-center text-nowrap">Client</th>
                            <th class="text-center text-nowrap">Réf client</th>
                            <th class="text-center pr-4 text-nowrap">Commercial</th>
                            <th class="text-center pr-4 text-nowrap">Menu</th>
                            <th class="text-center pr-4 text-nowrap">Nature</th>
                            <th class="text-center pr-4 text-nowrap">Culture</th>
                            <th class="text-center pr-4 text-nowrap">Varite</th>
                            <th class="text-center pr-4 text-nowrap">GPS1</th>
                            <th class="text-center pr-4 text-nowrap">GPS2</th>
                            <th class="text-center pr-4 text-nowrap">Horizon</th>
                            <th class="text-center pr-4 text-nowrap">Temperature</th>
                            <th class="text-center pr-4 text-nowrap">Date prélevement</th>
                            <th class="text-center pr-4">Etat</th>
                            <th class="text-center pr-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listCommandes as $commande)
                            <tr>
                                <td class="text-center text-nowrap">{{ $commande->id }}</td>
                                <td class="text-center"><span
                                        class="badge badge-success">{{ $commande->code_commande }}</span></td>
                                <td class="text-center text-nowrap">{{ $commande->date_reception }}</td>
                                <td class="text-center text-nowrap">{{ $commande->client }}</td>
                                <td class="text-center text-nowrap">{{ $commande->ref_client }}</td>

                                <td class="text-center text-nowrap">{{ $commande->commercial }}</td>
                                <td class="text-center text-nowrap">{{ $commande->menu }}</td>
                                <td class="text-center text-nowrap">{{ $commande->nature }}</td>
                                <td class="text-center text-nowrap">{{ $commande->culture }}</td>
                                <td class="text-center text-nowrap">{{ $commande->varite }}</td>
                                <td class="text-center text-nowrap">{{ $commande->gps_1 }}</td>
                                <td class="text-center text-nowrap">{{ $commande->gps_2 }}</td>
                                <td class="text-center text-nowrap">
                                    @if (!empty($commande->horizon_2))
                                        {{ $commande->horizon_1 }} --> {{ $commande->horizon_2 }}
                                    @endif
                                </td>
                                <td class="text-center text-nowrap">{{ $commande->temperature }}</td>
                                <td class="text-center text-nowrap">{{ $commande->date_prelevement }}</td>
                                @if ($commande->state == 'Valid')
                                    <td class="text-center text-nowrap"> <span
                                            class="badge badge-success">{{ $commande->state }}</td>
                                @endif
                                @if ($commande->state == 'Rejete')
                                    <td class="text-center text-nowrap"> <span
                                            class="badge badge-danger">{{ $commande->state }}</td>
                                @endif
                                @if ($commande->state == 'En cours')
                                    <td class="text-center text-nowrap"> <span
                                            class="badge badge-warning">{{ $commande->state }}</td>
                                @endif
                                <td class="text-right text-nowrap">
                                    @if (Auth::user()->role_id <= 2)
                                        @if ($commande->state != 'Valid')
                                            <div class="d-inline p-0">
                                                <button class="btn btn-success btn-sm btnAction"
                                                    onclick="validerCommande({{ $commande->id }})"><i
                                                        class="fa fa-check" aria-hidden="true"></i></button>
                                            </div>
                                        @endif
                                        @if ($commande->state != 'Rejete')
                                            <div class="d-inline p-0">
                                                <button class="btn btn-warning btn-sm btnAction"
                                                    onclick="openModalRejeterCommande({{ $commande->id }})"><i
                                                        class="fa fa-undo" aria-hidden="true"></i></button>
                                            </div>
                                        @endif
                                        @if ($commande->state == 'Rejete')
                                            <div class="d-inline p-0">
                                                <button class="btn btn-warning btn-sm btnAction"
                                                    onclick="showCommantaire({{ $commande->id }})"><i
                                                        class="fa fa-exclamation-triangle" aria-hidden="true"></i></button>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="d-inline p-0">
                                        <button class="btn btn-primary btn-sm btnAction"
                                            onclick="openEditCommandeModal({{ $commande->id }})"><i
                                                class="fa fa-edit"></i></button>
                                    </div>
                                    @if (Auth::user()->role_id == 1)
                                        <form class="d-inline p-0" method="POST"
                                            action="{{ url('/commandes/' . $commande->id) }}">
                                            @csrf
                                            {{ @method_field('DELETE') }}
                                            <button type="supmit" class="btn btn-danger btn-sm btnAction"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($listCommandes instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="d-flex justify-content-center mt-2">
                    {!! $listCommandes->links('pagination::bootstrap-4') !!}
                </div>
            @endif
        </div>
    </div>
    </div>


    <script>
        document.getElementById("commantaireInpute").addEventListener("keyup", e => {
            $("#commantaireValidation").addClass("d-none");
        })
        document.getElementById("searchInput").addEventListener("keyup", e => {
            $('.table-responsive').preloader({
                text: 'Loading'
            })
            $.ajax({
                url: "{{ url('/commandes/search') }}",
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

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        var idCommandeToReject = null

        function openModalRejeterCommande(id) {
            idCommandeToReject = id
            $("#rejeterCommandeBtn").removeClass("d-none")
            $("#commantaireLabel").addClass("d-none")
            $("#commantaireInpute").removeClass("d-none")
            $("#modalCommantaire").modal("show")
        }

        function showCommantaire(id) {
            $("html").preloader({
                text: 'Loading'
            });
            $("#rejeterCommandeBtn").addClass("d-none")
            $("#commantaireInpute").addClass("d-none")
            $("#commantaireLabel").removeClass("d-none")
            $.get('/commandes/commantaire/' + id, function(data) {
                data = JSON.parse(data);

                $("#commantaireLabel").html(data.commantaire)
                $("#modalCommantaire").modal("show");
                $('html').preloader('remove')

            });
        }

        function validerCommande(id_commande) {
            $("html").preloader({
                text: 'Loading'
            });
            $.get('/commandes/' + id_commande + '/valider', function(response) {
                data = JSON.parse(response);
                $.each(data, function(status, message) {
                    alert(status + ": " + message);
                });
                $(".card-body").html($(response).find(".card-body").html())
                $('html').preloader('remove')

            });

        }

        function rejeterCommande() {
            $("#modalCommantaire").modal("hide")
            $("html").preloader({
                text: 'Loading'
            });
            commantaire = $("#commantaireInpute").val()
            if (commantaire == "") {
                $("#commantaireValidation").removeClass("d-none");
                return 0;
            }
            $("#commantaireInpute").val("");
            $.ajax({
                url: "{{ url('/commandes/reject') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    commande_id: idCommandeToReject,
                    commantaire: commantaire
                },
                success: function(response) {

                    $(".card-body").html($(response).find(".card-body").html())
                    $('html').preloader('remove')
                },
            });

        }

        function openEditCommandeModal(id) {
            $("html").preloader({
                text: 'Loading'
            });
            $("#modalModal")[0].reset();
            $("#ModalTitle").text("Modifier");
            $('#modalModal').append("<input id='method' type='hidden' name='_method' value='PATCH'/>");
            //$("#password-confirm").hide();
            var commande_id = id;
            $.get('/commandes/' + commande_id + '/edit', function(data) {
                data = JSON.parse(data);
                $('#modalModal').attr('action', '{{ url('/commandes') }}' + "/" + data.id);
                $("#client").val(data.client_id);
                $("#commercial").val(data.commercial);
                $("#ref_client").val(data.ref_client);
                $("#date_reception").val(data.date_reception);
                $("#menu").val(data.menu);
                $("#lieu_id").val(data.lieu_id);
                $("#date_prelevement").val(data.date_prelevement);
                $("#varite").val(data.varite);
                $("#nature").val(data.nature);
                $("#culture").val(data.culture);
                $("#ref_client").val(data.ref_client);
                $("#matrice").val(data.matrice_id);
                menuOfMatrice(data.matrice_id, data.menu_id);
                $("#gps_1").val(data.gps_1);
                $("#gps_2").val(data.gps_2);
                $("#horizon_1").val(data.horizon_1);
                $("#horizon_2").val(data.horizon_2);
                $("#temperateur").val(data.temperature);
                $("#horizon_2").val(data.horizon_2);
                $('#modalEditCommande').modal('show');
                $('html').preloader('remove')
            })

        }
        $("#stateFilter").change(function() {
            $("html").preloader({
                text: 'Loading'
            });
            $.get('/commandes/search/' + $(this).val(), function(response) {
                $("#modalCommantaire").modal("hide")
                $(".card-body").html($(response).find(".card-body").html())
                $('html').preloader('remove')
            });
        });

        function statiqueInputs() {
            var matrice = $("#matrice option:selected").text();
            //$(matrice).parent().parent().parent().children(".row2").children("#horizon1Group").removeClass("d-none")
            //$("#horizon1Group").removeClass("d-none");
            if (matrice == "SOL") {
                $("#horizon1Group").removeClass("d-none")
                $("#horizon2Group").removeClass("d-none")
                $("#horizon_1").attr('required', '');
                $("#horizon_2").attr('required', '');
            } else {
                $("#horizon1Group").addClass("d-none")
                $("#horizon2Group").addClass("d-none")
                $("#horizon1Group").removeAttr('required');
                $("#horizon_2").removeAttr('required');
            }
            if (matrice == "EAU" || matrice == "EAU POTABLE") {
                $("#temperateurGroup").removeClass("d-none")
                $("#temperateur").attr('required', '');
            } else {
                $("#temperateurGroup").addClass("d-none")
                $("#temperateur").removeAttr('required');
            }
        }

        function menuOfMatrice(matrice_id, menu_id = null) {
            $("#content_modal_modifier").preloader({
                text: 'Loading',
                zIndex: '1'
            });
            statiqueInputs()
            console.log(matrice_id)
            if (matrice_id == "") {
                let options = "<option value=''>select..</option>";
                $("#menu").empty().append(options);
            } else {
                $.get('/commandes/' + matrice_id + '/menuOfMatrice', function(listMenu) {
                    listMenu = JSON.parse(listMenu);
                    var options = "<option value=''>select..</option>";
                    listMenu.forEach(menu => {
                        if (!menu_id) {
                            options += "<option value='" + menu.id + "'>" + menu.name + "</option>";
                        } else {
                            (menu.id == menu_id) ? options += "<option value='" + menu.id + "' selected>" +
                                menu.name + "</option>": options += "<option value='" + menu.id + "'>" +
                                menu.name + "</option>";
                        }

                    });
                    $("#menu").empty().append(options);
                    $('#content_modal_modifier').preloader('remove')
                });
            }

        }
    </script>


@endsection
