@extends('layouts.app')

@section('title', 'Chaninhas Game | Login')

{{-- {{ $errors }} --}}

@section('navbar')
@endsection

@section('content')
    <div class="container w-25 p-4 bg-body-tertiary position-absolute top-50 start-50 translate-middle rounded-3 text-center">
        <form action="{{ route('user.login') }}" method="post">
            @csrf
            <h4 class="mb-4">Bem vindo!</h4>
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
            <div class="form-floating">
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
            @if ($errors->has('auth-failure'))
                <ul style="list-style-type: none;" class="w-100 mt-3 p-1 text-center fs-7 text-danger">
                    @foreach ($errors->get('auth-failure') as $errorAuth)
                        <li>{{ $errorAuth }}</li>
                    @endforeach
                </ul>
            @endif
            <p class="mt-4 mb-4">Não tem uma conta? <a href="{{ route('login.signup') }}">Cadastre-se</a></p>
            <button type="submit" class="btn btn-success">Entrar</button>
        </form>
    </div>
@endsection

@section('footer')
@endsection
