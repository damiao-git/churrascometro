@extends('layout.app')

@section('title', 'Registre-se')
@section('content')


    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="fw-bold text-secondary">Registre-se</h2>
                    </div>
                    <div class="card-body p-5">
                        <div id="show_success_alert"></div>
                        <form action="#" method="post" id="register_form">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control rounded-0" id="name" name="name"
                                    placeholder="Nome completo" autocomplete="off">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control rounded-0" id="email" name="email"
                                    placeholder="Email" autocomplete="off">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="password"class="form-control rounded-0" id="password" name="password"
                                    placeholder="Senha" autocomplete="off">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="password"class="form-control rounded-0" id="cpassword" name="cpassword"
                                    placeholder="Confirme senha" autocomplete="off">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3 d-grid">
                                <input type="submit" class="btn btn-dark rounded-0" id="register_btn" value="Registrar-se">
                            </div>
                            <div class="text-center text-secondary">
                                <div>Já possui cadastro? <a href="{{ route('auth.login') }}">Login</a></div>
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
            $("#register_form").submit(function(e) {
                e.preventDefault();
                $("#register_btn").val("Please Wait...");
                $.ajax({
                    url: '{{ route('usuario.store') }}',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 400) {
                            showError('name', res.messages.name);
                            showError('email', res.messages.email);
                            showError('password', res.messages.password);
                            showError('cpassword', res.messages.cpassword);
                            $("#register_btn").val("Register");
                        } else if (res.status == 200) {
                            $("#show_success_alert").html(showMessage('success', res.messages));
                            $("#register_form")[0].reset();
                            removeValidationClasses("#register_form");
                            $("#register_btn").val("Register");
                        }
                    }
                })
            })
        });
    </script>
@endsection
