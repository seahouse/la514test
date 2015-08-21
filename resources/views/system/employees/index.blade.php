@extends('navbarerp')

@section('main')
    <div class="panel-heading">
        <a href="employees/create" class="btn btn-sm btn-success">新建</a>
       <div class="pull-right" style="padding-top: 4px;">
            <a href="{{ URL::to('system/depts') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> {{'部门管理', [], 'layouts'}}</a>
            <a href="{{ URL::to('system/images') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> {{'图片管理', [], 'layouts'}}</a>
        </div>
<!--         <h2> -->
<!--             {{ ('物料') }} -->
<!--         </h2> -->
    </div>
    
{{--    
    @if ($employees->count())
    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>省份</th>
                <th>城市</th>
                <th>地址</th>
                <th>创建日期</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($addrs as $addr)
                <tr>
                    <td>
                        {{ $addr->province->name }}
                    </td>
                    <td>
                        {{ $addr->city->name }}
                    </td>
                    <td>
                        {{ $addr->line1 }}
                    </td>
                    <td>
                        {{ $addr->created_at }}
                    </td>
                    <td>
                        <a href="{{ URL::to('/addr/addrs/'.$addr->id.'/edit') }}" class="btn btn-success btn-mini pull-left">编辑</a>
                        {!! Form::open(array('route' => array('addr.addrs.destroy', $addr->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录?");')) !!}
                            {!! Form::submit('删除', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {!! $addrs->render() !!}
    @else
    <div class="alert alert-warning alert-block">
        <i class="fa fa-warning"></i>
        {{'无记录', [], 'layouts'}}
    </div>
    @endif    
--}}
@stop
