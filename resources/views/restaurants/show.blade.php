@extends('layouts.app')
@section('content')

    <div class="container">

        <h3>
            <small class="text-muted">Restaurante</small>
            {{ $restaurant->name }}

            <img src="/images/post/{{$restaurant->logo}}" alt="">
        </h3>

        Servimos en {{ $restaurant->city }} en el horario de {{ $restaurant->schedule ?? 'sin agenda definida' }}.<br>

        @if ($restaurant->delivery == 'y')
            Tenemos domicilios al número {{ $restaurant->phone }}.<br>
        @else
            Contáctenos para mas información al número {{ $restaurant->phone }}.<br>
        @endif

        @if ($restaurant->facebook || $restaurant->twitter || $restaurant->instagram || $restaurant->youtube)
            Redes Sociales. <br>

        @endif

        @if ($restaurant->facebook)
        <div class="btn-group" role="button" aria-label="Basic example">
            <a class="btn btn-light mt-3" href="{{$restaurant->facebook}}" target="_blank"><i data-feather="facebook"></i></a>

        </div>
        @endif
        @if ($restaurant->twitter )
        <div class="btn-group" role="button" aria-label="Basic example">
            <a class="btn btn-light mt-3" href="{{$restaurant->twitter}}" target="_blank"><i data-feather="twitter"></i></a>

        </div>
        @endif
        @if ($restaurant->instagram)
        <div class="btn-group" role="button" aria-label="Basic example">
            <a class="btn btn-light mt-3" href="{{$restaurant->instagram}}" target="_blank"><i data-feather="instagram"></i></a>

        </div>

        @endif
        @if ($restaurant->youtube)
        <div class="btn-group" role="button" aria-label="Basic example">
            <a class="btn btn-light mt-3" href="{{$restaurant->youtube}}" target="_blank"><i data-feather="youtube"></i></a>

        </div>
        @endif
        <br>


        {{-- Botones para editar y eliminar --}}

        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-warning mt-3" href="{{ route('restaurants.edit', $restaurant->id) }}">Editar</a>

            {{ Form::open(['route' => ['restaurants.destroy', $restaurant->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover el restaurante?\n¡Esta acción no se puede deshacer!\')']) }}
            <button type="submit" class="btn btn-danger mt-3">Remover</button>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
