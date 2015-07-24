@extends('main')

@section('content')
    <h1>ItemClasses</h1>
    <hr/>
    
    @foreach($itemclasses as $itemclass)
        <item>
            <h2>
                <a href="{{ url('/itemclasses', $itemclass->id) }}">{{ $itemclass->name }}</a>
            </h2>            
        </item>
    @endforeach
@stop
