@extends('navbarerp')

@section('main')
    <h1>编辑</h1>
    <hr/>
    
    {!! Form::model($image, ['method' => 'PATCH', 'action' => ['System\ImagesController@update', $image->id]]) !!}
        @include('system.images._form', ['submitButtonText' => '保存'])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

