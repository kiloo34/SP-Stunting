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
                    {{ucfirst($subtitle)}} {{__('Data Kriteria')}} {{ucfirst($title)}}
                </h3>
            </div>
            <form action="{{ route('penyuluh.catin.storeValue', $catin->id) }}" class="form-horizontal" method="post">
                @csrf
                <div class="card-body">
                    @foreach ($criterias as $kriteria)
                    <input type="hidden" name="id[{{$kriteria->id}}]" value="{{ $kriteria->id }}">
                    <div class="form-group row">
                        <label for="catinName" class="col-sm-2 col-form-label">{{strtoupper($kriteria->name)}}</label>
                        @if ($kriteria->name == 'merokok')
                        <div class="col-sm-10">
                            <select class="form-control @error($kriteria->name) is-invalid @enderror" name="name[{{$kriteria->id}}]">
                                <option value="">Pilih Jawaban</option>
                                <option value="1">Tidak Terpapar</option>
                                <option value="2">Terpapar</option> 
                            </select>
                        </div>
                        @else
                        <div class="col-sm-10">
                            <input type="text" name="name[{{$kriteria->id}}]" class="form-control @error($kriteria->name) is-invalid @enderror" id="catinName" placeholder="{{strtoupper($kriteria->name)}}" value="{{ old($kriteria->name) }}">
                            @error($kriteria->name)
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @endif
                    </div>
                    @endforeach
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
        // getDataStatus();
        // getDataVillage();
    })
</script>
@endpush