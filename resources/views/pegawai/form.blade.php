<div class="form-group">
    {{ Form::label('pegawai', 'Pegawai &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::text('nama', $pegawai->name ?? old('nama'), ['placeholder'=>'e.g. Achmad','class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('email', 'Email &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::email('email', $pegawai->user->email ?? old('email'), ['placeholder'=>'e.g. achmad@brainmatics.com','class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('password', 'Password &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::password('password', ['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('confirm_password', 'Confirm Password &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::password('password_confirmation', ['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('jabatan', 'Jabatan &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::select('jabatan_id', $jabatan , $pegawai->jabatan_id ?? old('jabatan_id'), ['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('departemen', 'Departemen &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::select('departemen_id', $departemen, $pegawai->departemen_id ?? old('departemen_id'), ['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('img_path', 'Upload Foto &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::file('img_path', ['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Save Data',['class'=>'btn btn-success']) }}
    </div>
</div>
