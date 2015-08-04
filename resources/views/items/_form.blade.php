<div class="form-group">
    {!! Form::label('item_number', '物料编号:') !!}
    {!! Form::text('item_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('item_name', '物料名称:') !!}
    {!! Form::text('item_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('item_descrip', '描述:') !!}
    {!! Form::text('item_descrip', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('itemclass_id', '物料类别:') !!}
    {!! Form::select('itemclass_id', $itemclasslist, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('itemtype_id', '物料类型:') !!}
    {!! Form::select('itemtype_id', $itemtypeList, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('marketprice', '价格:') !!}
    {!! Form::text('marketprice', '0.0', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
