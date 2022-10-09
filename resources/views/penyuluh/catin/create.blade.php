@extends('layouts.app')
@include('plugins.datatable')
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
            <form action="" class="form-horizontal" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="catinName" class="col-sm-2 col-form-label">{{__('Nama')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="catinName" placeholder="Nama Calon Pengantin">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="catinNIK" class="col-sm-2 col-form-label">{{__('NIK')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="nik" class="form-control" id="catinNIK" placeholder="NIK">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="catinNo_hp" class="col-sm-2 col-form-label">{{__('No Handphone')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_hp" class="form-control" id="catinNo_hp" placeholder="No Handphone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="catinAlamat" class="col-sm-2 col-form-label">{{__('Alamat')}}</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" id="catinAlamat" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="catinDesa" class="col-sm-2 col-form-label">{{__('Desa')}}</label>
                        <div class="col-sm-10">
                            <select name="village" class="form-control" id="catinDesa">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
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
        
    })

    function getDataVillage() {
        
    }

    function getDataStatus() {
        
    }
</script>
@endpush