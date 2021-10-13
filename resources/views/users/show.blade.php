@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-danger">
                    <small class="">Usuario</small>
                </h2>

                <p class="h1">{{ $user->name }}</p>
                {{-- <img src="{{ asset('images/restaurant.png') }}" class="img-fluid" alt="..."> --}}
            </div>
        </div>
        <div class="class col">
            <p> Mi dirección de correo electronico es {{ $user->email }}.</p> <br>
            <p> Este usuario es de tipo {{ $user->type }}.
        </div>
    </div>
@endsection