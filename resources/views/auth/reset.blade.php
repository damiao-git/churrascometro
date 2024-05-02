@extends('layout.app')

@section('title', 'Recuperação de senha')
@section('content')


    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="fw-bold text-secondary">Redefinição de senha</h2>
                    </div>
                    <div class="card-body p-5">
                        <form action="#" method="post" id="reset-form">
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control rounded-0" placeholder="E-mail" autocomplete="off">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="password"class="form-control rounded-0" id="pass" placeholder="Crie uma nova senha" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <input type="password"class="form-control rounded-0" id="pass-confirm" placeholder="Confirme sua senha" autocomplete="off">
                            </div>
                            <div class="invalid-feedback"></div>

                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-dark rounded-0">Enviar</button>
                            </div>
                            <div class="text-center text-secondary">
                                <div>Voltar para <a href="{{ route('auth.login')}}">Página de login</a></div>
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
