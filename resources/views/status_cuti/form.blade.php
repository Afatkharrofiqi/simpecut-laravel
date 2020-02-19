<div class="form-group">
    {{ Form::label('status_cuti', 'Status Cuti &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::text('status_cuti', $status_cuti->name ?? null, ['placeholder'=>'e.g. Diterima','class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Save Data',['class'=>'btn btn-success']) }}
    </div>
</div>
