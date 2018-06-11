@extends('main')

@section('styles')
  <link rel="stylesheet" href="{{ url('css/login.css') }}">
@endsection

@section('content')
  <form class="form-signin" action="{{ url('auth/login') }}" method="POST">
    <div class="text-center mb-4">
      <h3 class="h3 mb-3">Basilisk</h3>
      <p>A skeleton application for the <a href="https://rougin.github.io/slytherin/">Slytherin</a> framework.</p>
    </div>

    <div class="form-label-group">
      <input type="email" name="email" id="input-email" class="form-control" placeholder="Email address" required autofocus>
      <label for="input-email">Email address</label>
    </div>

    <div class="form-label-group">
      <input type="password" name="password" id="input-password" class="form-control{{ session('flash.errors.password') ? ' is-invalid' : '' }}" placeholder="Password" required>
      <label for="input-password">Password</label>
      <div class="invalid-feedback">{{ session('flash.errors.password') }}</div>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    <p class="mt-5 mb-3 text-muted text-center">
      &copy; 2017-2018
      <a href="http://getbootstrap.com/docs/4.1/examples/floating-labels/">Bootstrap</a>
    </p>
  </form>

  {{-- {{ session()->delete('flash.errors.password') }} --}}
@endsection