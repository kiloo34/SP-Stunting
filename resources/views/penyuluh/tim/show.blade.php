@extends('layouts.app')
@include('plugins.datatable')
@include('plugins.sweetalert')
@section('title')
    {{__('Tim')}}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="info-box shadow">
            <span class="info-box-icon bg-primary">
                <i class="far fa-id-card"></i>
            </span>

            <div class="info-box-content">
                <h3>
                    {{ ucfirst($team->name) }}
                </h3>
                {{-- <span class="info-box-text">Shadows</span>
                <span class="info-box-number">Regular</span> --}}
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{__('List Data Pendamping')}} {{ucfirst($title)}}
                </h3>
            </div>
            <div class="card_body">
                <div class="col-12 p-3">
                    <div class="table-responsive">
                        <table id="list_tim_pendamping_table" class="table table-sm table-striped dt-responsive">
                            <thead>
                                <th>{{__('#')}}</th>
                                <th>{{__('Nama')}}</th>
                                <th>{{__('Peran')}}</th>
                                <th>{{__('Aksi')}}</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{__('List Data Pendamping')}}
                </h3>
            </div>
            <div class="card_body">
                <div class="col-12 p-3">
                    <div class="table-responsive">
                        <table id="pendamping_table" class="table table-sm table-striped dt-responsive">
                            <thead>
                                <th>{{__('#')}}</th>
                                <th>{{__('Nama')}}</th>
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
        var team_id = "{{ $team->id }}";
        // console.log(value);

        var list_anggota_pendamping_url = "{{ route('penyuluh.getDetailTimPendamping', ":id") }}";
        var list_anggota_url = "{{ route('penyuluh.getDetailAnggotaPendamping') }}";
        // var list_anggota_url = "{{ route('penyuluh.getDataUser') }}";

        list_anggota_pendamping_url = list_anggota_pendamping_url.replace(':id', team_id);
        
        $('#list_tim_pendamping_table').DataTable({
            "language": {
                "emptyTable": "Data Anggota Tim Pendamping Kosong"
            },
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": list_anggota_pendamping_url,
            "columns": [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'role', name: 'role'},
                {data: 'action', name: 'action'},
            ]
        });
        $('#pendamping_table').DataTable({
            "language": {
                "emptyTable": "Data Pendamping Kosong"
            },
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": list_anggota_url,
            "columns": [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'role', name: 'role'},
                {data: 'action', name: 'action'},
            ]
        });
    })

    function addToTeam(user_id) {
        var team_id = "{{ $team->id }}";
        var user_id = user_id;

        var url = "{{ route('penyuluh.updateToTeam', [":team", ":user"]) }}";
        url = url.replace(':team', team_id);
        url = url.replace(':user', user_id);

        console.log(team_id);
        console.log(user_id);
        console.log(url);

        const data = {
            // _method: 'PUT',
            _token: '{{ csrf_token() }}',
        }

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(data) {
                var icon = 'success'
                if (data.code == 500) {
                    icon = 'warning'
                }
                Swal.fire({
                    icon: icon,
                    title: data.message
                })

                reloadTable('#list_tim_pendamping_table', 100);
                reloadTable('#pendamping_table', 100);
            }
        });
    }
    function removeFromTeam(user_id) {
        var team_id = "{{ $team->id }}";
        var user_id = user_id;

        var url = "{{ route('penyuluh.removeFromTeam', [":team", ":user"]) }}";
        url = url.replace(':team', team_id);
        url = url.replace(':user', user_id);

        console.log(team_id);
        console.log(user_id);
        console.log(url);

        const data = {
            // _method: 'DELETE',
            _token: '{{ csrf_token() }}',
        }

        $.ajax({
            type: "DELETE",
            url: url,
            data: data,
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: data.message
                })

                reloadTable('#list_tim_pendamping_table', 100);
                reloadTable('#pendamping_table', 100);
            }
        });
    }

    function reloadTable(selector, counter) {
        setTimeout(function() {
            $(selector).DataTable().ajax.reload();
        }, 100);
    }
</script>
@endpush