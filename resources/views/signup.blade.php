@extends('layouts.app')

@section('title', 'Chaninhas Game | Signup')

@section('navbar')
@endsection

@section('content')
    <div class="container w-50 p-4 bg-body-tertiary position-absolute top-50 start-50 translate-middle rounded-3 text-center">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <h4 class="mb-4">Cadastro</h4>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name-input" placeholder="Nome" name="name" value="{{ old('name') }}">
                <label for="name-input">Nome</label>
                @if ($errors->has('name'))
                    <ul style="list-style-type: none;" class="w-100 p-1 text-start fs-7 text-danger">
                        @foreach ($errors->get('name') as $errorName)
                            <li>{{ $errorName }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email-input" placeholder="Email" name="email" value="{{ old('email') }}">
                <label for="email-input">Email</label>
                @if ($errors->has('email'))
                    <ul style="list-style-type: none;" class="w-100 p-1 text-start fs-7 text-danger">
                        @foreach ($errors->get('email') as $errorEmail)
                            <li>{{ $errorEmail }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password-input" placeholder="Senha" name="password">
                <label for="password-input">Senha</label>
                @if ($errors->has('password'))
                    <ul style="list-style-type: none;" class="w-100 p-1 text-start fs-7 text-danger">
                        @foreach ($errors->get('password') as $errorPass)
                            <li>{{ $errorPass }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password-confirmation-input" placeholder="Senha" name="password_confirmation">
                <label for="password-confirmation-input">Confirme a senha</label>
            </div>
            <p class="mt-4 mb-4">Já possui conta? <a href="{{ route('login') }}">Faça login</a></p>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
    </div>
@endsection

@section('footer')
@endsection
