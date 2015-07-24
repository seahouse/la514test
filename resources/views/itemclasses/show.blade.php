@extends('main')

@section('content')
    <h1>{{ $itemclass->name }}</h1>
    <p>
        Description: {{ $itemclass->descrip }}
    </p>
@stop
