@extends('navbar')

@section('main')
    <h1>Add a New Item</h1>
    <hr/>
    
    {!! Form::open(['url' => '/items']) !!}
        @include('items._form', ['submitButtonText' => 'Add Item'])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop
