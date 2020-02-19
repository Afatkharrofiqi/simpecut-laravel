@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Edit Pegawai</h3>
            </div>
            <div class="card-body">
                {{ Form::open(['url' => route('pengajuan-cuti.update',['id'=>$pengajuan_cuti->id]), 'method' => 'put', 'class'=>'form-horizontal']) }}
                @include('validation_error')
                @include('pengajuan_cuti.form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
