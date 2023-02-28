<div class="modal fade" id="modal_form_edit_surat_masuk" tabindex="-1" role="dialog" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label_divisi">Form Edit Data Surat Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post" id="form_edit_surat_masuk" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <input type="hidden" name="id_update" id="id_update" class="form-control" required="reuqired"
                        value="" />
                    <div class="form-group">
                        <label for="no_arsip">No. Arsip : </label>
                        <input type="text" name="no_arsip" id="no_arsip" class="form-control" required="reuqired"
                            placeholder="no. arsip" />
                    </div>
                    <div class="form-group">
                        <label for="no_surat">No. Surat : </label>
                        <input type="text" name="no_surat" id="no_surat" class="form-control" required="reuqired"
                            placeholder="no. surat" />
                    </div>
                    <div class="form-group">
                        <label for="tgl_diterima">Tgl. Diterima : </label>
                        <input type="date" name="tgl_diterima" id="tgl_diterima" class="form-control"
                            required="reuqired" value="" />
                    </div>
                    <div class="form-group">
                        <label for="tgl_surat">Tgl. Surat : </label>
                        <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" required="reuqired" />
                    </div>
                    <div class="form-group">
                        <label for="pengirim">Pengirim : </label>
                        <input type="text" name="pengirim" id="pengirim" class="form-control" required="reuqired"
                            placeholder="pengirim" />
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
                        <label for="file_surat">File_Surat : </label>
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
                        <button type="submit" class="btn btn-secondary btn-submit-form">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>