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
<div class="row justify-content-center" id="res-row"></div>
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

        var col = $('#res-row')
        var html = ''

        url = "{{ route('penyuluh.spk.calculate') }}"
        console.log(url)
        $.ajax({
            type: "get",
            url: url,
            success: function (response) {
                jQuery.each(response.data, function(index, itemData) {
                    console.log(itemData.catin);
                    
                    var id = itemData.catin.id
                    var url = '{{ route("penyuluh.catin.show", ':id') }}'
                    url = url.replace(':id', id)

                    html += '<div class="col-md-4">'
                    html += '<div class="card card-widget widget-user-2">'
                    html += '<div class="widget-user-header bg-light">'
                    html += '<div class="widget-user-image">'
                    html += '<h1>'+(index+1)+'</h1>'
                    html += '</div>'
                    html += '<a href='+url+' type="button" class="">'
                    html += '<h3 class="widget-user-username">'+itemData.catin.name+'</h3>'
                    html += '</a>'
                    // html += '<h5 class="widget-user-desc">'+itemData.catin.desa+'</h5>'
                    // html += '<h5 class="widget-user-desc"> Nilai : '+itemData.value+'</h5>'

                    if (itemData.value > 0.8) {
                        html += '<h5 class="widget-user-desc text-danger"> Perlu Pendampingan Intensitas Tinggi </h5>';
                    } else if (itemData.value >= 0.4 && itemData.value <= 0.8) {
                        html += '<h5 class="widget-user-desc text-warning"> Perlu Pendampingan Intensitas Sedang </h5>';
                    } else {
                        html += '<h5 class="widget-user-desc text-primary"> Perlu Pendampingan Intensitas Rendah </h5>';
                    }

                    html += '</div>'
                    html += '</div>'
                    html += '</div>'

                    col.html(html);
                });

            }
        });
    });

    $('#reset-btn').click(function (e) { 
        $('#res-row').addClass('d-none')
        $('#reset-btn').addClass('d-none')
        $('#calculate-btn').removeClass('d-none')
        
        var col = $('#res-row')
        var html = ''

        col.html('')
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