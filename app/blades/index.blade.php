@extends('main')

@section('styles')
  <link rel="stylesheet" href="{{ url('css/home.css') }}">
@endsection

@section('content')
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">Basilisk</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link active" href="{{ url('/') }}">Home</a>
          @if (session()->get('user.name'))
            <a class="nav-link" href="{{ url('auth/logout') }}">Sign out</a>
          @else
            <a class="nav-link" href="{{ url('auth/login') }}">Sign in</a>
          @endif
        </nav>
      </div>
    </header>

    <main role="main" class="inner cover">
      <h1 class="cover-heading">Hello, {{ session()->get('user.name', 'Muggle-born') }}.</h1>
      <p class="lead">Basilisk is a skeleton application on top of the <a href="https://rougin.github.io/slytherin/">Slytherin</a> framework.</p>
      <h2>What's Inside?</h2>
      <ul>
        <li class="lead"><a href="https://github.com/rougin/authsum">Authsum</a> - yet another PHP authentication library</li>
        <li class="lead"><a href="https://laravel.com/docs/5.5/blade">Blade</a> - a templating engine provided by <a href="https://laravel.com/">Laravel</a></li>
        <li class="lead"><a href="https://github.com/vlucas/phpdotenv">Dotenv</a> - loads environment variables from <code>.env</code> files</li>
        <li class="lead"><a href="https://phinx.org/">Phinx</a> - a PHP database migrations for everyone</li>
        <li class="lead"><a href="https://github.com/vlucas/valitron">Valitron</a> - a simple, elegant, stand-alone validation library</li>
        <li class="lead"><a href="https://github.com/rougin/weasley">Weasley</a> - generators and helpers for the Slytherin framework</li>
      </ul>
    </main>

    <footer class="mastfoot mt-auto">
      <div class="inner">
        <p>Cover template for <a href="http://getbootstrap.com/docs/4.1/examples/cover/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      </div>
    </footer>
  </div>
@endsection