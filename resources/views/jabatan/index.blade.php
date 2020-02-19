@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <h3>Jabatan</h3>
            <div class="card-body">
                @include('partials._flash_message')
                <a href="{{ route('jabatan.create') }}" type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Jabatan</a>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Jabatan</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jabatans as $index => $jabatan)
                    <tr>
                        <td>{{ $index + $jabatans->firstItem() }}</td>
                        <td>{{ $jabatan->name }}</td>
                        <td>
                            {{ link_to(route('jabatan.edit', ['id'=>$jabatan->id]), 'Edit', ['class'=>'btn btn-primary']) }} &nbsp;
                            @component('partials.delete_form')
                                @slot('route')
                                    {{ route('jabatan.destroy', ['id'=>$jabatan->id]) }}
                                @endslot
                            @endcomponent
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $jabatans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
