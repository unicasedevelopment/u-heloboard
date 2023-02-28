$(document).ready(function() {

    var metode_bank_lama = '<table id="metode_bank" class="table table-sm border-white">' +
                            '<label for="">Detail Pembayaran Non-Cash:</label>' +
                            '<tbody id="" style="border-top:0px;">' +
                                '<tr>' +
                                    '<th class="border-white" width="25%">Bank<span class="required text-danger">*</span></th>' +
                                    '<th class="border-white" width="25%">No. Rek/VA/Id Bill<span class="required text-danger">*</span></th>' +
                                    '<th class="border-white" width="25%">Nama Penerima<span class="required text-danger">*</span></th>' +
                                    '<th class="border-white" width="25%">Nominal<span class="required text-danger">*</span></th>' +
                                '</tr>' +
                                '<tr>' +
                                    '<td>'+
                                    '<select name="provider" id="provider" required="reuqired" class="form-control form-control-sm select2" data-select2-id="11">'+
                                        '<option value="">Pilih</option>'+
                                        '<option value="BCA">BCA</option>'+
                                        '<option value="Mandiri">Mandiri</option>'+
                                        '<option value="BNI">BNI</option>'+
                                        '<option value="BRI">BRI</option>'+
                                        '<option value="Lainnya">Lainnya</option>'+
                                    '</select>'+
                                    '<input style="display: none;" type="text" name="other_provider" id="other_provider" class="form-control form-control-sm" placeholder="E-Wallet ...">'+
                                    '</td>'+
                                    '<td class="text-center"><input type="text" name="no_payment" id="no_payment" class="form-control form-control-sm" placeholder="No. Rek/VA/Id Bill">' +
                                    '</td>' +
                                    '<td class="text-center"><input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" placeholder="Nama Penerima">' +
                                    '</td>' +
                                    '<td class="text-center"><input type="text" name="nominal" id="nominal" class="form-control form-control-sm" placeholder="Nominal"></td>' +
                                '</tr>' +
                            '</tbody>' +
                        '</table>';
    var metode_lain_lama = '<table id="metode_lain" class="table table-sm border-white">' +
                            '<label for="">Detail Pembayaran Non-Cash:</label>' +
                            '<tbody id="" style="border-top:0px;">' +
                                '<tr>' +
                                    '<th class="border-white" class="border-white" width="25%">E-Wallet<span class="required text-danger">*</span></th>' +
                                    '<th class="border-white" class="border-white" width="25%">No. Akun<span class="required text-danger">*</span></th>' +
                                    '<th class="border-white" class="border-white" width="25%">Nama Penerima<span class="required text-danger">*</span></th>' +
                                    '<th class="border-white" class="border-white" width="25%">Nominal<span class="required text-danger">*</span></th>' +
                                '</tr>' +
                                '<tr>' +
                                    '<td>'+
                                    '<select name="provider" id="provider" required="reuqired" class="form-control form-control-sm select2" data-select2-id="12">'+
                                        '<option value="">Pilih</option>'+
                                        '<option value="Gopay">Gopay</option>'+
                                        '<option value="Gopay Coins">Gopay Coins</option>'+
                                        '<option value="OVO">OVO</option>'+
                                        '<option value="Shopeepay">Shopeepay</option>'+
                                        '<option value="Lainnya">Lainnya</option>'+
                                    '</select>'+
                                    '<input style="display: none;" type="text" name="other_provider" id="other_provider" class="form-control form-control-sm" placeholder="E- Wallet ...">'+
                                    '</td>'+
                                    '<td class="text-center"><input type="text" name="no_payment" id="no_payment" class="form-control form-control-sm" placeholder="No.Akun">' +
                                    '</td>' +
                                    '<td class="text-center"><input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" placeholder="Nama Penerima">' +
                                    '</td>' +
                                    '<td class="text-center"><input type="text" name="nominal" id="nominal" class="form-control form-control-sm" placeholder="Nominal"></td>' +
                                '</tr>' +
                            '</tbody>' +
                        '</table>';
    var metode_bank =   '<label style="font-weight: normal;" for="">Detail Pembayaran Non-Tunai</label>' +
                        '<div class="row">'+
                            '<div class="col-md-6">'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="provider">Bank</label>'+
                                    '<div class="col-sm-8">'+
                                    '<select name="provider" id="provider" required="reuqired" class="form-control form-control-sm select2" data-select2-id="11">'+
                                        '<option value="">Pilih</option>'+
                                        '<option value="BCA">BCA</option>'+
                                        '<option value="Mandiri">Mandiri</option>'+
                                        '<option value="BNI">BNI</option>'+
                                        '<option value="BRI">BRI</option>'+
                                        '<option value="Lainnya">Lainnya</option>'+
                                    '</select>'+
                                    '<input style="display: none;" type="text" name="other_provider" id="other_provider" class="form-control form-control-sm" placeholder="E-Wallet ...">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="pemilik">Nama Penerima </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" placeholder="">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="no_payment">No. Rek/VA/Id Bill </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="no_payment" id="no_payment" class="form-control form-control-sm" placeholder="">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="nominal">Nominal </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="nominal" id="nominal" class="form-control form-control-sm" placeholder=""></td>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
    var metode_lain =   '<label style="font-weight: normal;" for="">Detail Pembayaran Non-Tunai</label>' +
                        '<div class="row">'+
                            '<div class="col-md-6">'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="provider">E-Wallet</label>'+
                                    '<div class="col-sm-8">'+
                                        '<select name="provider" id="provider" required="reuqired" class="form-control form-control-sm select2" data-select2-id="12">'+
                                            '<option value="">Pilih</option>'+
                                            '<option value="Gopay">Gopay</option>'+
                                            '<option value="Gopay Coins">Gopay Coins</option>'+
                                            '<option value="OVO">OVO</option>'+
                                            '<option value="Shopeepay">Shopeepay</option>'+
                                            '<option value="Lainnya">Lainnya</option>'+
                                        '</select>'+
                                        '<input style="display: none;" type="text" name="other_provider" id="other_provider" class="form-control form-control-sm" placeholder="E- Wallet ...">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="pemilik">Nama Penerima </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" placeholder="">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="no_payment">No. Akun </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="no_payment" id="no_payment" class="form-control form-control-sm" placeholder="">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="nominal">Nominal </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="nominal" id="nominal" class="form-control form-control-sm" placeholder=""></td>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';

    var metode_cash = '<label style="font-weight: normal;" for="">Detail Pembayaran Tunai</label>' +
                        '<div class="row">'+
                            '<div class="col-md-6">'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="pemilik">Nama Penerima </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" placeholder="">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="nominal">Nominal </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="nominal" id="nominal" class="form-control form-control-sm" placeholder=""></td>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
    var metode_cash_lama = '<table id="metode_noncash" class="table table-sm border-white">' +
                            '<label for="">Detail Pembayaran Non-Cash:</label>' +
                            '<tbody id="" style="border-top:0px;">' +
                                '<tr>' +
                                    '<th width="50%">Nama Penerima<span class="required text-danger">*</span></th>' +
                                    '<th width="50%">Nominal<span class="required text-danger">*</span></th>' +
                                '</tr>' +
                                '<tr>' +
                                    '<td class="text-center"><input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" placeholder="">' +
                                    '</td>' +
                                    '<td class="text-center"><input type="text" name="nominal" id="nominal" class="form-control form-control-sm" placeholder=""></td>' +
                                '</tr>' +
                            '</tbody>' +
                        '</table>';
    var pajak_field_1 =   '<tr>'+
                            '<th class=" text-center" width="15%">Jenis Pajak</th>'+
                            '<th class="text-center" width="35%">Kelengkapan</th>'+
                            '<th class="text-center" width="15%">Persentase</th>'+
                            '<th class="text-center" width="15%">Checklist</th>'+
                            '<th class="text-center" width="20%">Potong/Tanggung</th>'+
                        '</tr>'+
                        '<tr class="item_pajak_1">'+
                            '<td class="text-center">PPN</td>'+
                            '<td class="text-center">-</td>'+
                            '<td class="text-center">11%</td>'+
                            '<td class="text-center">'+
                                '<div class="icheck-secondary d-inline">'+
                                    '<input type="checkbox" id="checkbox_pajak_1">'+
                                    '<label for="checkbox_pajak_1">'+
                                    '</label>'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<input name="val_ppn" id="status_pajak_1" readonly class="form-control form-control-sm" value="-"/>'+
                            '</td>'+
                        '</tr>';
    var pajak_field_2 =     '<tr>'+
                                '<th class=" text-center" width="15%">Jenis Pajak</th>'+
                                '<th class="text-center" width="35%">Kelengkapan</th>'+
                                '<th class="text-center" width="15%">Persentase</th>'+
                                '<th class="text-center" width="15%">Checklist</th>'+
                                '<th class="text-center" width="20%">Potong/Tanggung</th>'+
                            '</tr>'+
                            '@foreach ($jenis_pajak as $pajak)'+
                            '<tr class="item_pajak_{{$pajak->id}}">'+
                                '<td class="text-center">{{$pajak->nama_pajak}}</td>'+
                                '<td class="text-center">{{$pajak->keterangan}}</td>'+
                                '<td class="text-center">{{$pajak->persentase}}</td>'+
                                '<td class="text-center">'+
                                    '<div class="icheck-secondary d-inline">'+
                                        '<input type="checkbox" id="checkbox_pajak_{{$pajak->id}}">'+
                                        '<label for="checkbox_pajak_{{$pajak->id}}">'+
                                        '</label>'+
                                    '</div>'+
                                '</td>'+
                                '<td>'+
                                    '<select name="val_ppn" id="status_pajak_{{$pajak->id}}" disabled class="form-control form-control-sm select2" data-select2-id="data-select-{{$pajak->id}}">'+
                                        '<option value="">Pilih</option>'+
                                        '<option value="1">Tanggung</option>'+
                                        '<option value="0">Potong</option>'+
                                    '</select>'+
                                '</td>'+
                            '</tr>'+
                            '@endforeach';


    $('#btn_panduan').on('click', function() {
        console.log('tombok aktif');
        var field_panduan = document.getElementById('panduan_keperluan');
        if (field_panduan.style.display === 'none') {
            field_panduan.style.display = 'block';
        } else {
            field_panduan.style.display = 'none';
        }
    });
    $('#id_kategori').on('change', function() {
        // let tata_cara = document.getElementById('tata_cara');
        // let pajak_field = document.getElementById('pajak_field');
        let pajak_field_1 = document.getElementById('pajak_field_1');
        let pajak_field_2 = document.getElementById('pajak_field_2');
        let informasi_perpajakan = document.getElementById('informasi_perpajakan');
        let informasi_lampiran = document.getElementById('informasi_lampiran');
        let all_form_field = document.getElementById('all_form_field');
        let kategori = $('#id_kategori').val();
        if (kategori != ''){
            all_form_field.style.display = 'block';
            if (kategori <= 2){
                informasi_lampiran.style.display = 'block';
                informasi_perpajakan.style.display = 'block';
                // tata_cara.style.display = 'block';

                // document.getElementById('pajak_field').innerHTML=pajak_field_2

                // let checkbox_pajak_1 = document.getElementById('checkbox_pajak_1');
                let checkbox_pajak_2 = document.getElementById('checkbox_pajak_2');
                let checkbox_pajak_3 = document.getElementById('checkbox_pajak_3');
                let checkbox_pajak_4 = document.getElementById('checkbox_pajak_4');
                let checkbox_pajak_5 = document.getElementById('checkbox_pajak_5');
                let checkbox_pajak_6 = document.getElementById('checkbox_pajak_6');
                // let checkbox_pajak_7 = document.getElementById('checkbox_pajak_7');

                // checkbox_pajak_1.addEventListener('change', function(){
                //     console.log(checkbox_pajak_1)
                //     if (checkbox_pajak_1.checked){
                //         document.getElementById('status_pajak_1').removeAttribute('disabled');
                //         document.getElementById('status_pajak_1').setAttribute('required','');
                //     }else{
                //         document.getElementById('status_pajak_1').setAttribute('disabled','');
                //     }
                // })
                checkbox_pajak_2.addEventListener('change', function(){
                    if (checkbox_pajak_2.checked){
                        document.getElementById('status_pajak_2').removeAttribute('disabled');
                        document.getElementById('status_pajak_2').setAttribute('required','');
                    }else{
                        document.getElementById('status_pajak_2').setAttribute('disabled','');
                    }
                })
                checkbox_pajak_3.addEventListener('change', function(){
                    if (checkbox_pajak_3.checked){
                        document.getElementById('status_pajak_3').removeAttribute('disabled');
                        document.getElementById('status_pajak_3').setAttribute('required','');
                    }else{
                        document.getElementById('status_pajak_3').setAttribute('disabled','');
                    }
                })
                checkbox_pajak_4.addEventListener('change', function(){
                    if (checkbox_pajak_4.checked){
                        document.getElementById('status_pajak_4').removeAttribute('disabled');
                        document.getElementById('status_pajak_4').setAttribute('required','');
                    }else{
                        document.getElementById('status_pajak_4').setAttribute('disabled','');
                    }
                })
                checkbox_pajak_5.addEventListener('change', function(){
                    if (checkbox_pajak_5.checked){
                        document.getElementById('status_pajak_5').removeAttribute('disabled');
                        document.getElementById('status_pajak_5').setAttribute('required','');
                    }else{
                        document.getElementById('status_pajak_5').setAttribute('disabled','');
                    }
                })
                checkbox_pajak_6.addEventListener('change', function(){
                    if (checkbox_pajak_6.checked){
                        document.getElementById('status_pajak_6').removeAttribute('disabled');
                        document.getElementById('status_pajak_6').setAttribute('required','');
                    }else{
                        document.getElementById('status_pajak_6').setAttribute('disabled','');
                    }
                })
                // checkbox_pajak_7.addEventListener('change', function(){
                //     if (checkbox_pajak_7.checked){
                //         document.getElementById('status_pajak_7').removeAttribute('disabled');
                //         document.getElementById('status_pajak_7').setAttribute('required','');
                //     }else{
                //         document.getElementById('status_pajak_7').setAttribute('disabled','');
                //     }
                // })
                if(kategori != 1){
                    pajak_field_1.style.display = 'none';
                    pajak_field_2.style.display = 'contents';
                }else{
                    pajak_field_1.style.display = 'contents';
                    pajak_field_2.style.display = 'none';
                }

            }else{
                all_form_field.style.display = 'block';
                informasi_perpajakan.style.display = 'none';
                informasi_lampiran.style.display = 'none';
                // tata_cara.style.display = 'none';
            }
        }else{
            all_form_field.style.display = 'none';
            informasi_perpajakan.style.display = 'none';
            informasi_lampiran.style.display = 'none';
            // tata_cara.style.display = 'none';
            swal({
                title: "Generate Form Gagal",
                text: "Pastikan Anda Sudah Memilih Kategori Pengajuan Dana",
                icon: "warning",
                button: "Ok",
            })
        }
    });

    $('#generate_form').on('click', function(){

        let tata_cara = document.getElementById('tata_cara');
        let kategori = $('#id_kategori').val();
        let informasi_perpajakan = document.getElementById('informasi_perpajakan');
        if (kategori != ''){
            if (kategori <= 2){
                // informasi_perpajakan.style.display = 'block';
                // tata_cara.style.display = 'block';
            }else{
                // informasi_perpajakan.style.display = 'none';
                // tata_cara.style.display = 'none';
            }
        }else{
            swal({
                title: "Generate Form Gagal",
                text: "Pastikan Anda Sudah Memilih Kategori Pengajuan Dana",
                icon: "warning",
                button: "Ok",
            })
        }
    });

    $('#id_metode').on('change', function() {
        if ($('#id_metode').val() == '') {
            document.getElementById('detail_metode_field').innerHTML = '';
        }else{
            if ($('#id_metode').val() == '2') {
                console.log('dua')
                document.getElementById('detail_metode_field').innerHTML = '';
                $('#detail_metode_field').append(metode_cash);
            }
            else if ($('#id_metode').val() == '4') {
                console.log('empat')
                document.getElementById('detail_metode_field').innerHTML = '';
                $('#detail_metode_field').append(metode_lain);
                $('#provider').select2({
                    placeholder: "Pilih",
                    allowClear: true
                });
                $('#provider').on('change', function() {
                    if($('#provider').val() == 'Lainnya') {
                        console.log('fungsi aktif');
                        document.getElementById('other_provider').style.display = 'block';
                    }else{
                        document.getElementById('other_provider').style.display = 'none';
                    }
                });
            }
            else {
                document.getElementById('detail_metode_field').innerHTML = '';
                $('#detail_metode_field').append(metode_bank);
                $('#provider').select2({
                    placeholder: "Pilih",
                    allowClear: true
                });
                $('#provider').on('change', function() {
                    if($('#provider').val() == 'Lainnya') {
                        console.log('fungsi aktif');
                        document.getElementById('other_provider').style.display = 'block';
                    }else{
                        document.getElementById('other_provider').style.display = 'none';
                    }
                });
            }

            $("input[name='no_payment']").on('input', function(e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });

            $("input[name='nominal']").on('input', function(e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
                // var new_val = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format($(this).val());
            });

            var nominal = document.getElementById("nominal");
            nominal.addEventListener("keyup", function(e) {
                nominal.value = formatRupiah(this.value);
            });

            function formatRupiah(angka) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return rupiah;
            }
        }

    });
    var lampiran_field =    '<button type="button" id="add_lampiran" class="btn btn-sm btn-light text-secondary mb-1"><i class="fa fa-plus"></i></button>'+
                            '<div id="lampiran_field">'+
                                '<div class="row item-lampiran">'+
                                    '<div class="form-group col-md-4 mb-1">'+
                                        '<input type="text" id="nama_lampiran" name="nama_lampiran[]" class="data-barang form-control form-control-sm" placeholder="Nama File" required>'+
                                    '</div>'+
                                    '<div class="form-group col-md-4 mb-1">'+
                                        '<input type="file" id="file_lampiran" name="file_lampiran[]" class="form-control form-control-sm" required>'+
                                    '</div>'+
                                    '<div class="form-group col-md-4 mb-1">'+
                                        '<button id="remove" type="button" class="btn btn-sm btn-light text-secondary btn-hapus"><i class="fa fa-trash"></i></button>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';

    var x = 1;
    var tambah_lampiran =   '<div class="row item-lampiran" >'+
                                '<div class="form-group col-md-4 mb-1">'+
                                    '<input type="text" id="nama_lampiran" name="nama_lampiran[]" class="data-barang form-control form-control-sm" placeholder="Nama File" required>'+
                                '</div>'+
                                '<div class="form-group col-md-4 mb-1">'+
                                    '<input type="file" id="file_lampiran" name="file_lampiran[]" class="form-control form-control-sm" required>'+
                                '</div>'+
                                '<div class="form-group col-md-4 mb-1">'+
                                    '<button id="remove" type="button" class="btn btn-sm btn-light text-secondary btn-hapus"><i class="fa fa-trash"></i></button>'+
                                '</div>'+
                            '</div>';

    $('#checkbox_lampiran').change(function() {
        if($('#checkbox_lampiran').is(':checked')){
            document.getElementById('lampiran_lain_field').style.display = 'block';
            document.getElementById('lampiran_lain_field').innerHTML = lampiran_field;
            $("#add_lampiran").click(function() {
                $("#lampiran_field").append(tambah_lampiran);
                x++;
            });

            $("#lampiran_field").on('click', '#remove', function() {
                if (x != 1) {
                    $(this).closest('.item-lampiran').remove();
                    x--;
                }

            });

        }else{

            document.getElementById('lampiran_lain_field').style.display = 'none';
            document.getElementById('lampiran_lain_field').innerHTML = '';
        }
    });

    function get_data_pajak(id_kategori){
        let data_pajak = [];
        if (id_kategori <= 2 ){
            if(id_kategori ==1){
                var pajak_1 = $('#status_pajak_1');
                var pajak_2 = $('#status_pajak_2');
                var pajak_3 = $('#status_pajak_3');
                var pajak_4 = $('#status_pajak_4');
                var pajak_5 = $('#status_pajak_5');
                var pajak_6 = $('#status_pajak_6');
                // var pajak_7 = $('#status_pajak_7');

                var status_pajak = [pajak_1,pajak_2,pajak_3,pajak_4,pajak_5,pajak_6]

                var checkbox_pajak_1 = $('#checkbox_pajak_1');
                var checkbox_pajak_2 = $('#checkbox_pajak_2');
                var checkbox_pajak_3 = $('#checkbox_pajak_3');
                var checkbox_pajak_4 = $('#checkbox_pajak_4');
                var checkbox_pajak_5 = $('#checkbox_pajak_5');
                var checkbox_pajak_6 = $('#checkbox_pajak_6');
                // var checkbox_pajak_7 = $('#checkbox_pajak_7');
                var checkbox_pajak = [checkbox_pajak_1,checkbox_pajak_2,checkbox_pajak_3,checkbox_pajak_4,checkbox_pajak_5,checkbox_pajak_6]

                for (let i=0;i<7;i++){
                    if(checkbox_pajak[i][0].checked){
                            data_pajak.push({
                                'id_jenis_pajak':i+1,
                                'status_pajak' : status_pajak[i].val()
                            });
                    }
                }
                return data_pajak;
            }else{
                // var pajak = $('#status_pajak');
                var checkbox_pajak = $('#checkbox_pajak');
                if(checkbox_pajak[0].checked){
                    data_pajak[0] = {
                        'id_jenis_pajak': '1',
                        'status_pajak' : null
                    }
                }else{
                    data_pajak = null;
                }
                return data_pajak;
            }
        }else{
            data_pajak = null;
        }
        return data_pajak;
    }

    function get_data_pembayaran(id_metode){

        var pemilik = $('#pemilik').val();
        var nominal_bayar = parseFloat(nominal.value.replace(/,.*|[^0-9]/g, ''));
        var provider = null;
        var no_payment = null;
        if(id_metode != 2){
            provider = $('#provider').val();
            no_payment = $('#no_payment').val();
        }
        let data_pembayaran = {
                "id_metode" : id_metode,
                "provider" : provider,
                "no_payment" : no_payment,
                "penerima" : pemilik,
                "nominal" : nominal_bayar
            };


        return data_pembayaran;
    }

    // function get_lampiran_lain(){
    //     let data_lampiran = [];
    //     let checkbox_lampiran = document.getElementById('checkbox_lampiran');
    //     if(checkbox_lampiran.checked){
    //         for (let i = 0; i < $('input[name="nama_lampiran[]"]').length ; i++){
    //             data_lampiran.push(JSON.stringify(
    //                 {
    //                     'nama_lampiran' : $('input[name="nama_lampiran[]"]')[i].value,
    //                     'file_lampiran' : $('input[name="file_lampiran[]"]')[i].files[0]
    //                 })
    //             )

    //         }
    //     }else{
    //         data_lampiran = null;
    //     }
    //     return data_lampiran;

    // }

    $('#form_edit_pengajuan_dana').on('submit', function(e) {
        e.preventDefault();
        let form_data = new FormData();

        var id_pengajuan = $('#id_pengajuan').val();
        var no_surat = $('#no_surat').val();
        var id_kategori = $('#id_kategori').val();
        var id_metode = $('#id_metode').val();
        var keperluan = $('#keperluan').val();
        var tgl_pengajuan = $('#tgl_pengajuan').val();
        var npwp = $('#npwp').val();
        var nik = $('#nik').val();


        var data_pajak = get_data_pajak(id_kategori);
        var data_pembayaran = get_data_pembayaran(id_metode);

        form_data.append('no_surat',no_surat);
        form_data.append('id_kategori',id_kategori);
        form_data.append('keperluan',keperluan);
        form_data.append('tgl_pengajuan',tgl_pengajuan);
        form_data.append('data_pajak',JSON.stringify(data_pajak));
        form_data.append('data_pembayaran',JSON.stringify(data_pembayaran));


        if (id_kategori<=2){
            var file_invoice = document.getElementById('file_invoice').files[0];
            var file_npwp = document.getElementById('file_npwp').files[0];
            var file_ktp = document.getElementById('file_ktp').files[0];

            form_data.append('file_invoice',file_invoice == undefined ? null:file_invoice);
            form_data.append('file_npwp',file_npwp == undefined ? null:file_npwp);
            form_data.append('file_ktp',file_ktp == undefined ? null:file_ktp);
            form_data.append('npwp',npwp == '' ? '':npwp);
            form_data.append('nik',nik == '' ? '':nik);
        }

        let checkbox_lampiran = document.getElementById('checkbox_lampiran');
        if(checkbox_lampiran.checked){
            var file_length = $('input[name="file_lampiran[]"]').length
            for(let i = 0; i < file_length ; i++){
                form_data.append('nama_lampiran[]',$('input[name="nama_lampiran[]"]')[i].value)
                form_data.append('file_lampiran[]',$('input[name="file_lampiran[]"]')[i].files[0])
            }
        }else{
            form_data.append('file_lampiran[]',null)
        }

        $.ajax({
            type: "post",
            url: "/approval_pengajuan_dana/"+id_pengajuan,
            data: form_data,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            success: function(response) {
                console.log(response);
                if(response.status == false){
                    Swal.fire({
                        title: "Pengajuan Tidak Dapat Diproses",
                        text: "Nomor Pengajuan Sudah Digunakan, Silahkan Generate Ulang Nomor Pengajuan",
                        icon: "warning",
                        confirmButtonColor: '#7cd1f9',
                    });
                }else{
                    Swal.fire({
                        title: "Sukses",
                        icon: 'success',
                        text: "Data Berhasil Diperbarui",
                        button: "Ok",
                        confirmButtonColor: '#7cd1f9',
                    }).then((value) => {
                        if (true) {
                        //   window.location.reload();
                        } else {
                            // window.location.reload();
                        }
                    });
                }

            },
            error: function(error) {
            console.log('gagal');
            console.log(error);
            }
        });

    });





});