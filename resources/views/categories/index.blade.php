@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Mis Categorias</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary"
            title="Crear una nueva categoria">Crear</a>
        <br>
        <br>
        <ul class="list-group list-group-flush">
        @foreach($categories as $category)
            <li class="list-group-item h4">
                <a href="{{ route('categories.show', $category->id) }}" title="Visitar a esta categoria">{{ $category->name }}</a>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-warning mt-3" href="{{ route('categories.edit', $category->id) }}">Editar</a>

                    {{ Form::open(['route' => [
                        'categories.destroy', $category->id],
                        'method' => 'delete',
                        'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover la categoria?\n¡Esta acción no se puede deshacer!\')'
                    ]) }}
                    <button type="submit" class="btn btn-danger mt-3">Remover</button>
                    {!! Form::close() !!}
                </div>
            </li>
        @endforeach
        </ul>
    </div>
@endsection
