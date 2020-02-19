<div class="form-group">
    {{ Form::label('pegawai', 'Pegawai &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::select('pegawai_id', $pegawai, $pengajuan_cuti->pegawai_id ?? old('pegawai_id'), ['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('jenis_cuti_id', 'Jenis Cuti &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::select('jenis_cuti_id', $jenis_cuti, $pengajuan_cuti->jenis_cuti_id ?? old('jenis_cuti'), ['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('tanggal_mulai', 'Tanggal Mulai &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::text('tanggal_mulai', $pengajuan_cuti->tanggal_mulai ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('tanggal_selesai', 'Tanggal Selesai &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::text('tanggal_selesai', $pengajuan_cuti->tanggal_selesai ?? null, ['placeholder'=>now(),'class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('keterangan', 'Keterangan &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::text('keterangan', $pengajuan_cuti->keterangan ?? null, ['placeholder'=>'Training','class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('status', 'Status Cuti &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::select('status_cuti_id', $status_cuti, $pengajuan_cuti->status_cuti_id ?? old('departemen_id'), ['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Save Data',['class'=>'btn btn-success']) }}
    </div>
</div>
