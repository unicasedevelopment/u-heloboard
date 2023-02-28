@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            @include('surat_masuk.form')
            @include('surat_masuk.form_edit')
            @include('surat_masuk.form_delete')
            <div class="card-header">
                <div class="row-cols-12 d-flex justify-content-between" style="padding:0px 1.25rem;">

                    <h2 style="margin:0px;" class="card-title">Daftar Surat Masuk </h2>
                    <a href="#" data-toggle="modal" data-target="#modal_form_surat_masuk"
                        class="btn btn-secondary">Tambah Data</a>
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
                            <table id="myTable" class="table table-sm table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th> No. Arsip </th>
                                        <th> No. Surat </th>
                                        <th> Tgl. Diterima </th>
                                        <th> Tgl. Surat </th>
                                        <th> Pengirim </th>
                                        <!-- <th width="20%"> Resume </th> -->
                                        <th width="25%"> Keterangan </th>
                                        <th> File Surat </th>
                                        <th width=""> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_surat_masuk as $surats)
                                    <tr class="odd " id="{{$surats->id}}">
                                        <!-- <input type="hidden" id="id_surat" name="id_surat" value="{{ $surats->id }}"> -->
                                        <td style="vertical-align: middle;"><a class="link-nomor-arsip-surat-masuk"
                                                data-toggle="modal" href="#" data-target="#modal_form_edit_surat_masuk"
                                                style="text-decoration: none;">{{ $surats->no_arsip}}</a>
                                        </td>
                                        <td style="vertical-align: middle;">{{ $surats->no_surat }}</td>
                                        <td style="vertical-align: middle;">
                                            {{ $surats->tgl_diterima }}</td>
                                        <td class="dtr-control sorting_1" tabindex="0" style="vertical-align: middle;">
                                            {{ $surats->tgl_surat }}</td>
                                        <td style="vertical-align: middle;">{{ $surats->pengirim }}</td>
                                        <!-- <td style="vertical-align: middle;">{{$surats->resume}}</td> -->
                                        <td style="vertical-align: middle;">{{$surats->keterangan}}</td>
                                        <td class="text-center " style="vertical-align: middle;">
                                            <style>
                                            .tooltip.show {
                                                opacity: 1;
                                                border: 1px solid #000 !important;
                                                border-color: #000000 !important;
                                                padding: 0px !important;
                                                border-radius: 5px !important;
                                            }

                                            .tooltip-inner {
                                                background-color: #fff;
                                                /* box-shadow: 0px 0px 4px black; */
                                                opacity: 1 !important;
                                                color: #000 !important;
                                                max-width: 350px;
                                                /* If max-width does not work, try using width instead */
                                                width: 350px;
                                                border: 1px #000 !important;
                                                border-color: #000000 !important;
                                            }

                                            .tooltip.bs-tooltip-right .arrow:before {
                                                border-right-color: #000 !important;
                                            }

                                            .tooltip.bs-tooltip-left .arrow:before {
                                                border-left-color: #000 !important;
                                            }

                                            .tooltip.bs-tooltip-bottom .arrow:before {
                                                border-bottom-color: #000 !important;
                                            }

                                            .tooltip.bs-tooltip-top .arrow:before {
                                                border-top-color: #000 !important;
                                            }
                                            </style>
                                            @if ($surats->file_surat)
                                            <a href="{{ asset ('storage/' . $surats->file_surat)}}" target="_blank"
                                                class="btn btn-sm btn-light text-secondary" data-bs-toggle="tooltip"
                                                data-bs-placement="left" data-bs-custom-class="custom-tooltip"
                                                data-bs-title="{{$surats->resume}}"><i
                                                    class="fa fa-file-contract"></i></a>
                                            @else
                                            <a href="#" class="btn btn-sm btn-light text-secondary"
                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                data-bs-custom-class="custom-tooltip"
                                                data-bs-title="{{$surats->resume}}"><i class="fa fa-ban"></i></a>
                                            @endif
                                        </td>
                                        <td class="text-center text-white" style="vertical-align: middle;">
                                            <!-- <a href="#" data-toggle="modal" data-target="#modal_form_edit_surat_masuk"
                                                class="btn btn-secondary edit"><i class="fa fa-pen"></i></a> -->
                                            <a href="#" data-toggle="modal" data-target="#modal_form_hapus_surat_masuk"
                                                class="btn btn-sm btn-danger hapus"><i class="fa fa-trash"></i></a>
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
<script src="{{ asset ('js/custom_js/surat_masuk.js') }}"></script>
@endsection