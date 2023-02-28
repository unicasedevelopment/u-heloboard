@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            @include('spk.form_delete')
            <div class="card-header">
                <div class="col-md-12 row bg-light">
                    <div class="col-md-2">
                        <button class="btn btn-light btn-block">
                            Submited
                        </button>
                    </div>
                    <div class=" col-md-2">
                        <button class="btn btn-light btn-block">
                            Waiting
                        </button>
                    </div>
                    <div class=" col-md-2">
                        <button class="btn btn-light btn-block">
                            Approved
                        </button>
                    </div>
                    <div class=" col-md-2">
                        <button class="btn btn-light btn-block">
                            Completed
                        </button>
                    </div>
                    <div class=" col-md-2">
                        <button class="btn btn-light btn-block">
                            Canceled
                        </button>
                    </div>
                </div>
                <div class="row-cols-12 d-flex justify-content-between" style="padding:0px 1.25rem;">

                    <h2 style="margin:0px;" class="card-title">Daftar Surat perintah kerja </h2>
                </div>
            </div>

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
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="myTable" class="table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th width="13%"> No. FPK</th>
                                        <th> Jenis</th>
                                        <th> Nama </th>
                                        <th> Divisi </th>
                                        <th> Jabatan </th>
                                        <th> Deadline </th>
                                        <th> Detail / Spesifikasi Pekerjaan </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>

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
        </div>
    </div>

</div>

@endsection

@section('javascript')
@endsection