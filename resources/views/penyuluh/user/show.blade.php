@extends('layouts.app')
@include('plugins.datatable')
@section('title')
    {{__('User')}}
@endsection

@section('content')
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        // $('#user_table').DataTable({
        //     "language": {
        //         "emptyTable": "Data User Kosong"
        //     },
        //     "responsive": true,
        //     "processing": true,
        //     "serverSide": true,
        //     "ajax": "{{ route('penyuluh.getDataUser') }}",
        //     "columns": [
        //         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        //         {data: 'name', name: 'name'},
        //         {data: 'nik', name: 'nik'},
        //         {data: 'village', name: 'village'},
        //         {data: 'address', name: 'address'},
        //         {data: 'no_hp', name: 'no_hp'},
        //         {data: 'username', name: 'username'},
        //         {data: 'role', name: 'role'},
        //         {data: 'action', name: 'action'},
        //     ]
        // });
    })
</script>
@endpush