@extends('layouts.app')
@include('plugins.datatable')
@section('title')
    {{__('Nilai Kriteria Catin')}}
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
                    </div>
                </div>
                <div class="card_body">
                    <div class="col-12 p-3">
                        <div class="table-responsive">
                            <table id="catin_val_table" class="table table-sm table-striped dt-responsive">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="align-center text-center">{{__('#')}}</th>
                                        <th rowspan="2" class="align-center text-center" >{{__('Nama')}}</th>
                                        <th colspan={{count($criteria)*2}} class="text-center">{{__('Kriteria')}}</th>
                                        <th rowspan="2" class="align-center text-center" >{{__('Aksi')}}</th>
                                    </tr>
                                    <tr>
                                        @foreach ($criteria as $c)
                                        <th class="text-center">{{ ucfirst($c->name) }}</th>
                                        <th class="text-center">{{__('Konversi')}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catin as $key => $c)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$c->name}}</td>
                                        @if (count($data->where('catin_id', $c->id)) != 0)
                                        @foreach ($data->where('catin_id', $c->id) as $key => $d)
                                        <td class="text-center">{{$d->value}}</td>
                                        <td class="text-center">{{$d->conversion}}</td>
                                        @endforeach
                                        <td class="text-center">{{__('-')}}</td>
                                        @else
                                        @foreach ($criteria as $cr)
                                            <td class="text-center">{{__('NULL')}}</td>
                                            <td class="text-center">{{__('NULL')}}</td>
                                        @endforeach
                                        <td class="text-center">
                                            <a href="{{ route("penyuluh.formValue", $c->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-plus"></i>
                                                {{__('Tambah Nilai')}}
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
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
            $('#catin_val_table').DataTable({
                "language": {
                    "emptyTable": "Data Nilai Kriteria Catin Kosong"
                },
            });
        });

        function reloadTable(selector, counter) {
            setTimeout(function() {
                $(selector).DataTable().ajax.reload();
            }, 100);
        }
        
    </script>
@endpush