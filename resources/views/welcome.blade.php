@extends('templates.mainTemplate')

@section('content')
  <div class="container full-height">
    <!-- @if (Route::has('login'))
    <div class="top-right links">
    @auth
    <a href="{{ url('/home') }}">Home</a>
    @else
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
    @endauth
  </div>
  @endif -->


    <div class="row valign-wrapper full-height">
      <a href="{{ route('usersAdmin') }}" class="card col l4 hoverable percent-50-height card-home">
        <div class="card-image">
          <img src="{{ asset("img/users.png") }}" >
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Administración</span>
        </div>
      </a>
      <a href="" class="card col l4 hoverable percent-50-height card-home">
        <div class="card-content">
          <span class="card-title">Médicos</span>
        </div>
      </a>
      <a href="" class="card col l4 hoverable percent-50-height card-home">
        <div class="card-content">
          <span class="card-title">Pacientes</span>
        </div>
      </a>
    </div>

  </div>
@endsection
