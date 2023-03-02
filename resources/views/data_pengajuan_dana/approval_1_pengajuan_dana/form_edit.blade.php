<div id="page_edit_pengajuan_dana" style="display:none;padding-right:2rem;padding-left:2rem;">
    <div class="card-body d-flex justify-content-end " style="padding-top:0px;">
        <button type="button" id="btn-batal" class="btn btn-light text-secondary"><i class="fas fa-times"></i></button>
    </div>
    <form id="form_edit_pengajuan_dana" action="#" method="post" multipart="multipart/form-data">
        @csrf
        <div class="card-body text-secondary row" style="padding-bottom:0px;">
            <!-- <h6 class="modal-title" id="modal_label_divisi">Form Edit Surat keluar</h6> -->
            <style>
            .table td,
            .table th {
                padding: 0.2rem;
                vertical-align: unset;
                border-top: unset;
            }

            button {
                border-radius: 5px;
                border-width: 0;
            }

            select.form-control-sm~.select2-container--default {
                font-size: 0.75rem;
            }

            .select2-container--default .select2-selection--single .select2-selection__clear {
                /* cursor: pointer;
                                    float: right;
                                    font-weight: bold; */
                margin-right: 1rem;
                bottom: 3px;
            }
            </style>
            <style>
            .table td,
            .table th {
                padding: 0.2rem;
                vertical-align: unset;
                border-top: unset;
            }
            </style>

            <div class="form-group col-md-6">
                <label class="text-red-700" for="id_kategori">Kategori Pengajuan</label>
                <span class="required text-danger">*</span>
                <span class="required text-secondary"><button id="btn_panduan" type="button"
                        class="btn-light  bg-white text-secondary">
                        <i class="fas fa-question">
                        </i>
                    </button>
                </span>
                <select name="id_kategori" id="id_kategori" required="reuqired"
                    class="form-control form-control-sm select2" data-select2-id="1">
                    <option value="">Pilih</option>
                    @foreach ($data_kategori_dana as $id_kategori_dana => $nama_kategori)
                    <option value="{{$id_kategori_dana}}">{{$nama_kategori}}</option>
                    @endforeach
                </select>
                <!-- <div class="input-group-append">
                                        <button type="button" id="generate_form" class="btn btn-secondary">Generate
                                            Form</button>
                                    </div> -->
            </div>
            <div class="form-group col-md-6">
                <label for="no_surat">No. Pengajuan : </label>
                <input type="hidden" name="id_pengajuan" id="id_pengajuan" value="" class="form-control form-control-sm"
                    required="reuqired" readonly="readonly">
                <input type="text" name="no_surat" id="no_surat" value="" class="form-control form-control-sm"
                    required="reuqired" readonly="readonly" placeholder="no. surat">
            </div>
        </div>
        <div id="all_form_field" style="">
            <div class="card-body text-secondary table-responsive" id="informasi_perpajakan" style="display:none;">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <label>
                        <h6>Informasi Perpajakan</h6>
                    </label>
                </div>
                <table class="table table-sm " width="100%">
                    <style>
                    .table td,
                    .table th {
                        padding: 0.25rem;
                        vertical-align: unset;
                        border-top: 1px solid #dee2e6;
                    }

                    button {
                        border-radius: 5px;
                        border-width: 0;
                    }

                    .btn-group-sm>.btn,
                    .btn-sm {
                        padding: 0.25rem 0.5rem;
                        font-size: .75rem;
                        border-radius: 0.2rem;
                    }

                    p {
                        margin-top: 7px;
                        margin-bottom: 4px;
                    }
                    </style>
                    <tbody id="pajak_field_1" style="border-top:0px;display:none;">
                        <tr>
                            <th class=" text-center" width="15%">Jenis Pajak</th>
                            <th class="text-center" width="35%">Kelengkapan</th>
                            <th class="text-center" width="15%">Persentase</th>
                            <th class="text-center" width="15%">Checklist</th>
                            <th class="text-center" width="20%">Potong/Tanggung</th>
                        </tr>
                        @foreach ($jenis_pajak as $pajak)
                        <tr class="item_pajak_{{$pajak->id}}">
                            <td class="text-center">{{$pajak->nama_pajak}}</td>
                            <td class="text-center">{{$pajak->keterangan}}</td>
                            <td class="text-center">{{$pajak->persentase}}</td>
                            <td class="text-center">
                                <div class="icheck-secondary d-inline">
                                    <input type="checkbox" id="checkbox_pajak_{{$pajak->id}}">
                                    <label for="checkbox_pajak_{{$pajak->id}}">
                                    </label>
                                </div>
                            </td>
                            @if ($pajak->id != 1)
                            <td>
                                <select name="val_ppn" id="status_pajak_{{$pajak->id}}" disabled
                                    class="form-control form-control-sm select-pajak select2"
                                    data-select2-id="data-select-{{$pajak->id}}">
                                    <option value="">Pilih</option>
                                    <option value="potong">Potong</option>
                                    <option value="tanggung">Tanggung</option>
                                </select>
                            </td>
                            @else
                            <td class="text-center">-</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tbody id="pajak_field_2" style="border-top:0px;display:none;">
                        <tr>
                            <th class=" text-center" width="15%">Jenis Pajak</th>
                            <th class="text-center" width="35%">Kelengkapan</th>
                            <th class="text-center" width="15%">Persentase</th>
                            <th class="text-center" width="15%">Checklist</th>
                            <th class="text-center" width="20%">Potong/Tanggung</th>
                        </tr>
                        <tr class="item_pajak_1">
                            <td class="text-center">PPN</td>
                            <td class="text-center">-</td>
                            <td class="text-center">11%</td>
                            <td class="text-center">
                                <div class="icheck-secondary d-inline">
                                    <input type="checkbox" id="checkbox_pajak">
                                    <label for="checkbox_pajak">
                                    </label>
                                </div>
                            </td>
                            <td class="text-center">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-body text-secondary row" id="informasi_pembayaran">
                <label>
                    <h6>Informasi Pembayaran</h6>
                </label>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="tgl_pengajuan">Tgl. Pengajuan</label>
                        <div class="col-sm-8">
                            <input type="date" name="tgl_pengajuan" id="tgl_pengajuan"
                                class="form-control form-control-sm" value="" readonly placeholder="tgl_pengajuan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="id_metode">Metode</label>
                        <div class="col-sm-8">
                            <select name="id_metode" id="id_metode" required="reuqired"
                                class="form-control form-control-sm select2" data-select2-id="9">
                                <option value="">Pilih</option>
                                @foreach ($metode_pembayaran as $id => $nama_metode)
                                <option value="{{$id}}">{{$nama_metode}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="keperluan">Keperluan</label>
                        <div class="col-sm-8">
                            <textarea rows="3" type="text" name="keperluan" id="keperluan" style="height: 4.875rem;"
                                class="form-control form-control-sm" required="reuqired" value=""></textarea>
                        </div>
                    </div>
                </div>
                <div id="detail_metode_field">

                </div>

            </div>
            <div class="card-body text-secondary" id="informasi_lampiran" style="display:none">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <label>
                        <h6>Kelengkapan</h6>
                    </label>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="npwp">NPWP</label>
                            <div class="col-sm-8">
                                <input type="text" name="npwp" id="npwp" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="npwp">File NPWP</label>
                            <div class="col-sm-8">
                                <p id="no_file_npwp">Tidak Ada</p>
                                <a id="file_npwp_field" href="#" target="_blank"
                                    class="btn btn-sm btn-default text-secondary">
                                    Lihat <i class="fa fa-file-contract"></i>
                                </a>
                                <input type="file" name="file_npwp" id="file_npwp" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="file_invoice">Invoice</label>
                            <div class="col-sm-8">
                                <p id="no_file_invoice">Tidak Ada</p>
                                <a id="file_invoice_field" href="#" target="_blank"
                                    class="btn btn-sm btn-default text-secondary">
                                    Lihat <i class="fa fa-file-contract"></i>
                                </a>
                                <input type="file" name="file_invoice" id="file_invoice"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="npwp">Bukti Pembayaran</label>
                            <div class="col-sm-8">
                                <p id="no_file_bukti_bayar">Tidak Ada</p>
                                <a id="file_bukti_bayar_field" href="#" target="_blank"
                                    class="btn btn-sm btn-default text-secondary">
                                    Lihat <i class="fa fa-file-contract"></i>
                                </a>
                                <input type="file" name="file_bukti_bayar" id="file_bukti_bayar"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="nik">NIK</label>
                            <div class="col-sm-8">

                                <input type="text" name="nik" id="nik" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="ktp">File KTP</label>
                            <div class="col-sm-8">
                                <p id="no_file_ktp">Tidak Ada</p>
                                <a id="file_ktp_field" href="#" target="_blank"
                                    class="btn btn-sm btn-default text-secondary">
                                    Lihat <i class="fa fa-file-contract"></i>
                                </a>
                                <input type="file" name="file_ktp" id="file_ktp" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="ktp">Bukti Potong</label>
                            <div class="col-sm-8">
                                <p id="no_file_fp_internal">Tidak Ada</p>
                                <a id="file_fp_internal_field" href="#" target="_blank"
                                    class="btn btn-sm btn-default text-secondary">
                                    Lihat <i class="fa fa-file-contract"></i>
                                </a>
                                <input type="file" name="file_fp_internal" id="file_fp_internal"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">

                    </div> -->
                </div>

                <div class="">
                    <label>
                        Lampiran Lain
                    </label>
                    <div class="icheck-secondary d-inline">
                        <input type="checkbox" id="checkbox_lampiran">
                        <label for="checkbox_lampiran">
                        </label>
                    </div>
                </div>
                <div id="lampiran_lain_field" style="display:none;">
                </div>
            </div>
            <div class="card-body text-secondary row" id="informasi_pembayaran">
                <label>
                    <h6>Informasi Status</h6>
                </label>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Approval SPV</label>
                        <label class="col-sm-3 col-form-label" id="status_approval_spv"
                            style="font-weight:unset;"></label>
                        <div class="col-sm-5" id="btn_approval_1_field">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Approval SPV Finance</label>
                        <label class="col-sm-3 col-form-label" id="status_approval_spv_finance"
                            style="font-weight:unset;"></label>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Status Pembayaran</label>
                        <label class="col-sm-3 col-form-label" id="status_paid" style="font-weight:unset;"></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Validasi Perpajakan</label>
                        <label class="col-sm-3 col-form-label" id="status_validasi" style=" font-weight:unset;"></label>
                    </div>
                </div>

            </div>
            <div id="" class="form-group text-right">
                <button type="button" id="btn-edit" class="btn btn-sm btn-light text-secondary">Edit</button>
                <button type="submit" class="btn btn-sm btn-secondary text-white">Simpan</button>
            </div>

        </div>
    </form>
</div>