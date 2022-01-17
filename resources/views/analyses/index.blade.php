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
        font-size: 10px;
    }
    
</style>
<!----------------------------------------- modal foem ------------------------------------------------>

<a href="javascript:void(0);" id="cadenas" onclick="cadenasLock();">
    <div class="alert alert-primary alert-sm alert-dismissible fade show py-2" role="alert"><i class="fa fa-lock" aria-hidden="true"></i> Click here To open cadenas</div>
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
<form action="/analyses" method="POST">

    <div class="card " style=" background-color: rgb(255, 255, 255)">
        <div class="card-header d-inline ">{{ __('List des analyse') }}
            <select name="selectedMatrice"  id="matriceFilter" class="ml-3 d-inline  form-control form-control-sm col-2 float-right">
                @foreach ($listMatrices as $matrice)
                    <option value="{{ $matrice->id }}" {{($matrice->id == $selectedMatrice || $selectedMatrice == null) ? "selected":""}}>{{ $matrice->name }}</option>
                @endforeach
            </select>
        </div>
        
            @csrf
            @method('patch')
            
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
                                <th class="text-center text-nowrap">Export</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($listData as $data)
                                <tr>
                                    <td class="text-center text-nowrap" id="id_analyse">{{$data->id}}</td>
                                    <td class="text-center text-nowrap" id="notModifiable">{{$data->code_commande}}</td>
                                    <td class="text-center text-nowrap" id="id_lieu">
                                        <select name="lieu_id[]" style='width:80px;' class='form-control form-control-sm' disabled>
                                            @foreach ($listLieus as $lieu)
                                                <option value="{{ $lieu->id }}" {{ ($lieu->id == $data->lieu_id) ? "selected" : ""}}>{{ $lieu->lieu }}</option>
                                            @endforeach
                                        </select>
                                        
                                    </td>
                                    @foreach ($columns as $column)
                                    @if($column == "deleted_at" || $column == "id" || $column == "created_at" || $column == "updated_at" || $column == "commande_id" || $column == "lieu_id")
                                        @continue
                                    @endif
                                    <td class="text-center text-nowrap" id="{{$column}}">{{$data->$column}}</td>
                                    @endforeach
                                    <th class="text-center text-nowrap"><a class="btn btn-success btn-sm btnAction" href="#">PDF</a></th>
                                </tr>   
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <center><button id="save" type="submit" class="btn btn-success btn-sm d-lg-none mt-3 px-5">save</button></center>
            </div>
        
        </div>
    
    </div>
</form>
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
            if(this.id == "id_analyse") 
            $(this).html("<input  style='width:100px;' class='form-control form-control-sm' name='id[]' value='"+$(this).html()+"' readonly='readonly' >");
            else if(this.id == "id_lieu")
            $(this).children("select").removeAttr('disabled ');

            else if(this.id !== "notModifiable") 
            $(this).html("<input style='width:100px;' class='form-control form-control-sm' name='"+this.id+"[]' value='"+$(this).html()+"' >");
        });
      $("#cadenas").html('<div class="alert alert-danger py-2" role="alert"><i class="fa fa-unlock mr-2" aria-hidden="true"></i>Cadenas Opend</div>');
      $( "#save" ).removeClass( "d-lg-none" );
    }
    function InputsToArray(){
        $("td").each(function() {
            if(this.id == "id_lieu")
            $(this).children("select").attr('disabled',"");
            else 
            $(this).html($(this).children("input").val());
        });
        $("#cadenas").html('<div class="alert alert-primary py-2" role="alert"><i class="fa fa-lock" aria-hidden="true"></i> Click here To open cadenas</div>');
        $( "#save" ).addClass("d-lg-none");
    }
    $( "#matriceFilter" ).change(function() {
        $("html").preloader({text:'Loading'});
        $.ajax({
            url: "{{ url('/analyses')}}",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                matrice : $("#matriceFilter").val(),
            },
            success:function(response){
                $(".card-body").html($(response).find( ".card-body" ).html())
                $('table').preloader('remove')
            },
        });
    });
</script>
@endsection