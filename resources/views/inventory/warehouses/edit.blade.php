@extends('navbarerp')

@section('main')
    <h1>编辑</h1>
    <hr/>
    
    {!! Form::model($warehouse, ['method' => 'PATCH', 'action' => ['Inventory\WarehousesController@update', $warehouse->id]]) !!}
        @include('inventory.warehouses._form', ['submitButtonText' => '保存'])
    {!! Form::close() !!}
    
    @include('errors.list')
@stop

