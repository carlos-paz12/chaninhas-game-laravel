@extends('layouts.app')

@section('title', 'Chaninhas Game')

@section('buttons')
    <a href="{{ route('game.ranking') }}" class="btn btn-outline-warning material-symbols-rounded me-3 rounded-3">emoji_events</a>
    <a href="{{ route('user.show') }}"class="btn btn-outline-primary material-symbols-rounded me-3 rounded-3">person</a>
@endsection

@section('content')
    <div class="w-50 mt-3 m-auto d-flex gap-3 text-light text-center fw-semibold">
        <div class="w-25 p-1">
            <span class="material-symbols-outlined align-middle text-warning">schedule</span>
            <span id="status_time" class="align-middle">30</span>
        </div>
        <div class="w-25 p-1">
            <span class="material-symbols-outlined align-middle text-success">done</span>
            <span id="status_hits" class="align-middle">0</span>
        </div>
        <div class="w-25 p-1">
            <span class="material-symbols-outlined align-middle text-danger">close</span>
            <span id="status_misses" class="align-middle">0</span>
        </div>
        <div class="w-25 p-1">
            <span class="material-symbols-outlined align-middle text-primary">emoji_flags</span>
            <span id="status_attempts" class="align-middle">0</span>
        </div>
    </div>
    {{--
        <section>
            <div>
                @if ($position) 
                    <p class="text-primary">{{ $position }}</p>
                @else
                    <p class="text-primary">Ainda não rankeado</p>
                @endif
            </div>
        </section>
    --}}
    <section id="game_scene" class="mt-3 m-auto shadow rounded-4" style="background-size: cover">
        <img id="game_target" src="{{ asset('images/chaninha.png') }}" draggable="false">
    </section>
    <section class="mt-4 m-auto w-25 text-center">
        <button id="game_btn-play" class="material-symbols-rounded rounded-5 btn w-25 text-light">play_arrow</button>
    </section>
    <div class="modal fade" id="game_popup" tabindex="-1" role="dialog" aria-labelledby="model-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 id="model-title" class="modal-title m-auto text-light">Parabéns, <span class="text-warning">{{ Auth::user()->name }}</span>!</h5>
                    {{--
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    --}}
                </div>
                <div class="modal-body">
                    <form id="game_popup__form" action="#" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="hits" id="game_popup__form_hits">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="misses" id="game_popup__form_misses">
                        </div>
                    </form>
                    <p class="text-light text-center">
                        Parabéns, jogador! Acesse o ranking para visualizar sua posição.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="game_popup__form" class="btn btn-sm btn-outline-warning m-auto">Ver Ranking</button>
                </div>
            </div>
        </div>
    </div>
    {{-- jQuery script --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- My js --}}
    <script src="{{ asset('js/game.js') }}"></script>
@endsection
