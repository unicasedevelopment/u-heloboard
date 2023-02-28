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
                        <label for="tanggal">Tanggal : </label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required="reuqired"
                            placeholder="tanggal" />
                    </div>
                    <div class="form-group">
                        <label for="alamat_asal">Alamat Asal : </label>
                        <input type="text" name="alamat_asal" id="alamat_asal" class="form-control" required="reuqired"
                            placeholder="alamat_asal" />
                    </div>
                    <div class="form-group">
                        <label for="alamat_tujuan">Alamat Tujuan : </label>
                        <input type="text" name="alamat_tujuan" id="alamat_tujuan" class="form-control"
                            required="reuqired" placeholder="alamat_tujuan" />
                    </div>

                    <div class="form-group">
                        <label for="isi">Isi : </label>
                        <textarea type="text" id="isi" name="isi" class="form-control" required="reuqired"
                            placeholder="isi"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pengirim">Pengirim : </label>
                        <input type="text" name="pengirim" id="pengirim" class="form-control" required="reuqired"
                            placeholder="pic_pengirim" />
                    </div>
                    <div class="form-group">
                        <label for="mengetahui">Mengetahui : </label>
                        <input type="text" name="mengetahui" id="mengetahui" class="form-control" required="reuqired"
                            placeholder="pic_mengetahui" />
                    </div>
                    <div class="row">
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
                                    <th width="25%">Kode Barang</th>
                                    <th width="25%">Nama Barang</th>
                                    <th width="15%">Qty</th>
                                    <th width="25%">Kondisi</th>
                                    <th width="15%">Act</th>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="kode_barang[]" class="data-barang form-control"
                                            placeholder="Kode" required>
                                    </td>
                                    <td>
                                        <input type="text" name="nama_barang[]" class="data-barang form-control"
                                            placeholder="Nama" required>
                                    </td>
                                    <td><input type="number" min="1" id="data-barang qty_barang" name="qty_barang[]"
                                            class="form-control" placeholder="Qty">
                                    </td>
                                    <td>
                                        <input type="text" name="keterangan_barang[]" class="data-barang form-control"
                                            placeholder="Kondisi">
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