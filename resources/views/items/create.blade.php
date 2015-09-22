@extends('navbarerp')

@section('main')
    <h2>物料 -- 添加物料</h2>
    <hr/>
    
    {!! Form::open(['url' => '/items']) !!}
        @include('items._form', ['submitButtonText' => '添加'])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop
