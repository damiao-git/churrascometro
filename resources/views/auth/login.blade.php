@extends('layout.app')

@section('title', 'Login')
@section('content')


    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="fw-bold text-secondary">Login</h2>
                    </div>
                    <div class="card-body p-5">
                        <div id="login_alert"></div>
                        <form action="#" method="post" id="login-form">
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control rounded-0" placeholder="Email" name="email"
                                    id="email" autocomplete="off">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" class="form-control rounded-0"
                                    placeholder="Senha" name="password" id="password" autocomplete="off">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('auth.forgot') }}" class="text-decoration-nome">Esqueceu a senha?</a>
                            </div>
                            <div class="mb-3 d-grid">
                                <input type="submit" class="btn btn-dark rounded-0" id="login_btn" value="Entrar">
                            </div>
                            <div class="text-center text-secondary">
                                <div>Não possui cadastro? <a href="{{ route('auth.register') }}">Registrar-se</a></div>

                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


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
