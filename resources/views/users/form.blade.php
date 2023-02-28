{!! Form::open(['route' => 'karyawan.store', 'enctype' => 'multipart/form-data'])!!}

<style>

</style>
<div class="modal fade" id="modal_form_karyawan" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false"
    data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label_divisi">Form Tambah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nama : </label>
                    <input type="text" name="name" class="form-control" required="reuqired"
                        placeholder="Nama Lengkap" />
                </div>
                <div class="form-group">
                    <label for="email">Email : </label>
                    <input type="email" name="email" class="form-control" required="reuqired" placeholder="Email" />
                </div>
                <div class="form-group">
                    <label for="username">Username : </label>
                    <input type="text" name="username" class="form-control" required="reuqired"
                        placeholder="username" />
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input type="text" name="password" class="form-control" required="reuqired"
                        placeholder="Password" />
                </div>
                <div class="form-group">
                    <label for="role">Role : </label>
                    <select name="role" id="role" required="reuqired" class="form-control select2" data-select2-id="1">
                        <option value="">Pilih</option>
                        <option value="superadmin">Super Admin</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="role">Role : </label>
                    <select name="role" id="role" required="reuqired" class="form-control select2" data-select2-id="1">
                        <option value="">Pilih</option>
                        <option value="superadmin">Super Admin</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                    <label>Multiple</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
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