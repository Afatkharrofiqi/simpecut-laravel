@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Form Departemen</h3>
            </div>
            <div class="card-body">
                {{ Form::open(['url' => route('departemen.store'),'class'=>'form-horizontal']) }}
                @include('validation_error')
                @include('departemen.form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
