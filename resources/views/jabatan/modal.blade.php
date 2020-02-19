<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    {{ Form::open(['url' => $url ?? "",'method'=>$method ?? ""]) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tambah Jabatan</h3>
            </div>
            <div class="modal-body form">
                <div class="form-body">
                    <div class="form-group">
                        {{ Form::label('jabatan', 'Jabatan &nbsp;' ,['class'=>'control-label']) }}
                        {{ Form::text('jabatan', null, ['placeholder'=>'Kepala Staff','class'=>'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <a href="{{ route('jabatan.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    {{ Form::close() }}
</div><!-- /.modal -->
@section('custom_script')
    <script>
        @if($open ?? false)
        $(document).ready(function(){
            $("#modal_form").modal('show');
        });
        @endif
    </script>
@endsection
<!-- End Bootstrap modal -->
