@extends('navbarerp')

@section('main')
    <h1>编辑</h1>
    <hr/>
    
    {!! Form::model($item, ['method' => 'PATCH', 'action' => ['ItemsController@update', $item->id], 'class' => 'form-horizontal']) !!}
        @include('items._form', ['submitButtonText' => '保存', 'marketprice' => $item->marketprice, 'itemId' => $item->id])
    {!! Form::close() !!}
    
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">添加属性</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="formCharass">
          <div class="form-group">
            <label for="recipient-name" class="control-label">属性:</label>
            {!! Form::select('char_id', $charIList, null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">值:</label>
            {!! Form::text('value', null, ['class' => 'form-control']) !!}
          </div>
          {!! Form::hidden('target_type', 'I', ['class' => 'form-control']) !!}
          {!! Form::hidden('target_id', $item->id, ['class' => 'form-control']) !!}
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnAddCharass">确定</button>
      </div>
    </div>
  </div>
</div>

    @include('errors.list')
@endsection


@section('script')
<script type="text/javascript">
    jQuery(document).ready(function(e) {
        $("#btnAddCharass").bind("click", function() {
     	    $.ajax({
         	    type:"POST",
         	    url:"{{ url('product/charasses/addrecord') }}",
         	    data:$("form#formCharass").serialize(),
         	    error:function(xhr, ajaxOptions, thrownError){
             	    alert('error');
					alert(xhr.status);
					alert(xhr.responseText);
					alert(ajaxOptions);
					alert(thrownError);
             	},
             	success:function(msg){
             	    alert('添加成功.');
              	    $('#exampleModal').modal('toggle');
					$.getJSON("{{ url('product/charasses/getCharassesByTargetId/I/' . $item->id) }}", 
							function(data) {
								var listItem = '';
								$.each(data, function(i, field){
									listItem += '<tr>'
										+ '<td>' + field.char_name + '</td>'
										+ '<td>' + field.value + '</td>'
										+ '<td>' + field.default_str + '</td>'
										+ '<td>' + field.price + '</td>'
										+ '</tr>';
								});		
						        
						        $("#charassTable tbody").empty().append(listItem);
							});
                },
         	});
  	  });
    });
    
    $('#exampleModal').on('shown.bs.modal', function (event) {
    	  var button = $(event.relatedTarget) // Button that triggered the modal
    	  var recipient = button.data('whatever') // Extract info from data-* attributes
    	  
    	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).

    	  
    	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    	  var modal = $(this)
//     	  modal.find('.modal-title').text('New message to ' + recipient)
//     	  modal.find('.modal-body input').val(recipient)
    	});

//     $('#exampleModal').on('hide.bs.modal', function (event) {
//     	location.reload();
//     	});
</script>

@endsection
