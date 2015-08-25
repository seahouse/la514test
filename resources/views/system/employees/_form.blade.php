<div class="form-group">
    {!! Form::label('number', '编号:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', '姓名:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('dept_id', '部门:') !!}
    {!! Form::select('dept_id', $deptList, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('notes', '备注:') !!}
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image_id', '图片:') !!}
    {!! Form::select('image_id', $imageList, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('startdate', '入职日期:') !!}
    {!! Form::input('date', 'startdate', null, ['class' => 'form-control', 'id' => 'startdate']) !!}
{{--    {!! Form::input('date', 'startdate', date('Y-m-d'), ['class' => 'form-control']) !!} --}}
</div>


<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
