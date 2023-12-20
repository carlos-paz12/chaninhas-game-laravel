@extends('layouts.app')

@section('title', 'Chaninhas Game | Ranking')

@section('buttons')
    <a href="{{ route('game') }}" class="btn btn-outline-success material-symbols-rounded me-3 rounded-3">play_arrow</a>
    <a href="{{ route('user.show') }}"class="btn btn-outline-primary material-symbols-rounded me-3 rounded-3">person</a>
@endsection

@section('content')
    @if (!(count($games) === 0))
        <div class="card mt-4 m-auto p-3 background-black text-light" style="width: 18rem;">
            <p class="text-center align-middle">
                1º <span class="material-symbols-rounded align-middle text-warning fs-2">kid_star</span>
            </p>
            <img src="{{ asset('images/player.jpg') }}" alt="Player image" class="w-50 mt-1 m-auto" style="border-radius: 50%">
            <div class="card-body text-center">
                <h5 class="card-title fs-4">
                    {{ $games[0]->user->name }}
                </h5>
                <div class="container-fluid d-flex justify-content-around align-items-center flex-column">
                    <p class="card-text">
                        <span class="material-symbols-outlined align-middle text-success fw-semibold">done</span>
                        {{ $games[0]->hits }}
                        <br>
                        <span class="material-symbols-outlined align-middle text-danger fw-semibold">close</span>
                        {{ $games[0]->misses }}
                        <br>
                        <span class="material-symbols-outlined align-middle text-warning fw-semibold">schedule</span>
                        {{ $games[0]->end_game_datetime }}
                    </p>
                </div>
            </div>
        </div>
        @php
            unset($games[0]);
        @endphp
    @endif
    <table class="table table-dark table-bordered w-50 mt-4 m-auto table-striped text-center">
        <thead>
            <tr>
                <th scope="col" class="bg-warning text-dark">POSIÇÃO</th>
                <th scope="col" class="bg-warning text-dark">NOME</th>
                <th scope="col" class="bg-warning text-dark">ACERTOS</th>
                <th scope="col" class="bg-warning text-dark">ERROS</th>
                <th scope="col" class="bg-warning text-dark">DATA/HORA</th>
            </tr>
        </thead>
        <tbody>
            @if (count($games) === 0)
                <tr>
                    <td colspan="5">...</td>
                </tr>
            @else
                @foreach ($games as $g)
                    <tr>
                        <td scope="row"> {{ $loop->iteration + 1 }}º </td>
                        <td> {{ $g->user->name }} </td>
                        <td> {{ $g->hits }} </td>
                        <td> {{ $g->misses }} </td>
                        <td> {{ $g->end_game_datetime }} </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
