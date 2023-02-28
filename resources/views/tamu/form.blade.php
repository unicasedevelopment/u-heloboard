{!! Form::open(['route' => 'tamu.store', 'enctype' => 'multipart/form-data'])!!}

<div class="modal fade" id="modal_form_tamu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label_divisi">Form Tambah Data Tamu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_tamu">Nama Tamu : </label>
                    <input type="text" name="nama_tamu" class="form-control" required="reuqired" value="" />
                </div>
                <div class="form-group">
                    <label for="penerima_tamu">Nama Penerima Tamu : </label>
                    <input type="text" name="penerima_tamu" class="form-control" required="reuqired" value="" />
                </div>
                <div class="form-group">
                    <label for="no_hp">No. HP : </label>
                    <input type="text" name="no_hp" class="form-control" required="reuqired" value="" />
                </div>
                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan : </label>
                    <input type="text" name="nama_perusahaan" class="form-control" required="reuqired" value="" />
                </div>
                <div class="form-group">
                    <label for="tgl_kunjungan">Tgl. Kunjungan : </label>
                    <input type="date" name="tgl_kunjungan" class="form-control" required="reuqired" value="" />
                </div>
                <div class="form-group">
                    <label for="keperluan">Keperluan : </label>
                    <input type="text" name="keperluan" class="form-control" required="reuqired" value="" />
                </div>



            </div>
            <div class="modal-footer">
                <div class="form-group text-right">
                    {!! Form::submit('Simpan', ['class'=>'btn btn-secondary text-white']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}