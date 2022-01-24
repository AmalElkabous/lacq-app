@extends('layouts.master')
@section('content')
    <div class="container">
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ Auth::user()->last_name }} {{ Auth::user()->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/users/update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="container" style="position: relative;text-align: center;">
                                <img style="border-radius:50%; margin: 30px;" id="output" width="150" height="150"
                                    src="{{ asset('img/' . Auth::user()->avatar) }}" />
                                <div class="bottom-left"
                                    style="background-color:rgba(255,255,255,0.7); border-radius: 50%;width: 38px;height: 38px;padding-top: 0px;margin-right: 0 ;position: absolute;top: 140px;left:50% ;transform: translateX(-50%)">
                                    <div class="file btn" style="position: relative;overflow: hidden;">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        <input id="userimg" type="file" name="uAvatar"
                                            style="position:absolute;opacity: 0;right: 0;top: 0;" onchange="loadFile(event)"
                                            accept=".jpg,.png" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">{{ __('Nom') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ Auth::user()->name }}" required autocomplete="name"
                                        autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">{{ __('Prénom') }}</label>
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ Auth::user()->last_name }}" required autocomplete="last_name"
                                        autofocus>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="email">{{ __('Adresse mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row alert alert-danger">
                                <div class="form-group col-md-4">
                                    <label for="oldPassword">{{ __('Old Password') }}</label>
                                    <input id="oldPassword" type="password" class="form-control" name="oldPassword"
                                        autocomplete="oldPassword">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password-confirm">{{ __('Confirmer Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
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
