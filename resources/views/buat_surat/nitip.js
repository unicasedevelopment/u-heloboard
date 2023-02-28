'    <label for="judul">Judul : </label>'+
'<div class="form-group">'+
'    <input type="text" name="judul" id="judul" class="form-control" required="reuqired" placeholder="judul" />'+
'</div>'+
'<div class="form-group">'+
'    <label for="pembuka">Pembuka : </label>'+
'    <textarea type="text" id="pembuka" name="pembuka" class="form-control" required="reuqired" placeholder="pembuka"></textarea>'+
'</div>'+
'<div class="form-group">'+
'    <label for="isi">Isi : </label>'+
'    <textarea type="text" id="isi" name="isi" class="form-control" required="reuqired"    placeholder="isi"></textarea>'+
'</div>'+
'<div class="form-group">'+
'    <label for="penutup">Penutup : </label>'+
'    <textarea type="text" id="penutup" name="penutup" class="form-control" required="reuqired" placeholder="penutup"></textarea>'+
'</div>'+
'<div class="form-group">'+
'    <label for="mengetahui">Mengetahui : </label>'+
'    <input type="text" name="mengetahui" id="mengetahui" class="form-control" required="reuqired" placeholder="pic_mengetahui" />'+
'</div>'+
'<div class="row">'+
'    <div class="form-group col-md-6">'+
'        <label for="nama_1">Pihak Pertama : </label>'+
'        <input type="text" name="nama_1" id="nama_1" class="form-control mb-3" required="reuqired" placeholder="nama pihak 1" />'+
'        <input type="text" name="divisi_1" id="divisi_1" class="form-control mb-3" required="reuqired" placeholder="divisi pihak 1" />'+
'       <input type="text" name="jabatan_1" id="jabatan_1" class="form-control mb-3" required="reuqired" placeholder="jabatan pihak 1" />'+
'        <input type="text" name="keterangan_1" id="keterangan_1" class="form-control mb-3" required="reuqired" placeholder="keterangan pihak 1" />'+
'    </div>'+
'    <div class="form-group col-md-6">'+
'        <label for="nama_2">Pihak Kedua : </label>'+
'        <input type="text" name="nama_2" id="nama_2" class="form-control mb-3" required="reuqired" placeholder="nama pihak 2" />'+
'        <input type="text" name="divisi_2" id="divisi_2" class="form-control mb-3" required="reuqired" placeholder="divisi pihak 2" />'+
'        <input type="text" name="jabatan_2" id="jabatan_2" class="form-control mb-3" required="reuqired" placeholder="jabatan pihak 2" />'+
'        <input type="text" name="keterangan_2" id="keterangan_2" class="form-control mb-3" required="reuqired" placeholder="keterangan pihak 2" />'+
'    </div>'+
'    <table class="table  col-md-12" style="width:100%;">'+
'        <thead>'+
'            <div class="d-flex justify-content-between align-items-center mb-1">'+
'                <h5> Barang Terkait </h5>'+
'                <button id="add_barang" type="button" class="btn btn-secondary"><i class="fa fa-plus"></i></button>'+
'            </div>'+
'        </thead>'+
'        <tbody id="field_barang_terkait">'+
'            <tr>'+
'                <th width="45%">Nama barang</th>'+
'                <th width="15%">Qty</th>'+
'                <th width="30%">Kondisi</th>'+
'                <th width="10%">Act</th>'+
'            </tr>'+
'            <tr>'+
'                <td>'+
'                    <input type="text" name="nama_barang[]" class="data-barang form-control" placeholder="Nama" required>'+
'                </td>'+
'                <td><input type="number" min="1" id="data-barang qty_barang" name="qty_barang[]" class="form-control" placeholder="Qty">'+
'                </td>'+
'                <td>'+
'                    <input type="text" name="keterangan_barang[]" class="data-barang form-control" placeholder="Kondisi">'+
'                </td>'+
'                <td>'+
'                    <button id="remove" type="button" class="btn btn-light text-secondary"><i class="fa fa-trash"></i></button>'+
'                </td>'+
'            </tr>'+
'        </tbody>'+
'   </table>'+
'</div>';