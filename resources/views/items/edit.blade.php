@extends('navbarerp')

@section('main')
    <h1>编辑</h1>
    <hr/>
    
    {!! Form::model($item, ['method' => 'PATCH', 'action' => ['ItemsController@update', $item->id], 'class' => 'form-horizontal']) !!}
        @include('items._form', ['submitButtonText' => '保存', 'marketprice' => $item->marketprice])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop
