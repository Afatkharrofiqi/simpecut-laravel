@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Edit Pegawai</h3>
            </div>
            <div class="card-body">
                {{ Form::open(['url' => route('pegawai.update',['id'=>$pegawai->id]), 'method' => 'put', 'class'=>'form-horizontal']) }}
                @include('validation_error')
                @include('pegawai.form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
