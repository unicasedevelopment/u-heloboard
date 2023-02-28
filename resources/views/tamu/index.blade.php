@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            @include('tamu.form')
            @include('tamu.form_edit')
            @include('tamu.form_delete')
            <div class="card-header">
                <div class="row-cols-12 d-flex justify-content-between" style="padding:0px 1.25rem;">

                    <h2 style="margin:0px;" class="card-title">Daftar Surat Keluar </h2>
                    <a href="#" data-toggle="modal" data-target="#modal_form_tamu" class="btn btn-secondary">Tambah
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
            </style>

            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <table id="myTable" class="table table-sm table-bordered dataTable table-hover"
                            aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th>Nama Tamu</th>
                                    <th>Penerima Tamu</th>
                                    <th>No. Hp</th>
                                    <th>Perusahaan</th>
                                    <th>Tgl. Kunjungan</th>
                                    <th>Keperluan</th>
                                    <th width=""> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_tamu as $tamus)
                                <tr class="odd " id="{{ $tamus->id }}">
                                    <!-- <input type="hidden" id="id_surat" name="id_surat" value="{{ $tamus->id }}"> -->
                                    <td style="vertical-align: middle;"><a class="link-tamu" data-toggle="modal"
                                            href="#" data-target="#modal_form_edit_tamu"
                                            style="text-decoration: none;">{{ $tamus->nama_tamu}}</a>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{ $tamus->penerima_tamu }}</td>
                                    <td class="dtr-control sorting_1" tabindex="0" style="vertical-align: middle;">
                                        {{ $tamus->no_hp }}</td>
                                    <td style="vertical-align: middle;">{{ $tamus->nama_perusahaan }}</td>
                                    <td style="vertical-align: middle;">{{ $tamus->tgl_kunjungan }}</td>
                                    <!-- <td style="vertical-align: middle;">{{$tamus->resume}}</td> -->
                                    <td style="vertical-align: middle;">{{$tamus->keperluan}}</td>
                                    <td class="text-center text-white" style="vertical-align: middle;">
                                        <!-- <a href="#" data-toggle="modal" data-target="#modal_form_edit_tamu"
                                            class="btn btn-secondary btn-edit-surat-keluar"><i
                                                class="fa fa-pen"></i></a> -->
                                        <a href="#" data-toggle="modal" data-target="#modal_form_hapus_tamu"
                                            class="btn btn-sm btn-danger btn-hapus-tamu"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
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
<script src="{{ asset ('js/custom_js/tamu.js') }}"></script>
@endsection