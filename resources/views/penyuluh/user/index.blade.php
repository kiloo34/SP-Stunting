@extends('layouts.app')
@include('plugins.datatable')
@section('title')
    {{__('User')}}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{__('List Data')}} {{ucfirst($title)}}
                </h3>
                <div class="card-tools">
                    <a href="{{ route('penyuluh.catin.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i>
                        {{__('Tambah Data')}} {{ucfirst($title)}}
                    </a>
                </div>
            </div>
            <div class="card_body">
                <div class="col-12 p-3">
                    <div class="table-responsive">
                        <table id="user_table" class="table table-sm table-striped dt-responsive">
                            <thead>
                                <th>{{__('#')}}</th>
                                <th>{{__('Nama')}}</th>
                                <th>{{__('NIK')}}</th>
                                <th>{{__('Desa')}}</th>
                                <th>{{__('Alamat')}}</th>
                                <th>{{__('No Handphone')}}</th>
                                <th>{{__('Username')}}</th>
                                <th>{{__('Peran')}}</th>
                                <th>{{__('Aksi')}}</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#user_table').DataTable({
            "language": {
                "emptyTable": "Data User Kosong"
            },
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('penyuluh.getDataUser') }}",
            "columns": [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'nik', name: 'nik'},
                {data: 'village', name: 'village'},
                {data: 'address', name: 'address'},
                {data: 'no_hp', name: 'no_hp'},
                {data: 'username', name: 'username'},
                {data: 'role', name: 'role'},
                {data: 'action', name: 'action'},
            ]
        });
    })
</script>
@endpush