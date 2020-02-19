@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Edit Status Cuti</h3>
            </div>
            <div class="card-body">
                {{ Form::open(['url' => route('status-cuti.update',['id'=>$status_cuti->id]), 'method' => 'put', 'class'=>'form-horizontal']) }}
                @include('validation_error')
                @include('status_cuti.form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
