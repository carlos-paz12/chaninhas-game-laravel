@extends('layouts.app')

@section('title', 'Chaninhas Game | Ranking')

@section('buttons')
    <a href="{{ route('game') }}" class="btn btn-outline-success material-symbols-rounded me-3 rounded-3">play_arrow</a>
    <a href="{{ route('game.ranking') }}" class="btn btn-outline-warning material-symbols-rounded me-3 rounded-3">emoji_events</a>
@endsection

@section('content')
    <main style="height: 62vh">
        <div class="container-fluid mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-md-9 col-lg-7 col-xl-5">
                    <div class="card rounded-2 background-black">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <img src="{{ asset('images/player.jpg') }}" alt="User authenticate image" class="w-25 h-25" style="border-radius: 50%">
                                <h5 class="mt-2 text-light text-light ">{{ Auth::user()->name }}</h5>
                                <p class="text-light fs-4 mt-4 align-middle">
                                    @if ($position)
                                        {{ $position }}º
                                    @else
                                        Ainda não rankeado
                                    @endif
                                    <span class="material-symbols-rounded text-warning align-middle">emoji_events</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
