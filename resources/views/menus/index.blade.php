@extends('layouts.master')
@section('content')
<!----------------------------------------- modal foem ------------------------------------------------>
<form method="post" id="modalModal" action="{{ url('/menus') }}"  enctype="multipart/form-data">
    <div class="modal fade bd-example-modal-lg" id="modalEditMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <select id="matrice" class="form-control @error('matrice') is-invalid @enderror" name="matrice" value="{{ old('matrice') }}" required autocomplete="matrice" autofocus>
                    @foreach ($listMatrice as $matrice)
                    <option value="{{ $matrice->id}}" >{{ $matrice->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group input-group-sm col-md-3">
                    <label for="name">{{ __('Nom') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
                </div>
                <div class="form-group input-group-sm col-md-3">
                    <label for="prix_ht">{{ __('prix_ht') }}</label>
                    <input id="prix_ht" type="text" class="form-control @error('prix_ht') is-invalid @enderror" name="prix_ht" value="{{ old('prix_ht') }}" required autocomplete="prix_ht" autofocus>
                </div>
                <div class="form-group input-group-sm col-md-3">
                    <label for="prix_supv">{{ __('prix_supv') }}</label>
                    <input id="prix_supv" type="text" class="form-control @error('prix_supv') is-invalid @enderror" name="prix_supv" value="{{ old('prix_supv') }}" required autocomplete="prix_supv" autofocus>
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
        <div class="card-header">{{ __('List des Menu') }}
            <button class="btn btn-success btn-sm float-right" onclick="addMenuBlade()">Ajouter un Menu</button> 
        </div>
            <div class="card-body">
                <div class="table-responsive-sm ">
                    <table class="table table-striped table-sm ">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Matrice</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prix hor tax</th>
                                <th class="text-center">Prix Supvendioner</th>
                                @if(Auth::user()->role_id <= 2)
                                    <th class="text-right pr-4">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($listMenu as $menu)
                            <tr>
                                <td class="text-center"><span class="badge badge-success">{{ $menu->matrice }}</span></td>
                                <td class="text-center">{{ $menu->name }}</td>
                                <td class="text-center">{{ $menu->prix_ht }}</td>
                                <td class="text-center">{{ $menu->prix_supv }}</td>
                                @if(Auth::user()->role_id <= 2)
                                    <td class="text-right text-nowrap" >
                                        <div class="d-inline p-2">
                                            <button class="btn btn-primary btn-sm " onclick="openEditMenuModal({{ $menu->id }})"><i class="fa fa-edit"></i></button>
                                        </div>
                                        <form class="d-inline p-2" method="POST" action="{{ url('/menus/'.$menu->id) }}">
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
    {!! $listMenu->links("pagination::bootstrap-4") !!}
</div><script>
    $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
      });
    
    //_method:PATCH
      function addMenuBlade(){
          $("#method").remove();
          $("#modalModal")[0].reset();
          $("#ModalTitle").text("Ajouter ");
          $('#modalModal').attr('action', '{{ url("/menus")}}');
          $('#modalEditMenu').modal('show');

      }
      function openEditMenuModal(id){
          $("#modalModal")[0].reset();
          $("#ModalTitle").text("Modifier");
          $('#modalModal').append("<input id='method' type='hidden' name='_method' value='PATCH'/>"); 
          var user_id = id;
          $.get('/menus/' + user_id +'/edit', function (data) {
              data = JSON.parse(data);
              $('#modalModal').attr('action', '{{ url("/menus")}}'+"/"+data.id);
              $("#name").val(data.name);
              $("#matrice").val(data.matrice_id);
              $("#prix_ht").val(data.prix_ht);
              $("#prix_supv").val(data.prix_supv);
              
          })
          $('#modalEditMenu').modal('show');
      }
  </script>
@endsection