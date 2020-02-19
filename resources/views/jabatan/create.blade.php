@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Form Jabatan</h3>
            </div>
            <div class="card-body">
                {{ Form::open(['url' => route('jabatan.store'),'class'=>'form-horizontal']) }}
                @include('validation_error')
                @include('jabatan.form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
