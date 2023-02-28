@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            @include('data_perjalanan_dinas.form_delete')
            <div class="card-header">
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
                            <table id="myTable" class="table table-sm table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th width="13%"> No. Surat</th>
                                        <th> Nama</th>
                                        <th> NIK </th>
                                        <th> Jabatan </th>
                                        <th> Departemen </th>
                                        <th> Tujuan </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_perjalanan_dinas as $perjalanan_dinas)
                                    <tr class="odd " id="{{$perjalanan_dinas->id}}">
                                        <td style="vertical-align: middle;">{{ $perjalanan_dinas->no_surat}} </td>
                                        <td style="vertical-align: middle;">{{$perjalanan_dinas->nama}} </td>
                                        <td style="vertical-align: middle;">{{ $perjalanan_dinas->nik }}</td>
                                        <td style="vertical-align: middle;">
                                            {{ $perjalanan_dinas->jabatan }}</td>
                                        <td class="dtr-control sorting_1" tabindex="0" style="vertical-align: middle;">
                                            {{ $perjalanan_dinas->departemen }}</td>
                                        <td style="vertical-align: middle;">{{ $perjalanan_dinas->tujuan }}</td>
                                        <td class="text-center text-white" style="vertical-align: middle;">
                                            <a href="{{ asset ('storage/' . $perjalanan_dinas->file_pengajuan)}}"
                                                target="_blank" type="button" download="{{$perjalanan_dinas->no_surat}}"
                                                class="btn btn-sm btn-light btn-sm btn-download text-secondary"><i
                                                    class="fa fa-download "></i></a>
                                            <a href="#" data-toggle="modal"
                                                data-target="#modal_form_hapus_perjalanan_dinas"
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
        </div>
    </div>

</div>

@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset ('js/custom_js/perjalanan_dinas/data_perjalanan_dinas.js') }}"></script>
@endsection