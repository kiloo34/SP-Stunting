@extends('layouts.app')
@include('plugins.datatable')
@section('title')
    {{__('SPK')}}
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{__('Total Data Siap Hitung')}} : {{$count}} </h1> 
            </div>
            <form action="#" method="post" id="spk-form">
                {{-- <div class="card-body">
                    <div class="form-group">
                        <label for="total">{{__('Total Data')}}</label>
                        <input type="text" name="total" value="" class="form-control form-control-border" id="total" placeholder="Masukan Jumlah Data" ">
                    </div>
                </div> --}}
                <div class="card-footer">
                    <div class="text-center">
                        <button type="button" class="btn btn-success btn-block btn-lg" id="calculate-btn">Hitung</button>
                        <button type="button" class="btn btn-danger btn-block btn-lg" id="reset-btn">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- <div class="row" id="res-row">
    <div class="col-md-4">
        <!-- Widget: user widget style 2 -->
        <div class="card card-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-light">
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ asset('assets/img/user7-128x128.jpg') }}" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Nadia Carmichael</h3>
                <h5 class="widget-user-desc">Lead Developer</h5>
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
    <div class="col-md-4">
        <!-- Widget: user widget style 2 -->
        <div class="card card-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-light">
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ asset('assets/img/user7-128x128.jpg') }}" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Nadia Carmichael</h3>
                <h5 class="widget-user-desc">Lead Developer</h5>
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
    <div class="col-md-4">
        <!-- Widget: user widget style 2 -->
        <div class="card card-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-light">
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ asset('assets/img/user7-128x128.jpg') }}" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Nadia Carmichael</h3>
                <h5 class="widget-user-desc">Lead Developer</h5>
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
</div> --}}
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#res-row').addClass('d-none')
        $('#reset-btn').addClass('d-none')
    });

    $('#calculate-btn').click(function (e) { 
        // e.preventDefault();
        
        $('#res-row').removeClass('d-none')
        $('#reset-btn').removeClass('d-none')
        $('#calculate-btn').addClass('d-none')

        console.log('masuk')

        url = "{{ route('penyuluh.getDataCatin') }}"

        // $.ajax({
        //     type: "get",
        //     url: url,
        //     // data: "data",
        //     // dataType: "dataType",
        //     success: function (response) {
                
        //     }
        // });
    });

    $('#reset-btn').click(function (e) { 
        $('#res-row').addClass('d-none')
        $('#reset-btn').addClass('d-none')
        $('#calculate-btn').removeClass('d-none')
    });

    // function totalCheck() {
    //     // $(this).$(selector).val();
    //     var count = "{{ $count }}"
    //     var val = $('#total').val();
    //     console.log(val.indexOf(val));
    //     switch (val) {
    //         // case $.isNumeric(val):
                
    //             // break;
        
    //         default:
    //             break;
    //     }

        // if (val.isNumeric()) {
        //     alert('')
        // } else {
        //     alert()
        // }
    // }
</script>
@endpush