@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Edit Departemen</h3>
            </div>
            <div class="card-body">
                {{ Form::open(['url' => route('departemen.update',['id'=>$departemen->id]), 'method' => 'put', 'class'=>'form-horizontal']) }}
                @include('validation_error')
                @include('departemen.form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
