@extends('layouts.master')
@section('content')

<style>
    th{
        font-size: 11px;
    }
    td{
        font-size: 13px;
    }
    .btnAction{
        font-size: 8px;
    }
</style>
<!----------------------------------------- modal foem ------------------------------------------------>

    <a href="javascript:void(0);" id="cadenas" onclick="cadenasLock();">
      <div class="alert alert-primary alert-dismissible fade show" role="alert"><i class="fa fa-lock" aria-hidden="true"></i> Click here To open cadenas</div>
    </a>

@if($message=Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ $message}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
@if($message=Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ $message}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif
    <div class="card " style=" background-color: rgb(255, 255, 255)">
        <div class="card-header d-inline ">{{ __('List des analyse') }}
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm ">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center text-nowrap">#</th>
                                <th class="text-center text-nowrap">Code commande</th>
                                <th class="text-center text-nowrap">Lieu</th>
                                @foreach ($columns as $column)
                                    @if($column == "deleted_at" || $column == "id" || $column == "created_at" || $column == "updated_at" || $column == "commande_id" || $column == "lieu_id")
                                        @continue
                                    @endif
                                        <th class="text-center text-nowrap">{{$column}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($listData as $data)
                                <tr class="table-success">
                                    <td class="text-center text-nowrap" id="notModifiable">{{$data->id}}</td>
                                    <td class="text-center text-nowrap" id="notModifiable">{{$data->code_commande}}</td>
                                    <td class="text-center text-nowrap">{{($data->lieu == "null") ? "" : $data->lieu  }}</td>
                                    @foreach ($columns as $column)
                                    @if($column == "deleted_at" || $column == "id" || $column == "created_at" || $column == "updated_at" || $column == "commande_id" || $column == "lieu_id")
                                        @continue
                                    @endif
                                    <td class="text-center text-nowrap">{{$data->$column}}</td>
                                    @endforeach
                                </tr>   
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<div class="d-flex justify-content-center mt-2">
</div>
<script>
    var cadenas_is_open = false;
    function cadenasLock(){
        cadenas_is_open = !cadenas_is_open;
        cadenas_is_open ? arrayToInputs() : InputsToArray()
    }
    function arrayToInputs(){
        $("td").each(function() {
            if(this.id !== "notModifiable") 
            $(this).html("<input style='width:100px;' class='form-control form-control-sm' value='"+$(this).html()+"' >");
        });
      $("#cadenas").html('<div class="alert alert-danger" role="alert"><i class="fa fa-unlock mr-2" aria-hidden="true"></i>Cadenas Opend</div>');
      $( "#save" ).removeClass( "d-lg-none" );
    }
    function InputsToArray(){
        $("td").each(function() {
            $(this).html($(this).children("input").val());
        });
        $("#cadenas").html('<div class="alert alert-primary" role="alert"><i class="fa fa-lock" aria-hidden="true"></i> Click here To open cadenas</div>');
        $( "#save" ).addClass("d-lg-none");
    }
</script>
@endsection