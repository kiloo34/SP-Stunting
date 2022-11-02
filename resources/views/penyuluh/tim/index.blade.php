@extends('layouts.app')
@include('plugins.datatable')
@section('title')
    {{__('Tim')}}
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
                    <a href="{{ route('penyuluh.team.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i>
                        {{__('Tambah Data')}} {{ucfirst($title)}}
                    </a>
                </div>
            </div>
            <div class="card_body">
                <div class="col-12 p-3">
                    <div class="table-responsive">
                        <table id="tim_table" class="table table-sm table-striped dt-responsive">
                            <thead>
                                <th>{{__('#')}}</th>
                                <th>{{__('Nama')}}</th>
                                <th>{{__('Desa')}}</th>
                                <th>{{__('Total Anggota')}}</th>
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
            $('#tim_table').DataTable({
                "language": {
                    "emptyTable": "Data Tim Kosong"
                },
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('penyuluh.getDataTim') }}",
                "columns": [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'village', name: 'village'},
                    {data: 'count_tim', name: 'count_tim'},
                    {data: 'action', name: 'action'},
                ]
            });
        });
    </script>
@endpush