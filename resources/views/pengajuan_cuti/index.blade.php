@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <h3>Data Pengajuan Cuti</h3>
            <div class="card-body">
                @include('partials._flash_message')
                {{--  Search --}}
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('pengajuan-cuti.create') }}" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Pengajuan Cuti</a>
                    </div>
                    <div class="col-sm-6 ">
                        <span class="pull-right">
                            {{ Form::open(['url'=>route('pengajuan-cuti.search'),'method'=>'get']) }}
                            {{ Form::text('search', $search ?? null, ['placeholder'=>'Search', 'aria-controls'=>"table",'class'=>'form-control input-sm']) }}
                            {{ Form::close() }}
                        </span>
                    </div>
                </div>
                <br/>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Cuti</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pengajuan_cutis as $index => $pengajuan_cuti)
                        <tr>
                            <td>{{ $index + $pengajuan_cutis->firstItem() }}</td>
                            <td>{{ $pengajuan_cuti->pegawai->name }}</td>
                            <td>{{ $pengajuan_cuti->jenis_cuti->name }}</td>
                            <td>{{ $pengajuan_cuti->tanggal_mulai }}</td>
                            <td>{{ $pengajuan_cuti->tanggal_selesai }}</td>
                            <td>{{ $pengajuan_cuti->keterangan }}</td>
                            <td>{{ $pengajuan_cuti->status_cuti->name }}</td>
                            <td>
                                {{ link_to(route('pengajuan-cuti.edit', ['id'=>$pengajuan_cuti->id]), 'Edit', ['class'=>'btn btn-primary']) }} &nbsp;
                                @component('partials.delete_form')
                                    @slot('route')
                                        {{ route('pengajuan-cuti.destroy', ['id'=>$pengajuan_cuti->id]) }}
                                    @endslot
                                    @slot('id')
                                        Hapus-{{ $pengajuan_cuti->id }}
                                    @endslot
                                @endcomponent
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $pengajuan_cutis->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
