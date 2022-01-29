@extends('layouts.master')
@section('content')
    <form id="clientModalForm">
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
                                <label for="address">{{ __('Adresse') }}</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                            </div>
                            <div class="form-group input-group-sm col-md-3">
                                <label for="exploiteur">{{ __('Exploiteur') }}</label>
                                <input id="exploiteur" type="text"
                                    class="form-control @error('exploiteur') is-invalid @enderror" name="exploiteur"
                                    value="{{ old('exploiteur') }}" required autocomplete="exploiteur" autofocus>
                            </div>
                            <div class="form-group input-group-sm col-md-3">
                                <label for="organisme">{{ __('Organisme') }}</label>
                                <input id="organisme" type="text"
                                    class="form-control @error('organisme') is-invalid @enderror" name="organisme"
                                    value="{{ old('organisme') }}" required autocomplete="organisme" autofocus>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary btn-sm">Sauvegarder </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">{{ __('Ajouter une commande') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ url('/commandes') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card px-2 py-2 mb-2 ">
                        <span class="mb-4">Client</span>
                        <div class="row">
                            <div class="form-group col">
                                <label for="client">{{ __('CIN/RC') }}</label>
                                <input list="listClients" id="client" type="text" class="form-control form-control-sm "
                                    name="client[]" required autocomplete="client">
                                <span id="cliantValidation" class="d-none">
                                    <small class="text-danger font-weight-bold d-inline">Client n'existe pas !</small>
                                    <button type="button" class="btn btn-link text-danger btn-sm font-weight-bold p-0 mx-1"
                                        style="font-size: 12.8px" onclick="addClient();"> Voulez-vous l'ajouter ?</button>
                                </span>
                            </div>
                            <div class="form-group col">
                                <label for="ref_client">{{ __('Réf Client') }}</label>
                                <input id="ref_client" type="ref_client" class="form-control form-control-sm"
                                    name="ref_client[]" value="{{ old('ref_client') }}" required
                                    autocomplete="ref_client">
                            </div>
                            <div class="form-group col">
                                <label for="commercial">{{ __('Commercial') }}</label>
                                <input list="listCommercials" id="commercial" type="text"
                                    class="form-control form-control-sm " name="commercial[]" required
                                    autocomplete="commercial">
                            </div>
                            <div class="form-group col">
                                <label for="date_reception">{{ __('Date reception') }}</label>
                                <input id="date_reception" type="date" class="form-control form-control-sm "
                                    name="date_reception[]" required autocomplete="date_reception">
                            </div>

                            <div class="form-group col">
                                <label for="quantite">{{ __('quantite') }}</label>
                                <input id="quantite" type="text" class="form-control form-control-sm"
                                    name="quantite" value="{{ old('quantite') }}" required
                                    autocomplete="quantite">
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
                                    <select id="matrice" class="form-control form-control-sm" name="matrice[]" required
                                        autocomplete="Matrice" autofocus onchange="menuOfMatrice(this)">
                                        <option value="">select..</option>
                                        @foreach ($listMatrices as $matrice)
                                            <option value="{{ $matrice->id }}">{{ $matrice->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col menu">
                                    <label for="menu">{{ __('Menu') }}</label>
                                    <select id="menu" class="form-control form-control-sm" name="menu[]" required
                                        autocomplete="menu" autofocus></select>
                                </div>
                                <div class="form-group col">
                                    <label for="date_prelevement">{{ __('Date prélevement') }}</label>
                                    <input id="date_prelevement" type="date" class="form-control form-control-sm "
                                        name="date_prelevement[]" required autocomplete="date_prelevement">
                                </div>
                                <div class="form-group col">
                                    <label for="nature">{{ __('Nature') }}</label>
                                    <input list="listNatures" id="nature" type="text" class="form-control form-control-sm" name="nature[]" value="{{ old('nature') }}" required autocomplete="nature" autofocus>
                                </div>                            
                                <div class="form-group col">
                                    <label for="culture" >{{ __('Culture') }}</label>
                                    <input list="listCultures" id="culture" type="text" class="form-control form-control-sm " name="culture[]" required autocomplete="culture">
                                </div>
                                <div class="form-group col">
                                    <label for="varite" >{{ __('Varièté') }}</label>
                                    <input list="listVarites" id="varite" type="text" class="form-control form-control-sm " name="varite[]" required autocomplete="varite">
                                </div>
                            </div>
                            <div class="form-row row2">
                                <div class="form-group col">
                                    <label for="ref_client">{{ __('Réf Client') }}</label>
                                    <input id="ref_client" type="ref_client" class="form-control form-control-sm"
                                        name="ref_client[]" value="{{ old('ref_client') }}" required
                                        autocomplete="ref_client">
                                </div>
                                <div class="form-group col">
                                    <label for="gps_1">{{ __('GPS 1') }}</label>
                                    <input id="gps_1" type="text" class="form-control form-control-sm " name="gps_1[]"
                                        autocomplete="gps_1">
                                </div>
                                <div class="form-group col ">
                                    <label for="gps_2">{{ __('GPS 2') }}</label>
                                    <input id="gps_2" type="text" class="form-control form-control-sm " name="gps_2[]"
                                        autocomplete="gps_2">
                                </div>
                                <div id="horizon1Group" class="form-group col d-none">
                                    <label for="horizon_1">{{ __('Horizon') }}</label>
                                    <input id="horizon_1" type="number" class="form-control form-control-sm "
                                        name="horizon_1[]" autocomplete="horizon_1">

                                </div>
                                <div id="horizon2Group" class="form-group col d-none">
                                    <label for="horizon_2">{{ __('a') }}</label>
                                    <input id="horizon_2" type="number" class="form-control form-control-sm "
                                        name="horizon_2[]" autocomplete="horizon_2">
                                </div>

                                <div id="temperateurGroup" class="form-group col d-none">
                                    <label for="temperateur">{{ __('Temperateur') }}</label>
                                    <input id="temperateur" type="number" class="form-control form-control-sm "
                                        name="temperateur[]" autocomplete="temperateur">
                                </div>
                            </div>
                            <div class="form-row">

                            </div>
                            <button class="btn btn-warning btn-sm" class="add" type="button" name="add" id="add">
                                Ajouter</button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2 offset-md-5 text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Enregistrer ') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
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
    <datalist id="listClients">
        @foreach ($listClients as $client)
            <option value="{{ $client->cin_rc }}">{{ $client->exploiteur }}</option>
        @endforeach
    </datalist>

    <script type="text/javascript">
        //horizon1Group

        function statiqueInputs(matrice) {
            //var matrice = $("#matrice option:selected").text();
            text = $(matrice).find('option:selected').text();
            //$(matrice).parent().parent().parent().children(".row2").children("#horizon1Group").removeClass("d-none")

            //$("#horizon1Group").removeClass("d-none");
            if (text == "SOL") {
                $(matrice).parent().parent().parent().children(".row2").children("#horizon1Group").removeClass("d-none")
                $(matrice).parent().parent().parent().children(".row2").children("#horizon2Group").removeClass("d-none")
                $(matrice).parent().parent().parent().children(".row2").children("#horizon1Group").children("#horizon_1")
                    .attr('required', '');
                $(matrice).parent().parent().parent().children(".row2").children("#horizon2Group").children("#horizon_2")
                    .attr('required', '');
            } else {
                $(matrice).parent().parent().parent().children(".row2").children("#horizon1Group").addClass("d-none")
                $(matrice).parent().parent().parent().children(".row2").children("#horizon2Group").addClass("d-none")
                $(matrice).parent().parent().parent().children(".row2").children("#horizon1Group").children("#horizon_1")
                    .removeAttr('required');
                $(matrice).parent().parent().parent().children(".row2").children("#horizon2Group").children("#horizon_2")
                    .removeAttr('required');
            }
            if (text == "EAU" || text == "EAU POTABLE") {
                $(matrice).parent().parent().parent().children(".row2").children("#temperateurGroup").removeClass("d-none")
                $(matrice).parent().parent().parent().children(".row2").children("#temperateurGroup").children(
                    "#temperateur").attr('required', '');
            } else {
                $(matrice).parent().parent().parent().children(".row2").children("#temperateurGroup").addClass("d-none")
                $(matrice).parent().parent().parent().children(".row2").children("#temperateurGroup").children(
                    "#temperateur").removeAttr('required');
            }
        }

        function addClient() {
            $("#clientModalForm")[0].reset();
            $("#ModalTitle").text("Ajouter un client");
            $("#cin_rc").val($("#client").val())
            $('#modalEditClient').modal('show');
        }

        function menuOfMatrice(matrice_id) {
            statiqueInputs(matrice_id)
            console.log(matrice_id.value)
            if (matrice_id.value == "") {
                let options = "<option value=''>select..</option>";
                $("#menu").empty().append(options);
            } else {
                $.get('/commandes/' + matrice_id.value + '/menuOfMatrice', function(listMenu) {
                    listMenu = listMenu;
                    var options = "<option value=''>select..</option>";
                    listMenu.forEach(menu => {
                        options += "<option value='" + menu.id + "'>" + menu.name + "</option>";
                    });
                    //$(matrice_id).parent('.form-group #menu').empty().append(options);
                    $(matrice_id).parent().parent().children(".menu").children("#menu").empty().append(options);
                });
            }

        }
    </script>
    <script type="text/javascript">
        const client = [...document.querySelectorAll('#listClients option')].map(option => option.value)
        //$("#cliantValidation").
        console.log(client);
        document.getElementById("client").addEventListener("keyup", e => {
            if (client.includes(e.target.value)) {
                $("#cliantValidation").addClass("d-none");
                $("#client").addClass("is-valid");
                $("#client").removeClass("is-invalid");
            } else {
                $("#cliantValidation").removeClass("d-none");
                $("#client").addClass("is-invalid");
                $("#client").removeClass("is-valid");
            }
        })
    </script>
    <script type="text/javascript">
        $('#clientModalForm').on('submit', function(e) {
            e.preventDefault();
            let cin_rc = $('#cin_rc').val();
            let address = $('#address').val();
            let exploiteur = $('#exploiteur').val();
            let organisme = $('#organisme').val();

            $.ajax({
                url: "{{ url('/clients') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    cin_rc: cin_rc,
                    address: address,
                    exploiteur: exploiteur,
                    organisme: organisme,
                },
                success: function(response) {
                    client.push($("#cin_rc").val());
                    $("#listClients").append("<option value=" + $("#cin_rc").val() + ">" + $(
                        "#exploiteur").val().toUpperCase() + "</p>");
                    $("#cliantValidation").addClass("d-none");
                    $("#client").addClass("is-valid");
                    $("#client").removeClass("is-invalid");
                    $('#modalEditClient').modal('hide');
                },
            });
        });
    </script>
    <script>
        html = '<div class="formRow mt-2">' + $(".groupRow").clone(true).find('#add').remove().end().html() +
            '<button  class="btn btn-danger btn-sm" type="boutton"  name="remove" id="remove" >Remove</button></div>'
        //$(html).find("#add").remove();
        $("#add").click(function() {
            $(".groupRow").append(html);
        });

        $(".groupRow").on('click', '#remove', function(e) {
            e.preventDefault();
            $(this).closest('.formRow').remove();
        });
    </script>

@endsection
