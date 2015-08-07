@extends('navbarerp')

@section('main')
    <h1>{!! $parentItem->item_number !!}</h1>
    <hr/>
    
    @if ($bomhead->count())
        {!! Form::model($bomhead, ['method' => 'PATCH', 'action' => ['BomsController@update', $bomhead->id]]) !!}
            @include('boms._form', ['submitButtonText' => '保存'])
        {!! Form::close() !!}
    @else
        {!! Form::open(['url' => '/boms']) !!}
            @include('boms._form', ['submitButtonText' => '添加'])
        {!! Form::close() !!}
    @endif
    
    <a href="items/create" class="btn btn-sm btn-success">新建</a>
        <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>物料编号</th>
                <th>物料类别</th>
                <th>名称</th>
                <th>物料类型</th>
                <th>创建日期</th>
                <th>BOM</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>

        </tbody>

    </table>
    
    @include('errors.list')
@stop
