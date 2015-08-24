@extends('navbarerp')

@section('main')
    <h1>编辑</h1>
    <hr/>
    
    
    <img src="{!! Storage::get('images/2015082403090912622.jpg') !!}" />
{{--    <img src="{!! $image->path !!}" />
    <img src="E:/myproject/la514test/trunk/storage/app/images/2015082403090912622.jpg" /> --}}
    
    {!! Form::model($image, ['method' => 'PATCH', 'action' => ['System\ImagesController@update', $image->id]]) !!}
        @include('system.images._form', ['submitButtonText' => '保存'])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

