$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Pilih",
        allowClear: true
    });
    var table = $('#myTable').DataTable({
        "processing": true,
        // "serverSide": true,
        "responsive": true,
        "paging": true,
            "lengthChange": true,
            "searching": true,

            "info": true,
            "autoWidth": false,
        "paging": true,
        "lengthChange": true,
        "searching": true,

        "info": true,
        "autoWidth": false,
        "ajax": 'get_data_pengajuan_dana/pengajuan',
        "columns": [
            {
                data: 'no_surat',
                render: function (dataField) { return '<a class="link-nomor-arsip-pengajuan-dana" href="#" style="text-decoration: none;">'+dataField+'</a>'; },
                orderable: true,
                // className: "btn btn-light text-secondary",
                // defaultContent: '<i class="fas fa-edit"/>',
            },
            { data: 'tgl_pengajuan' },
            { data: 'id_kategori' },
            { data: 'keperluan' },
            { data: 'status_pengajuan' },
            {
                data: 'status_pemrosesan' ,
                className: "dt-head-center",
            },
            {
                data: 'action' ,
                className: "text-center",
                orderable: false, searchable: false
            },
            // {
            //     data: null,
            //     className: "btn btn-light text-secondary",
            //     defaultContent: '<i class="fas fa-edit"/>',
            //     orderable: false
            // },
        ],
        "order": [[0, "desc"]]
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



    function set_informasi_pembayaran(informasi_pembayaran){
        $('#pemilik').val(informasi_pembayaran.penerima);
        $('#nominal').val(formatRupiah(String(informasi_pembayaran.nominal)));
        $('#provider').val(informasi_pembayaran.provider).trigger("change");
        $('#no_payment').val(informasi_pembayaran.no_payment);
    }

    function set_dokumen_pengajuan(dokumen_pengajuan){
        $('#npwp').val(dokumen_pengajuan.npwp);
        $('#nik').val(dokumen_pengajuan.nik);
        // $('#file_npwp').val(dokumen_pengajuan.file_npwp);
        // $('#file_ktp').val(dokumen_pengajuan.file_ktp);
        // $('#file_invoice').val(dokumen_pengajuan.file_invoce);
        if(dokumen_pengajuan.file_npwp != null){
            $('#file_npwp_field').attr("href","/storage/"+dokumen_pengajuan.file_npwp);
            $('#no_file_npwp').hide();
        }else{
            $('#file_npwp_field').hide();
            $('#no_file_npwp').show();
        }
        if(dokumen_pengajuan.file_ktp != null){
            $('#file_ktp_field').attr("href","/storage/"+dokumen_pengajuan.file_ktp);
            $('#no_file_ktp').hide();
        }else{
            $('#file_ktp_field').hide();
            $('#no_file_ktp').show();
        }
        if(dokumen_pengajuan.file_invoice != null){
            $('#file_invoice_field').attr("href","/storage/"+dokumen_pengajuan.file_invoice);
            $('#no_file_invoice').hide();
        }else{
            $('#file_invoice_field').hide();
            $('#no_file_invoice').show();
        }
    }
    function set_informasi_perpajakan(informasi_perpajakan){
        if(informasi_perpajakan != null){
            for (i = 0; i < informasi_perpajakan.length ; i++){
                console.log(informasi_perpajakan[i].id_jenis_pajak)
                console.log(informasi_perpajakan[i].status_pajak)
                if(informasi_perpajakan[i].id_jenis_pajak == 1){
                    document.getElementById('checkbox_pajak_1').checked = true;
                }else{
                    document.getElementById('checkbox_pajak_'+(i+1)).checked = true;
                    document.getElementById('status_pajak_'+(i+1)).removeAttribute('disabled');
                    document.getElementById('status_pajak_'+(i+1)).setAttribute('required','');
                    console.log('#'+'status_pajak_'+(i+1)+' = '+informasi_perpajakan[i].status_pajak);
                    $('#'+'status_pajak_'+(i+1)).val(informasi_perpajakan[i].status_pajak).trigger("change");
                }
            }
        }
    }
    function set_informasi_lampiran(informasi_lampiran){
        if(informasi_lampiran != null){
            var lampiran_field =    '<button type="button" id="add_lampiran" class="btn btn-sm btn-light text-secondary mb-1"><i class="fa fa-plus"></i></button>'+
                                    '<div id="lampiran_field">'+

                                    '</div>';

            var x = 1;
            var tambah_lampiran =   '<div class="row item-lampiran" >'+
                                        '<div class="form-group col-md-4 mb-1">'+
                                            '<input type="text" id="nama_lampiran" name="nama_lampiran[]" class="data-barang form-control form-control-sm" placeholder="Nama File" required>'+
                                        '</div>'+
                                        '<div class="form-group col-md-4 mb-1">'+
                                            '<div class="input-group">'+
                                                '<input type="file" id="file_lampiran_'+x+'" name="file_lampiran[]" class="form-control form-control-sm" required="true">'+
                                                '<div class="input-group-append">'+
                                                    '<a id="file_lampiran_field_'+x+'" href="#" target="_blank" class="btn btn-sm btn-secondary text-white"> Lihat <i class="fa fa-file-contract"></i>'+
                                                    '</a>'+
                                                '</div>'+
                                            '</div>'+

                                        '</div>'+
                                        '<div class="form-group col-md-4 mb-1">'+
                                            '<button id="remove" type="button" class="btn btn-sm btn-light text-secondary"><i class="fa fa-trash"></i></button>'+
                                        '</div>'+
                                    '</div>';
            document.getElementById('checkbox_lampiran').checked = true;
            document.getElementById('lampiran_lain_field').style.display = 'block';
            document.getElementById('lampiran_lain_field').innerHTML = lampiran_field;
            console.log(informasi_lampiran.length)
            for(i=0;i<informasi_lampiran.length;i++){
                $("#lampiran_field").append(tambah_lampiran);
                $('input[name="nama_lampiran[]"]')[i].value = informasi_lampiran[i].nama_lampiran;
                console.log(informasi_lampiran[i].file_lampiran)
                if(informasi_lampiran[i].file_lampiran != null){
                    $('#file_lampiran_field_'+(i+1)).attr("href","/storage/"+informasi_lampiran[i].file_lampiran);
                    // $('#no_file_lampiran_'+(i+1)).hide();
                    $('#file_lampiran_1').attr('required',false);
                }else{
                    // document.getElementById('file_lampiran_field_'+(i+1)).innerHTML = '';
                    document.getElementById('file_lampiran_field_'+(i+1)).innerHTML = 'Tidak Ada <i class="fa fa-ban"></i>';
                    $('#file_lampiran_field_'+(i+1)).attr("href","#");
                    // $('#file_lampiran_field_'+(i+1)).hide();
                    // $('#no_file_lampiran_'+(i+1)).show();
                    // post-data/lsThxyIze2J6ycNXnKQ17Rc5Qmw4h3bVzVohPL4t.pdf
                }
            }
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
        }
    }



    function table_function(){
        table.on('draw', function() {
            $('.link-nomor-arsip-pengajuan-dana').on('click',function() {
                console.log('tombol berfungsi');
                document.getElementById('field_page').innerHTML= '';
                var page_edit_pengajuan_dana = document.getElementById('page_edit_pengajuan_dana');
                page_edit_pengajuan_dana.style.display = 'block';
                var id_pengajuan = $(this).parents('tr').attr('id');
                $.ajax({
                    type: "GET",
                    url: "/data_pengajuan_dana/" + id_pengajuan + "/edit",
                    success: function(response) {
                        console.log(response);
                        var data = response.data;
                        var informasi_pembayaran = response.informasi_pembayaran;
                        var dokumen_pengajuan = response.dokumen_pengajuan;
                        var informasi_lampiran = response.informasi_lampiran;
                        var informasi_perpajakan = response.informasi_perpajakan;
                        // var jenis_surat = response.jenis_surat;
                        // console.log(jenis_surat);
                        // if(data.file_surat != null){
                        //     $('#file_field').attr("href","/storage/"+data.file_surat);
                        //     $('#no_file').hide();
                        // }else{
                        //     $('#file_field').hide();
                        //     $('#no_file').show();
                        // }

                        // $('#id_update').val(data.id);
                        // document.getElementById('field_page').innerHTML= data;

                        // $('#no_arsip_edit').val(data.no_arsip);
                        $('#id_pengajuan').val(data.id);
                        $('#id_kategori').val(data.id_kategori).trigger("change")
                        $('#no_surat').val(data.no_surat);
                        $('#tgl_pengajuan').val(data.tgl_pengajuan);
                        $('#keperluan').val(data.keperluan);
                        $('#id_metode').val(informasi_pembayaran.id_metode).trigger("change");
                        set_informasi_pembayaran(informasi_pembayaran)
                        set_informasi_perpajakan(informasi_perpajakan)
                        set_informasi_lampiran(informasi_lampiran)
                        set_dokumen_pengajuan(dokumen_pengajuan)
                        // $('#penerima').val(data.penerima);
                        // $('#resume').val(data.resume);
                        // $('#keterangan').val(data.keterangan);
                        // $('#id_jenis_edit').val(data.id_jenis);
                        // $('#id_divisi_edit').val(data.id_divisi);


                        // $('#no_arsip_edit').attr('readonly', true);
                        // $('#id_jenis_edit').attr('disabled', true);
                        // $('#id_divisi_edit').attr('disabled', true);
                        // $('#tgl_dikirim').attr('readonly', true);
                        // $('#tgl_surat').attr('readonly', true);
                        // $('#no_surat').attr('readonly', true);
                        // $('#penerima').attr('readonly', true);
                        // $('#resume').attr('readonly', true);
                        // $('#keterangan').attr('readonly', true);
                        // $('#file_surat').attr('disabled', true);
                        // $('#file_surat').hide();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

        });
    }
    table_function();


    const field_page =  '<div class="col-sm-12 table-responsive">'+
                            '<table id="myTable" class="table table-sm table-bordered table-hover dataTable dtr-inline" aria-describedby="example1_info">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th> No. Pengajuan</th>'+
                                        '<th> Tgl. Pengajuan</th>'+
                                        '<th> Id Kategori </th>'+
                                        '<th> Keperluan </th>'+
                                        '<th> Status Pengajuan </th>'+
                                        '<th> Status Pembayaran </th>'+
                                        '<th> Action </th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody id="field_data">'+

                                '</tbody>'+
                            '</table>'+
                        '</div>';

    $('#custom-tabs-four-pengajuan-tab').on('click', function(e){
        e.preventDefault();
        // window.location.reload();
        $('#form_edit_pengajuan_dana').trigger("reset");
        var page_edit_pengajuan_dana = document.getElementById('page_edit_pengajuan_dana');
            page_edit_pengajuan_dana.style.display = 'none';
        document.querySelector('#field_page').innerHTML = field_page;

        table = $('#myTable').DataTable({
            "destroy": true,
            "processing": true,
            // "serverSide": true,
            "responsive": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,

            "info": true,
            "autoWidth": false,
            "ajax": 'get_data_pengajuan_dana/pengajuan',
            "columns": [
                {
                    data: 'no_surat',
                    render: function (dataField) { return '<a class="link-nomor-arsip-pengajuan-dana" href="#" style="text-decoration: none;">'+dataField+'</a>'; },
                    orderable: true,
                    // className: "btn btn-light text-secondary",
                    // defaultContent: '<i class="fas fa-edit"/>',
                },
                { data: 'tgl_pengajuan' },
                { data: 'id_kategori' },
                { data: 'keperluan' },
                { data: 'status_pengajuan' },
                {
                    data: 'status_pemrosesan' ,
                    className: "dt-head-center",
                },
                {
                    data: 'action' ,
                    className: "text-center",
                },
                // {
                //     data: null,
                //     className: "btn btn-light text-secondary",
                //     defaultContent: '<i class="fas fa-edit"/>',
                //     orderable: false
                // },
            ],
            "order": [[0, "desc"]]
        });

        table_function();



        // $.ajax({
        //     type: "GET",
        //     url: "/get_data_pengajuan_dana/pengajuan",
        //     success: function(response) {
        //         console.log(response);
        //         var data = response.data;
        //         console.log(data);
        //         var trHTML = '';
        //         $.each(data, function (i, item) {
        //             trHTML +=   '<tr>'+
        //                             '<td style="vertical-align: middle;">' +
        //                                 '<a class="link-nomor-arsip-pengajuan-dana" href="#" data-toggle="modal" style="text-decoration: none;">'+
        //                                 item.no_surat +'</a>'+
        //                             '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.tgl_pengajuan + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.id_kategori + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.keperluan + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.status_pengajuan + '</td>'+
        //                             '<td style="vertical-align: middle;">' + item.status_pemrosesan + '</td>'+
        //                             '<td class="text-center text-white" style="vertical-align: middle;" >' +
        //                                 '<a href="#" type="button" class=" btn btn-sm btn-light btn-sm btn-download text-secondary "> <i class="fa fa-download "></i> </a>' +
        //                                 '<a href="#" data-toggle="modal" data-target="#modal_form_hapus_fpk" class="btn btn-sm btn-danger btn-sm hapus"><i class="fa fa-trash"> </i> </a>' +
        //                             '</td>' +
        //                         '</tr>';
        //         });
        //         // $('#field_data').append(trHTML);
        //         // document.getElementById('field_page').innerHTML = field_page;
        //         document.getElementById('field_data').innerHTML = trHTML;
        //     },
        //     error: function(error) {
        //         console.log(error);
        //     }
        // });
    })

    $('#custom-tabs-four-submited-tab').on('click', function(e){
        e.preventDefault();
        // window.location.reload();
        $('#form_edit_pengajuan_dana').trigger("reset");
        var page_edit_pengajuan_dana = document.getElementById('page_edit_pengajuan_dana');
            page_edit_pengajuan_dana.style.display = 'none';

        document.querySelector('#field_page').innerHTML = field_page;

        table = $('#myTable').DataTable({
            "destroy": true,
            "processing": true,
            // "serverSide": true,
            "responsive": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,

            "info": true,
            "autoWidth": false,
            "ajax": 'get_data_pengajuan_dana/submited',
            "columns": [
                {
                    data: 'no_surat',
                    render: function (dataField) { return '<a class="link-nomor-arsip-pengajuan-dana" href="#" style="text-decoration: none;">'+dataField+'</a>'; },
                    orderable: true,
                    // className: "btn btn-light text-secondary",
                    // defaultContent: '<i class="fas fa-edit"/>',
                },
                { data: 'tgl_pengajuan' },
                { data: 'id_kategori' },
                { data: 'keperluan' },
                { data: 'status_pengajuan' },
                {
                    data: 'status_pemrosesan' ,
                    className: "dt-head-center",
                },
                {
                    data: 'action' ,
                    className: "text-center",
                },
                // {
                //     data: null,
                //     className: "btn btn-light text-secondary",
                //     defaultContent: '<i class="fas fa-edit"/>',
                //     orderable: false
                // },
            ],
            "order": [[0, "desc"]]
        });

        table_function();

        // $.ajax({
        //     type: "GET",
        //     url: "/get_data_pengajuan_dana/submited",
        //     success: function(response) {
        //         console.log(response);
        //         var data = response.data;
        //         console.log(data);
        //         var trHTML = '';
        //         $.each(data, function (i, item) {
        //             trHTML +=   '<tr>'+
        //                             '<td style="vertical-align: middle;">' +
        //                                 '<a class="link-nomor-arsip-pengajuan-dana" href="#" style="text-decoration: none;">'+
        //                                 item.no_surat +'</a>'+
        //                             '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.tgl_pengajuan + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.id_kategori + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.keperluan + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.status_pengajuan + '</td>'+
        //                             '<td style="vertical-align: middle;">' + item.status_pemrosesan + '</td>'+
        //                             '<td class="text-center text-white" style="vertical-align: middle;" >' +
        //                                 '<a href="#" type="button" class=" btn btn-sm btn-light btn-sm btn-download text-secondary "> <i class="fa fa-download "></i> </a>' +
        //                                 '<a href="#" data-toggle="modal" data-target="#modal_form_hapus_fpk" class="btn btn-sm btn-danger btn-sm hapus"><i class="fa fa-trash"> </i> </a>' +
        //                             '</td>' +
        //                         '</tr>';
        //         });
        //         // $('#field_data').append(trHTML);
        //         document.getElementById('field_data').innerHTML=trHTML;
        //     },
        //     error: function(error) {
        //         console.log(error);
        //     }
        // });
    })

    $('#custom-tabs-four-approved-tab').on('click', function(e){
        e.preventDefault();
        // window.location.reload();
        $('#form_edit_pengajuan_dana').trigger("reset");
        var page_edit_pengajuan_dana = document.getElementById('page_edit_pengajuan_dana');
            page_edit_pengajuan_dana.style.display = 'none';

        document.querySelector('#field_page').innerHTML = field_page;
        table = $('#myTable').DataTable({
            "destroy": true,
            "processing": true,
            // "serverSide": true,
            "responsive": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,

            "info": true,
            "autoWidth": false,
            "ajax": 'get_data_pengajuan_dana/approved',
            "columns": [
                {
                    data: 'no_surat',
                    render: function (dataField) { return '<a class="link-nomor-arsip-pengajuan-dana" href="#" style="text-decoration: none;">'+dataField+'</a>'; },
                    orderable: true,
                    // className: "btn btn-light text-secondary",
                    // defaultContent: '<i class="fas fa-edit"/>',
                },
                { data: 'tgl_pengajuan' },
                { data: 'id_kategori' },
                { data: 'keperluan' },
                { data: 'status_pengajuan' },
                {
                    data: 'status_pemrosesan' ,
                    className: "dt-head-center",
                },
                {
                    data: 'action' ,
                    className: "text-center",
                },
                // {
                //     data: null,
                //     className: "btn btn-light text-secondary",
                //     defaultContent: '<i class="fas fa-edit"/>',
                //     orderable: false
                // },
            ],
            "order": [[0, "desc"]]
        });

        table_function();

        // $.ajax({
        //     type: "GET",
        //     url: "/get_data_pengajuan_dana/approved",
        //     success: function(response) {
        //         console.log(response);
        //         var data = response.data;
        //         console.log(data);
        //         var trHTML = '';
        //         $.each(data, function (i, item) {
        //             trHTML +=   '<tr>'+
        //                             '<td style="vertical-align: middle;">' +
        //                                 '<a class="link-nomor-arsip-pengajuan-dana" href="#" style="text-decoration: none;">'+
        //                                 item.no_surat +'</a>'+
        //                             '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.tgl_pengajuan + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.id_kategori + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.keperluan + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.status_pengajuan + '</td>'+
        //                             '<td style="vertical-align: middle;">' + item.status_pemrosesan + '</td>'+
        //                             '<td class="text-center text-white" style="vertical-align: middle;" >' +
        //                                 '<a href="#" type="button" class=" btn btn-sm btn-light btn-sm btn-download text-secondary "> <i class="fa fa-download "></i> </a>' +
        //                                 '<a href="#" data-toggle="modal" data-target="#modal_form_hapus_fpk" class="btn btn-sm btn-danger btn-sm hapus"><i class="fa fa-trash"> </i> </a>' +
        //                             '</td>' +
        //                         '</tr>';
        //         });
        //         // $('#field_data').append(trHTML);
        //         document.getElementById('field_data').innerHTML=trHTML;
        //     },
        //     error: function(error) {
        //         console.log(error);
        //     }
        // });
    })

    $('#custom-tabs-four-processing-tab').on('click', function(e){
        e.preventDefault();
        // window.location.reload();
        $('#form_edit_pengajuan_dana').trigger("reset");
        var page_edit_pengajuan_dana = document.getElementById('page_edit_pengajuan_dana');
            page_edit_pengajuan_dana.style.display = 'none';

        document.querySelector('#field_page').innerHTML = field_page;

        table = $('#myTable').DataTable({
            "destroy": true,
            "processing": true,
            // "serverSide": true,
            "responsive": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,

            "info": true,
            "autoWidth": false,
            "ajax": 'get_data_pengajuan_dana/processing',
            "columns": [
                {
                    data: 'no_surat',
                    render: function (dataField) { return '<a class="link-nomor-arsip-pengajuan-dana" href="#" style="text-decoration: none;">'+dataField+'</a>'; },
                    orderable: true,
                    // className: "btn btn-light text-secondary",
                    // defaultContent: '<i class="fas fa-edit"/>',
                },
                { data: 'tgl_pengajuan' },
                { data: 'id_kategori' },
                { data: 'keperluan' },
                { data: 'status_pengajuan' },
                {
                    data: 'status_pemrosesan' ,
                    className: "dt-head-center",
                },
                {
                    data: 'action' ,
                    className: "text-center",
                },
                // {
                //     data: null,
                //     className: "btn btn-light text-secondary",
                //     defaultContent: '<i class="fas fa-edit"/>',
                //     orderable: false
                // },
            ],
            "order": [[0, "desc"]]
        });

        table_function();

        // $.ajax({
        //     type: "GET",
        //     url: "/get_data_pengajuan_dana/processing",
        //     success: function(response) {
        //         console.log(response);
        //         var data = response.data;
        //         console.log(data);
        //         var trHTML = '';
        //         $.each(data, function (i, item) {
        //             trHTML +=   '<tr>'+
        //                             '<td style="vertical-align: middle;">' +
        //                                 '<a class="link-nomor-arsip-pengajuan-dana" href="#" style="text-decoration: none;">'+
        //                                 item.no_surat +'</a>'+
        //                             '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.tgl_pengajuan + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.id_kategori + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.keperluan + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.status_pengajuan + '</td>'+
        //                             '<td style="vertical-align: middle;">' + item.status_pemrosesan + '</td>'+
        //                             '<td class="text-center text-white" style="vertical-align: middle;" >' +
        //                                 '<a href="#" type="button" class=" btn btn-sm btn-light btn-sm btn-download text-secondary "> <i class="fa fa-download "></i> </a>' +
        //                                 '<a href="#" data-toggle="modal" data-target="#modal_form_hapus_fpk" class="btn btn-sm btn-danger btn-sm hapus"><i class="fa fa-trash"> </i> </a>' +
        //                             '</td>' +
        //                         '</tr>';
        //         });
        //         // $('#field_data').append(trHTML);
        //         document.getElementById('field_data').innerHTML=trHTML;
        //     },
        //     error: function(error) {
        //         console.log(error);
        //     }
        // });
    })

    $('#custom-tabs-four-completed-tab').on('click', function(e){
        e.preventDefault();
        // window.location.reload();
        $('#form_edit_pengajuan_dana').trigger("reset");
        var page_edit_pengajuan_dana = document.getElementById('page_edit_pengajuan_dana');
            page_edit_pengajuan_dana.style.display = 'none';

        document.querySelector('#field_page').innerHTML = field_page;

        table = $('#myTable').DataTable({
            "destroy": true,
            "processing": true,
            // "serverSide": true,
            "responsive": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,

            "info": true,
            "autoWidth": false,
            "ajax": 'get_data_pengajuan_dana/submited',
            "columns": [
                {
                    data: 'no_surat',
                    render: function (dataField) { return '<a class="link-nomor-arsip-pengajuan-dana" href="#" style="text-decoration: none;">'+dataField+'</a>'; },
                    orderable: true,
                    // className: "btn btn-light text-secondary",
                    // defaultContent: '<i class="fas fa-edit"/>',
                },
                { data: 'tgl_pengajuan' },
                { data: 'id_kategori' },
                { data: 'keperluan' },
                { data: 'status_pengajuan' },
                {
                    data: 'status_pemrosesan' ,
                    className: "dt-head-center",
                },
                {
                    data: 'action' ,
                    className: "text-center",
                },
                // {
                //     data: null,
                //     className: "btn btn-light text-secondary",
                //     defaultContent: '<i class="fas fa-edit"/>',
                //     orderable: false
                // },
            ],
            "order": [[0, "desc"]]
        });

        table_function();

        // $.ajax({
        //     type: "GET",
        //     url: "/get_data_pengajuan_dana/completed",
        //     success: function(response) {
        //         console.log(response);
        //         var data = response.data;
        //         console.log(data);
        //         var trHTML = '';
        //         $.each(data, function (i, item) {
        //             trHTML +=   '<tr>'+
        //                             '<td style="vertical-align: middle;">' +
        //                                 '<a class="link-nomor-arsip-pengajuan-dana" href="#" style="text-decoration: none;">'+
        //                                 item.no_surat +'</a>'+
        //                             '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.tgl_pengajuan + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.id_kategori + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.keperluan + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.status_pengajuan + '</td>'+
        //                             '<td style="vertical-align: middle;">' + item.status_pemrosesan + '</td>'+
        //                             '<td class="text-center text-white" style="vertical-align: middle;" >' +
        //                                 '<a href="#" type="button" class=" btn btn-sm btn-light btn-sm btn-download text-secondary "> <i class="fa fa-download "></i> </a>' +
        //                                 '<a href="#" data-toggle="modal" data-target="#modal_form_hapus_fpk" class="btn btn-sm btn-danger btn-sm hapus"><i class="fa fa-trash"> </i> </a>' +
        //                             '</td>' +
        //                         '</tr>';
        //         });
        //         // $('#field_data').append(trHTML);
        //         document.getElementById('field_data').innerHTML=trHTML;
        //     },
        //     error: function(error) {
        //         console.log(error);
        //     }
        // });
    })

    $('#custom-tabs-four-cancelled-tab').on('click', function(e){
        e.preventDefault();
        // window.location.reload();
        $('#form_edit_pengajuan_dana').trigger("reset");
        document.querySelector('#field_page').innerHTML = field_page;

        table = $('#myTable').DataTable({
            "destroy": true,
            "processing": true,
            // "serverSide": true,
            "responsive": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,

            "info": true,
            "autoWidth": false,
            "ajax": 'get_data_pengajuan_dana/submited',
            "columns": [
                {
                    data: 'no_surat',
                    render: function (dataField) { return '<a class="link-nomor-arsip-pengajuan-dana" href="#" style="text-decoration: none;">'+dataField+'</a>'; },
                    orderable: true,
                    // className: "btn btn-light text-secondary",
                    // defaultContent: '<i class="fas fa-edit"/>',
                },
                { data: 'tgl_pengajuan' },
                { data: 'id_kategori' },
                { data: 'keperluan' },
                { data: 'status_pengajuan' },
                {
                    data: 'status_pemrosesan' ,
                    className: "dt-head-center",
                },
                {
                    data: 'action' ,
                    className: "text-center",
                },
                // {
                //     data: null,
                //     className: "btn btn-light text-secondary",
                //     defaultContent: '<i class="fas fa-edit"/>',
                //     orderable: false
                // },
            ],
            "order": [[0, "desc"]]
        });

        table_function();

        // $.ajax({
        //     type: "GET",
        //     url: "/get_data_pengajuan_dana/cancelled",
        //     success: function(response) {
        //         console.log(response);
        //         var data = response.data;
        //         console.log(data);
        //         var trHTML = '';
        //         $.each(data, function (i, item) {
        //             trHTML +=   '<tr>'+
        //                             '<td style="vertical-align: middle;">' +
        //                                 '<a class="link-nomor-arsip-pengajuan-dana" data-toggle="modal" href="#" style="text-decoration: none;">'+
        //                                 item.no_surat +'</a>'+
        //                             '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.tgl_pengajuan + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.id_kategori + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.keperluan + '</td>' +
        //                             '<td style="vertical-align: middle;">' + item.status_pengajuan + '</td>'+
        //                             '<td style="vertical-align: middle;">' + item.status_pemrosesan + '</td>'+
        //                             '<td class="text-center text-white" style="vertical-align: middle;" >' +
        //                                 '<a href="#" type="button" class=" btn btn-sm btn-light btn-sm btn-download text-secondary "> <i class="fa fa-download "></i> </a>' +
        //                                 '<a href="#" data-toggle="modal" data-target="#modal_form_hapus_fpk" class="btn btn-sm btn-danger btn-sm hapus"><i class="fa fa-trash"> </i> </a>' +
        //                             '</td>' +
        //                         '</tr>';
        //         });
        //         // $('#field_data').append(trHTML);
        //         document.getElementById('field_data').innerHTML=trHTML;
        //     },
        //     error: function(error) {
        //         console.log(error);
        //     }
        // });
    })


    // Tampilkan Surat
    // $('.link-nomor-arsip-pengajuan_dana').on('click', function(e) {
    //     e.preventDefault();
    //     // $('#modal_form_edit_surat_keluar').modal('show');
    //     // var id_surat = $('#id_surat').val();
    //     var id_surat = $(this).parents('tr').attr('id');

    //     $.ajax({
    //         type: "GET",
    //         url: "/surat_keluar/" + id_surat + "/edit",
    //         success: function(response) {
    //             console.log(response);
    //             var data = response.data;
    //             var jenis_surat = response.jenis_surat;
    //             console.log(jenis_surat);
    //             if(data.file_surat != null){
    //                 $('#file_field').attr("href","/storage/"+data.file_surat);
    //                 $('#no_file').hide();
    //             }else{
    //                 $('#file_field').hide();
    //                 $('#no_file').show();
    //             }

    //             $('#no_arsip_edit').val(data.no_arsip);
    //             $('#id_update').val(data.id);
    //             $('#tgl_dikirim').val(data.tgl_dikirim);
    //             $('#tgl_surat').val(data.tgl_surat);
    //             $('#no_surat').val(data.no_surat);
    //             $('#penerima').val(data.penerima);
    //             $('#resume').val(data.resume);
    //             $('#keterangan').val(data.keterangan);
    //             $('#id_jenis_edit').val(data.id_jenis);
    //             $('#id_divisi_edit').val(data.id_divisi);


    //             $('#no_arsip_edit').attr('readonly', true);
    //             $('#id_jenis_edit').attr('disabled', true);
    //             $('#id_divisi_edit').attr('disabled', true);
    //             $('#tgl_dikirim').attr('readonly', true);
    //             $('#tgl_surat').attr('readonly', true);
    //             $('#no_surat').attr('readonly', true);
    //             $('#penerima').attr('readonly', true);
    //             $('#resume').attr('readonly', true);
    //             $('#keterangan').attr('readonly', true);
    //             $('#file_surat').attr('disabled', true);
    //             $('#file_surat').hide();
    //         },
    //         error: function(error) {
    //             console.log(error);
    //         }
    //     });

    //     $('.btn-edit-form').on('click',function(){
    //         $('#id_jenis_edit').attr('disabled', false);
    //         $('#id_divisi_edit').attr('disabled', false);
    //         $('#tgl_dikirim').attr('readonly', false);
    //         $('#tgl_surat').attr('readonly', false);
    //         $('#no_surat').attr('readonly', false);
    //         $('#penerima').attr('readonly', false);
    //         $('#resume').attr('readonly', false);
    //         $('#keterangan').attr('readonly', false);
    //         $('#file_surat').attr('disabled', false);
    //         $('#file_surat').show();
    //     });

    //     $('#id_jenis_edit').on('change', function(){
    //         e.preventDefault();
    //         var id_jenis = $('#id_jenis_edit').val();
    //         console.log(id_jenis);

    //         $.ajax({
    //             type:'GET',
    //             url:'/surat_keluar/'+id_jenis,
    //             success: function(response) {
    //                 $('#no_arsip_edit').val(response.no_arsip);
    //             },
    //             error: function(error) {
    //                 console.log('gagal');
    //                 console.log(error);
    //             }

    //         });
    //     });

    // });

    function Generate_PDF(data){
        // $('#modal_eksport_pdf').hide();


        var doc = new jsPDF('p', 'mm','a4');
        var id_spk = data['no_spk'];
        var jenis_perintah = data['jenis_perintah'];
        var name = data['nama_lengkap'];
        var divisi = data['divisi'];
        var jabatan = data['jabatan'];
        var deadline = data['deadline'];
        var deskripsi = data['detail'];
        // var total_file = document.getElementById('file_spk').files.length;

        var today = new Date(data['created_at']);
        // var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        // var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = today;

        var background_fix = 'data:image/png;base64,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XEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAAAXEPQAAAAAAD/n707j9WrrvM4/r1bvXSnpYSlKBSqBARECGKUigiMyoAsElAnQ8H5Y4IRtMPgSBAYMCJxEDUsJgKRCJFAREUpOwYdscVhEVlMw1JASqEtnbbQ0uXeOzlneisIxVo+paV9vZKHuzz3Oed3zvOU9Lz7e34XiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAAAIgRGgAAAIAYoQEAAACIERoAAACAGKEBAAAAiBEaAAAAgBihAQAA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Y+644476wQ9+UEcddVR9+tOffsPtf/vb36777ruvpkyZUnvuueeq719//fV17bXX1nHHHVcHHnjgGhxbf3vx31wI33LLLXXQQQet+n5nZ2Zy1cc+9rH22C6//PI6/vjj/+bPX3jhhTVt2rT64he/WB/4wAfWap/PPPNMjR8/vv38pZdeqqFDh67VdhJefPHFGjFiRLulJri8//3vX29jAQBgkzWve30eebNuw/ZbDa/n5y+pyefeWY/PWlT/eby/GLP+dXd2Vk/vkBrS01Ed/QNVb0FraBZO7ejuqJ7enurqWrMdPvjgg+1F/nPPPbfqew899FA9+uijdfTRR9fVV19dN95442tCQxMN/vCHP9TBBx/8N/dx8cUX12OPPdZetL4yNDTbvfLKK2vUqFFrFBoae+21Vz3yyCPV29vbfn322WfXD3/4w7rmmmtq773XLKy8kc0226y9d01nFXz/+99vz9fOO++81qGhq6tr1edNNFmfmuNujmP+/PmxeAMAAH+v9f430SY2bDG6t/2tFGdfcV8de86vavHSFet7WGziuro6q7e3p3o6+6uj7+Xq7F/2l9vAslq+dHG9vPilWrZk9belK2/Vt7S6Bpa9ehuvc2v2093VX5u9Y0h1rcFF4rJly+rjH/94Gxk++clP1qxZs9oZDZdeemntsMMO7UyG5oJ+wYIF7YyEQXPnzm0jw7Bhw+pzn/vc39zP4L/WN0HhlcaNG/eq7w8MDNTMmTNX/UQTQZqoMKi58L3uuuvaGQf77bdfrVixoqZOnVpPPPFE3Xrrre3YX3mh3hzXXXfd1W7n9TQzI37/+9/X448/vurewYv+5vgb9957b/tWjdXZdttt23tGjx7dfmxmBDz11FOrzm/z+GbGyOv54x//2I59zJgxNWTIkFcFh0EPPPBAO8Zm1sMrNc9BM/5aeRzNfprZEH+tOSfTp09vZye8niaS/Pa3v22312ie09tuu629ve9971v1iGb/zXaa8TTPEwAArEsbxD959fUNVO87umuXHTava3/1RE06aWrN+PPCDWBk0DG4qMhfbiunN4wY3lsjhm9Ww9tbbw0b1tt+HL7yeyNHbFbd3V3t2yGqo/O12/mrW8crtr0mfv7zn7cXkFtuuWX94he/qK233roNC5///OfroosuqrFjx7YBotHcP+jmm29uPzvmmGPaC+Q3a3D2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EZETREGD1AllTpdpEhkZ6o8hDy/EXS+t0IUXERERERE5ARQ0SJ3Bvg1RoQFoFB+CR974AZdN+BwFxeX6AxAREREREalGChqkTnG63Aj090WrJg68u3ALet06D+u25eqPQEREREREpJr46kRKXeNyu2GzARmNo7Dq133oc9s8vDKmO9o1jUFeQQlssOlvQkREREREpIoUNEidxCaRnEqRlhSOrH0FuPrhr5DesAFcLlY9uKCsQUREREREpGoUNEidxrAhNjII+YUlyMzOQf0IB8oZNLjr+pkRERERERGpGgUNUuexb0O9QD/AXQq7jxP1Av3hdDrr+mkRERERERGpEjWDFAFMX4ZypxOFpUXq0SAiIiIiIvInKGgQ8fDx8UFJWSlcbhdsNoUNIiIiIiIiVaGgQcSL0+WE260GDSIiIiIiIlWloEHEi6ZNiIiIiIiI/DkKGkRERERERESk2ihoEBEREREREZFqo6BBRERERERERKqNggYRERERERERqTYKGkRERERERESk2ihoEBEREREREZFqo6BBRERERERERKqNggYRERERERERqTYKGkRERERERESk2ihoEBEREREREZFqo6BBRERERERERKqNggYRERERERERqTYKGkRERERERESk2ihoEBEREREREZFqo6BBRERERERERKqNggYRERERERERqTYKGkRERERERESk2ihoEBEREREREZFqo6BBRERERERERKqNr06lyCE2G+ByAweLyj3PuHVmREREREREjpOCBhEPlwsI8LPBEeZvIgYnnxAREREREZHjoqBBxFQz2LA3rxRtm4RgxviOprJBQYOIiIiIiMjxY9AQofMmcqiigdMnQoOUv4mIiIiIiFRRBEdUWwDEAijVWZS6jCGDW20ZREREREREqsofwJ7/B3HCBbYTwvovAAAAAElFTkSuQmCC';


        doc.addImage(background_fix,'png', 0, 0,210,297);

        // var data = get_signature();

        // Nama Properti
        doc.setFontSize(16);
        var yPos = 45;
        doc.text("Form Perintah Kerja (FPK) General Affair (GA)", 20, yPos);
        yPos += 10;
        doc.setFontSize(10);
        doc.text("Nomor : "+id_spk, 20, yPos);
        yPos += 5;
        // doc.text("Diajukan tgl. : "+dateTime, 20, yPos);

        doc.setFontSize(11);
        yPos += 10;
        doc.text("Jenis Perintah", 20, yPos);
        doc.text(":", 65, yPos);
        doc.text(jenis_perintah, 70, yPos);
        yPos += 7;
        doc.text("Nama Lengkap", 20, yPos);
        doc.text(":", 65, yPos);
        doc.text(name, 70, yPos);
        yPos += 7;
        doc.text("Divisi", 20, yPos);
        doc.text(":", 65, yPos);
        doc.text(divisi, 70, yPos);
        yPos += 7;
        doc.text("Jabatan", 20, yPos);
        doc.text(":", 65, yPos);
        doc.text(jabatan, 70, yPos);
        yPos += 7;
        doc.text("Deadline", 20, yPos);
        doc.text(":", 65, yPos);
        doc.text(deadline, 70, yPos);
        yPos += 7;
        doc.text("Lampiran", 20, yPos);
        doc.text(":", 65, yPos);
        // doc.text(total_file+" File", 70, yPos);
        yPos += 7;
        doc.text("Detail/ Spesidikasi Pekerjaan", 20, yPos);
        doc.text(":", 65, yPos);
        var splittext = doc.splitTextToSize(deskripsi, 170);
        yPos += 14;

        doc.setFontSize(11);

        for(var i = 0; i<splittext.length; i++){
            doc.text(20, yPos, splittext[i]);
            yPos += 6;
            if(yPos >= 253){
                doc.addPage();
                yPos = 45;
                doc.addImage(background_fix,'png', 0, 0,210,297);
            }
        }

        if(yPos >= 218){
            doc.addPage();
            doc.addImage(background_fix,'png', 0, 0,210,297);
            yPos = 45;
        }

        yPos += 7;

        doc.text("Pemohon", 135, yPos);
        // doc.addImage(data,'png', 135, yPos,25,25);
        yPos += 22;
        doc.line(135, yPos, 165, yPos);
        yPos += 7;
        doc.text(name, 135, yPos);

        // console.log(yPos);

        // if(yPos >= 153){
        //     doc.addPage();
        //     yPos = 45;
        //     doc.addImage(background,'png', 0, 0,210,297);
        // }else{
        //     yPos += 20;
        // }

        doc.addPage();
        yPos = 45;
        doc.addImage(background_fix,'png', 0, 0,210,297);

        doc.setFontSize(16);
        doc.text("Pernyataan Pemenuhan FPK GA", 20, yPos);
        yPos += 10;
        // doc.line(20, yPos, 150, yPos);
        // yPos += 7;
        doc.setFontSize(11);
        var splittext = doc.splitTextToSize("Dengan ini pemohon menyatakan bahwa pengajuan perintah kerja telah diselesaikan oleh Tim General Affair sesuai dengan deskripsi yang diajukan,  ", 170);
        for(var i = 0; i<splittext.length; i++){
            doc.text(20, yPos, splittext[i]);
            yPos += 7;
        }
        yPos += 7;
        doc.text("Nomor", 20, yPos);
        doc.text(":", 65, yPos);
        doc.text(id_spk, 70, yPos);
        yPos += 7;
        doc.text("Tgl. Selesai", 20, yPos);
        doc.text(":", 65, yPos);
        yPos += 10;



        // garis vertical
        doc.line(20, yPos+49, 20, yPos);
        doc.line(76.6, yPos+49, 76.6, yPos);
        doc.line(133.4, yPos+49, 133.4, yPos);
        doc.line(190, yPos+49, 190, yPos);


        // garis horizontal
        doc.line(20, yPos, 190, yPos);
        yPos += 7;
        doc.text("Pelaksana", 39.5, yPos);
        doc.text("Pemohon", 98, yPos);
        doc.text("Mengetahui", 151, yPos);
        yPos += 5;
        doc.line(20, yPos, 190, yPos);
        yPos += 21;
        doc.line(20, yPos, 190, yPos);
        yPos += 5;
        doc.text("Nama :", 23, yPos);
        doc.text("Nama :", 79.6, yPos);
        doc.text("Nama :", 136.4, yPos);
        yPos += 3;
        doc.line(20, yPos, 190, yPos);
        yPos += 5;
        doc.text("Tanggal :", 23, yPos);
        doc.text("Tanggal :", 79.6, yPos);
        doc.text("Tanggal :", 136.4, yPos);
        yPos += 3;
        doc.line(20, yPos, 190, yPos);




        doc.setProperties({ title: 'FPK - '+dateTime });

        // var string = doc.output('datauristring', '_blank');
        // var embed = "<embed width='100%' height='100%' src='" + string + "'/>"
        // var x = window.open('about:blank', '_blank',);
        // x.document.open();
        // x.document.write(embed);
        doc.save('FPK - '+dateTime);
        // x.document.close();
    };


    // Update Form Edit Surat Keluar


    // Popup Hapus Surat Keluar
    table.on('click', '.hapus', function() {
        console.log('tombol jalan');
        var id_fpk = $(this).parents('tr').attr('id');
        $('#modal_form_hapus_fpk').modal({backdrop: 'static', keyboard: false});


        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        data = "<p class='no-surat'>Nomor FPK : " + data[0] + "</p>";
        $('#id_hapus').val(id_fpk);
        $('#verif_field').append(data);



        $('#form_hapus_fpk').on('click','.btn-batal',function(e) {
            e.preventDefault();
            $('.no-surat').remove();
        });
    });

    // table.on('click', '.link-nomor-arsip-pengajuan-dana', function(e) {
    //     e.preventDefault();
    //     document.getElementById('field_page').innerHTML='';
    // });

    // Fungsi Proses Hapus Surat Keluar
    $('#form_hapus_fpk').on('submit', function(e) {
        e.preventDefault();

        var id_fpk = $('#id_hapus').val();

        $.ajax({
            type: "DELETE",
            url: "/spk/" + id_fpk,
            data: {
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#modal_form_hapus_fpk').hide();
                console.log(response);
                swal({
                    title: "Deleted",
                    text: "Terima Kasih, Data FPK Berhasil Dihapus",
                    icon: "success",
                    button: "Ok",
                }).then((value) => {
                    if (true) {
                      window.location.reload();
                    } else {
                        window.location.reload();
                    }
                });

                // alert("Data berhasil Dihapus");
            },
            error: function(error) {
                console.log('gagal');
                console.log(error);
            }
        });

    });



});