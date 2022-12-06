@extends('layouts.app')
@section('title')
    {{__('criteria ')}}{{ isset($subtitle) ? ' | ' . ucfirst($subtitle) : '' }}
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
            <form action="{{ route('penyuluh.criteria.update', $criteria->id) }}" class="form-horizontal" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="criteriaName" class="col-sm-2 col-form-label">{{__('Nama')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="criteriaName" placeholder="Nama Kategori" value="{{ $criteria->name }}">
                            @error('name')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="criteriaAs" class="col-sm-2 col-form-label">{{__('Alias')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="as" class="form-control @error('as') is-invalid @enderror" id="criteriaAs" placeholder="AS" value="{{ $criteria->as }}">
                            @error('as')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="criteriaValue" class="col-sm-2 col-form-label">{{__('Nilai')}}</label>
                        <div class="col-sm-10">
                            <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" id="criteriaValue" placeholder="AS" value="{{ $criteria->value }}">
                            @error('value')
                            <span class="error invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('penyuluh.criteria.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-success btn-sm float-right">{{__('Ubah Data')}}</button>
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
</script>
@endpush