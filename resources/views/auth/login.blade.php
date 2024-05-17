@extends('layout.app')

@section('title', 'Login')
@section('content')
<main>
    <div class="container">
        <div class="card">
            <div class="cabecalho">
                <h2>LOGIN</h2>
            </div>
            <hr>
            <div class="campos">
                <form action="#" method="post" id="login-form">
                    @csrf
                    <input type="email" placeholder="Email" name="email"
                    id="email" autocomplete="off">
                    <input type="password" placeholder="Senha" name="password" id="password" autocomplete="off">
                    <a href="{{ route('auth.forgot') }}">Esqueceu a senha?</a>
                    <a href="#"><button type="submit" id="login_btn">Entrar</button></a>
                </form>
            </div>
            <div class="registrar">
                <p>Não possui cadastro? <a href="{{ route('auth.register') }}">Registrar-se</a></p>
            </div>
        </div>
    </div>
</main>

@endsection
@section('script')
    <script>
        $(function() {
            $("#login-form").submit(function(e) {
                e.preventDefault();
                $("#login_btn").val("Please Wait...");
                $.ajax({
                    url: '{{ route('auth.login') }}',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 400) {
                            showError('email', res.messages.email);
                            showError('password', res.messages.password);
                            $("#login_btn").val("Login");
                        } else if (res.status == 401) {
                            $("#login_alert").html(showMessage('danger', res.messages));
                            $("#login_btn").val("Login");
                        } else {
                            if (res.status == 200 && res.messages == 'success') {
                                window.location = '{{ route('profile') }}';
                            }
                        }
                    }
                })
            })
        });
    </script>
@endsection
