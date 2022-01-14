@extends('layouts.master')
@section('content')
<div class="container">
    @if($message=Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ $message}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ajouter une utilisateur') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/users') }}" enctype="multipart/form-data">
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
                            <div class="form-group col-md-6">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        

                        <div class="form-group">
                            <label for="email" >{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password" >{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        
                        <div class="form-group">
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
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var loadFile = function(event) {
      var image = document.getElementById('output');
      image.src = URL.createObjectURL(event.target.files[0]);
      console.log();
    };
</script>
@endsection