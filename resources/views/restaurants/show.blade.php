@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-danger">

                    <small class="">Restaurante {{-- de {{$owner->id}} --}} </small>
                </h2>

                <p class="h1">{{ $restaurant->name }}</p>
                <img src="{{ asset('images/restaurant.png') }}" class="img-fluid" alt="...">

            </div>

            <div class="col">

                <div class="bd-example">
                    <details>
                        <summary class="">Descripción.</summary>
                        <p class="container section">{{ $restaurant->description }}</p>
                    </details>
                </div>
                <br>

                <p> Servimos en {{ $restaurant->city }} en el horario de {{ $restaurant->schedule1 }} -
                    {{ $restaurant->schedule2 }}.<br> </p> {{-- Cambiar schedule --}}


                @if ($restaurant->delivery == 'y')
                    <i data-feather="phone-call"></i> Domicilios al {{ $restaurant->phone }}.<br>
                @else
                    Para más información <i data-feather="phone-forwarded"></i> contáctenos al
                    {{ $restaurant->phone }}.<br>
                @endif
                <br>

                @if ($restaurant->facebook || $restaurant->twitter || $restaurant->instagram || $restaurant->youtube)
                    Redes Sociales. <br>

                @endif

                @if ($restaurant->facebook)
                    <div class="btn-group" role="button" aria-label="Basic example">
                        <a class="btn btn-outline-primary mt-3" href="{{ $restaurant->facebook }}" target="_blank"><i
                                data-feather="facebook"></i></a>

                    </div>
                @endif
                @if ($restaurant->twitter)
                    <div class="btn-group" role="button" aria-label="Basic example">
                        <a class="btn btn-outline-info mt-3" href="{{ $restaurant->twitter }}" target="_blank"><i
                                data-feather="twitter"></i></a>

                    </div>
                @endif
                @if ($restaurant->instagram)
                    <div class="btn-group" role="button" aria-label="Basic example">
                        <a class="btn btn-outline-warning mt-3" href="{{ $restaurant->instagram }}" target="_blank"><i
                                data-feather="instagram"></i></a>

                    </div>

                @endif
                @if ($restaurant->youtube)
                    <div class="btn-group" role="button" aria-label="Basic example">
                        <a class="btn btn-outline-danger mt-3" href="{{ $restaurant->youtube }}" target="_blank"><i
                                data-feather="youtube"></i></a>

                    </div>
                @endif
                <br>

                {{-- Comentarios --}}

                <div class="well well bs-component">
                    {!! Form::open(['route' => ['comments.store'], 'method' => 'post']) !!}
                    <div class="mb-3">
                        {{ Form::label('comment', 'Realizar un comentario.', ['class' => 'form-label']) }}
                        {{ Form::textArea('comment', null, ['class' => 'form-control']) }}
                        {{ Form::hidden('restaurant_id', $restaurant->id) }}
                    </div>
                    <div class="mb-3">
                        {{ Form::label('score', 'Puntuar restaurante.', ['class' => 'form-label']) }}
                        {{ Form::select('score', [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'], null, ['class' => 'form-control']) }}
                    </div>
                    {{ Form::submit('Crear', ['class' => 'btn btn-primary']) }}
                    {!! Form::close() !!}

                </div>

                @foreach ($comments as $comment)
                    <div class="row mt-3">
                        <div class="col">
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2">
                                        <div class="fw-bold">
                                            <div class="row">
                                                <b>{{ $comment->user->name }}</b>
                                                <br>
                                                @for ($i = 0; $i < $comment->score; $i++)
                                                    <i class="fas fa-star"></i><p>.</p>
                                                @endfor
                                            </div>
                                        </div>
                                        {{ $comment->comment }}
                                    </div>
                                    @if (Auth::user()->type == 'admin')
                                        {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Esta segura que desea remover el comentario?\nEsta acción no se puede deshacer.\')']) !!}
                                        <button type="submit" class="btn btn-danger mt-3" onsubmit="">Remover</button>
                                        {!! Form::close() !!}
                                    @endif

                                </li>
                            </ol>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>
        <div class="btn-group" role="group" aria-label="Basic example">

            <a class="btn btn-warning mt-3" href="{{ route('restaurants.edit', $restaurant->id) }}">Editar</a>

            {{ Form::open(['route' => ['restaurants.destroy', $restaurant->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Está seguro que desea remover el restaurante?\n¡Esta acción no se puede deshacer!\')']) }}
            <button type="submit" class="btn btn-danger mt-3">Remover</button>
            {!! Form::close() !!}
        </div>
    </div>

    @endsection
