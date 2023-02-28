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
                        <a class="nav-link" id="custom-tabs-four-submited-tab" data-toggle="pill" href="#" role="tab"
                            aria-controls="custom-tabs-four-home" aria-selected="false">Menunggu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-approved-tab" data-toggle="pill" href="#" role="tab"
                            aria-controls="custom-tabs-four-home" aria-selected="false">Disetujui</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-processing-tab" data-toggle="pill" href="#" role="tab"
                            aria-controls="custom-tabs-four-home" aria-selected="false">Dalam
                            Proses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-completed-tab" data-toggle="pill" href="#" role="tab"
                            aria-controls="custom-tabs-four-home" aria-selected="false">Selesai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-cancelled-tab" data-toggle="pill" href="#" role="tab"
                            aria-controls="custom-tabs-four-home" aria-selected="false">Batal</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                        aria-labelledby="custom-tabs-four-home-tab">
                        @include('approval_2_pengajuan_dana.form_edit')
                        <div id="field_page" class="dataTables_wrapper dt-bootstrap4 ">
                            <div class="col-sm-12 table-responsive">
                                <table id="myTable"
                                    class="table table-sm table-bordered table-hover dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th> No. Pengajuan</th>
                                            <th> Tgl. Pengajuan</th>
                                            <th> Id Kategori </th>
                                            <th> Keperluan </th>
                                            <th> Status Pengajuan </th>
                                            <th> Status Pemrosesan </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <!-- <tbody id="field_data">
                                        @foreach($data_pengajuan_dana as $pengajuan_dana)
                                        <tr class="odd " id="{{$pengajuan_dana->id}}">
                                            <td style="vertical-align: middle;">
                                                <a class="link-nomor-arsip-pengajuan-dana" href="#"
                                                    style="text-decoration: none;">{{ $pengajuan_dana->no_surat}}</a>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                {{ $pengajuan_dana->tgl_pengajuan}} </td>
                                            <td style="vertical-align: middle;">
                                                {{ $pengajuan_dana->id_kategori}} </td>
                                            <td style="vertical-align: middle;">
                                                {{ $pengajuan_dana->keperluan}} </td>
                                            <td style="vertical-align: middle;">
                                                {{ $pengajuan_dana->status_pengajuan}} </td>
                                            <td style="vertical-align: middle;">
                                                {{ $pengajuan_dana->status_pemrosesan}}</td>

                                            <td class="text-center text-white" style="vertical-align: middle;">
                                                <a href="#" type="button"
                                                    class="btn btn-sm btn-light btn-sm btn-download text-secondary"><i
                                                        class="fa fa-download "></i></a>
                                                <a href="#" data-toggle="modal" data-target="#modal_form_hapus_fpk"
                                                    class="btn btn-sm btn-danger btn-sm hapus"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody> -->
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- <div class="card">
            @include('spk.form_delete')

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
            </style>

            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table id="myTable" class="table table-sm table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th> No. Pengajuan</th>
                                        <th> Tgl. Pengajuan</th>
                                        <th> Id Kategori </th>
                                        <th> Keperluan </th>
                                        <th> Status Pengajuan </th>
                                        <th> Status Pemrosesan </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_pengajuan_dana as $pengajuan_dana)
                                    <tr class="odd " id="{{$pengajuan_dana->id}}">
                                        <td style="vertical-align: middle;"> <a class="link-nomor-arsip-surat-keluar"
                                                data-toggle="modal" href="#"
                                                data-target="#modal_form_edit_pengajuan_dana"
                                                style="text-decoration: none;">{{ $pengajuan_dana->no_pengajuan}}</a>
                                        </td>
                                        <td style="vertical-align: middle;">{{ $pengajuan_dana->tgl_pengajuan}} </td>
                                        <td style="vertical-align: middle;">{{ $pengajuan_dana->id_kategori}} </td>
                                        <td style="vertical-align: middle;">{{ $pengajuan_dana->keperluan}} </td>
                                        <td style="vertical-align: middle;">{{ $pengajuan_dana->status_pengajuan}} </td>
                                        <td style="vertical-align: middle;">{{ $pengajuan_dana->status_pemrosesan}}</td>

                                        <td class="text-center text-white" style="vertical-align: middle;">
                                            <a href="#" type="button"
                                                class="btn btn-sm btn-light btn-sm btn-download text-secondary"><i
                                                    class="fa fa-download "></i></a>
                                            <a href="#" data-toggle="modal" data-target="#modal_form_hapus_fpk"
                                                class="btn btn-sm btn-danger btn-sm hapus"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-end" style="padding:0px 1.25rem;">
                    </div>
                </div>
            </div>
        </div> -->
    </div>

</div>

@endsection

@section('javascript')

<script>
// $(function() {
//     $("#example1").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//     $('#example2').DataTable({
//         "paging": true,
//         "lengthChange": false,
//         "searching": false,
//         "ordering": true,
//         "info": true,
//         "autoWidth": false,
//         "responsive": true,
//     });
// });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset ('js/custom_js/approval_pengajuan_dana/data_pengajuan_dana.js') }}"></script>
<script src="{{ asset ('js/custom_js/approval_pengajuan_dana/edit_pengajuan_dana.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection