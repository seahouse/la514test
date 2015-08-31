@extends('navbarerp')

@section('main')
    <div class="panel-heading">
        <a href="salesorders/create" class="btn btn-sm btn-success">新建</a>
       <div class="pull-right" style="padding-top: 4px;">
            <a href="{{ URL::to('sales/salesreps') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> {{'销售代表管理', [], 'layouts'}}</a>
            <a href="{{ URL::to('sales/terms') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> {{'付款条款管理', [], 'layouts'}}</a>
        </div>
    </div>
    

    @if ($salesorders->count())
    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>编号</th>
                <th>客户</th>
                <th>订单日期</th>
                <th>销售代表</th>
                <th>物料</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesorders as $salesorder)
                <tr>
                    <td>
                        {{ $salesorder->number }}
                    </td>
                    <td>
                        {{ $salesorder->custinfo->name }}
                    </td>
                    <td>
                        {{ $salesorder->orderdate }}
                    </td>
                    <td>
                        @if (isset($salesorder->salesrep->name)) {{ $salesorder->salesrep->name }} @endif
                    </td>
                    <td>
                        <a href="{{ URL::to('/sales/soitems/' . $salesorder->id . '/list') }}" target="_blank">明细</a>
                    </td>
                    <td>
                        <a href="{{ URL::to('/sales/salesorders/'.$salesorder->id.'/edit') }}" class="btn btn-success btn-sm pull-left">编辑</a>
                        <a href="{{ URL::to('/sales/salesorders/' . $salesorder->id . '/ship') }}" class="btn btn-success btn-sm pull-left">发货</a>
                        {!! Form::open(array('route' => array('sales.salesorders.destroy', $salesorder->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录?");')) !!}
                            {!! Form::submit('删除', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {!! $salesorders->render() !!}
    @else
    <div class="alert alert-warning alert-block">
        <i class="fa fa-warning"></i>
        {{'无记录', [], 'layouts'}}
    </div>
    @endif    

@stop
