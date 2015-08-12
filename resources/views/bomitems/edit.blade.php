@extends('navbarerp')

@section('main')
    <h1>{!! $bomitem->item->item_number !!}</h1>
    <hr/>
    
    {!! Form::model($bomitem, ['method' => 'PATCH', 'action' => ['BomitemsController@update', $bomitem->id]]) !!}
        @include('bomitems._form', ['submitButtonText' => '保存'])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop
