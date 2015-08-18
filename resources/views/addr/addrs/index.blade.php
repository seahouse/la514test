@extends('navbarerp')

@section('main')
    <div class="panel-heading">
        <a href="addrs/create" class="btn btn-sm btn-success">新建</a>
       <div class="pull-right" style="padding-top: 4px;">
            <a href="{{ URL::to('addr/citys') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> {{'城市管理', [], 'layouts'}}</a>
        </div>
<!--         <h2> -->
<!--             {{ ('物料') }} -->
<!--         </h2> -->
    </div>
    
    @if ($addrs->count())
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
            @foreach($items as $item)
                <tr>
                    <td>
                        <a href="{{ url('/items', $item->id) }}">{{ $item->item_number }}</a>
                    </td>
                    <td>
<!--                         {{ $item->market_price }} -->
                        {{ $item->itemclass->name }}
                    </td>
                    <td>
                        {{ $item->item_name }}
                    </td>
                    <td>
                        {{ $item->itemtype->name }}
                    </td>
                    <td>
                        {{ $item->created_at }}
                    </td>
                    <td>
                        @if ($item->itemtype->name == '生产' || $item->itemtype->name == '采购')
                            <a href="{{ URL::to('boms/' . $item->id . '/edit') }}" target="_blank">编辑</a>
                        @else
                            --
                        @endif
                    </td>
                    <td>
                        <a href="{{ URL::to('/items/'.$item->id.'/edit') }}" class="btn btn-success btn-mini pull-left">编辑</a>
                        {!! Form::open(array('route' => array('items.destroy', $item->id), 'method' => 'delete', 'onsubmit' => 'return confirm("确定删除此记录?");')) !!}
                            {!! Form::submit('删除', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {!! $items->render() !!}
    @else
    <div class="alert alert-warning alert-block">
        <i class="fa fa-warning"></i>
        {{'无记录', [], 'layouts'}}
    </div>
    @endif
    
<!--     <nav> -->
<!--         <ul class="pagination"> -->
<!--             <li> -->
<!--                 <a href="#" aria-label="Previous"> -->
<!--                     <span aria-hidden="true">&laquo;</span> -->
<!--                 </a>                 -->
<!--             </li> -->
<!--             <li><a href="#">1</a></li> -->
<!--             <li><a href="#">2</a></li> -->
<!--             <li><a href="#">3</a></li> -->
<!--             <li><a href="#">4</a></li> -->
<!--             <li><a href="#">5</a></li> -->
<!--             <li> -->
<!--                 <a href="#" aria-label="Next"> -->
<!--                     <span aria-hidden="true">&raquo;</span> -->
<!--                 </a> -->
<!--             </li> -->
<!--         </ul> -->
<!--     </nav> -->
@stop
