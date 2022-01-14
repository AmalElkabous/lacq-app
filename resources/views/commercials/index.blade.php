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
            <button class="btn btn-success btn-sm float-right" onclick="addCommercialBlade()">Ajouter un Commercial</button> 
        </div>
            <div class="card-body">
                <div class="table-responsive-sm ">
                    <table class="table table-striped table-sm ">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Zone</th>
                                @if(Auth::user()->role_id <= 2)
                                    <th class="text-right pr-4">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($listCommercials as $commercial)
                            <tr>
                                <td class="text-center">{{ $commercial->name }}</td>
                                <td class="text-center"><span class="badge badge-success">{{ $commercial->zone }}</span></td>
                                @if(Auth::user()->role_id <= 2)
                                    <td class="text-right">
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
            </div>
        </div>
    </div>

<div class="d-flex justify-content-center mt-2">
    {!! $listCommercials->links("pagination::bootstrap-4") !!}
</div><script>
    $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
      });
    
    //_method:PATCH
      function addCommercialBlade(){
          //$("#method").remove();
          //$('#modalModal').attr('action', '{{ url("/commercials")}}');
          $("#modalModal")[0].reset();
          $("#ModalTitle").text("Ajouter un commercial");
          $('#modalEditCommercial').modal('show');
      }
      function openEditCommercialModal(id){
          $("#modalModal")[0].reset();
          $("#ModalTitle").text("Modifier");
          $('#modalModal').append("<input id='method' type='hidden' name='_method' value='PATCH'/>"); 
          //$("#password-confirm").hide();
          var user_id = id;
          $.get('/commercials/' + user_id +'/edit', function (data) {
              data = JSON.parse(data);
              $('#modalModal').attr('action', '{{ url("/commercials")}}'+"/"+data.id);
              $("#name").val(data.name);
              $("#code").val(data.code);
              $("#delai").val(data.delai);
          })
          $('#modalEditCommercial').modal('show');
      }
  </script>
@endsection