@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <h3>Jenis Cuti</h3>
            <div class="card-body">
                @include('partials._flash_message')
                <a href="{{ route('jenis-cuti.create') }}" type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Jenis Cuti</a>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Cuti</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jenis_cutis as $index => $jenis_cuti)
                        <tr>
                            <td>{{ $index + $jenis_cutis->firstItem() }}</td>
                            <td>{{ $jenis_cuti->name }}</td>
                            <td>
                                {{ link_to(route('jenis-cuti.edit', ['id'=>$jenis_cuti->id]), 'Edit', ['class'=>'btn btn-primary']) }} &nbsp;
                                @component('partials.delete_form')
                                    @slot('route')
                                        {{ route('jenis-cuti.destroy', ['id'=>$jenis_cuti->id]) }}
                                    @endslot
                                @endcomponent
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $jenis_cutis->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
