@extends('layouts.app')
@section('title')
    {{__('user')}}{{ isset($subtitle) ? ' | ' . ucfirst($subtitle) : '' }}
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{ucfirst($subtitle)}} {{__('Data')}} {{ucfirst($title)}}
                </h3>
            </div>
            <form action="{{ route('penyuluh.user.store') }}" class="form-horizontal" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="userName" class="col-sm-2 col-form-label">{{__('Nama')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="userName" placeholder="Nama User" value="{{ old('name') }}">
                            @error('name')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="userNIK" class="col-sm-2 col-form-label">{{__('NIK')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="userNIK" placeholder="NIK" value="{{ old('nik') }}">
                            @error('nik')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="userNo_hp" class="col-sm-2 col-form-label">{{__('No Handphone')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="userNo_hp" placeholder="No Handphone" value="{{ old('no_hp') }}">
                            @error('no_hp')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="userAlamat" class="col-sm-2 col-form-label">{{__('Alamat')}}</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" id="userAlamat" class="form-control @error('alamat') is-invalid @enderror" rows="5"></textarea>
                            @error('alamat')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="userDesa" class="col-sm-2 col-form-label">{{__('Desa')}}</label>
                        <div class="col-sm-10">
                            <select name="village" class="form-control @error('village') is-invalid @enderror" id="userDesa"></select>
                            @error('village')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="userRole" class="col-sm-2 col-form-label">{{__('Peran')}}</label>
                        <div class="col-sm-10">
                            <select name="role" class="form-control @error('role') is-invalid @enderror" id="userRole"></select>
                            @error('role')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('penyuluh.user.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-success btn-sm float-right">{{__('Tambah Data')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        getDataStatus();
        getDataVillage();
    })

    function getDataVillage() {
        var url = '{{ route("penyuluh.getDataUserDesa") }}';
        $.get(url, function(data) {
            var select = $('#userDesa');
            select.append('<option value="">Pilih Desa</option>')
            $.each(data.data, function(key, value) {
                select.append('<option value=' + value.id + '>' + value.name + '</option>');
            });
        });
    }

    function getDataStatus() {
        var url = '{{ route("penyuluh.getDataUserRole") }}';
        $.get(url, function(data) {
            var select = $('#userRole');
            select.append('<option value="">Pilih Peran</option>')
            $.each(data.data, function(key, value) {
                select.append('<option value=' + value.id + '>' + value.name + '</option>');
            });
        });
    }
</script>
@endpush