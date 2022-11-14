@extends('layouts.app')
@include('plugins.daterange')
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
                        <label for="catinName" class="col-sm-2 col-form-label">{{ucfirst($kriteria->as)}}</label>
                        @if ($kriteria->name == 'merokok')
                        <div class="col-sm-10">
                            <select class="form-control @error($kriteria->name) is-invalid @enderror" name="name[{{$kriteria->id}}]">
                                <option value="">Pilih Jawaban</option>
                                <option value="1">Tidak Terpapar</option>
                                <option value="2">Terpapar</option> 
                            </select>
                        </div>
                        @elseif($kriteria->name == 'umur')
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group date" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input @error($kriteria->name) is-invalid @enderror" id="birthdate" data-target="#birthdate" placeholder="Tanggal Lahir"/>
                                        <div class="input-group-append" data-target="#birthdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name[{{$kriteria->id}}]" id="umur" readonly placeholder="Umur">
                                        <div class="input-group-append">
                                            <div class="input-group-text">Tahun</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($kriteria->name == 'imt')
                        <div class="col-sm-10">
                            <div class="row">
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="berat" placeholder="Berat Badan">
                                        <div class="input-group-append">
                                            <div class="input-group-text">KG</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="tinggi" placeholder="Tinggi Badan">
                                        <div class="input-group-append">
                                            <div class="input-group-text">M</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-12">
                                    <input type="text" class="form-control @error($kriteria->name) is-invalid @enderror" id="imt" name="name[{{$kriteria->id}}]" placeholder="{{strtoupper($kriteria->name)}}" readonly>
                                </div>
                            </div>
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#birthdate').datetimepicker({
            format: 'L',
            format: 'DD-MM-YYYY',
        });
    })

    $("#birthdate").on("change.datetimepicker", ({date, oldDate}) => {
        const data = {
            _token: '{{ csrf_token() }}',
            date: date._i,
        }
        console.log(date._i);
        $.ajax({
            type: "post",
            url: '{{ route("penyuluh.countAge") }}',
            data: data,
            success: function (response) {
                $('#umur').val(response.data)
            }
        })
    })

    var tinggi = 0;
    var berat = 0;
    
    $('#tinggi').keyup(function (e) {
        tinggi = $(this).val()
        calculateIMT(tinggi, berat)
    })
    $('#berat').keyup(function (e) {
        berat = $(this).val()
        calculateIMT(tinggi, berat)
    })

    function calculateIMT(tinggi, berat) {
        var imt = $('#imt')
        if (tinggi != 0 && berat != 0) {
            var result = berat / tinggi ** 2
            // console.log(berat / tinggi);
            // console.log(berat / tinggi ** 2);
            imt.val(result)
        } else {
            imt.val(0)
        }
    }
</script>
@endpush