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
                        {{__('List Data')}} {{ucfirst($title)}} {{ucfirst($subtitle)}} {{ucfirst($catin->name)}}
                    </h3>
                </div>
                <div class="card_body">
                    <div class="col-12 p-3">
                        <div class="table-responsive">
                            <table id="history_catin_table" class="table table-sm table-striped dt-responsive">
                                <thead>
                                    <th>{{__('#')}}</th>
                                    <th>{{__('Nama Kriteria')}}</th>
                                    <th>{{__('Nilai')}}</th>
                                    <th>{{__('Dibuat tanggal')}}</th>
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
            var catin_id = '{{ $catin->id }}'
            console.log(catin_id);
            var url = '{{ route("bidan.historycriteria.geAlltHistory", ':catin') }}';
            url = url.replace(':catin', catin_id)

            $('#history_catin_table').DataTable({
                "language": {
                    "emptyTable": "Data History Kosong"
                },
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "ajax": url,
                "columns": [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'criteria_name', name: 'criteria_name'},
                    {data: 'value', name: 'value'},
                    {data: 'created_at', name: 'created_at'},
                //     {data: 'address', name: 'address'},
                //     {data: 'no_hp', name: 'no_hp'},
                //     {data: 'status', name: 'status'},
                ]
            });
        });
    </script>
@endpush