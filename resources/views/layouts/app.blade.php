<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- Bootstrap link --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- My css style --}}
    <link rel="stylesheet" href="{{ asset('css/game/game.css') }}">

    {{-- Material icons --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,-25" />

    {{-- Google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&display=swap">
</head>

<body class="bg-dark">
    @section('navbar')
        <nav class="navbar background-black">
            <div class="container-fluid">
                <a href="/" class="navbar-brand text-light">
                    <img src="{{ asset('images/brand.svg') }}" width="30" height="30" class="d-inline-block align-top text-light" alt="">
                    Chaninhas Game
                </a>
                <form action="{{ route('user.logout') }}" method="post" class="d-flex">
                    @csrf
                    @yield('buttons')
                    <button class="btn btn-outline-danger material-symbols-rounded rounded-3" type="submit">logout</button>
                </form>
            </div>
        </nav>
    @show
    <main>
        @yield('content')
    </main>
    @section('footer')
        <footer class="background-black text-center text-light mt-5">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Atividade:</h5>
                        <p>
                            Disciplina: Programação para Internet <br>
                            Professor: Marcelo Figueiredo Barbosa Júnior <br>
                            IFRN <i>campus</i> Santa Cruz/RN
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Desenvolvido por:</h5>
                        <p>
                            José Carlos da Paz Silva <br>
                            Júlia Katllyn Ayres da Costa <br>
                            Welida Souza Silva
                        </p>
                    </div>
                </div>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
                Todos os direitos reservados ©
            </div>
        </footer>
    @show
    {{-- Bootstrap script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
