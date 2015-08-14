@extends('navbarerp')

@section('main')
    <h1>添加物料</h1>
    <hr/>
    
    {!! Form::open(['url' => '/items']) !!}
        @include('items._form', ['submitButtonText' => '添加'])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop
