@extends('layouts.master')
@section('content')
<!----------------------------------------- modal foem ------------------------------------------------>
<form method="post" id="modalModal" action="{{ url('/commercials') }}"  enctype="multipart/form-data">
    <div class="modal fade bd-example-modal-lg" id="modalEditCommercial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
                </div>
                <div class="form-group input-group-sm col-md-4">
                    <label for="zone">{{ __('Zone') }}</label>
                    <input id="zone" type="text" class="form-control @error('zone') is-invalid @enderror" name="zone" value="{{ old('zone') }}" required autocomplete="zone" autofocus>
                </div>
                <div class="form-group input-group-sm col-md-4">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email " value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                <button id="btnSave" type="button" class="btn btn-primary btn-sm">Save changes</button>
            </div>
        </div>
      </div>
    </div>
    </div>
  </form>
  <!------------------------------------------------------------------------->
    @if($message=Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ $message}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="card" style="background-color: rgb(255, 255, 255)">
        <div class="card-header">{{ __('List des Commercial') }}
            <input id="searchInput" type="text" class="ml-3 d-inline  form-control form-control-sm col-2">
            <button class="btn btn-success btn-sm float-right" onclick="addCommercialBlade()">Ajouter un Commercial</button> 
        </div>
            <div class="card-body">
                <div class="table-responsive-sm ">
                    <table class="table table-striped table-sm ">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Zone</th>
                                <th class="text-center">Email</th>
                                @if(Auth::user()->role_id <= 2)
                                    <th class="text-right pr-4">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($listCommercials as $commercial)
                            <tr>
                                <td id='id' class="text-center">{{ $commercial->id }}</td>
                                <td id='name' class="text-center">{{ $commercial->name }}</td>
                                <td id='zone' class="text-center"><span class="badge badge-success">{{ $commercial->zone }}</span></td>
                                <td id='email' class="text-center">{{ $commercial->email }}</td>

                                @if(Auth::user()->role_id <= 2)
                                    <td class="text-right">
                                        <div class="d-inline p-2"><!------onclick="openEditCommercialModal({{ $commercial->id }})"--->
                                            <button class="btn btn-primary btn-sm editBtn" ><i class="fa fa-edit"></i></button>
                                        </div>
                                        <form class="d-inline p-2" method="POST" action="{{ url('/commercials/'.$commercial->id) }}">
                                            @csrf
                                            {{@method_field("DELETE")}}
                                            <button type="supmit" class="btn btn-danger btn-sm "><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @if($listCommercials instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="d-flex justify-content-center mt-2">
                        {!! $listCommercials->links("pagination::bootstrap-4") !!}
                    </div>
                @endif
            </div>
        </div>
    </div>

<script>
    $(document).ready(function () {
      btnSaveRole = null;
      idCommercial = null;
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
      });
      $(".editBtn").click(function(){
        idCommercial = $(this).parent().parent().parent().children("#id").html();
        name = $(this).parent().parent().parent().children("#name").html();
        zone = $(this).parent().parent().parent().children("#zone").children("span").html();
        email = $(this).parent().parent().parent().children("#email").html();
        $("#modalModal")[0].reset();
        $("#ModalTitle").text("Modifier");
        $('#modalModal').append("<input id='method' type='hidden' name='_method' value='PATCH'/>");
        $('#modalModal').attr('action', '{{ url("/commercials")}}'+"/"+idCommercial);
        $("#name").val(name);
        $("#zone").val(zone);
        $("#email").val(email);
        btnSaveRole = "PATCH";
        $('#modalEditCommercial').modal('show');
      });
      $("#btnSave").click(function(){
        (btnSaveRole == "PATCH") ? url = "/commercials/"+idCommercial : url = "/commercials"; 
        $('table').preloader({text:'Loading'})
        data = $("#modalModal").serialize();
        $.ajax({
            url: url,
            type:"POST",
            data:data,
            success:function(response){
                $(".card-body").html($(response).find( ".card-body" ).html())
                $('table').preloader('remove')
                
            },
        });
        console.log(btnSaveRole);
      })
    //_method:PATCH
      function addCommercialBlade(){
        btnSaveRole = "ADD"
          $("#method").remove();
          $('#modalModal').attr('action', '{{ url("/commercials")}}');
          $("#modalModal")[0].reset();
          $("#ModalTitle").text("Ajouter un commercial");
          $('#modalEditCommercial').modal('show');
      }
      document.getElementById("searchInput").addEventListener("keyup", e => {
        $('table').preloader({text:'Loading'})
        $.ajax({
            url: "{{ url('/commercials/search')}}",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                buffer : $("#searchInput").val(),
            },
            success:function(response){
                $(".card-body").html($(response).find( ".card-body" ).html())
                $('table').preloader('remove')
            },
        });
    })
  </script>
@endsection