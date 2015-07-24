@extends('navbar')

@section('main')
    <div class="panel-heading">
        <a href="/items/create">新建</a>
<!--         <button type="button" class="btn btn-default">Middle</button> -->
    </div>
    
    <table class="table">
        <tr>
            <td>
                <b>Item Number</b>
            </td>
            <td>
                <b>Market Price</b>
            </td>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>
                    <a href="{{ url('/items', $item->id) }}">{{ $item->item_number }}</a>
                </td>
                <td>
                    {{ $item->marketprice }}
                </td>
            </tr>
        @endforeach
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
