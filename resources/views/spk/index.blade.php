@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            @include('spk.form_delete')
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
                                    @foreach($data_spk as $spk)
                                    <tr class="odd " id="{{$spk->id}}">
                                        <td style="vertical-align: middle;">{{ $spk->no_spk}} </td>
                                        <td style="vertical-align: middle;">{{$spk->jenis_perintah}} </td>
                                        <td style="vertical-align: middle;">{{ $spk->nama_lengkap }}</td>
                                        <td style="vertical-align: middle;">
                                            {{ $spk->divisi }}</td>
                                        <td class="dtr-control sorting_1" tabindex="0" style="vertical-align: middle;">
                                            {{ $spk->jabatan }}</td>
                                        <td style="vertical-align: middle;">{{ $spk->deadline }}</td>
                                        @if (str_word_count($spk->detail) > 4)
                                        <td style="vertical-align: middle;">{{substr($spk->detail,0,30).'...'}}</td>
                                        @else
                                        <td style="vertical-align: middle;">{{$spk->detail}}</td>
                                        @endif
                                        <td class="text-center text-white" style="vertical-align: middle;">
                                            <a href="{{ asset ('storage/' . $spk->file_fpk)}}" target="_blank"
                                                type="button" download="{{$spk->no_spk}}"
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
        </div>
    </div>

</div>

@endsection

@section('javascript')
<script src="{{ asset ('js/custom_js/fpk/fpk.js') }}"></script>
@endsection