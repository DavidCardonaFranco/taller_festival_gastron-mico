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

                @foreach ($comments as $comment)
                    <div class="well well bs-component">
                        <div class="content">
                            {{!!$comments->comment!!}}
                        </div>
                    </div>
                @endforeach

                {{ Form::open(['route'=>['comments.create'], 'method'=>'post']) }}
                <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
                {{Form::label('comment','Comentarios',['class'=>'form-label'])}}
                {{Form::text('comment',null,['class'=>'form-control'])}}
                {{-- {{Form::label('score','Valoración',['class'=>'form-label'])}}
                {{Form::select('score',
                [1=>'1',2=>'2',3=>'3',4=>'4',5=>'5']null, ['class'=>form-control])}} --}}
                <div class="row mt-2 justify-content-end">
                    {{Form::submit ('Publicar',['class'=>'btn btn-primary'])}}
                    <a href="{{route('home')}}" class="btn btn-default">Cancelar</a>
                </div>

                {{!! Form::close() !!}}


                {{-- Comentarios --}}
            {{-- <div class="well well bs-component">
                <form route="comment.__invoke" class="form-horizontal" method="POST">
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{$error}}</p>
                    @endforeach

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>

                    @endif
                    @csrf
                    <input type="hidden" name="restaurant_id" value="{!!$restaurant->id!!}">

                    <fieldset>
                        <legend>Comentarios</legend>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Publicar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div> --}}
        </div>

    </div>


        {{-- Botones para editar y eliminar --}}

        <div class="btn-group" role="group" aria-label="Basic example">

            <a class="btn btn-warning mt-3" href="{{ route('restaurants.edit', $restaurant->id) }}">Editar</a>

            {{ Form::open(['route' => ['restaurants.destroy', $restaurant->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover el restaurante?\n¡Esta acción no se puede deshacer!\')']) }}
            <button type="submit" class="btn btn-danger mt-3">Remover</button>
            {!! Form::close() !!}



        @endsection
