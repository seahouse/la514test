@extends('navbarerp')

@section('main')
    <h1>编辑</h1>
    <hr/>
    
    {!! Form::model($item, ['method' => 'PATCH', 'action' => ['ItemsController@update', $item->id], 'class' => 'form-horizontal']) !!}
        @include('items._form', ['submitButtonText' => '保存', 'marketprice' => $item->marketprice, 'itemId' => $item->id])
    {!! Form::close() !!}
    
    @include('errors.list')
@endsection


@section('script')
<script type="text/javascript">
    $('#exampleModal').on('shown.bs.modal', function (event) {
    	  var button = $(event.relatedTarget) // Button that triggered the modal
    	  var recipient = button.data('whatever') // Extract info from data-* attributes
    	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    	  var modal = $(this)
    	  modal.find('.modal-title').text('New message to ' + recipient)
    	  modal.find('.modal-body input').val(recipient)
    	});
</script>

@endsection
