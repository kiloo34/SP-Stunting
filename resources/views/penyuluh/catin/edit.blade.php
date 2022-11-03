@extends('layouts.app')
@section('title')
    {{__('Catin')}}{{ isset($subtitle) ? ' | ' . ucfirst($subtitle) : '' }}
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
            <form action="#" class="form-horizontal" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="catinName" class="col-sm-2 col-form-label">{{__('Nama')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="catinName" placeholder="Nama Calon Pengantin" value="{{ $catin->name }}">
                            @error('name')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="catinNIK" class="col-sm-2 col-form-label">{{__('NIK')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="catinNIK" placeholder="NIK" value="{{ $catin->nik }}">
                            @error('nik')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="catinUmur" class="col-sm-2 col-form-label">{{__('Umur')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" id="catinUmur" placeholder="Umur" value="{{ $catin->age }}">
                            @error('age')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="catinNo_hp" class="col-sm-2 col-form-label">{{__('No Handphone')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="catinNo_hp" placeholder="No Handphone" value="{{ $catin->no_hp }}">
                            @error('no_hp')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="catinAlamat" class="col-sm-2 col-form-label">{{__('Alamat')}}</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" id="catinAlamat" class="form-control @error('alamat') is-invalid @enderror" rows="5" value="{{ $catin->address }}"></textarea>
                            @error('alamat')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="catinDesa" class="col-sm-2 col-form-label">{{__('Desa')}}</label>
                        <div class="col-sm-10">
                            <select name="village" class="form-control @error('village') is-invalid @enderror" id="catinDesa" disabled></select>
                            @error('village')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="catinStatus" class="col-sm-2 col-form-label">{{__('Status')}}</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="catinStatus" disabled></select>
                            @error('status')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('penyuluh.catin.index') }}" class="btn btn-danger btn-sm">Kembali</a>
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
        var url = '{{ route("penyuluh.getDataCatinDesa") }}';
        $.get(url, function(data) {
            var select = $('#catinDesa');
            select.append('<option value="">Pilih Desa</option>')
            $.each(data.data, function(key, value) {
                select.append('<option value=' + value.id + '>' + value.name + '</option>');
            });
        });
    }

    function getDataStatus() {
        var url = '{{ route("penyuluh.getDataCatinStatus") }}';
        $.get(url, function(data) {
            var select = $('#catinStatus');
            select.append('<option value="">Pilih Status</option>')
            $.each(data.data, function(key, value) {
                select.append('<option value=' + value.id + '>' + value.name + '</option>');
            });
        });
    }
</script>
@endpush