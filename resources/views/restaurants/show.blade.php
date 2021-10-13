@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-danger">
                    <small class="">Restaurante</small>
                </h2>

                <p class="h1">{{ $restaurant->name }}</p>
                <img src="{{ asset('images/restaurant.png') }}" class="img-fluid" alt="...">
            </div>

            <div class="col">

                <div class="bd-example">
                    <details>
                        <summary
                            class="">Descripción.</summary>
                      <p class="container section">{{ $restaurant->description }}</p>
                    </details>
                </div>
                <br>

                <p> Servimos en {{ $restaurant->city }} en el horario de {{ $restaurant->schedule1 }} - {{ $restaurant->schedule2 }}.<br> </p> {{-- Cambiar schedule --}}


                @if ($restaurant->delivery == 'y')
                <i data-feather="phone-call"></i> Domicilios al {{ $restaurant->phone }}.<br>
                @else
                Para más información <i data-feather="phone-forwarded"></i> contáctenos al {{ $restaurant->phone }}.<br>
                @endif
                <br>

                @if ($restaurant->facebook || $restaurant->twitter || $restaurant->instagram || $restaurant->youtube)
                    Redes Sociales. <br>

                @endif

                @if ($restaurant->facebook)
                    <div class="btn-group" role="button" aria-label="Basic example">
                        <a class="btn btn-outline-primary mt-3" href="{{ $restaurant->facebook }}" target="_blank"><i data-feather="facebook"></i></a>

                    </div>
                @endif
                @if ($restaurant->twitter)
                    <div class="btn-group" role="button" aria-label="Basic example">
                        <a class="btn btn-outline-info mt-3" href="{{ $restaurant->twitter }}" target="_blank"><i data-feather="twitter"></i></a>

                    </div>
                @endif
                @if ($restaurant->instagram)
                    <div class="btn-group" role="button" aria-label="Basic example">
                        <a class="btn btn-outline-warning mt-3" href="{{ $restaurant->instagram }}" target="_blank"><i data-feather="instagram"></i></a>

                    </div>

                @endif
                @if ($restaurant->youtube)
                    <div class="btn-group" role="button" aria-label="Basic example">
                        <a class="btn btn-outline-danger mt-3" href="{{ $restaurant->youtube }}" target="_blank"><i data-feather="youtube"></i></a>

                    </div>
                @endif
                <br>
            </div>
        </div>
        {{-- Esto idealmente no queda aca sino dentro del form_fields pero por ahora es lo mejor que se logra, todavia 
            falta el formulario para poder hacer el CRUD de comentarios --}}
            @foreach ($comments as $comment)
            <div class="row">
                <div class="col md-3 mt-3">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                            <div class="fw-bold">
                                <div class="row">
                                    {{ $comment->user->name }}
                                    @for($i = 0; $i < $comment->score; $i++)
                                    <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                            {{ $comment->comment }}
                        </div>
                        </li>
                    </ol>
                </div>

            </div>
    @endforeach
    </div>

        <div class="btn-group" role="group" aria-label="Basic example">

            <a class="btn btn-warning mt-3" href="{{ route('restaurants.edit', $restaurant->id) }}">Editar</a>

            {{ Form::open(['route' => ['restaurants.destroy', $restaurant->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover el restaurante?\n¡Esta acción no se puede deshacer!\')']) }}
            <button type="submit" class="btn btn-danger mt-3">Remover</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
