{!! Form::open(['route' => 'surat_keluar.store', 'enctype' => 'multipart/form-data'])!!}

<div class="modal fade" id="modal_form_surat_keluar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label_divisi">Form Tambah Surat Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="id_jenis">Jenis Surat : </label>
                    <span class="required text-danger">*</span>
                    <select name="id_jenis" id="id_jenis" required="reuqired" class="form-control custom-select">
                        <option value="">-- Pilih --</option>
                        @foreach ($data_jenis_surat as $id_jenis => $nama_jenis)
                        <option value="{{$id_jenis}}">{{$nama_jenis}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="no_arsip">No. Arsip : </label>
                    <input type="text" name="no_arsip" id="no-arsip" class="form-control" required="reuqired" readonly
                        placeholder="no. arsip" />
                </div>
                <div class="form-group">
                    <label for="no_surat">No. Surat : </label>
                    <input type="text" name="no_surat" class="form-control" required="reuqired"
                        placeholder="no. surat" />
                </div>
                <div class="form-group">
                    <label for="tgl_dikirim">Tgl. Dikirim : </label>
                    <input type="date" name="tgl_dikirim" class="form-control" required="reuqired" />
                </div>
                <div class="form-group">
                    <label for="tgl_surat">Tgl. Surat : </label>
                    <input type="date" name="tgl_surat" class="form-control" required="reuqired" />
                </div>
                <div class="form-group">
                    <label for="penerima">Tujuan : </label>
                    <input type="text" name="penerima" class="form-control" required="reuqired"
                        placeholder="penerima" />
                </div>
                <div class="form-group">
                    <label for="resume">Resume : </label>
                    <textarea type="text" name="resume" class="form-control" required="reuqired"
                        placeholder="resume"></textarea>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan : </label>
                    <textarea type="text" name="keterangan" class="form-control" required="reuqired"
                        placeholder="keterangan"></textarea>
                </div>
                <div class="form-group">
                    <label for="file_surat">File_Surat : </label>
                    <input type="file" name="file_surat" class="form-control" />
                </div>



            </div>
            <div class="modal-footer">
                <div class="form-group text-right">
                    {!! Form::submit('Simpan', ['class'=>'btn btn-secondary']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}