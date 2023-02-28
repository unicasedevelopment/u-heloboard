<div class="modal fade" id="modal_form_hapus_perjalanan_dinas" tabindex="-1" role="dialog" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label_divisi">Hapus Data Perintah Kerja</h5>
            </div>
            <form action="" method="delete" id="form_hapus_perjalanan_dinas">
                @csrf
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="modal-body" id="verif_field">
                    <input type="hidden" name="id_hapus" id="id_hapus" class="form-control" required="reuqired" />
                    <p>Apakah Anda Yakin Ingin Menghapus Data Perintah Kerja Ini ? </p>
                </div>
                <div class="modal-footer">
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-light btn-batal text-secondary" data-dismiss="modal"
                            aria-label="Close">Batal</button>
                        <button type="submit" class="btn btn-secondary">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>