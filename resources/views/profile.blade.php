@extends('layout.app')

@section('title', 'Perfil')
@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="text-secondary fw-bold">Perfil</h2>
                        <a href="{{ route('auth.logout') }}" class="btn btn-dark">Logout</a>
                    </div>
                    <div class="card-body p-5">
                        <div id="profile_alert"></div>
                        <div class="row">
                            <div class="col-lg-4 px-4 text-center" style="border-right: 1px solid #999">

                                @if ($userInfo->picture)
                                    <img src="storage/images/{{ $userInfo->picture }}" id="image_preview"
                                        class="img-fluid rounded-circle img-tumbnail" width="200px">
                                @else
                                    <img src="{{ asset('img/profile_preview.jpg') }}" id="image_preview"
                                        class="img-fluid rounded-circle img-tumbnail" width="200px">
                                @endif
                                <div>
                                    <label for="picture">Mudar foto de perfil</label>
                                    <input type="file" name="picture" id="picture" class="form-control rounded-pill">
                                </div>
                            </div>
                            <input type="hidden" name="user_id" id="user_id" value="{{ $userInfo->id }}">
                            <div class="col-lg-8 px-5">
                                <form action="#" method="POST" id="profile_form">
                                    @csrf
                                    <div class="my-2">
                                        <label for="name">Nome completo</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control rounded-0 mb-3" value="{{ $userInfo->name }}">

                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control rounded-0 mb-3" value="{{ $userInfo->email }}">

                                        <label for="tel">Telefone</label>
                                        <input type="tel" name="tel" id="tel"
                                            class="form-control rounded-0 mb-3" value="{{ $userInfo->telefone }}">

                                        <label for="endereco">Endereço</label>
                                        <input type="endereco" name="endereco" id="endereco"
                                            class="form-control rounded-0 mb-3" value="{{ $userInfo->endereco }}">

                                        <label for="password">Senha</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control rounded-0 mb-3" value="">

                                        <input type="submit" id="profile_btn" class="btn btn-secondary float-end"
                                            value="Atualizar Perfil">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#picture").change(function(e) {
                const file = e.target.files[0];
                let url = window.URL.createObjectURL(file);
                $("#image_preview").attr('src', url);
                let fd = new FormData();
                fd.append('picture', file);
                fd.append('user_id', $("#user_id").val());
                fd.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: '{{ route('profile.image') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 200) {
                            $("#profile_alert").html(showMessage('success', res.messages));
                            $("#picture").val('');
                        }
                    }
                });

            });
            $("#profile_form").submit(function(e){
                e.preventDefault();
                let id = $("#user_id").val();
                $("#profile_btn").val('Updating...');
                $.ajax({
                    url: '{{ route('profile.update') }}',
                    method: 'post',
                    data: $(this).serialize()+ `&id=${id}`,
                    dataType: 'json',
                    success: function(res) {
                    // console.log(res);
                        if (res.status == 200) {
                            $("#profile_alert").html(showMessage('success', res.messages));
                            $("#picture").val('');
                        }
                    }
                });
            });
        });
    </script>
@endsection
