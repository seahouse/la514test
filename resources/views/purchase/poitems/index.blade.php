@extends('navbarerp')

@section('main')
    <div class="panel-heading">
        <a href="{{ URL::to('purchase/poitems/' . $id . '/create') }}" class="btn btn-sm btn-success">新建</a>
{{--        <div class="pull-right" style="padding-top: 4px;">
            <a href="{{ URL::to('purchase/vendtypes') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> {{'客户类型管理', [], 'layouts'}}</a>
        </div> --}}
    </div>
    

    @if ($poitems->count())
    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>名称</th>
                <th>到期日</th>
                <th>订购数量</th>
                <th>单价</th>
                <th>运费</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($poitems as $poitem)
                <tr>
                    <td>
                        {{ $poitem->itemsite->item->item_number }}
                    </td>
                    <td>
                        {{ $poitem->duedate }}
                    </td>
                    <td>
                        {{ $poitem->qty_ordered }}
                    </td>
                    <td>
                        {{ $poitem->unitprice }}
                    </td>
                    <td>
                        {{ $poitem->freight }}
                    </td>
                    <td>
                        <a href="{{ URL::to('/purchase/poitems/'.$poitem->id.'/edit') }}" class="btn btn-success btn-sm pull-left">编辑</a>
                        {!! Form::open(array('route' => array('purchase.poitems.destroy', $poitem->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录?");')) !!}
                            {!! Form::submit('删除', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {!! $poitems->render() !!}
    @else
    <div class="alert alert-warning alert-block">
        <i class="fa fa-warning"></i>
        {{'无记录', [], 'layouts'}}
    </div>
    @endif    


@stop
