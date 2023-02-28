@extends('layouts.app')
@section('css')
<!-- <link rel="stylesheet" href="{{ asset ('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset ('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> -->
<!-- <link rel="stylesheet" href="{{ asset ('dist/css/adminlte.min.css') }}"> -->
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            @include('users.form')
            <div class="card-header">
                <div class="row-cols-12 d-flex justify-content-between" style="padding:0px 1.25rem;">

                    <h2 style="margin:0px;" class="card-title">Daftar Karyawan </h2>
                    <a href="#" data-toggle="modal" data-target="#modal_form_karyawan" class="btn btn-secondary">Tambah
                        Data</a>
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

            .select2-container {
                z-index: 100000;
            }

            button {
                border-radius: 5px;
                border-width: 0;
            }

            select.form-control-sm~.select2-container--default {
                font-size: 0.75rem;
            }

            /* .select2-container--default .select2-selection--single .select2-selection__clear {
                padding: 1px 6px;
                background: #F0F0F0;
                border-radius: 5px;
                border-width: 0;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #444;
                line-height: inherit;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                padding-left: 0;
                height: auto;
                margin-top: 1px;
            }

            .select2-container--default .select2-selection--multiple .select2-selection__rendered {
                padding: 4px 0.375rem 3px;
                margin-bottom: -2px;
            }

            .select2-container--default .select2-selection--multiple .select2-selection__clear {
                cursor: pointer;
                float: right;
                font-weight: bold;
                margin-top: 4px;
                margin-right: 1.6rem;
                padding: 1px 6px;
                background: #F0F0F0;
                border-radius: 5px;
                border-width: 0;
            } */
            </style>

            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="myTable" class="table table-sm table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th width="30%"> Nama </th>
                                        <th width="30%"> Email </th>
                                        <th width="25%"> Role </th>
                                        <th width="15%"> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $karyawan)
                                    <tr class="odd " id="{{$karyawan->id}}">
                                        <td style="vertical-align: middle;"><a class="link-nomor-arsip-surat-masuk"
                                                data-toggle="modal" href="#" data-target="#modal_form_edit_surat_masuk"
                                                style="text-decoration: none;">{{ $karyawan->name}}</a>
                                        </td>
                                        <td style="vertical-align: middle;">{{ $karyawan->email }}</td>
                                        <td style="vertical-align: middle;">{{ $karyawan->role }}</td>
                                        <td class="text-center text-white" style="vertical-align: middle;">
                                            <!-- <a href="#" data-toggle="modal" data-target="#modal_form_edit_surat_masuk"
                                                class="btn btn-secondary edit"><i class="fa fa-pen"></i></a> -->
                                            <a href="#" class="btn btn-sm btn-danger btn-hapus-karyawan"><i
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
        </div>
    </div>

</div>

@endsection
@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset ('js/custom_js/administrasi_sistem/karyawan.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endsection