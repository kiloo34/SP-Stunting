@extends('layouts.app')
@include('plugins.datatable')
@section('title')
    {{__('Catin')}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        {{__('List Data')}} {{ucfirst($title)}}
                    </h3>
                </div>
                <div class="card_body">
                    <div class="col-12 p-3">
                        <div class="table-responsive">
                            <table id="catin_table" class="table table-sm table-striped dt-responsive">
                                <thead>
                                    <th>{{__('#')}}</th>
                                    <th>{{__('Nama')}}</th>
                                    <th>{{__('NIK')}}</th>
                                    <th>{{__('Desa')}}</th>
                                    <th>{{__('Alamat')}}</th>
                                    <th>{{__('No Handphone')}}</th>
                                    <th>{{__('Status')}}</th>
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
            $('#catin_table').DataTable({
                "language": {
                    "emptyTable": "Data Catin Kosong"
                },
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('pkk.getDataCatin') }}",
                "columns": [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'nik', name: 'nik'},
                    {data: 'village', name: 'village'},
                    {data: 'address', name: 'address'},
                    {data: 'no_hp', name: 'no_hp'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action'},
                ]
            });
        });
    </script>
@endpush