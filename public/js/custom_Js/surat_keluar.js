$(document).ready(function() {

    var table = $('#myTable').DataTable();
    table.on('draw', function() {
        $('.link-nomor-arsip-surat-keluar').on('click', function(e) {
            e.preventDefault();
            // $('#modal_form_edit_surat_keluar').modal('show');
            // var id_surat = $('#id_surat').val();
            var id_surat = $(this).parents('tr').attr('id');

            $.ajax({
                type: "GET",
                url: "/surat_keluar/" + id_surat + "/edit",
                success: function(response) {
                    console.log(response);
                    var data = response.data;
                    var jenis_surat = response.jenis_surat;
                    console.log(jenis_surat);
                    if(data.file_surat != null){
                        $('#file_field').attr("href","/storage/"+data.file_surat);
                        $('#no_file').hide();
                    }else{
                        $('#file_field').hide();
                        $('#no_file').show();
                    }

                    $('#no_arsip_edit').val(data.no_arsip);
                    $('#id_update').val(data.id);
                    $('#tgl_dikirim').val(data.tgl_dikirim);
                    $('#tgl_surat').val(data.tgl_surat);
                    $('#no_surat').val(data.no_surat);
                    $('#penerima').val(data.penerima);
                    $('#resume').val(data.resume);
                    $('#keterangan').val(data.keterangan);
                    $('#id_jenis_edit').val(data.id_jenis);
                    $('#id_divisi_edit').val(data.id_divisi);


                    $('#no_arsip_edit').attr('readonly', true);
                    $('#id_jenis_edit').attr('disabled', true);
                    $('#id_divisi_edit').attr('disabled', true);
                    $('#tgl_dikirim').attr('readonly', true);
                    $('#tgl_surat').attr('readonly', true);
                    $('#no_surat').attr('readonly', true);
                    $('#penerima').attr('readonly', true);
                    $('#resume').attr('readonly', true);
                    $('#keterangan').attr('readonly', true);
                    $('#file_surat').attr('disabled', true);
                    $('#file_surat').hide();
                },
                error: function(error) {
                    console.log(error);
                }
            });

            $('.btn-edit-form').on('click',function(){
                // $('#id_jenis_edit').attr('disabled', false);
                // $('#id_divisi_edit').attr('disabled', false);
                $('#tgl_dikirim').attr('readonly', false);
                $('#tgl_surat').attr('readonly', false);
                $('#no_surat').attr('readonly', false);
                $('#penerima').attr('readonly', false);
                $('#resume').attr('readonly', false);
                $('#keterangan').attr('readonly', false);
                $('#file_surat').attr('disabled', false);
                $('#file_surat').show();
            });

            $('#id_jenis_edit').on('change', function(){
                e.preventDefault();
                var id_jenis = $('#id_jenis_edit').val();
                console.log(id_jenis);

                $.ajax({
                    type:'GET',
                    url:'/surat_keluar/'+id_jenis,
                    success: function(response) {
                        $('#no_arsip_edit').val(response.no_arsip);
                    },
                    error: function(error) {
                        console.log('gagal');
                        console.log(error);
                    }

                });
            });

        });
    });

    // Generate Nomor Arsip
    $('#id_jenis').on('change',function(e) {
        e.preventDefault();
        var id_jenis = $('#id_jenis').val();
        var id_divisi = $('#id_divisi').val();

        if(id_jenis == ''){
            $('#no-arsip').val('');
        }else{
            console.log(id_jenis+" - "+id_divisi);

            if(id_divisi == ''){
                swal({
                    title: "Perhatian",
                    text: "Pastikan Anda Sudah Mengisi Kolom Divisi",
                    icon: "warning",
                    buttons: "Ok",
                    dangerMode: true,
                });
            }else{
                $.ajax({
                    type:'GET',
                    url:'/surat_keluar/'+id_jenis,
                    data:{
                        'id_divisi' : id_divisi
                    },
                    success: function(response) {
                        $('#no-arsip').val(response.no_arsip);
                    },
                    error: function(error) {
                        console.log('gagal');
                        console.log(error);
                    }

                });
            }
        }
    });

    $('#id_divisi').on('change',function(e) {
        e.preventDefault();
        var id_jenis = $('#id_jenis').val();
        var id_divisi = $('#id_divisi').val();

        if(id_divisi == ''){
            $('#no-arsip').val('');
        }else{
            console.log(id_jenis+" - "+id_divisi);

            if(id_jenis == ''){
                swal({
                    title: "Perhatian",
                    text: "Pastikan Anda Sudah Mengisi Kolom Jenis Surat",
                    icon: "warning",
                    buttons: "Ok",
                    dangerMode: true,
                });
            }else{
                $.ajax({
                    type:'GET',
                    url:'/surat_keluar/'+id_jenis,
                    data:{
                        'id_divisi' : id_divisi
                    },
                    success: function(response) {
                        $('#no-arsip').val(response.no_arsip);
                    },
                    error: function(error) {
                        console.log('gagal');
                        console.log(error);
                    }

                });
            }
        }
    });

    // Generate No. Arsip
    $('#generate').on('click',function(e) {
        e.preventDefault();

        var id_jenis = $('#id_jenis').val();
        var id_divisi = $('#id_divisi').val();

        if(id_divisi == ''){
            swal({
                title: "Perhatian",
                text: "Pastikan Anda Sudah Mengisi Kolom Divisi",
                icon: "warning",
                buttons: "Ok",
                dangerMode: true,
            });
        }else if(id_jenis == ''){
            swal({
                title: "Perhatian",
                text: "Pastikan Anda Sudah Mengisi Kolom Jenis Surat",
                icon: "warning",
                buttons: "Ok",
                dangerMode: true,
            });
        }else{
            $.ajax({
                type:'GET',
                url:'/surat_keluar/'+id_jenis,
                data:{
                    'id_divisi' : id_divisi
                },
                success: function(response) {
                    $('#no-arsip').val(response.no_arsip);
                },
                error: function(error) {
                    console.log('gagal');
                    console.log(error);
                }
            });
        }
    });

    // Simpan Data Surat Keluar
    $('#form_surat_keluar').on('submit', function(e) {
        e.preventDefault();
        let form_data = new FormData(this);
        $.ajax({
            type: "post",
            url: "/surat_keluar",
            data: form_data,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if(response.status == false){
                    swal({
                        title: "Failed",
                        text: "Nomor Arsip Sudah Digunakan, Silahkan Generate Ulang",
                        icon: "warning",
                        buttons: "Ok",
                        dangerMode: true,
                    });
                }else{
                    $('#modal_form_surat_keluar').hide();
                    swal({
                        title: "Success",
                        text: "Data berhasil Disimpan",
                        icon: "success",
                        button: "Ok",
                    }).then((value) => {
                        if (true) {
                            window.location.reload();
                        } else {
                            window.location.reload();
                        }
                    });;
                }
            },
            error: function(error) {
            console.log('gagal');
            console.log(error);
            }
        });

    });

    // Tampilkan Surat
    $('.link-nomor-arsip-surat-keluar').on('click', function(e) {
        e.preventDefault();
        // $('#modal_form_edit_surat_keluar').modal('show');
        // var id_surat = $('#id_surat').val();
        var id_surat = $(this).parents('tr').attr('id');

        $.ajax({
            type: "GET",
            url: "/surat_keluar/" + id_surat + "/edit",
            success: function(response) {
                console.log(response);
                var data = response.data;
                var jenis_surat = response.jenis_surat;
                console.log(jenis_surat);
                if(data.file_surat != null){
                    $('#file_field').attr("href","/storage/"+data.file_surat);
                    $('#no_file').hide();
                }else{
                    $('#file_field').hide();
                    $('#no_file').show();
                }

                $('#no_arsip_edit').val(data.no_arsip);
                $('#id_update').val(data.id);
                $('#tgl_dikirim').val(data.tgl_dikirim);
                $('#tgl_surat').val(data.tgl_surat);
                $('#no_surat').val(data.no_surat);
                $('#penerima').val(data.penerima);
                $('#resume').val(data.resume);
                $('#keterangan').val(data.keterangan);
                $('#id_jenis_edit').val(data.id_jenis);
                $('#id_divisi_edit').val(data.id_divisi);


                $('#no_arsip_edit').attr('readonly', true);
                $('#id_jenis_edit').attr('disabled', true);
                $('#id_divisi_edit').attr('disabled', true);
                $('#tgl_dikirim').attr('readonly', true);
                $('#tgl_surat').attr('readonly', true);
                $('#no_surat').attr('readonly', true);
                $('#penerima').attr('readonly', true);
                $('#resume').attr('readonly', true);
                $('#keterangan').attr('readonly', true);
                $('#file_surat').attr('disabled', true);
                $('#file_surat').hide();
            },
            error: function(error) {
                console.log(error);
            }
        });

        $('.btn-edit-form').on('click',function(){
            $('#id_jenis_edit').attr('disabled', false);
            $('#id_divisi_edit').attr('disabled', false);
            $('#tgl_dikirim').attr('readonly', false);
            $('#tgl_surat').attr('readonly', false);
            $('#no_surat').attr('readonly', false);
            $('#penerima').attr('readonly', false);
            $('#resume').attr('readonly', false);
            $('#keterangan').attr('readonly', false);
            $('#file_surat').attr('disabled', false);
            $('#file_surat').show();
        });

        $('#id_jenis_edit').on('change', function(){
            e.preventDefault();
            var id_jenis = $('#id_jenis_edit').val();
            console.log(id_jenis);

            $.ajax({
                type:'GET',
                url:'/surat_keluar/'+id_jenis,
                success: function(response) {
                    $('#no_arsip_edit').val(response.no_arsip);
                },
                error: function(error) {
                    console.log('gagal');
                    console.log(error);
                }

            });
        });

    });

    // Update Form Edit Surat Keluar
    $('#form_edit_surat_keluar').on('submit', function(e) {
        e.preventDefault();
        var id_surat = $('#id_update').val();
        let form_data = new FormData(this);


        $.ajax({
            type: "post",
            url: "/surat_keluar/" + id_surat,
            data: form_data,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(response,status) {
                $('#modal_form_edit_surat_keluar').hide();
                console.log(response);
                swal({
                    title: status,
                    text: "Data berhasil Diupdate",
                    icon: "success",
                    button: "Ok",
                }).then((value) => {
                    if (true) {
                      window.location.reload();
                    } else {
                        window.location.reload();
                    }
                });;
            },
            error: function(xhr, status, error) {
                console.log(error)
                var err = JSON.parse(xhr.responseText);
                console.log('gagal');
                swal({
                    title: "Failed",
                    text: status+' : '+err.message,
                    icon: "warning",
                    buttons: "Ok",
                    dangerMode: true,
                });
            }
        });

    });

    // Popup Hapus Surat Keluar
    table.on('click', '.btn-hapus-surat-keluar', function() {
        console.log('tombol jalan');
        var id_surat = $(this).parents('tr').attr('id');
        $('#modal_form_hapus_surat_keluar').modal({backdrop: 'static', keyboard: false});


        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);
        data = "<p class='no-surat'>Nomor Surat : " + data[1] + "</p>";
        $('#id_hapus').val(id_surat);
        $('#verif_field').append(data);



        $('#form_hapus_surat_keluar').on('click','.btn-batal',function(e) {
            e.preventDefault();
            $('.no-surat').remove();
        });
    });

    // Fungsi Proses Hapus Surat Keluar
    $('#form_hapus_surat_keluar').on('submit', function(e) {
        e.preventDefault();

        var id_surat = $('#id_hapus').val();

        $.ajax({
            type: "DELETE",
            url: "/surat_keluar/" + id_surat,
            data: {
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#modal_form_hapus_surat_keluar').hide();
                swal({
                    title: "Success",
                    text: "Terima Kasih, Data Surat Keluar Berhasil Dihapus",
                    icon: "success",
                    button: "Ok",
                }).then((value) => {
                    if (true) {
                      window.location.reload();
                    } else {
                        window.location.reload();
                    }
                });
            },

            error: function(xhr, status, error) {
                console.log(error)
                var err = JSON.parse(xhr.responseText);
                console.log('gagal');
                swal({
                    title: "Failed",
                    text: err.message,
                    icon: "warning",
                    buttons: "Ok",
                    dangerMode: true,
                });
            }
        });

    });



});