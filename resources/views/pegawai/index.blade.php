@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <h3>Data Pegawai</h3>
            <div class="card-body">
                @include('partials._flash_message')
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('pegawai.create') }}" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Pegawai</a>
                    </div>
                    <div class="col-sm-6 ">
                        <span class="pull-right">
                            {{ Form::open(['url'=>route('pegawai.search'),'method'=>'get']) }}
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
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pegawais as $index => $pegawai)
                        <tr>
                            <td>{{ $index + $pegawais->firstItem() }}</td>
                            <td>{{ $pegawai->name }}</td>
                            <td>{{ $pegawai->jabatan->name }}</td>
                            <td>{{ $pegawai->departemen->name }}</td>
                            <td>{{ $pegawai->user->email }}</td>
                            <td>
                                @if($pegawai->user->img_path)
                                    <img width="50px" src="{{ asset('storage/pegawai/'.$pegawai->user->img_path) }}" alt="{{ $pegawai->name }}">
                                @else
                                    <img width="50px" src="{{ asset('storage/pegawai/place_holder.jpg') }}" alt="{{ $pegawai->name }}">
                                @endif
                            </td>
                            <td>
                                {{ link_to(route('pegawai.edit', ['id'=>$pegawai->id]), 'Edit', ['class'=>'btn btn-primary']) }} &nbsp;
                                @component('partials.delete_form')
                                    @slot('route')
                                        {{ route('pegawai.destroy', ['id'=>$pegawai->id]) }}
                                    @endslot
                                    @slot('id')
                                        Hapus-{{ $pegawai->id }}
                                    @endslot
                                @endcomponent
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $pegawais->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
