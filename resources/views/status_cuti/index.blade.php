@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <h3>Status Cuti</h3>
            <div class="card-body">
                @include('partials._flash_message')
                <a href="{{ route('status-cuti.create') }}" type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Status Cuti</a>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Status Cuti</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($status_cutis as $index => $status_cuti)
                    <tr>
                        <td>{{ $index + $status_cutis->firstItem() }}</td>
                        <td>{{ $status_cuti->name }}</td>
                        <td>
                            {{ link_to(route('status-cuti.edit', ['id'=>$status_cuti->id]), 'Edit', ['class'=>'btn btn-primary']) }} &nbsp;
                            @component('partials.delete_form')
                                @slot('route')
                                    {{ route('status-cuti.destroy', ['id'=>$status_cuti->id]) }}
                                @endslot
                            @endcomponent
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $status_cutis->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
