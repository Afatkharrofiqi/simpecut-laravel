@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Form Pegawai</h3>
            </div>
            <div class="card-body">
                {{ Form::open(['url' => route('pegawai.store'),'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                @include('validation_error')
                @include('pegawai.form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
