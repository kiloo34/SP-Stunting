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
            <form action="{{ route('penyuluh.updateTeam', $catin->id) }}" class="form-horizontal" method="post">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="catinName" class="col-sm-2 col-form-label">{{__('Nama')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="catinName" placeholder="Nama Calon Pengantin" value="{{ $catin->name }}" readonly>
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
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="catinNIK" placeholder="NIK" value="{{ $catin->nik }}" readonly>
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
                            <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" id="catinUmur" placeholder="Umur" value="{{ $catin->age }}" readonly>
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
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="catinNo_hp" placeholder="No Handphone" value="{{ $catin->no_hp }}" readonly>
                            @error('no_hp')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="catinTeam" class="col-sm-2 col-form-label">{{__('Tim')}}</label>
                        <div class="col-sm-10">
                            <select name="team" class="form-control @error('team') is-invalid @enderror" id="catinTeam">
                                @if ($catin->team_id != null)
                                <option value="{{$catin->team_id}}" selected>{{$catin->team->name}}</option>
                                @endif
                            </select>
                            @error('team')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('penyuluh.catin.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-success btn-sm float-right">{{__('Tambah Tim')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        // getDataStatus();
        getDataTeam();
    })

    function getDataTeam() {
        var team_id = "{{ $catin->team_id }}"
        
        if (team_id == '') {
            var url = '{{ route("penyuluh.getDataCatinTeam") }}';
        } else {
            var url = '{{ route("penyuluh.getDataCatinTeamId", ':team') }}';
            url = url.replace(':team', team_id);
        }
        console.log(url);

        $.get(url, function(data) {
            var select = $('#catinTeam');
            select.append('<option value="">Pilih Tim Pendamping</option>')
            $.each(data.data, function(key, value) {
                select.append('<option value=' + value.id + '>' + value.name + '</option>');
            });
        });
    }
</script>
@endpush