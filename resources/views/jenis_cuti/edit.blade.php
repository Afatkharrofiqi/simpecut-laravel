@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Edit Jenis Cuti</h3>
            </div>
            <div class="card-body">
                {{ Form::open(['url' => route('jenis-cuti.update',['id'=>$jenis_cuti->id]), 'method' => 'put', 'class'=>'form-horizontal']) }}
                @include('validation_error')
                @include('jenis_cuti.form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
