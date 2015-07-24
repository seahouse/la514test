@extends('main')

@section('content')
    <h1>Add a New Itemclass</h1>
    <hr/>
    
    {!! Form::open(['url' => '/itemclasses']) !!}
        @include('itemclasses._form', ['submitButtonText' => 'Add Itemclass'])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop
