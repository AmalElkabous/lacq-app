<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title trspan="authPortal"></title>
  <meta http-equiv="Content-Script-Type" content="text/javascript">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css")}}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}"> 
  <script src="{{ asset("assets/js/jquery-3.6.0.min.js")}}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/preloader.css') }}"> 
  <script src="{{ asset("assets/js/jquery.preloader.min.js")}}"></script>
  <script src="{{ asset("assets/js/bootstrap.min.js")}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="{{ asset("assets/css/font-awesome.min.css")}}" rel="stylesheet"/>
  <link href="https://auth.sso.elephant-vert.com/static/common/favicon.ico" rel="icon" type="image/vnd.microsoft.icon" sizes="16x16 32x32 48x48 64x64 128x128">
  <link href="https://auth.sso.elephant-vert.com/static/common/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" sizes="16x16 32x32 48x48 64x64 128x128">
</head>
<body class="scrollbar CostumScrolBar">
<!------------------------------------------------------------------------->
<!--   ****** NavBar ****** -->

<div class="navbarList">
  <div class='navbarItimes'>
    <!---<img  src="{{ asset('img/LOGO-EV_FR.png') }}" style="float:left;width: 90px;margin-left:20px;">--->
    <a class="dropbtn ml-5 mr-2" href="{{ url("/") }}" style="border-radius: 3px;" >Accueil</a>
    @if(Auth::user()->rol_id == 1)
      <a class="dropbtn" href="{{ url("/users") }}" style="border-radius: 3px; ">Utilisateurs</a>
    @endif
    <a class="dropbtn" href="{{ url("/clients") }}" style="border-radius: 3px; ">Clients</a>
    <a class="dropbtn" href="{{ url("/commandes") }}" style="border-radius: 3px; ">Commandes</a>
    <a class="dropbtn" href="{{ url("/dashboard") }}" style="border-radius: 3px; ">Dashboard</a>
    </div>
    <div class="dropdownList">
      <a class="dropbtn mr-2"  style= "border-radius: 3px;padding: 18px 15px;color:white;">Base de donnée <div class="separ"></div><i class="fa fa-caret-down" aria-hidden="true"></i> </a>
      <div class="dropdownList-one" style=" max-width: 150px;">
        <a class="dItem" href="{{url("/matrices")}}">Matrice</a>
        <a class="dItem" href="{{url("/menus")}}">Menu</a>
        <a class="dItem" href="{{url("/commercials")}}">Commercial</a>
      </div>
    </div>
<div style="float:right;" >
<a  style=" color: #f1f3ce;padding:16px;font-size: 14px;" class="text-uppercase"> {{ Auth::user()->name }} {{ Auth::user()->last_name }}</a>
<div class="dropdownList" >
  <div class='userInfoAvatar' >
    <a href="UserInfo.php" class="imgUser " ><img style="border-radius:50%" src="{{ asset('img/user.png') }}"></a>
    <div class="dropdownList-one"  style=" right: 0px; ">
      <a class="dItem" href="UserInfo.php">Mon compte</a>
      <a style="color:Black;"  class="dItem" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </div>
  </div>
</div>
</div>
</div>
<div class="px-3 mx-auto mt-5">
    @yield("content")
</div>
<!------------------------------------------------------------------------->


