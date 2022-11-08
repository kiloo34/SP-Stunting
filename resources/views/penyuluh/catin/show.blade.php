@extends('layouts.app')
@section('title')
    {{__('Catin')}}{{ isset($subtitle) ? ' | ' . ucfirst($subtitle) : '' }}
@endsection
@section('content')
<div class="row">
    <div class="col-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('assets/img/user4-128x128.jpg') }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$catin->name}}</h3>

                {{-- <p class="text-muted text-center">Software Engineer</p> --}}

                <ul class="list-group list-group-unbordered mb-3">
                    @foreach ($data as $d)
                        {{-- @dump($d->criteria->name) --}}
                        @switch($d)
                            @case($d->criteria->name == 'umur')
                                <li class="list-group-item">
                                    <b>{{__('Umur')}}</b> <a class="float-right">{{$d->value}}</a>                                    
                                    <br>
                                    <b>{{__('Konversi')}}</b> <a class="float-right">{{$d->conversion}}</a>
                                </li> 
                                @break
                            @case($d->criteria->name == 'hb')
                                <li class="list-group-item">
                                    <b>{{__('HB')}}</b> <a class="float-right">{{$d->value}}</a>
                                    <br>
                                    <b>{{__('Konversi')}}</b> <a class="float-right">{{$d->conversion}}</a>
                                </li> 
                                @break
                            @case($d->criteria->name == 'imt')
                                <li class="list-group-item">
                                    <b>{{__('IMT')}}</b> <a class="float-right">{{$d->value}}</a>
                                    <br>
                                    <b>{{__('Konversi')}}</b> <a class="float-right">{{$d->conversion}}</a>
                                </li>
                                @break
                            @case($d->criteria->name == 'lila')
                                <li class="list-group-item">
                                    <b>{{__('LILA')}}</b> <a class="float-right">{{$d->value}}</a>
                                    <br>
                                    <b>{{__('Konversi')}}</b> <a class="float-right">{{$d->conversion}}</a>
                                </li>
                                @break
                            @default
                                <li class="list-group-item">
                                    <b>{{__('Merokok')}}</b> <a class="float-right">{{$d->value == 0 ? 'Tidak Terpapar' : 'Terpapar'}}</a>
                                    <br>
                                    <b>{{__('Konversi')}}</b> <a class="float-right">{{$d->conversion}}</a>
                                </li>
                        @endswitch
                    @endforeach
                </ul>

                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{ucfirst($subtitle)}} {{__('Data')}} {{ucfirst($title)}}
                </h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>{{__('NIK')}}</b> 
                        <a class="float-right" id="nik">{{$catin->nik}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{__('No Handphone')}}</b> 
                        <a class="float-right" id="no_hp">{{$catin->no_hp}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{__('Umur')}}</b> 
                        <a class="float-right" id="umur">{{$catin->age}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{__('Alamat')}}</b> 
                        <a class="float-right" id="alamat">{{$catin->address}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{__('Desa')}}</b> 
                        <a class="float-right" id="desa">{{$catin->desa->name}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>{{__('Tim Pendamping')}}</b> 
                        <a class="float-right" id="tim_pendamping">{{$catin->team->name}}</a>
                    </li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="{{ route('penyuluh.catin.index') }}" class="btn btn-danger btn-sm float-right">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush