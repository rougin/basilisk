@extends('layouts.master')

@section('content')
  <div class="container">
    <p>Hello, <a href="{{ url() }}">{{ session()->get('user.name', 'Muggle-born') }}</a>.</p>
    @if (session()->get('user'))
      <p><a href="{{ url('auth/logout') }}">Logout</a></p>
    @else
      <p><a href="{{ url('auth/login') }}">Login</a></p>
    @endif
  </div>
@endsection