<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">

    <title>Fuzzy Logic - {{ $title }}</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">Fuzzy Logic</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link {{ $title === "Home" ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ $title === "Data" ? 'active' : '' }}" href="{{ url('data') }}">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ $title === "Setting" ? 'active' : '' }}" href="{{ url('setting') }}">Setting</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ $title === "About" ? 'active' : '' }}" href="{{ url('about') }}">About</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="alert alert-light pt-5" role="alert">
          <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  @if ($title == 'Home')
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Home Page</li>
                  @else
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    @yield('breadcrumb')
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                  @endif
                </ol>
              </nav>
          </div>
      </div>
      <div class="container mt-3">
          @yield('content')
      </div>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
  </body>
  <footer class="mt-5">
    <div class="bg-info text-light pt-3">
      <div class="container d-flex justify-content-between">
        <h5>Fuzzy Logic</h5>
        <p>All Right Reserved 2021 - Sistem Pakar Fuzzy Logic.</p>
      </div>
    </div>
  </footer>
</html>