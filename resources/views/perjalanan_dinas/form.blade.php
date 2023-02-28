<style>
#files-area {
    width: 30%;
    margin: 0 auto;
}

.file-block {
    border-radius: 10px;
    /* background-color: rgba(144, 163, 203, 0.2); */
    background-color: #f8f9fa;
    margin: 5px;
    color: initial;
    display: inline-flex;

}

.file-block span.name {
    padding-right: 10px;
    width: max-content;
    display: inline-flex;
    align-items: center;
}

.file-delete {
    display: flex;
    width: 24px;
    color: initial;
    background-color: #6eb4ff00;
    font-size: large;
    justify-content: center;
    margin-right: 3px;
    cursor: pointer;

}

.file-delete:hover {
    background-color: rgba(144, 163, 203, 0.2);
    border-radius: 10px;

}

.file-delete span {
    transform: rotate(45deg);
}


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

.select2 {
    width: 100% !important;
}
</style>

<div class="row d-flex justify-content-center">
    <div class="col-9">
        <div class="card">
            <form action="#" id="form_perjalanan_dinas" enctype="multipart/form-data">
                @csrf
                <div class="card-header text-secondary">
                    <h5 class="card-title" id="card_label_divisi">Form Pengajuan Perjalanan Dinas</h5>
                </div>
                <div class="card-body text-secondary row">
                    <div class="col-md-6">
                        <label>
                            <h6>Informasi Identitas</h6>
                        </label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama" id="nama" class="form-control form-control-sm"
                                    required="reuqired" placeholder="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="nik">NIK</label>
                            <div class="col-sm-8">
                                <input type="text" name="nik" id="nik" class="form-control form-control-sm"
                                    required="reuqired" placeholder="nik">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="jabatan">Level Jabatan</label>
                            <div class="col-sm-8">
                                <!-- <input type="text" name="jabatan" id="jabatan" class="form-control form-control-sm"
                                    required="reuqired" placeholder="jabatan"> -->
                                <select name="jabatan" id="jabatan" required="reuqired"
                                    class="form-control form-control-sm select2" data-select2-id="0">
                                    <option value="">Pilih</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Koordinator">Koordinator</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="General Supervisor">General Supervisor</option>
                                    <option value="Manager">Manager</option>
                                    <option value="General Manager">General Manager</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="departemen">Departemen</label>
                            <div class="col-sm-8">
                                <select name="departemen" id="departemen" required="reuqired"
                                    class="form-control form-control-sm select2" data-select2-id="1">
                                    <option value="">Pilih</option>
                                    <option value="Finance Accounting and Tax">Finance Accounting and Tax</option>
                                    <option value="HRD-GA">HRD-GA</option>
                                    <option value="Marketing & Sales">Marketing & Sales</option>
                                    <option value="Operasional">Operasional</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="departemen">Nomor Rekening</label>
                            <div class="col-sm-4 pr-0">
                                <select name="provider" id="provider" required="reuqired"
                                    class="form-control form-control-sm select2" data-select2-id="10">
                                    <option value="">Pilih</option>
                                    <option value="BCA">BCA</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <input style="display: none;" type="text" name="other_provider" id="other_provider"
                                    class="form-control form-control-sm" placeholder="Nama Bank ...">
                            </div>
                            <div class="col-sm-4 pl-0">
                                <input type="text" name="norek" id="norek" class="form-control form-control-sm"
                                    required="reuqired" placeholder="nomor rekening">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <label>
                            <h6>Informasi Perjalanan</h6>
                        </label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="no_surat">No. Form : </label>
                            <div class="col-sm-8">
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
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="no_surat_tugas">No. Surat Tugas</label>
                            <div class="col-sm-8">
                                <input type="text" name="no_surat_tugas" id="no_surat_tugas"
                                    class="form-control form-control-sm" required="reuqired"
                                    placeholder="nomor surat tugas">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="tujuan">Keperluan</label>
                            <div class="col-sm-8">
                                <input type="text" name="tujuan" id="tujuan" class="form-control form-control-sm"
                                    required="reuqired" placeholder="keperluan perjalanan dinas">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="area">Area Dinas</label>
                            <div class="col-sm-8">
                                <select name="area" id="area" required="reuqired"
                                    class="form-control form-control-sm select2" data-select2-id="1">
                                    <option value="">Pilih</option>
                                    <option value="Jawa Timur">Jawa Timur</option>
                                    <option value="Jabodetabek">Jabodetabek</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="konsumsi">Konsumsi</label>
                            <div class="col-sm-8">
                                <input type="number" min="0" name="konsumsi" id="konsumsi"
                                    class="form-control form-control-sm" required="reuqired" placeholder="konsumsi">
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="">Durasi</label>
                            <div class="col-sm-4">
                                <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                    <input type="number" min="0" name="durasi_hari" id="durasi_hari" required="reuqired"
                                        class="form-control form-control-sm" placeholder="0">
                                    <div class="input-group-append">
                                        <span class="input-group-text text-secondary"><i class="fas fa-sun"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                    <input type="number" min="0" max="" name="durasi_malam" id="durasi_malam"
                                        required="reuqired" class="form-control form-control-sm" placeholder="0">
                                    <div class="input-group-append">
                                        <span class="input-group-text text-secondary"><i class="fas fa-moon"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                </div>
                <div class="card-body text-secondary row">
                    <div class="col-md-6">
                        <label>
                            <h6>Informasi Keberangkatan</h6>
                        </label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="lokasi_keberangkatan">Lokasi</label>
                            <div class="col-sm-8">
                                <input type="text" name="lokasi_keberangkatan" id="lokasi_keberangkatan"
                                    required="reuqired" class="form-control form-control-sm"
                                    placeholder="lokasi_keberangkatan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="tgl_keberangkatan">Tanggal & Jam</label>
                            <div class="col-sm-5 pr-0">
                                <input type="date" name="tgl_keberangkatan" id="tgl_keberangkatan" required="reuqired"
                                    class="form-control form-control-sm" placeholder="tgl_keberangkatan">
                            </div>
                            <div class="col-sm-3 pl-0">
                                <input type="time" name="jam_keberangkatan" id="jam_keberangkatan" required="reuqired"
                                    class="form-control form-control-sm" placeholder="">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="transportasi_keberangkatan">Transportasi</label>
                            <div class="col-sm-8">
                                <select name="transportasi_keberangkatan" id="transportasi_keberangkatan"
                                    required="reuqired" class="form-control form-control-sm select2"
                                    data-select2-id="3">
                                    <option value="">Pilih</option>
                                    <option value="Pesawat">Pesawat</option>
                                    <option value="Kereta Api">Kereta Api</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Travel">Travel</option>
                                    <option value="Kendaraan Kantor">Kendaraan Kantor</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <label>
                            <h6>Informasi Kedatangan</h6>
                        </label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="lokasi_kedatangan">Lokasi</label>
                            <div class="col-sm-8">
                                <input type="text" name="lokasi_kedatangan" id="lokasi_kedatangan" required="reuqired"
                                    class="form-control form-control-sm" placeholder="lokasi_kedatangan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="tgl_kedatangan">Tanggal & Jam</label>
                            <div class="col-sm-5 pr-0">
                                <input type="date" name="tgl_kedatangan" id="tgl_kedatangan" required="reuqired"
                                    class="form-control form-control-sm" placeholder="tgl_kedatangan">
                            </div>
                            <div class="col-sm-3 pl-0">
                                <input type="time" name="jam_kedatangan" id="jam_kedatangan" required="reuqired"
                                    class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="transportasi_kedatangan">Transportasi</label>
                            <div class="col-sm-8">
                                <select name="transportasi_kedatangan" id="transportasi_kedatangan" required="reuqired"
                                    class="form-control form-control-sm select2" data-select2-id="4">
                                    <option value="">Pilih</option>
                                    <option value="Pesawat">Pesawat</option>
                                    <option value="Kereta Api">Kereta Api</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Travel">Travel</option>
                                    <option value="Kendaraan Kantor">Kendaraan Kantor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body text-secondary row">
                    <div class="col-md-12">
                        <label>
                            <h6>Catatan Tambahan</h6>
                        </label>
                        <div class="form-group">
                            <textarea type="text" rows="4" name="catatan_tambahan" id="catatan_tambahan"
                                required="reuqired" class="form-control form-control-sm" placeholder=""></textarea>
                        </div>
                        <div class="form-grup">
                            <label>
                                <h6>Tanda Tangan Pemohon</h6>
                            </label>
                            <br>
                            <section class="signature-component">
                                <canvas id="signature-pad" width="300px;" height="150"></canvas>
                                <div>
                                    <button type="button" class="btn btn-sm btn-light text-secondary"
                                        id="clear">Clear</button>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="form-group text-right">
                        <button type="submit" id="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>