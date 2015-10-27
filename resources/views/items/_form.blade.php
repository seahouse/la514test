<div class="form-group">
    {!! Form::label('item_number', '物料编号:', ['class' => 'col-sm-2 control-label']) !!}
    <div class='col-sm-10'>
    {!! Form::text('item_number', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('item_name', '物料名称:', ['class' => 'col-sm-2 control-label']) !!}
    <div class='col-sm-10'>
    {!! Form::text('item_name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('item_descrip', '描述:', ['class' => 'col-sm-2 control-label']) !!}
    <div class='col-sm-10'>
    {!! Form::text('item_descrip', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('itemclass_id', '物料类别:', ['class' => 'col-sm-2 control-label']) !!}
    <div class='col-sm-10'>
    {!! Form::select('itemclass_id', $itemclassList, null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('itemtype_id', '物料类型:', ['class' => 'col-sm-2 control-label']) !!}
    <div class='col-sm-10'>
    {!! Form::select('itemtype_id', $itemtypeList, null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('marketprice', '价格:', ['class' => 'col-sm-2 control-label']) !!}
    <div class='col-sm-10'>
    {!! Form::text('marketprice', $marketprice, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('charass', '属性:', ['class' => 'col-sm-2 control-label']) !!}
    <div class='col-sm-10'>
        <table class="table">
            <thead>
                <tr>
                    <th>属性</th>
                    <th>值</th>
                    <th>默认</th>
                    <th>价格</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{!! $item->charasses !!}</td>
                    </tr>
                    
                    <tr>
{{--                        <td><input class="btn btn-sm" type="button" value="+" onclick="addCharass()"></td> --}}
                        <td><button type="button" class="btn btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="{!! $item->id !!}">+</button></td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">添加属性</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">属性:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">值:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>


<script>
    function addCharass() {
        window.open("123.html", "newwindow","height=100, width=400, top=200,left=200,toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no,status=no");
        }
</script>