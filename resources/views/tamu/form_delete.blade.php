<div class="modal fade" id="modal_form_hapus_tamu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label_divisi">Hapus Data Tamu</h5>
            </div>
            <form action="" method="delete" id="form_hapus_tamu">
                @csrf
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="modal-body" id="verif_field">
                    <input type="hidden" name="id_hapus" id="id_hapus" class="form-control" required="reuqired" />
                    <p>Apakah Anda Yakin Ingin Menghapus Data Tamu Ini ? </p>
                </div>
                <div class="modal-footer">
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-light text-secondary btn-batal" data-dismiss="modal"
                            aria-label="Close">Batal</button>
                        <button type="submit" class="btn btn-secondary">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>