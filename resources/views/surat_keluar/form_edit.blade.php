<div class="modal fade" id="modal_form_edit_surat_keluar" tabindex="-1" role="dialog" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label_divisi">Form Edit Surat keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post" id="form_edit_surat_keluar" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body" id="form_field">
                    <div class="form-group">
                        <label for="id_divisi_edit">Divisi : </label>
                        <span class="required text-danger">*</span>
                        <select name="id_divisi" id="id_divisi_edit" required="reuqired"
                            class="form-control custom-select">
                            <option value="">-- Pilih --</option>
                            @foreach ($data_divisi as $id_divisi => $nama_divisi)
                            <option value="{{$id_divisi}}">{{$nama_divisi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_jenis_edit">Jenis Surat : </label>
                        <span class="required text-danger">*</span>
                        <select name="id_jenis" id="id_jenis_edit" required="reuqired"
                            class="form-control custom-select">
                            <option value="">-- Pilih --</option>
                            @foreach ($data_jenis_surat as $id_jenis => $nama_jenis)
                            <option value="{{$id_jenis}}">{{$nama_jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="id_update" id="id_update" class="form-control" required="reuqired"
                        value="" />
                    <div class="form-group">
                        <label for="no_arsip_edit">No. Arsip : </label>
                        <input type="text" name="no_arsip" id="no_arsip_edit" class="form-control" required="reuqired"
                            placeholder="no. arsip" />
                    </div>
                    <div class="form-group">
                        <label for="no_surat">No. Surat : </label>
                        <input type="text" name="no_surat" id="no_surat" class="form-control" required="reuqired"
                            placeholder="no. surat" />
                    </div>
                    <div class="form-group">
                        <label for="tgl_dikirim">Tgl. Dikirim : </label>
                        <input type="date" name="tgl_dikirim" id="tgl_dikirim" class="form-control" required="reuqired"
                            value="" />
                    </div>
                    <div class="form-group">
                        <label for="tgl_surat">Tgl. Surat : </label>
                        <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" required="reuqired" />
                    </div>

                    <div class="form-group">
                        <label for="penerima">penerima : </label>
                        <input type="text" name="penerima" id="penerima" class="form-control" required="reuqired"
                            placeholder="penerima" />
                    </div>
                    <div class="form-group">
                        <label for="resume">Resume : </label>
                        <textarea type="text" name="resume" id="resume" class="form-control" required="reuqired"
                            placeholder="resume"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan : </label>
                        <textarea type="text" name="keterangan" id="keterangan" class="form-control" required="reuqired"
                            placeholder="keterangan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_surat">File Surat : </label>
                        <h6 id="no_file">No File</h6>
                        <a id="file_field" href="#" target="_blank" class="btn btn-light text-secondary">
                            <i class="fa fa-file-contract"></i>
                        </a>
                        <input type="file" name="file_surat" id="file_surat" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-light btn-edit-form">Edit</button>
                        <button type="submit" class="btn btn-secondary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>