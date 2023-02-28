<div class="modal fade" id="modal_form_edit_tamu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label_divisi">Form Edit Surat keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="put" id="form_edit_tamu">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_update" id="id_update" class="form-control" required="reuqired"
                        value="" />

                    <div class="form-group">
                        <label for="nama_tamu">Nama Tamu : </label>
                        <input type="text" name="nama_tamu" id="nama_tamu" class="form-control" required="reuqired"
                            value="" />
                    </div>
                    <div class="form-group">
                        <label for="penerima_tamu">Nama Penerima Tamu : </label>
                        <input type="text" name="penerima_tamu" id="penerima_tamu" class="form-control"
                            required="reuqired" value="" />
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No. HP : </label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" required="reuqired" value="" />
                    </div>
                    <div class="form-group">
                        <label for="nama_perusahaan">Nama Perusahaan : </label>
                        <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control"
                            required="reuqired" value="" />
                    </div>
                    <div class="form-group">
                        <label for="tgl_kunjungan">Tgl. Kunjungan : </label>
                        <input type="date" name="tgl_kunjungan" id="tgl_kunjungan" class="form-control"
                            required="reuqired" value="" />
                    </div>
                    <div class="form-group">
                        <label for="keperluan">Nama Tamu : </label>
                        <input type="text" name="keperluan" id="keperluan" class="form-control" required="reuqired"
                            value="" />
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-light btn-edit-form">Edit</button>
                        <button type="submit" class="btn btn-secondary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>