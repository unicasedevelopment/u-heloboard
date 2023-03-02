<div class="row d-flex justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-secondary">
                <h5 class="card-title" id="card_label_divisi">Form Pengajuan Dana</h5>
            </div>
            <form id="form_pengajuan_dana" action="#" method="post" multipart="multipart/form-data">
                <div class="card-body text-secondary" style="padding-bottom:0px;">
                    <div id="panduan_keperluan" class=" text-secondary mb-2 bg-light p-2"
                        style="display:none;border-radius:10px;font-size:0.6rem;">
                        <table class="table border-light mb-0" width="60%">
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
                            <tbody id="" class="border-light">
                                <tr>
                                    <th class="p-1" width="15%"><b>Kategori</b></th>
                                    <th class="p-1"><b>Penggunaan</b></th>
                                </tr>
                                @foreach ($data_kategori as $kategori)
                                <tr>
                                    <td class="p-0">{{$kategori->nama_kategori}}</td>
                                    <td class="p-0">{{$kategori->penggunaan}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label class="text-red-700" for="id_kategori">Kategori Pengajuan</label>
                        <span class="required text-danger">*</span>
                        <span class="required text-secondary"><button id="btn_panduan" type="button"
                                class="btn-light  bg-white text-secondary">
                                <i class="fas fa-question">
                                </i>
                            </button>
                        </span>
                        <select name="id_kategori" id="id_kategori" required="reuqired"
                            class="form-control form-control-sm select2" data-select2-id="1"
                            style="width: 100% !important;">
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
                    <div id="tata_cara" class=" text-secondary mb-2 bg-light p-2"
                        style="display:none;border-radius:10px;font-size:0.6rem;">
                        <table class="table border-light mb-0" width="60%">
                            <style>
                            .table td,
                            .table th {
                                padding: 0.2rem;
                                vertical-align: unset;
                                border-top: unset;
                            }
                            </style>
                            <tbody id="" class="border-light">
                                <tr>
                                    <th class="p-1"><b>Tata Cara dan Ketentuan</b></th>
                                </tr>
                                <tr>
                                    <td class="p-0">
                                        <ol type="1">
                                            <li>Untuk setiap transaksi, staff wajib tanya ke suplier</li>
                                            <ol type="a">
                                                <li>Apakah ada / bisa keluar faktur pajak</li>
                                                <li>Untuk tipe transaksi selain barang, apakah pajak atas jasa /
                                                    iklan /
                                                    komisi / sewa / dipotong dari invoice</li>
                                            </ol>
                                            <li>Jika ada transaksi yang belum dapat invoice dan telah dilakukan
                                                pembayaran oleh adm. finance. tanggung jawab penyimpanan dan
                                                penagihan
                                                softcopy invoice menjadi tanggung jawab adm. finance</li>
                                        </ol>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="all_form_field" style="display:none;">
                    <div class="card-body text-secondary">
                        <div class="form-group">
                            <label for="no_surat">No. Pengajuan : </label>
                            <div class="input-group">
                                <input type="text" name="no_surat" id="no_surat" value="{{$no_surat}}"
                                    class="form-control form-control-sm" required="reuqired" readonly="readonly"
                                    placeholder="no. surat">
                                <div class="input-group-append">
                                    <button type="button" id="generate_no_surat" class="btn btn-sm btn-secondary"
                                        style="font-size:0.75rem;">Generate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-secondary table-responsive" id="informasi_perpajakan"
                        style="display:none;">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label>
                                <h6>Informasi Perpajakan</h6>
                            </label>
                        </div>
                        <table class="table table-sm " width="100%" id="test">
                            <style>
                            .table td,
                            .table th {
                                padding: 0.5rem;
                                vertical-align: unset;
                                border-top: 1px solid #dee2e6;
                            }

                            button {
                                border-radius: 5px;
                                border-width: 0;
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
                                            <input type="checkbox" id="checkbox_pajak_{{$pajak->id}}"
                                                class="checkbox_pajak" required="reuqired">
                                            <label for="checkbox_pajak_{{$pajak->id}}">
                                            </label>
                                        </div>
                                    </td>
                                    @if ($pajak->id != 1)
                                    <td>
                                        <select name="val_ppn" id="status_pajak_{{$pajak->id}}" disabled
                                            class="form-control form-control-sm select2" required="reuqired"
                                            data-select2-id="data-select-{{$pajak->id}}">
                                            <option value="">Pilih</option>
                                            <option value="tanggung">Tanggung</option>
                                            <option value="potong">Potong</option>
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
                            <div id="informasi_vendor_tambahan">

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="tgl_pengajuan">Tgl. Pengajuan</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tgl_pengajuan" id="tgl_pengajuan"
                                        class="form-control form-control-sm" value="{{date('Y-m-d')}}" readonly
                                        placeholder="tgl_pengajuan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="id_metode">Metode</label>
                                <div class="col-sm-8">
                                    <select name="id_metode" id="id_metode" required="reuqired" disabled
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
                                    <textarea rows="3" type="text" name="keperluan" id="keperluan"
                                        style="height: 4.875rem;" class="form-control form-control-sm"
                                        required="reuqired" value=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="detail_metode_field">

                        </div>

                    </div>
                    <div class="card-body text-secondary row" id="informasi_detail_refund" style="display:none;">
                        <label>
                            <h6>Informasi Detail Refund</h6>
                        </label>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="no_invoice">No. Invoice</label>
                                <div class="col-sm-8">
                                    <input type="text" name="no_invoice" id="no_invoice"
                                        class="form-control form-control-sm" required="reuqired">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="no_retur">No. Retur</label>
                                <div class="col-sm-8">
                                    <input type="text" name="no_retur" id="no_retur"
                                        class="form-control form-control-sm" required="reuqired">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="alasan_refund">Alasan Refund</label>
                                <div class="col-sm-8">
                                    <input type="text" name="alasan_refund" id="alasan_refund"
                                        class="form-control form-control-sm" required="reuqired">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="no_inv_pengganti">No. Inv Pengganti</label>
                                <div class="col-sm-8">
                                    <input type="text" name="no_inv_pengganti" id="no_inv_pengganti"
                                        class="form-control form-control-sm" required="reuqired">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="pilihan_cashback">Pilihan Cashback</label>
                                <div class="col-sm-8">
                                    <input type="text" name="pilihan_cashback" id="pilihan_cashback"
                                        class="form-control form-control-sm" required="reuqired">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="barcode_barang">Barcode Barang</label>
                                <div class="col-sm-8">
                                    <textarea rows="3" type="text" name="barcode_barang" id="barcode_barang"
                                        style="height: 4.875rem;" class="form-control form-control-sm"
                                        required="reuqired" value=""></textarea>
                                </div>
                            </div>

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
                                        <input type="text" name="npwp" id="npwp" maxlength="15"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="npwp">File NPWP</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="file_npwp" id="file_npwp"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="nik">NIK</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nik" id="nik" maxlength="16" pattern=".{17,}" autofocus
                                            title="Masukkan 16 Digit NIK" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="ktp">File KTP</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="file_ktp" id="file_ktp"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="file_invoice">Invoice</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="file_invoice" id="file_invoice"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
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

                    <div class="card-footer">
                        <div class="form-group text-right">
                            {!! Form::submit('Simpan', ['class'=>'btn btn-sm btn-secondary text-white']) !!}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>