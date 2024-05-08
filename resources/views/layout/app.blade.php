<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="http://localhost/churrascometro/app/Http/css/style.css" />
    <link rel="shortcut icon" href="http://localhost/churrascometro/app/Http/favicon.ico">
    <title>@yield('title')</title>
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary m-2 rounded-2">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Página principal</a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse collapse" id="navbarNav" style="">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('churrasco.index')}}">Churrasco</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('profile')}}">Usuario</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <main>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('js/function.js')}}"></script>
    @yield('script')
</body>

</html>
