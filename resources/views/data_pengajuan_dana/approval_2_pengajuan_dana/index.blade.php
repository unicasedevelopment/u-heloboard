@extends('layouts.app')
@section('content')
<style>
/* .card.card-outline-tabs .card-header a {
    border-top: 0px solid transparent;
}

.nav-tabs .nav-link {
    margin-bottom: 0px;
    background: 0 0;
    border: 0px solid transparent;
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
} */
.nav-tabs {
    border-bottom: 0px solid #dee2e6;
}

.nav-link {
    display: block;
    padding: 0.5rem 1rem;
    color: #495057;
    text-decoration: none;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
}
</style>
<style>
.select2 {
    width: 100% !important;
}

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
<div class="row">
    <div class="col-12">
        <style>
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .page-link {
            position: relative;
            display: block;
            color: #6c757d;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #dee2e6;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        table.table-bordered.dataTable th,
        table.table-bordered.dataTable td {
            border-bottom-width: 1px;
            vertical-align: middle;
        }

        .dataTables_wrapper {
            margin-top: 5px;
        }
        </style>



        <div class="card card-secondary card-outline card-outline-tabs ">
            <div class="card-header p-0 border-bottom-0 ">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist" style="padding-bottom: 2px;">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-pengajuan-tab" data-toggle="pill" href="#"
                            role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Pengajuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-menunggu-tab" data-toggle="pill" href="#" role="tab"
                            aria-controls="custom-tabs-four-home" aria-selected="false">Menunggu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-disetujui-tab" data-toggle="pill" href="#" role="tab"
                            aria-controls="custom-tabs-four-home" aria-selected="false">Disetujui</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-selesai-tab" data-toggle="pill" href="#" role="tab"
                            aria-controls="custom-tabs-four-home" aria-selected="false">Selesai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-ditolak-tab" data-toggle="pill" href="#" role="tab"
                            aria-controls="custom-tabs-four-home" aria-selected="false">Ditolak</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                        aria-labelledby="custom-tabs-four-home-tab">
                        @include('data_pengajuan_dana.approval_2_pengajuan_dana.form_edit')
                        <div id="field_page" class="dataTables_wrapper dt-bootstrap4 ">
                            <div class="col-sm-12 table-responsive">
                                <table id="myTable"
                                    class="table table-sm table-bordered table-hover dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th width="15%"> No. Pengajuan </th>
                                            <th width="15%"> Diajukan Oleh </th>
                                            <th width="10%"> Tgl. Pengajuan </th>
                                            <th width="12%"> Kategori </th>
                                            <th width="24%"> Keperluan </th>
                                            <th width="12%"> Status Pengajuan </th>
                                            <th width="12%"> Status Pembayaran </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset ('js/custom_js/data_pengajuan_dana/approval_2_pengajuan_dana/data_pengajuan_dana.js') }}">
</script>
<script src="{{ asset ('js/custom_js/data_pengajuan_dana/approval_2_pengajuan_dana/edit_pengajuan_dana.js') }}">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection