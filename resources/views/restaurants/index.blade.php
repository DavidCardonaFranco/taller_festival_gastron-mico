@extends('layouts.app')
@section('content')
    <table>
        @foreach ($restaurants as $restaurants)
            <tr>
                <td>{{$restaurants->name}}</td>
                <td>{{$restaurants->description}}</td>
            </tr>
        @endforeach

    </table>
@endsection


