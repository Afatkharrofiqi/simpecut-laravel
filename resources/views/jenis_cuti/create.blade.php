@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Form Jenis Cuti</h3>
            </div>
            <div class="card-body">
                {{ Form::open(['url' => route('jenis-cuti.store'),'class'=>'form-horizontal']) }}
                @include('validation_error')
                @include('jenis_cuti.form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
