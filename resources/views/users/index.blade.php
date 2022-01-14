@extends('layouts.master')
@section('content')
<!----------------------------------------- modal foem ------------------------------------------------>
<form method="post" id="modalModal" action="{{ url('/users') }}"  enctype="multipart/form-data">
    <div class="modal fade bd-example-modal-lg" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <div class="container" style="position: relative;text-align: center;">
                    <img  style="border-radius:50%; margin: 30px;" id="output" width="150" height="150" src="{{asset("img/user.png")}}" /> 
                     <div class="bottom-left" style="background-color:rgba(255,255,255,0.7); border-radius: 50%;width: 38px;height: 38px;padding-top: 0px;margin-right: 0 ;position: absolute;top: 140px;left:50% ;transform: translateX(-50%)">
                       <div class="file btn" style="position: relative;overflow: hidden;">
                         <i class="fa fa-plus" aria-hidden="true"></i>
                         <input id="userimg" type="file" name="uAvatar" style="position:absolute;opacity: 0;right: 0;top: 0;" onchange="loadFile(event)" accept=".jpg,.png" />
                       </div>
                   </div>
                </div>
                <div class="form-row">
                    <div class="form-group input-group-sm col-md-6">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group input-group-sm col-md-6">
                        <label for="last_name">{{ __('Last Name') }}</label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group input-group-sm">
                    <label for="email" >{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
                <div class="form-row">
                    <div class="form-group input-group-sm col-md-6">
                        <label for="password" >{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group input-group-sm col-md-6">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                
                <div class="form-group input-group-sm">
                    <label for="name">{{ __('Name') }}</label>
                        <select id="user_role" type="text" class="form-control @error('user_role') is-invalid @enderror" name="user_role" value="{{ old('user_role') }}" required autocomplete="user_role" autofocus>
                            <option value="">select ..</option>
                            <option value="1">administrateur</option>
                            <option value="2">responsable</option>
                            <option value="3">cordinateur</option>
                            <option value="4">receptionniste</option>
                        </select>
                    @error('user_role')
                        <span class="invalid-fe edback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!------------------------------------------------------------------------->
<div class="container">
    @if($message=Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ $message}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="card" style="background-color: rgb(255, 255, 255)">
        <div class="card-header">{{ __('List des utilisateurs') }}
        <button class="btn btn-success btn-sm float-right" onclick="addUserBlade()">Ajouter un utilisateur</button> 
        </div>
            <div class="card-body">
                <div class="table-responsive-sm ">
                    <table class="table table-striped table-sm ">
                        <thead class="thead-light">
                            <tr>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Last Name </th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($listUsers as $user)
                            @if ($user->id == Auth::user()->id)
                                @continue
                            @endif
                            <tr>
                                <td><img class="rounded-circle" width="40px" src="{{ asset("img/".$user->avatar) }}"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td><span class="badge badge-pill badge-success"> {{ $user->role }}</span></td>
                                <td>{{ $user->email }}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-primary btn-sm" onclick="openEditUserModal({{ $user->id }})"><i class="fa fa-edit"></i></button>
                                    </div>
                                    <div class="col">
                                        <form method="POST" action="{{ url('/users/'.$user->id) }}">
                                            @csrf
                                            {{@method_field("DELETE")}}
                                            <button type="supmit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            </tr>
                        @endforeach
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-2">
    {!! $listUsers->links("pagination::bootstrap-4") !!}
</div>
<script type="text/javascript">
    var loadFile = function(event) {
      var image = document.getElementById('output');
      image.src = URL.createObjectURL(event.target.files[0]);
      console.log();
    };
</script>
<script>
    $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
      });
    
    //_method:PATCH
      function addUserBlade(){
          $("#modalModal")[0].reset();
          $("#ModalTitle").text("Ajouter un utilisateur");
          $("#password-confirm").show();
          $('#modalEditUser').modal('show');

      }
      function openEditUserModal(id){
          $("#modalModal")[0].reset();
          $("#ModalTitle").text("Modifier");
          $('#modalModal').append("<input type='hidden' name='_method' value='PATCH'/>"); 
          //$("#password-confirm").hide();
          var user_id = id;
          $.get('/users/' + user_id +'/edit', function (data) {
              data = JSON.parse(data);
              $('#modalModal').attr('action', '{{ url("/users")}}'+"/"+data.id);
              $("#name").val(data.name);
              $("#last_name").val(data.last_name);
              $("#email").val(data.email);
              $("#user_role").val(data.role_id);
          })
          $('#modalEditUser').modal('show');
      }
  </script>
@endsection