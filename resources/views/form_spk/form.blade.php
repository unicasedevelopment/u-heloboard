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
</style>

<div class="row d-flex justify-content-center">
    <div class="col-12">
        <div class="card text-secondary">
            <div class="card-header">
                <div class="row-cols-12 d-flex justify-content-between" style="padding:0px 1.25rem;">
                    <h5 style="margin:0px;" class="card-title">Form Kerja General Affair</h5>
                </div>
            </div>
            <form action="#" id="form_spk" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="no_surat">No. Surat : </label>
                        <span class="required text-danger">*</span>
                        <div class="input-group mb-3">
                            <input type="text" name="no_surat" id="no_surat" value="{{$no_surat}}" class="form-control"
                                required="reuqired" readonly="readonly" placeholder="no. surat">
                            <div class="input-group-append">
                                <button type="button" id="generate_no_surat" class="btn btn-secondary">Generate</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_perintah">Jenis Perintah : </label>
                        <span class="required text-danger">*</span>
                        <select name="jenis_perintah" id="jenis_perintah" required="reuqired"
                            class="form-control select2" data-select2-id="1">
                            <option value="">Pilih</option>
                            <option value="Peningkatan Sistem">Peningkatan Sistem (Spv. Up)</option>
                            <option value="Permintaan Alat Tulis Kantor">Permintaan Alat Tulis Kantor (Spv. Up)</option>
                            <option value="Permintaan Barang/Jasa">Permintaan Barang/Jasa (Spv. Up)</option>
                            <option value="Permintaan Hak Akses Sistem">Permintaan Hak Akses Sistem (Spv. Up)</option>
                            <option value="Perbaikan Barang/ Jasa">Perbaikan Barang/Jasa</option>
                            <option value="Laporan Kendala Barang/Jasa/Sistem">Laporan Kendala Barang/Jasa/Sistem
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Lengkap : </label>
                        <span class="required text-danger">*</span>
                        <input type="text" name="name" id="name" class="form-control" required="reuqired"
                            placeholder="nama" />
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan : </label>
                        <span class="required text-danger">*</span>
                        <input type="text" name="jabatan" id="jabatan" class="form-control" required="reuqired"
                            placeholder="jabatan" />
                    </div>
                    <div class="form-group">
                        <label for="divisi">Departemen : </label>
                        <span class="required text-danger">*</span>
                        <select name="divisi" id="divisi" required="reuqired" class="form-control select2"
                            data-select2-id="2">
                            <option value="">Pilih</option>
                            <option value="Finance Accounting and Tax">Finance Accounting and Tax</option>
                            <option value="HC & GA">HC & GA</option>
                            <option value="Marketing & Sales">Marketing & Sales</option>
                            <option value="Operasional">Operasional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deadline">Deadline : </label>
                        <input type="date" name="deadline" id="deadline" class="form-control" required="reuqired"
                            placeholder="deadline" />
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Detail / Spesifikasi Pekerjaan : </label>
                        <span class="required text-danger">*</span>
                        <textarea type="text" name="deskripsi" id="deskripsi" class="form-control" required="reuqired"
                            placeholder="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_spk">Lampiran (optional): </label>
                        <input type="file" id="file_spk" name="file_spk[]" class="form-control" multiple />
                        <!-- <span class="">Upload sekaligus jika lampiran lebih dari 1 file</span> -->
                    </div>
                    <div class="form-grup">
                        <div id="files-area row">
                            <span id="filesList">
                                <span id="files-names"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-grup">
                        <label for="tanda_tangan">Tanda Tangan : </label>
                        <br>
                        <section class="signature-component">
                            <canvas id="signature-pad" width="300px;" height="150"></canvas>
                            <div>
                                <button type="button" class="btn btn-light" id="clear">Clear</button>
                            </div>
                        </section>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="form-group text-right">
                        <button type="submit" id="submit" class="btn btn-secondary">Submit</button>
                        <!-- <button type="button" id="eksport" class="btn btn-secondary">Eksport</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>