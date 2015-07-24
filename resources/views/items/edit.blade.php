@extends('main')

@section('content')
    <h1>Edit a New Item</h1>
    <hr/>
    
    {!! Form::model($item, ['method' => 'PATCH', 'action' => ['ItemsController@update', $item->id]]) !!}
        @include('items._form', ['submitButtonText' => 'Update Item'])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop