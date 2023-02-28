<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Preview Surat
            </div>
        </div>
        <div class="card-body">
            <div class="text-center">
                <h6 id="judul_surat">[judul]</h6>
                <h6 id="nomor_surat">[nomor_surat]</h6>
            </div>
            <div class="row mt-4">
                <div class="col-md-3">
                    <p>Hari, Tanggal</p>
                    <p>Alamat Asal</p>
                    <p>Alamat Tujuan</p>
                </div>
                <div class="col-md-9">
                    <p id="field_tanggal">[tanggal]</p>
                    <p id="field_alamat_asal">[alamat_asal_pengiriman]</p>
                    <p id="field_alamat_tujuan">[alamat_asal_pengiriman]</p>
                </div>
            </div>

            <p id="isi_surat">[isi_surat]</p>
            <table id="table_barang" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody id="field_barang">
                    <tr>
                        <td id="no_urut">[No]</td>
                        <td id="field_kode_barang">[kode_barang]</td>
                        <td id="field_nama_barang">[nama_barang]</td>
                        <td id="field_qty_barang">[qty_barang]</td>
                        <td id="field_keterangan_barang">[ket_barang]</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="d-flex justify-content-center">

                <div class="col-md-9">
                    <table id="table_pihak" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="50%" class="text-center">PENGIRIM</th>
                                <th width="50%" class="text-center">MENGETAHUI</th>
                            </tr>
                        </thead>
                        <tbody id="field_pihak">
                            <tr>
                                <td style="padding-top:3rem !important;" class="text-center" id="ttd_pengirim">
                                    [pengirim]
                                </td>
                                </td>
                                <td style="padding-top:3rem !important;" class="text-center" id="ttd_mengetahui">
                                    [mengetahui]
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>