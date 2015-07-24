@extends('main')

@section('content')
    <h1>Edit Itemclass</h1>
    <hr/>
    
<!--     {!! Form::open(['method' => 'PATCH', 'action' => ['ItemclassesController@update', $itemclass->id]]) !!} -->
    {!! Form::model($itemclass, ['method' => 'PATCH', 'action' => ['ItemclassesController@update', $itemclass->id]]) !!}
        @include('itemclasses._form', ['submitButtonText' => 'Update Itemclass'])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop
