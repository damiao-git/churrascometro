<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/style.css') }}" />
    <link rel="shortcut icon" href="{{ url('\img\favicon.ico')}}">
    <title>@yield('title')</title>
</head>

<body class="bg-dark">
    <header>
        <div class="logo">
            <a href="#"><img src="{{ url('img/android-chrome-512x512.png') }}" alt=""></a>
        </div>
        <div class="menu">
            <div class="menu_items">
                <ul>
                    <li><a href="{{route('profile')}}">Usuarios</a></li>
                    <li><a href="{{route('churrasco.index')}}">Churrascos</a></li>
                    <li><a href="#">Receitas</a></li>
                    <li><a href="#">Calculadora</a></li>
                </ul>
            </div>
        </div>
    </header>
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

    <footer>
        <div>
            <p>Desenvolvido por Damião</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('js/function.js')}}"></script>
    @yield('script')
</body>

</html>
