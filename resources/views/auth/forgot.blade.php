@extends('layout.app')

@section('title', 'Recuperação de senha')
@section('content')


    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="fw-bold text-secondary">Esqueci minha senha</h2>
                    </div>
                    <div class="card-body p-5">
                        <form action="#" method="post" id="forgot-form">
                            @csrf
                            <div>
                                <p>Digite abaixo seu email cadastrado, lhe enviaremos um link para recuperação.</p>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control rounded-0" placeholder="Digite seu email" autocomplete="off">
                                <div class="invalid-feedback"></div>
                            </div>
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
