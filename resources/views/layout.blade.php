<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login példaoldal</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/mystyle.css')}}">
    <!-- Font Awesome Solid -->
    <link href="{{asset('assets/fontawesome/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/fontawesome/css/solid.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>
</head>
<body class="bg-light">
    <div class="container-fluid bg-dark">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark container">
        <a class="navbar-brand" href="/">Főoldal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/reg">Regisztráció</a>
            </li>
          </ul>
          <div class="ms-auto">
            @auth
            <span class="text-white">Szia {{Auth::user()->name}}</span>
            <a class="fs-4 me-2" href="/mypage"><i class="fa-solid fa-user"></i></a>
            <a class="fs-4 me-2" href="/logout"><i class="fa-solid fa-right-from-bracket"></i></a>
            @else
            <a class="fs-4 me-2" href="/login"><i class="fa-solid fa-user"></i></a>
            @endauth
          </div>
        </div>
      </nav>
    </div>

    @yield('content')

<footer class="container text-center">
    <hr>
    <p>Csőke Balázs Zsolt 13.A / 2025.01.08</p>
</footer>
</body>
</html>
