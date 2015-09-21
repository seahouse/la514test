@extends('navbarerp')

@section('main')
    <div class="panel-heading">
{{--        <a href="receiptpayments/create" class="btn btn-sm btn-success">新建</a>
       <div class="pull-right" style="padding-top: 4px;">
            <a href="{{ URL::to('system/roles') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> {{'角色管理', [], 'layouts'}}</a>
            <a href="{{ URL::to('system/images') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> {{'图片管理', [], 'layouts'}}</a> 
        </div>  --}}
    </div>
    

    @if ($receivables->count())
    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>客户</th>
                <th>订单总金额</th>
                <th>说明</th>
{{--                <th>操作</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($receivables as $receivable)
                <tr>
                    <td>
                        {{ $receivable->name }}
                    </td>
                    <td>
{{--                        {{ $receivable->soitems->selectRaw('SUM(qty * price) as total')->pluck('total') }} --}} 
                        {{ $receivable->sototalprice }} 
                    </td>
                    <td>
                        {{ $receivable->notes }}
                    </td>
{{--                    <td>
                        <a href="{{ URL::to('/system/userroles/'.$userrole->id.'/edit') }}" class="btn btn-success btn-sm pull-left">编辑</a> 
                        {!! Form::open(array('url' => '/sales/salesorders/' . $receiptpayment->sohead_id . '/receiptpayments/destroy/' . $receiptpayment->id, 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录?");')) !!}
                            {!! Form::submit('删除', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}  
                    </td> --}} 
                </tr>
            @endforeach
        </tbody>

    </table>
    {!! $receivables->render() !!}
    @else
    <div class="alert alert-warning alert-block">
        <i class="fa fa-warning"></i>
        {{'无记录', [], 'layouts'}}
    </div>
    @endif    

@stop
