@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Form Surat
                </div>
            </div>
            <div class="card-body">
                <form action="" method="" id="form_buat_surat" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body" id="field_form">
                        <div class="form-group">
                            <label for="id_divisi">Divisi : </label>
                            <span class="required text-danger">*</span>
                            <input type="hidden" name="id_divisi" id="id_divisi" value="{{$data_surat['id_divisi']}}">
                            <input type="text" class="form-control" value="{{$data_surat['nama_divisi'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="id_jenis">Jenis Surat : </label>
                            <span class="required text-danger">*</span>
                            <input type="hidden" name="id_jenis" id="id_jenis" value="{{$data_surat['id_jenis']}}">
                            <input type="text" class="form-control" value="{{$data_surat['nama_jenis'] }}" readonly>
                        </div>
                        <label for="no_arsip">No. Arsip : </label>
                        <div class="input-group mb-3">
                            <input type="text" name="no_arsip" id="no-arsip" class="form-control" required="reuqired"
                                value="{{$data_surat['no_arsip']}}" readonly placeholder="no. arsip" />
                            <div class="input-group-append">
                                <button type="button" id="generate_no_arsip" class="btn btn-secondary">Generate</button>
                            </div>
                        </div>
                        <label for="no_arsip">No. Surat : </label>
                        <div class="input-group mb-3">
                            <input type="text" name="no_surat" id="no_surat" class="form-control" required="reuqired"
                                value="{{$data_surat['no_surat']}}" readonly placeholder="no. surat" />
                            <div class="input-group-append">
                                <button type="button" id="generate_no_surat" class="btn btn-secondary">Generate</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="judul">Judul : </label>
                            <input type="text" name="judul" id="judul" class="form-control" required="reuqired"
                                placeholder="judul" />
                        </div>
                        <div class="form-group">
                            <label for="pembuka">Pembuka : </label>
                            <textarea type="text" id="pembuka" name="pembuka" class="form-control" required="reuqired"
                                placeholder="pembuka"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi : </label>
                            <textarea type="text" id="isi" name="isi" class="form-control" required="reuqired"
                                placeholder="isi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="penutup">Penutup : </label>
                            <textarea type="text" id="penutup" name="penutup" class="form-control" required="reuqired"
                                placeholder="penutup"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="mengetahui">Mengetahui : </label>
                            <input type="text" name="mengetahui" id="mengetahui" class="form-control"
                                required="reuqired" placeholder="pic_mengetahui" />
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nama_1">Pihak Pertama : </label>
                                <input type="text" name="nama_1" id="nama_1" class="form-control mb-3"
                                    required="reuqired" placeholder="nama pihak 1" />
                                <input type="text" name="divisi_1" id="divisi_1" class="form-control mb-3"
                                    required="reuqired" placeholder="divisi pihak 1" />
                                <input type="text" name="jabatan_1" id="jabatan_1" class="form-control mb-3"
                                    required="reuqired" placeholder="jabatan pihak 1" />
                                <input type="text" name="keterangan_1" id="keterangan_1" class="form-control mb-3"
                                    required="reuqired" placeholder="keterangan pihak 1" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_2">Pihak Kedua : </label>
                                <input type="text" name="nama_2" id="nama_2" class="form-control mb-3"
                                    required="reuqired" placeholder="nama pihak 2" />
                                <input type="text" name="divisi_2" id="divisi_2" class="form-control mb-3"
                                    required="reuqired" placeholder="divisi pihak 2" />
                                <input type="text" name="jabatan_2" id="jabatan_2" class="form-control mb-3"
                                    required="reuqired" placeholder="jabatan pihak 2" />
                                <input type="text" name="keterangan_2" id="keterangan_2" class="form-control mb-3"
                                    required="reuqired" placeholder="keterangan pihak 2" />
                            </div>

                            <table class="table  col-md-12" style="width:100%;">
                                <thead>
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <h5>
                                            Barang Terkait
                                        </h5>
                                        <button id="add_barang" type="button" class="btn btn-secondary"><i
                                                class="fa fa-plus"></i></button>
                                    </div>
                                </thead>
                                <tbody id="field_barang_terkait">
                                    <tr>
                                        <th width="45%">Nama barang</th>
                                        <th width="15%">Qty</th>
                                        <th width="30%">Kondisi</th>
                                        <th width="10%">Act</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="nama_barang[]" class="data-barang form-control"
                                                placeholder="Nama" required>
                                        </td>
                                        <td><input type="number" min="1" id="data-barang qty_barang" name="qty_barang[]"
                                                class="form-control" placeholder="Qty">
                                        </td>
                                        <td>
                                            <input type="text" name="keterangan_barang[]"
                                                class="data-barang form-control" placeholder="Kondisi">
                                        </td>
                                        <td>
                                            <button id="remove" type="button" class="btn btn-light text-secondary"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="form-group text-right">
                            <button type="button" id="simpan" class="btn btn-secondary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Preview Surat
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h6 id="judul_surat">[judul]</h6>
                    <h6 id="nomor_surat">[nomor_surat]</h6>
                </div>
                <p id="pembuka_surat">[pembuka_surat]</p>
                <div class="row">
                    <div class="col-md-2">
                        <p>Nama</p>
                        <p>Divisi</p>
                        <p>Jabatan</p>
                    </div>
                    <div class="col-md-10">
                        <p id="nama_pihak_1">[nama_pihak_1]</p>
                        <p id="divisi_pihak_1">[divisi_pihak_1]</p>
                        <p id="jabatan_pihak_1">[jabatan_pihak_1]</p>
                    </div>
                </div>

                <p id="keterangan_pihak_1">[keterangan_pihak_1]</p>

                <div class="row">
                    <div class="col-md-2">
                        <p>Nama</p>
                        <p>Divisi</p>
                        <p>Jabatan</p>
                    </div>
                    <div class="col-md-10">
                        <p id="nama_pihak_2">[nama_pihak_2]</p>
                        <p id="divisi_pihak_2">[divisi_pihak_2]</p>
                        <p id="jabatan_pihak_2">[jabatan_pihak_2</p>

                    </div>
                </div>
                <p id="keterangan_pihak_2">[keterangan_pihak_2]</p>
                <p id="isi_surat">[isi_surat]</p>
                <table id="table_barang" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody id="field_barang">
                        <tr>
                            <td id="no_urut">[No]</td>
                            <td id="field_nama_barang">[nama_barang]</td>
                            <td id="field_qty_barang">[qty_barang]</td>
                            <td id="field_keterangan_barang">[ket_barang]</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <p id="penutup_surat">[penutup_surat]</p>
                <table id="table_pihak" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">PIHAK PERTAMA</th>
                            <th class="text-center">PIHAK KEDUA</th>
                            <th class="text-center">MENGETAHUI</th>
                        </tr>
                    </thead>
                    <tbody id="field_pihak">
                        <tr>
                            <td style="padding-top:3rem !important;" class="text-center" id="ttd_pihak_1">[nama_pihak_1]
                            </td>
                            <td style="padding-top:3rem !important;" class="text-center" id="ttd_pihak_2">[nama_pihak_2]
                            </td>
                            <td style="padding-top:3rem !important;" class="text-center" id="ttd_mengetahui">
                                [mengetahui]
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')

<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
<!-- <script src="{{ asset ('js/custom_js/buat_surat/buat_surat.js') }}"></script> -->
<script src="{{ asset ('js/custom_js/buat_surat/berita_acara.js') }}"></script>
@endsection