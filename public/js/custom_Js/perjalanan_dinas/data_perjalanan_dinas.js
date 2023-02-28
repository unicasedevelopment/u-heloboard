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
            success: function(response) {
                $('#modal_form_edit_surat_keluar').hide();
                console.log(response);
                window.location.reload();
                swal({
                    title: "Updated",
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
            error: function(error) {
            console.log('gagal');
            console.log(error);
            }
        });

    });

    // Popup Hapus Surat Keluar
    table.on('click', '.hapus', function() {
        console.log('tombol berfungsi');
        var id_pengajuan = $(this).parents('tr').attr('id');
        // console.log($('#modal_form_hapus_pejalanan_dinas'))
        $('#modal_form_hapus_perjalanan_dinas').modal({backdrop: 'static', keyboard: false});


        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        data = "<p class='no-surat'>Nomor Pengajuan : " + data[0] + "</p>";
        $('#id_hapus').val(id_pengajuan);
        $('#verif_field').append(data);



        $('#form_hapus_perjalanan_dinas').on('click','.btn-batal',function(e) {
            e.preventDefault();
            $('.no-surat').remove();
        });
    });

    // Fungsi Proses Hapus Surat Keluar
    $('#form_hapus_perjalanan_dinas').on('submit', function(e) {
        e.preventDefault();

        var id_pengajuan = $('#id_hapus').val();
        console.log(id_pengajuan)

        $.ajax({
            type: "DELETE",
            url: "/data_perjalanan_dinas/" + id_pengajuan,
            data: {
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#modal_form_hapus_perjalanan_dinas').hide();
                console.log(response);
                Swal.fire({
                    title: "Deleted",
                    text: "Terima Kasih, Data Pengajuan Perjalanan Dinas Berhasil Dihapus",
                    icon: "success",
                    button: "Ok",
                    confirmButtonColor: '#7cd1f9',
                }).then((value) => {
                    if (true) {
                      window.location.reload();
                    } else {
                        window.location.reload();
                    }
                });
            },
            error: function(error) {
                console.log('gagal');
                console.log(error);
            }
        });

    });



});