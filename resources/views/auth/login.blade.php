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
                        <form action="#" method="post" id="login-form">
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control rounded-0" placeholder="Email" autocomplete="off">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" class="form-control rounded-0"
                                    placeholder="Senha" autocomplete="off">
                            </div>
                            <div class="invalid-feedback"></div>
                            <div class="mb-3">
                                <a href="{{route('auth.forgot')}}" class="text-decoration-nome">Esqueceu a senha?</a>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-dark rounded-0">Entrar</button>
                            </div>
                            <div class="text-center text-secondary">
                                <div>Não possui cadastro? <a href="{{ route('auth.register')}}">Registrar-se</a></div>

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

@endsection
