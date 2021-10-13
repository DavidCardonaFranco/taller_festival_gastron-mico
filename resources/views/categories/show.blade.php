@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-danger">
                    <small class="">Categoria</small>
                </h2>

                <p class="h1">{{ $category->name }}</p>
                {{-- <img src="{{ asset('images/restaurant.png') }}" class="img-fluid" alt="..."> --}}
            </div>

            <div class="col">

                <div class="bd-example">
                    <details>
                        <summary
                            class="">Descripción.</summary>
                            <p class="container section">{{ $category->description }}</p>
                    </details>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection