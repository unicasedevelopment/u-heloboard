$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Pilih",
        allowClear: true
    });

    $('#generate_no_surat').on('click',function(e) {
        e.preventDefault();
        $.ajax({
            type:'GET',
            url:'/pengajuan_dana/create',
            success: function(response) {
                $('#no_surat').val(response.no_surat);
                console.log(response.no_surat);
            },
            error: function(error) {
                console.log('gagal');
                console.log(error);
            }
        });
    });

    var metode_bank_cat_1 =   '<label style="font-weight: normal;" for="">Detail Pembayaran Non-Tunai</label>' +
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
                                        '<input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" placeholder="nama" required="reuqired">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="no_payment">No. Rek/VA/Id Bill </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="no_payment" id="no_payment" class="form-control form-control-sm" placeholder="nomor" required="reuqired">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="nominal_inv">Nominal Inv.</label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="nominal_inv" id="nominal_inv" class="form-control form-control-sm" placeholder="nominal_inv" required="reuqired"></td>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="nominal_trf">Nominal Trf.</label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="nominal_trf" id="nominal_trf" class="form-control form-control-sm" placeholder="nominal_trf" required="reuqired"></td>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';

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
                                        '<input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" placeholder="nama" required="reuqired">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="no_payment">No. Rek/VA/Id Bill </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="no_payment" id="no_payment" class="form-control form-control-sm" placeholder="nomor" required="reuqired">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="nominal_trf">Nominal Trf.</label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="nominal_trf" id="nominal_trf" class="form-control form-control-sm" placeholder="nominal_trf" required="reuqired"></td>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';

    var metode_lain_cat_1 =   '<label style="font-weight: normal;" for="">Detail Pembayaran Non-Tunai</label>' +
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
                                        '<input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" placeholder="nama" required="reuqired">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group row">'+
                                '<label class="col-sm-4 col-form-label" for="no_payment">No. Rek/VA/Id Bill </label>'+
                                '<div class="col-sm-8">'+
                                    '<input type="text" name="no_payment" id="no_payment" class="form-control form-control-sm" placeholder="nomor" required="reuqired">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                            '<div class="form-group row">'+
                                '<label class="col-sm-4 col-form-label" for="nominal_inv">Nominal Inv.</label>'+
                                '<div class="col-sm-8">'+
                                    '<input type="text" name="nominal_inv" id="nominal_inv" class="form-control form-control-sm" placeholder="nominal_inv" required="reuqired"></td>'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group row">'+
                                '<label class="col-sm-4 col-form-label" for="nominal_trf">Nominal Trf.</label>'+
                                '<div class="col-sm-8">'+
                                    '<input type="text" name="nominal_trf" id="nominal_trf" class="form-control form-control-sm" placeholder="nominal_trf" required="reuqired"></td>'+
                                '</div>'+
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
                                        '<input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" placeholder="nama" required="reuqired">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="no_payment">No. Akun </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="no_payment" id="no_payment" class="form-control form-control-sm" placeholder="nomor" required="reuqired">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="nominal_trf">Nominal Trf.</label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="nominal_trf" id="nominal_trf" class="form-control form-control-sm" placeholder="nominal_trf" required="reuqired"></td>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';

    var metode_cash = '<label style="font-weight: normal;" for="">Detail Pembayaran Tunai</label>' +
                        '<div class="row">'+
                            '<div class="col-md-6">'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="pemilik">Nama Penerima </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" placeholder="nama" required="reuqired">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="nominal_trf">Nominal Trf.</label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="nominal_trf" id="nominal_trf" class="form-control form-control-sm" placeholder="nominal_trf" required="reuqired"></td>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';

    var metode_cash_cat_1 = '<label style="font-weight: normal;" for="">Detail Pembayaran Tunai</label>' +
                        '<div class="row">'+
                            '<div class="col-md-6">'+
                                '<div class="form-group row">'+
                                    '<label class="col-sm-4 col-form-label" for="pemilik">Nama Penerima </label>'+
                                    '<div class="col-sm-8">'+
                                        '<input type="text" name="pemilik" id="pemilik" class="form-control form-control-sm" placeholder="nama" required="reuqired">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group row">'+
                                '<label class="col-sm-4 col-form-label" for="nominal_inv">Nominal Inv.</label>'+
                                '<div class="col-sm-8">'+
                                    '<input type="text" name="nominal_inv" id="nominal_inv" class="form-control form-control-sm" placeholder="nominal_inv" required="reuqired"></td>'+
                                '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="col-md-6">'+

                            '<div class="form-group row">'+
                                '<label class="col-sm-4 col-form-label" for="nominal_trf">Nominal Trf.</label>'+
                                '<div class="col-sm-8">'+
                                    '<input type="text" name="nominal_trf" id="nominal_trf" class="form-control form-control-sm" placeholder="nominal_trf" required="reuqired"></td>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '</div>';

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
        $('.checkbox_pajak').prop('checked', false)
        console.log('fungsi id_kategori jalan')
        $('.info_jenis_vendor').remove()
        $("#id_metode").val('').trigger('change')
        document.getElementById('detail_metode_field').innerHTML = '';
        let tata_cara = document.getElementById('tata_cara');
        // let pajak_field = document.getElementById('pajak_field');
        let pajak_field_1 = document.getElementById('pajak_field_1');
        let pajak_field_2 = document.getElementById('pajak_field_2');
        let informasi_perpajakan = document.getElementById('informasi_perpajakan');
        let informasi_lampiran = document.getElementById('informasi_lampiran');
        let all_form_field = document.getElementById('all_form_field');
        let kategori = $('#id_kategori').val();

        if (kategori != ''){
            console.log('fungsi ini jalann')
            all_form_field.style.display = 'block';
            if (kategori <= 2){
                informasi_lampiran.style.display = 'block';
                informasi_perpajakan.style.display = 'block';
                tata_cara.style.display = 'block';

                $('#id_metode').attr('disabled', false);
                if(kategori == 1){
                    $('#id_metode').attr('disabled', true);
                    $('.checkbox_pajak').attr('required', true);
                    $('#checkbox_pajak').attr('required', false);
                }else{
                    $('.checkbox_pajak').attr('required', false);
                }

                // document.getElementById('pajak_field').innerHTML=pajak_field_2

                $('#status_pajak_2').on('change', function(){
                    if($('#checkbox_pajak_2').prop('checked') == true){
                        $("#jenis_vendor").val('').trigger('change')
                        if($('#status_pajak_2').val() != ''){
                            $('#jenis_vendor').attr('disabled',false);
                            $('#jenis_vendor').on('change',function(){

                                $("#id_metode").val('').trigger('change')

                                if($('#jenis_vendor').val() == ''){
                                    $('#id_metode').attr('disabled',true);
                                }else{
                                    $('#id_metode').attr('disabled',false);
                                }
                            });

                        }else{
                            $('#jenis_vendor').attr('disabled',true);
                            // $('#jenis_vendor').attr('disabled',true);
                            // $('#id_metode').attr('disabled',true);
                        }
                    }
                })
                $('#status_pajak_3').on('change', function(){
                    console.log('jalan')
                    if($('#checkbox_pajak_3').prop('checked') == true){
                        $("#id_metode").val('').trigger('change')
                        if($('#status_pajak_3').val() != ''){
                            console.log('jalan')
                            $('#id_metode').attr('disabled',false);
                        }else{
                            $('#id_metode').attr('disabled',true);
                        }
                    }
                })
                $('#status_pajak_4').on('change', function(){
                    console.log('jalan')
                    if($('#checkbox_pajak_4').prop('checked') == true){

                        $("#id_metode").val('').trigger('change')

                        if($('#status_pajak_4').val() != ''){
                            console.log('jalan')
                            $('#id_metode').attr('disabled',false);
                        }else{
                            $('#id_metode').attr('disabled',true);
                        }
                    }
                })
                $('#status_pajak_5').on('change', function(){
                    console.log('jalan')
                    if($('#checkbox_pajak_5').prop('checked') == true){

                        $("#id_metode").val('').trigger('change')

                        if($('#status_pajak_5').val() != ''){
                            console.log('jalan')
                            $('#id_metode').attr('disabled',false);
                        }else{
                            $('#id_metode').attr('disabled',true);
                        }
                    }
                })
                $('#status_pajak_6').on('change', function(){
                    if($('#checkbox_pajak_6').prop('checked') == true){
                        $("#jenis_vendor").val('').trigger('change')
                        if($('#status_pajak_6').val() != ''){
                            $('#jenis_vendor').attr('disabled',false);

                            $('#jenis_vendor').on('change',function(){

                                $("#id_metode").val('').trigger('change')
                                if($('#jenis_vendor').val() == ''){
                                    $('#id_metode').attr('disabled',true);
                                }else{
                                    $('#id_metode').attr('disabled',false);
                                }
                            });

                        }else{

                            $('#jenis_vendor').attr('disabled',true);
                            // $('#jenis_vendor').attr('disabled',true);
                            // $('#id_metode').attr('disabled',true);
                        }
                    }
                })


                // const checkbox_pajak = document.getElementById('checkbox_pajak');
                // const checkbox_pajak_1 = document.getElementById('checkbox_pajak_1');
                // const checkbox_pajak_2 = document.getElementById('checkbox_pajak_2');
                // const checkbox_pajak_3 = document.getElementById('checkbox_pajak_3');
                // const checkbox_pajak_4 = document.getElementById('checkbox_pajak_4');
                // const checkbox_pajak_5 = document.getElementById('checkbox_pajak_5');
                // const checkbox_pajak_6 = document.getElementById('checkbox_pajak_6');

                function reset_nominal(){
                    if($('#nominal_trf').val() != undefined ){
                        if($('#nominal_trf').val() != ''){
                            $('#nominal_trf').val('');
                        }
                    }
                    if($('#nominal_inv').val() != undefined ){
                        if($('#nominal_inv').val() != ''){
                            $('#nominal_inv').val('');
                        }
                    }
                }

                function set_checkbox_pajak_1(kondisi){
                    if(kondisi == true){
                        $('#checkbox_pajak_3').attr('disabled',true);
                        $('#checkbox_pajak_4').attr('disabled',true);
                        $('#checkbox_pajak_5').attr('disabled',true);

                    }else{
                        if ($('#checkbox_pajak_2').prop('checked') == false && $('#checkbox_pajak_6').prop('checked') == false){
                            $('#checkbox_pajak_3').attr('disabled',false);
                            $('#checkbox_pajak_4').attr('disabled',false);
                            $('#checkbox_pajak_5').attr('disabled',false);
                        }
                    }
                }
                function set_checkbox_pajak_2(kondisi){
                    var info_jenis_vendor =     '<div class="form-group row info_jenis_vendor" id="info_jenis_vendor">'+
                                                    '<label class="col-sm-4 col-form-label" for="jenis_vendor">Kategori Vendor</label>'+
                                                    '<div class="col-sm-8">'+
                                                        '<select name="jenis_vendor" id="jenis_vendor" required="reuqired" disabled class="form-control form-control-sm select2" data-select2-id="21">'+
                                                            '<option value="">Pilih</option>'+
                                                            '<option value="ekspedisi">Ekspedisi</option>'+
                                                            '<option value="nonekspedisi">Non Ekspedisi</option>'+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>';



                    if(kondisi == true){
                        console.log('jenis vendor  ditambahkan')
                        console.log(info_jenis_vendor)
                        document.getElementById('informasi_vendor_tambahan').innerHTML = info_jenis_vendor;
                        $('#jenis_vendor').select2({
                            placeholder: "Pilih",
                            allowClear: true
                        });
                        $('#checkbox_pajak_3').attr('disabled',true);
                        $('#checkbox_pajak_4').attr('disabled',true);
                        $('#checkbox_pajak_5').attr('disabled',true);
                        $('#checkbox_pajak_6').attr('disabled',true);
                    }else{
                        $('.info_jenis_vendor').remove()
                        if ($('#checkbox_pajak_1').prop('checked') == false){
                            $('#checkbox_pajak_3').attr('disabled',false);
                            $('#checkbox_pajak_4').attr('disabled',false);
                            $('#checkbox_pajak_5').attr('disabled',false);
                            $('#checkbox_pajak_6').attr('disabled',false);
                        }else{
                            $('#checkbox_pajak_6').attr('disabled',false);
                        }
                    }
                }
                function set_checkbox_pajak_3(kondisi){
                    if(kondisi == true){
                        $('#checkbox_pajak_1').attr('disabled',true);
                        $('#checkbox_pajak_2').attr('disabled',true);
                        $('#checkbox_pajak_4').attr('disabled',true);
                        $('#checkbox_pajak_5').attr('disabled',true);
                        $('#checkbox_pajak_6').attr('disabled',true);
                    }else{
                        $('#checkbox_pajak_1').attr('disabled',false);
                        $('#checkbox_pajak_2').attr('disabled',false);
                        $('#checkbox_pajak_4').attr('disabled',false);
                        $('#checkbox_pajak_5').attr('disabled',false);
                        $('#checkbox_pajak_6').attr('disabled',false);
                    }
                }
                function set_checkbox_pajak_4(kondisi){
                    if(kondisi == true){
                        $('#checkbox_pajak_1').attr('disabled',true);
                        $('#checkbox_pajak_2').attr('disabled',true);
                        $('#checkbox_pajak_3').attr('disabled',true);
                        $('#checkbox_pajak_5').attr('disabled',true);
                        $('#checkbox_pajak_6').attr('disabled',true);
                    }else{
                        $('#checkbox_pajak_1').attr('disabled',false);
                        $('#checkbox_pajak_2').attr('disabled',false);
                        $('#checkbox_pajak_3').attr('disabled',false);
                        $('#checkbox_pajak_5').attr('disabled',false);
                        $('#checkbox_pajak_6').attr('disabled',false);
                    }
                }
                function set_checkbox_pajak_5(kondisi){
                    if(kondisi == true){
                        $('#checkbox_pajak_1').attr('disabled',true);
                        $('#checkbox_pajak_2').attr('disabled',true);
                        $('#checkbox_pajak_3').attr('disabled',true);
                        $('#checkbox_pajak_4').attr('disabled',true);
                        $('#checkbox_pajak_6').attr('disabled',true);
                    }else{
                        $('#checkbox_pajak_1').attr('disabled',false);
                        $('#checkbox_pajak_2').attr('disabled',false);
                        $('#checkbox_pajak_3').attr('disabled',false);
                        $('#checkbox_pajak_4').attr('disabled',false);
                        $('#checkbox_pajak_6').attr('disabled',false);
                    }
                }
                function set_checkbox_pajak_6(kondisi){
                    var info_jenis_vendor_pp23 =   '<div class="form-group row info_jenis_vendor" id="info_jenis_vendor">'+
                                                    '<label class="col-sm-4 col-form-label" for="jenis_vendor">Kategori Vendor</label>'+
                                                    '<div class="col-sm-8">'+
                                                        '<select name="jenis_vendor" id="jenis_vendor" required="reuqired" disabled class="form-control form-control-sm select2" data-select2-id="21">'+
                                                            '<option value="">Pilih</option>'+
                                                            '<option value="reguler">Reguler</option>'+
                                                            '<option value="pp23">PP 23 2018</option>'+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>';
                    if(kondisi == true){
                        document.getElementById('informasi_vendor_tambahan').innerHTML = info_jenis_vendor_pp23;
                        $('#jenis_vendor').select2({
                            placeholder: "Pilih",
                            allowClear: true
                        });
                        $('#checkbox_pajak_2').attr('disabled',true);
                        $('#checkbox_pajak_3').attr('disabled',true);
                        $('#checkbox_pajak_4').attr('disabled',true);
                        $('#checkbox_pajak_5').attr('disabled',true);
                    }else{
                        $('.info_jenis_vendor').remove()
                        if ($('#checkbox_pajak_1').prop('checked') == false){
                            $('#checkbox_pajak_3').attr('disabled',false);
                            $('#checkbox_pajak_4').attr('disabled',false);
                            $('#checkbox_pajak_5').attr('disabled',false);
                            $('#checkbox_pajak_2').attr('disabled',false);
                        }else{
                            $('#checkbox_pajak_2').attr('disabled',false);
                        }
                    }
                }

                $('#checkbox_pajak').on('change', function(){
                    reset_nominal();
                    if($("#id_metode").val() != ''){
                        $("#id_metode").val('').trigger('change')
                    }
                    // if (checkbox_pajak_1.checked){
                    //     set_checkbox_pajak_1(true)
                    // }else{
                    //     set_checkbox_pajak_1(false)
                    // }
                })
                $('#checkbox_pajak_1').on('change', function(){
                    reset_nominal();
                    if($("#id_metode").val() != ''){
                        $("#id_metode").val('').trigger('change')
                    }
                    if (checkbox_pajak_1.checked){
                        set_checkbox_pajak_1(true)
                    }else{
                        set_checkbox_pajak_1(false)
                    }
                })
                $('#checkbox_pajak_2').on('change', function(){
                    console.log('checkbox 2 diganti')
                    $('#id_metode').attr('disabled',true);
                    reset_nominal();
                    if($("#id_metode").val() != ''){
                        $("#id_metode").val('').trigger('change')
                    }
                    if (checkbox_pajak_2.checked){
                        console.log('checkbox checked')
                        document.getElementById('status_pajak_2').removeAttribute('disabled');
                        document.getElementById('status_pajak_2').setAttribute('required',true);
                        set_checkbox_pajak_2(true)
                    }else{
                        console.log('checkbox unchecked')
                        document.getElementById('status_pajak_2').setAttribute('disabled',true);
                        $('#status_pajak_2').val("").trigger('change');
                        set_checkbox_pajak_2(false)
                    }


                })
                $('#checkbox_pajak_3').on('change', function(){
                    $('#id_metode').attr('disabled',true);
                    reset_nominal();
                    if($("#id_metode").val() != ''){
                        $("#id_metode").val('').trigger('change')
                    }
                    if (checkbox_pajak_3.checked){
                        document.getElementById('status_pajak_3').removeAttribute('disabled');
                        document.getElementById('status_pajak_3').setAttribute('required',true);
                        set_checkbox_pajak_3(true)
                    }else{
                        document.getElementById('status_pajak_3').setAttribute('disabled',true);
                        $('#status_pajak_3').val("").trigger('change');
                        set_checkbox_pajak_3(false)
                    }
                })
                $('#checkbox_pajak_4').on('change', function(){
                    $('#id_metode').attr('disabled',true);
                    reset_nominal();
                    if($("#id_metode").val() != ''){
                        $("#id_metode").val('').trigger('change')
                    }
                    if (checkbox_pajak_4.checked){
                        document.getElementById('status_pajak_4').removeAttribute('disabled');
                        document.getElementById('status_pajak_4').setAttribute('required',true);
                        set_checkbox_pajak_4(true)
                    }else{
                        document.getElementById('status_pajak_4').setAttribute('disabled',true);
                        $('#status_pajak_4').val("").trigger('change');
                        set_checkbox_pajak_4(false)
                    }
                })
                $('#checkbox_pajak_5').on('change', function(){
                    $('#id_metode').attr('disabled',true);
                    reset_nominal();
                    if($("#id_metode").val() != ''){
                        $("#id_metode").val('').trigger('change')
                    }
                    if (checkbox_pajak_5.checked){
                        document.getElementById('status_pajak_5').removeAttribute('disabled');
                        document.getElementById('status_pajak_5').setAttribute('required',true);
                        set_checkbox_pajak_5(true)
                    }else{
                        document.getElementById('status_pajak_5').setAttribute('disabled',true);
                        $('#status_pajak_5').val("").trigger('change');
                        set_checkbox_pajak_5(false)
                    }
                })
                $('#checkbox_pajak_6').on('change', function(){
                    console.log('checkbox 6 diganti')
                    $('#id_metode').attr('disabled',true);
                    reset_nominal();
                    if($("#id_metode").val() != ''){
                        $("#id_metode").val('').trigger('change')
                    }
                    if (checkbox_pajak_6.checked){
                        document.getElementById('status_pajak_6').removeAttribute('disabled');
                        document.getElementById('status_pajak_6').setAttribute('required',true);
                        set_checkbox_pajak_6(true)
                    }else{
                        document.getElementById('status_pajak_6').setAttribute('disabled',true);
                        $('#status_pajak_6').val("").trigger('change');
                        set_checkbox_pajak_6(false)
                    }
                })

                if(kategori != 1){
                    pajak_field_1.style.display = 'none';
                    pajak_field_2.style.display = 'contents';
                }else{
                    pajak_field_1.style.display = 'contents';
                    pajak_field_2.style.display = 'none';
                }

                var nik = document.getElementById("nik");
                var npwp = document.getElementById("npwp");

                if(nik){
                    nik.addEventListener("input", function(e) {
                        $(this).val($(this).val().replace(/[^0-9]/g, ''));

                    });
                }

                if(npwp){
                    npwp.addEventListener("input", function(e) {

                        $(this).val($(this).val().replace(/[^0-9]/g, ''));
                    });
                }

            }else{
                $('.checkbox_pajak').attr('required', false);
                $('#id_metode').attr('disabled', false);
                all_form_field.style.display = 'block';
                informasi_perpajakan.style.display = 'none';
                informasi_lampiran.style.display = 'none';
                tata_cara.style.display = 'none';
                if(kategori == 4){
                    var select_jenis_pajak =    '<div class="form-group row">'+
                                                    '<label class="col-sm-4 col-form-label" for="jenis_pajak">Jenis Pajak</label>'+
                                                    '<div class="col-sm-8">'+
                                                        '<select name="jenis_pajak" id="jenis_pajak" required="reuqired" class="form-control form-control-sm select2" data-select2-id="22">'+
                                                            '<option value="">Pilih</option>'+
                                                            '<option value="PPN">PPN</option>'+
                                                            '<option value="PPh 21">PPh 21</option>'+
                                                            '<option value="PPh 23">PPh 23</option>'+
                                                            '<option value="PPh 4 Ayat 2">PPh 4 Ayat 2</option>'+
                                                            '<option value="PPh 25">PPh 25</option>'+
                                                            '<option value="PPh Tahunan Badan">PPh Tahunan Badan</option>'+
                                                            '<option value="Denda Pajak">Denda Pajak</option>'+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>';
                    document.getElementById('informasi_vendor_tambahan').innerHTML = select_jenis_pajak;
                    $('#jenis_pajak').select2({
                        placeholder: "Pilih",
                        allowClear: true
                    });
                }else{
                    document.getElementById('informasi_vendor_tambahan').innerHTML = "";
                }

            }
        }else{
            all_form_field.style.display = 'none';
            informasi_perpajakan.style.display = 'none';
            informasi_lampiran.style.display = 'none';
            tata_cara.style.display = 'none';
            swal({
                title: "Generate Form Gagal",
                text: "Pastikan Anda Sudah Memilih Kategori Pengajuan Dana",
                icon: "warning",
                button: "Ok",
            })
        }

        // console.log('tombok aktif');
        // var tata_cara = document.getElementById('tata_cara');

        // if ($('#id_kategori').val() <=2 ) {
        //     tata_cara.style.display = 'block';
        // } else {
        //     tata_cara.style.display = 'none';
        // }
    });

    $('#generate_form').on('click', function(){

        let tata_cara = document.getElementById('tata_cara');
        let kategori = $('#id_kategori').val();
        let informasi_perpajakan = document.getElementById('informasi_perpajakan');
        if (kategori != ''){
            if (kategori <= 2){
                // informasi_perpajakan.style.display = 'block';
                tata_cara.style.display = 'block';
            }else{
                // informasi_perpajakan.style.display = 'none';
                tata_cara.style.display = 'none';
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

    function cek_status_pajak(){
        console.log('cek status pajak')

        if( $('#checkbox_pajak_2').prop('checked') == true ){
            if( $('#checkbox_pajak_1').prop('checked') == true ){
                if ($('#status_pajak_2').val() == 'tanggung') {
                    $('#nominal_trf').attr('readonly',true);
                    enable_nominal("2", "tanggung", null ,true)
                }else{
                    $('#nominal_trf').attr('readonly',true);
                    if($('#jenis_vendor').val() == 'nonekspedisi'){
                        enable_nominal("2", "potong", "nonekspedisi", true)
                    }else{
                        enable_nominal("2", "potong", "ekspedisi", true)
                    }
                }
            }else{
                if ($('#status_pajak_2').val() == 'tanggung') {
                    $('#nominal_inv').attr('readonly',true);
                    enable_nominal("2", "tanggung", null ,false)
                }else{
                    $('#nominal_trf').attr('readonly',true);
                    enable_nominal("2", "potong", null ,false)
                }
            }
        }else if( $('#checkbox_pajak_3').prop('checked') == true ){
            if ($('#status_pajak_3').val() == 'tanggung') {
                $('#nominal_inv').attr('readonly',true);
                enable_nominal("3", "tanggung", null , null)
            }else{
                $('#nominal_trf').attr('readonly',true);
                enable_nominal("3", "potong", null, null)
            }
        }else if( $('#checkbox_pajak_4').prop('checked') == true ){
            if ($('#status_pajak_4').val() == 'tanggung') {
                $('#nominal_inv').attr('readonly',true);
                enable_nominal("4", "tanggung", null , null)
            }else{
                $('#nominal_trf').attr('readonly',true);
                enable_nominal("4", "potong", null, null)
            }
        }else if( $('#checkbox_pajak_5').prop('checked') == true ){
            if ($('#status_pajak_5').val() == 'tanggung') {
                $('#nominal_inv').attr('readonly',true);
                enable_nominal("5", "tanggung", null , null)
            }else{
                $('#nominal_trf').attr('readonly',true);
                enable_nominal("5", "potong", null, null)
            }
        }else if( $('#checkbox_pajak_6').prop('checked') == true ){
            if( $('#checkbox_pajak_1').prop('checked') == true ){
                if ($('#status_pajak_6').val() == 'tanggung') {
                    $('#nominal_trf').attr('readonly',true);
                    enable_nominal("6", "tanggung", null ,true)
                }else{
                    $('#nominal_trf').attr('readonly',true);
                    if($('#jenis_vendor').val() == 'reguler'){
                        enable_nominal("6", "potong", "reguler", true)
                    }else{
                        enable_nominal("6", "potong", "nonreguler", true)
                    }
                }
            }else{
                if ($('#status_pajak_6').val() == 'tanggung') {
                    $('#nominal_inv').attr('readonly',true);
                    enable_nominal("6", "tanggung", null ,false)
                }else{
                    $('#nominal_trf').attr('readonly',true);
                    enable_nominal("6", "potong", null ,false)
                }
            }
        }else{
            console.log('kat 1')
            if ($('#id_kategori').val() == 2){
                console.log('jalan')
                $('#id_metode').attr('disabled', false);
                enable_nominal("1", null, null ,null)
            }
        }

        function enable_nominal(jenis_pajak, status_pajak, jenis_vendor, ppn){
            console.log('enable nominal')
            // var nominal = document.getElementById("nominal");


            var nominal_inv = document.getElementById("nominal_inv");
            var nominal_trf = document.getElementById("nominal_trf");


            if(nominal_inv != undefined){
                nominal_inv.addEventListener("input", function() {
                    $(this).val($(this).val().replace(/[^0-9]/g, ''));
                    set_nominal(this.value, null, jenis_pajak, status_pajak, jenis_vendor, ppn);
                    // if($('#jenis_vendor').val() == ''){
                    //     Swal.fire({
                    //         title: "Perhitungan Nominal Gagal",
                    //         text: "Pastikan anda sudah mengisi kategori vendor",
                    //         icon: "warning",
                    //         confirmButtonColor: '#7cd1f9',
                    //     });
                    //     $(this).val('');
                    //     $('#jenis_vendor').focus();
                    // }else{

                    //     $(this).val($(this).val().replace(/[^0-9]/g, ''));

                    //     set_nominal(this.value, null, jenis_pajak, status_pajak, jenis_vendor);
                    // }
                });
            }

            if(nominal_trf != undefined){
                nominal_trf.addEventListener("input", function() {
                    console.log('test')
                    $(this).val($(this).val().replace(/[^0-9]/g, ''));
                    set_nominal(null, this.value, jenis_pajak, status_pajak, jenis_vendor, ppn);
                    // if($('#jenis_vendor').val() == ''){
                    //     Swal.fire({
                    //         title: "Perhitungan Nominal Gagal",
                    //         text: "Pastikan anda sudah mengisi kategori vendor",
                    //         icon: "warning",
                    //         confirmButtonColor: '#7cd1f9',
                    //     });
                    //     $(this).val('');
                    //     document.getElementById('jenis_vendor').focus();
                    // }else{
                    //     $(this).val($(this).val().replace(/[^0-9]/g, ''));
                    //     set_nominal(null, this.value, jenis_pajak, status_pajak, jenis_vendor);
                    // }

                });
            }
        }
    }

    function set_nominal(invoice, transfer, jenis_pajak, status_pajak, jenis_vendor, ppn) {

        if(jenis_pajak == '1'){
            // nominal_inv.value = formatRupiah(invoice);
            nominal_trf.value = formatRupiah(transfer);
        }

        if(jenis_pajak == '2'){
            if( ppn == true){
                if(status_pajak == 'tanggung'){
                    nominal_inv.value = formatRupiah(invoice);
                    nominal_trf.value = formatRupiah(invoice);
                }else{
                    if(jenis_vendor == 'ekspedisi'){
                        dpp = invoice * 100 / 101.1 ;
                        ppn = invoice - dpp;
                        transfer = (dpp*98/100) + ppn ;
                        nominal_trf.value = formatRupiah(transfer.toFixed(0));
                        nominal_inv.value = formatRupiah(invoice);

                    }else{
                        dpp = invoice * 100 / 111 ;
                        ppn = invoice - dpp;
                        transfer = (dpp*98/100) + ppn ;
                        nominal_trf.value = formatRupiah(transfer.toFixed(0));
                        nominal_inv.value = formatRupiah(invoice);
                    }
                }
            }else{
                if(status_pajak == 'tanggung'){
                    invoice = transfer * 100 / 98 ;
                    nominal_inv.value = formatRupiah(invoice.toFixed(0));
                    nominal_trf.value = formatRupiah(transfer);
                }else{
                    transfer = invoice * 98 / 100 ;
                    nominal_trf.value = formatRupiah(transfer.toFixed(0));
                    nominal_inv.value = formatRupiah(invoice);
                }
            }
        }

        if(jenis_pajak == '3'){
            if(status_pajak == 'tanggung'){
                invoice = transfer * 100 / 97.5 ;
                nominal_inv.value = formatRupiah(invoice.toFixed(0));
                nominal_trf.value = formatRupiah(transfer);
            }else{
                transfer = invoice * 97.5 / 100 ;
                nominal_trf.value = formatRupiah(transfer.toFixed(0));
                nominal_inv.value = formatRupiah(invoice);
            }
        }

        if(jenis_pajak == '4' || jenis_pajak == '5'){
            if(status_pajak == 'tanggung'){
                invoice = transfer * 100 / 97 ;
                nominal_inv.value = formatRupiah(invoice.toFixed(0));
                nominal_trf.value = formatRupiah(transfer);
            }else{
                transfer = invoice * 97 / 100 ;
                nominal_trf.value = formatRupiah(transfer.toFixed(0));
                nominal_inv.value = formatRupiah(invoice);
            }
        }

        if(jenis_pajak == '6'){
            if( ppn == true){
                if(status_pajak == 'tanggung'){
                    nominal_inv.value = formatRupiah(invoice);
                    nominal_trf.value = formatRupiah(invoice);
                }else{
                    dpp = invoice * 100 / 111 ;

                    if(jenis_vendor == 'reguler'){
                        ppn = invoice - dpp;
                        transfer = (dpp*90/100) + ppn ;
                        nominal_trf.value = formatRupiah(transfer.toFixed(0));
                        nominal_inv.value = formatRupiah(invoice);

                    }else{
                        ppn = invoice - dpp;
                        transfer = (dpp*99.5/100) + ppn ;
                        nominal_trf.value = formatRupiah(transfer.toFixed(0));
                        nominal_inv.value = formatRupiah(invoice);
                    }
                }
            }else{
                if(jenis_vendor == 'reguler'){
                    if(status_pajak == 'tanggung'){
                        invoice = transfer * 100 / 90 ;
                        nominal_inv.value = formatRupiah(invoice.toFixed(0));
                        nominal_trf.value = formatRupiah(transfer);
                    }else{
                        transfer = invoice * 90 / 100 ;
                        nominal_trf.value = formatRupiah(transfer.toFixed(0));
                        nominal_inv.value = formatRupiah(invoice);
                    }
                }else{
                    if(status_pajak == 'tanggung'){
                        invoice = transfer * 100 / 99.5 ;
                        nominal_inv.value = formatRupiah(invoice.toFixed(0));
                        nominal_trf.value = formatRupiah(transfer);
                    }else{
                        transfer = invoice * 99.5 / 100 ;
                        nominal_trf.value = formatRupiah(transfer.toFixed(0));
                        nominal_inv.value = formatRupiah(invoice);
                    }
                }
            }
        }

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

    $('#id_metode').on('change', function() {
        console.log('fungsi id_metode jalan')
        if ($('#id_metode').val() == '') {
            document.getElementById('detail_metode_field').innerHTML = '';
        }else{
            // $("#id_metode").attr('disabled', true)
            if ($('#id_metode').val() == '2') {
                document.getElementById('detail_metode_field').innerHTML = '';
                if ($('#id_kategori').val() == 1){
                    $('#detail_metode_field').append(metode_cash_cat_1);
                }else{

                    $('#detail_metode_field').append(metode_cash);
                }

            }
            else if ($('#id_metode').val() == '4') {
                document.getElementById('detail_metode_field').innerHTML = '';
                if ($('#id_kategori').val() == 1){
                    $('#detail_metode_field').append(metode_lain_cat_1);
                }else{

                    $('#detail_metode_field').append(metode_lain);
                }

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
                if ($('#id_kategori').val() == 1){
                    $('#detail_metode_field').append(metode_bank_cat_1);
                }else{
                    $('#detail_metode_field').append(metode_bank);
                }
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

            cek_status_pajak()

            $("input[name='no_payment']").on('input', function(e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });

            $("input[name='nominal']").on('input', function(e) {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
                // var new_val = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format($(this).val());
            });



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
                                        '<button id="remove" type="button" class="btn btn-sm btn-light text-secondary"><i class="fa fa-trash"></i></button>'+
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
                                    '<button id="remove" type="button" class="btn btn-sm btn-light text-secondary"><i class="fa fa-trash"></i></button>'+
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

                var status_pajak = [pajak_1,pajak_2,pajak_3,pajak_4,pajak_5,pajak_6]

                var checkbox_pajak_1 = $('#checkbox_pajak_1');
                var checkbox_pajak_2 = $('#checkbox_pajak_2');
                var checkbox_pajak_3 = $('#checkbox_pajak_3');
                var checkbox_pajak_4 = $('#checkbox_pajak_4');
                var checkbox_pajak_5 = $('#checkbox_pajak_5');
                var checkbox_pajak_6 = $('#checkbox_pajak_6');
                var checkbox_pajak = [checkbox_pajak_1,checkbox_pajak_2,checkbox_pajak_3,checkbox_pajak_4,checkbox_pajak_5,checkbox_pajak_6]

                for (let i=0;i<6;i++){
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
    function get_data_detail_info_refund(id_kategori){
        let data_detail_info_refund = null;
        if(id_kategori == 4){
            let no_invoice = $('#no_inv').val();
            let no_retur = $('#no_retur').val();
            let alasan_refund = $('#alasan_refund').val();
            let no_inv_pengganti = $('#no_inv_pengganti').val();
            let pilihan_cashback = $('#pilihan_cashback').val();
            let barcode_barang = $('#barcode_barang').val();
            data_detail_info_refund = {
                "no_invoice" : no_invoice,
                "no_retur" : no_retur,
                "alasan_refund" : alasan_refund,
                "no_inv_pengganti" : no_inv_pengganti,
                "pilihan_cashback" : pilihan_cashback,
                "barcode_barang" : barcode_barang
            };
        }
        return data_detail_info_refund;
    }

    function get_data_pembayaran(id_metode){

        var pemilik = $('#pemilik').val();

        var nominal_trf = parseFloat(document.getElementById('nominal_trf').value.replace(/,.*|[^0-9]/g, ''));

        if($('#id_kategori').val() == 1){
            var jenis_vendor = $('#jenis_vendor').val();
            var nominal_inv = parseFloat(document.getElementById('nominal_inv').value.replace(/,.*|[^0-9]/g, ''));
        }else{
            var jenis_vendor = null;
            var nominal_inv = null;
            if($('#id_kategori').val() == 4){
                var jenis_pajak = $('#jenis_pajak').val();
            }
        }

        // var nominal_bayar = parseFloat(nominal.value.replace(/,.*|[^0-9]/g, ''));
        var provider = null;
        var no_payment = null;
        if(id_metode != 2){
            provider = $('#provider').val();
            no_payment = $('#no_payment').val();
        }

        let data_pembayaran = {
                "id_metode" : id_metode,
                "jenis_vendor" : jenis_vendor,
                "provider" : provider,
                "no_payment" : no_payment,
                "penerima" : pemilik,
                "nominal_trf" : nominal_trf,
                "nominal_inv" : nominal_inv,
                "jenis_pajak" : jenis_pajak
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

    $('#form_pengajuan_dana').on('submit', function(e) {
        e.preventDefault();
        let form_data = new FormData();

        var no_surat = $('#no_surat').val();
        var id_kategori = $('#id_kategori').val();
        var id_metode = $('#id_metode').val();
        var keperluan = $('#keperluan').val();
        var tgl_pengajuan = $('#tgl_pengajuan').val();
        var npwp = $('#npwp').val();
        var nik = $('#nik').val();

        // if(id_kategori == 1){
        //     if(id_metode == ''){
        //         Swal.fire({
        //             title: "Pengajuan Dana Tidak Dapat Diproses",
        //             text: "Anda belum memilih metode pada kolom Informasi pembayaran",
        //             icon: "warning",
        //             confirmButtonColor: '#7cd1f9',
        //         });
        //     }
        // }


        var data_pajak = get_data_pajak(id_kategori);
        var deatil_info_refund = get_data_detail_info_refund(id_kategori);
        var data_pembayaran = get_data_pembayaran(id_metode);

        // var data_lampiran = get_lampiran_lain();

        form_data.append('no_surat',no_surat);
        form_data.append('id_kategori',id_kategori);
        form_data.append('keperluan',keperluan);
        form_data.append('tgl_pengajuan',tgl_pengajuan);
        form_data.append('data_pajak',JSON.stringify(data_pajak));
        form_data.append('deatil_info_refund',JSON.stringify(deatil_info_refund));
        form_data.append('data_pembayaran',JSON.stringify(data_pembayaran));
        // form_data.append('data_lampiran',JSON.stringify(data_lampiran));

        // var data = {
        //     'id_kategori' : id_kategori,
        //     'keperluan' : keperluan,
        //     'tgl_pengajuan' : tgl_pengajuan,
        //     'npwp' :npwp,
        //     'nik' :nik,
        //     'data_pajak' : data_pajak,
        //     'data_pembayaran' : data_pembayaran,
        //     'data_lampiran' : data_lampiran
        // }

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
            url: "/pengajuan_dana",
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
                    // simpan_to_trello();
                    // Generate_PDF(response.data);
                    Swal.fire({
                        title: "Pengajuan Diterima",
                        icon: 'success',
                        text: "Terima Kasih, Permintaan Anda Akan Segera Diproses",
                        button: "Ok",
                        confirmButtonColor: '#7cd1f9',
                    }).then((value) => {
                        if (true) {
                            window.location.reload();
                        } else {
                            window.location.reload();
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