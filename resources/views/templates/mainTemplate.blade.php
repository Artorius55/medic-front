<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sistema Médico</title>

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="{{ asset("css/materialize.css") }}"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="{{ asset("css/main.css") }}"/>
  <link type="text/css" rel="stylesheet" href="{{ asset("css/material_changes.css") }}"/>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset("js/materialize.min.js") }}"></script>
  <script type="text/javascript" src="{{ asset("js/main.js") }}"></script>

</head>
<body>

  <nav>
    <div class="nav-wrapper blue darken-1">
      <a href="#" class="brand-logo"><i class="large material-icons">local_hospital</i></a>
      <!--<ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul> -->
    </div>
  </nav>

  @yield('content')

</body>
</html>
