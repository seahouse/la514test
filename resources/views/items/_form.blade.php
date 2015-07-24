<div class="form-group">
    {!! Form::label('item_number', 'Item Number:') !!}
    {!! Form::text('item_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('item_name', 'Item Name:') !!}
    {!! Form::text('item_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('item_descrip', 'Item Description:') !!}
    {!! Form::text('item_descrip', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('itemclass_id', 'Item Class:') !!}
    {!! Form::select('itemclass_id', $itemclasslist, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('itemtype_id', 'Item Type:') !!}
    {!! Form::select('itemtype_id', $itemtypeList, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('marketprice', 'Market Price:') !!}
    {!! Form::text('marketprice', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
