@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="card card-default">
      <div class="card-body">
        <div class="card-title">Login</div>
        <form class="form-horizontal" action="{{ url('auth/login') }}" method="POST">
          <div class="form-group">
            <label for="email" class="control-label">E-Mail Address</label>
            <input id="email" type="email" class="form-control" name="email" required autofocus>
          </div>

          <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <input id="password" type="password" class="form-control{{ session('flash.errors.password') ? ' is-invalid' : '' }}" name="password" required>
            <div class="invalid-feedback">{{ session('flash.errors.password') }}</div>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection