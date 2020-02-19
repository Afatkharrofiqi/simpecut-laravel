@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <h3>Departemen</h3>
            <div class="card-body">
                @include('partials._flash_message')
                <a href="{{ route('departemen.create') }}" type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Departemen</a>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Departemen</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departemens as $index => $departemen)
                        <tr>
                            <td>{{ $index + $departemens->firstItem() }}</td>
                            <td>{{ $departemen->name }}</td>
                            <td>
                                {{ link_to(route('departemen.edit', ['id'=>$departemen->id]), 'Edit', ['class'=>'btn btn-primary']) }} &nbsp;
                                @component('partials.delete_form')
                                    @slot('route')
                                        {{ route('departemen.destroy', ['id'=>$departemen->id]) }}
                                    @endslot
                                @endcomponent
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $departemens->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
