@extends('layouts.app')
@section('content')

<div class="col-md-12 d-flex justify-content-center ">
    <div class="col-md-9">
        <style>
        /* .select2 {
            width: 100% !important;
        } */

        .container,
        .container-fluid,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            width: 100%;
            padding-right: 0.5rem;
            padding-left: 0.5rem;
            margin-right: auto;
            margin-left: auto;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #6C757D;
            line-height: 28px;
        }

        .select2-container--default.select2-container--disabled .select2-selection--single {
            /* background-color: #eee; */
            background-color: #e9ecef;
            ;
            cursor: default;
        }

        .select2-container--default.select2-container--disabled .select2-selection--single {
            /* background-color: #eee; */
            background-color: #f4f6f9;
            /* background-color: #e9ecef; */
            ;
            cursor: default;
        }

        .form-control:disabled,
        .form-control[readonly] {
            /* background-color: #e9ecef; */
            background-color: #f4f6f9;
            opacity: 1;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #6c757d;
            line-height: 28px;
        }
        </style>
        @include('pengajuan_dana.form')

    </div>
</div>

@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset ('js/custom_js/pengajuan_dana/form.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <script type="text/javascript">
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Pilih",
        allowClear: true
    });
    $('#btn_panduan').on('click', function() {
        console.log('tombok aktif');
        var field_panduan = document.getElementById('panduan_keperluan');
        if (field_panduan.style.display === 'none') {
            field_panduan.style.display = 'block';
        } else {
            field_panduan.style.display = 'none';
        }
    });

});
</script> -->

@endsection