<div class="form-group">
    {{ Form::label('departemen', 'Departemen &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::text('departemen', $departemen->name ?? null, ['placeholder'=>'e.g. Finance','class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Save Data',['class'=>'btn btn-success']) }}
    </div>
</div>
