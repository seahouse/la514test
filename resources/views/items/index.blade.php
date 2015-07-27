@extends('navbar')

@section('main')
    <div class="panel-heading">
        <a href="/items/create">新建</a>
<!--         <button type="button" class="btn btn-default">Middle</button> -->
    </div>
    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Item Number</th>
                <th>Market Price</th>
                <th>Operate</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>
                        <a href="{{ url('/items', $item->id) }}">{{ $item->item_number }}</a>
                    </td>
                    <td>
                        {{ $item->marketprice }}
                    </td>
                    <td>
                        <a href="{{ url('/items/'.$item->id.'/edit') }}" class="btn btn-success btn-mini pull-left">Edit</a>
                        {!! Form::open(array('route' => array('items.destroy', $item->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) !!}
                            <button type="submit" href="{{ URL::route('items.destroy', $item->id) }} " class="btn btn-danger btn-mini">Delete</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {!! $items->render() !!}
    
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
