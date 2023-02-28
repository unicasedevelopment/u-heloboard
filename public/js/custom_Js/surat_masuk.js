$(document).ready(function() {
    var table = $('#myTable').DataTable();

    table.on('draw', function() {
        // Tampilkan Surat
        $('.link-nomor-arsip-surat-masuk').on('click', function(e) {
            e.preventDefault();
            var id_surat = $(this).parents('tr').attr('id');
            $.ajax({
                type: "GET",
                url: "/surat_masuk/" + id_surat + "/edit",
                success: function(response) {
                    console.log(response);
                    response = response.data;
                    if(response.file_surat != null){
                        $('#file_field').attr("href","/storage/"+response.file_surat);
                        $('#no_file').hide();
                    }else{
                        $('#file_field').hide();
                        $('#no_file').show();
                    }
                    $('#no_arsip').val(response.no_arsip);
                    $('#id_update').val(response.id);
                    $('#tgl_diterima').val(response.tgl_diterima);
                    $('#tgl_surat').val(response.tgl_surat);
                    $('#no_surat').val(response.no_surat);
                    $('#pengirim').val(response.pengirim);
                    $('#resume').val(response.resume);
                    $('#keterangan').val(response.keterangan);

                    $('#no_arsip').attr('readonly', true);
                    $('#id').attr('readonly', true);
                    $('#tgl_diterima').attr('readonly', true);
                    $('#tgl_surat').attr('readonly', true);
                    $('#no_surat').attr('readonly', true);
                    $('#pengirim').attr('readonly', true);
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
                // $('#no_arsip').attr('readonly', false);
                // $('#id_update').attr('readonly', false);
                $('#tgl_diterima').attr('readonly', false);
                $('#tgl_surat').attr('readonly', false);
                $('#no_surat').attr('readonly', false);
                $('#pengirim').attr('readonly', false);
                $('#resume').attr('readonly', false);
                $('#keterangan').attr('readonly', false);
                $('#file_surat').attr('disabled', false);
                $('#file_surat').show();

            });

        });
    });

    $('.link-nomor-arsip-surat-masuk').on('click', function(e) {
        e.preventDefault();
        var id_surat = $(this).parents('tr').attr('id');
        $.ajax({
            type: "GET",
            url: "/surat_masuk/" + id_surat + "/edit",
            success: function(response) {
                console.log(response);
                response = response.data;
                if(response.file_surat != null){
                    $('#file_field').attr("href","/storage/"+response.file_surat);
                    $('#no_file').hide();
                }else{
                    $('#file_field').hide();
                    $('#no_file').show();
                }
                $('#no_arsip').val(response.no_arsip);
                $('#id_update').val(response.id);
                $('#tgl_diterima').val(response.tgl_diterima);
                $('#tgl_surat').val(response.tgl_surat);
                $('#no_surat').val(response.no_surat);
                $('#pengirim').val(response.pengirim);
                $('#resume').val(response.resume);
                $('#keterangan').val(response.keterangan);

                $('#no_arsip').attr('readonly', true);
                $('#id').attr('readonly', true);
                $('#tgl_diterima').attr('readonly', true);
                $('#tgl_surat').attr('readonly', true);
                $('#no_surat').attr('readonly', true);
                $('#pengirim').attr('readonly', true);
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
            // $('#no_arsip').attr('readonly', false);
            // $('#id_update').attr('readonly', false);
            $('#tgl_diterima').attr('readonly', false);
            $('#tgl_surat').attr('readonly', false);
            $('#no_surat').attr('readonly', false);
            $('#pengirim').attr('readonly', false);
            $('#resume').attr('readonly', false);
            $('#keterangan').attr('readonly', false);
            $('#file_surat').attr('disabled', false);
            $('#file_surat').show();

        });

    });

    // Update Form Edit
    $('#form_edit_surat_masuk').on('submit', function(e) {
        e.preventDefault();
        var id_surat = $('#id_update').val();
        let form_data = new FormData(this);
        console.log(id_surat);

        $.ajax({
            type: "post",
            url: "/surat_masuk/" + id_surat,
            data: form_data,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#modal_form_edit_surat_masuk').hide();
                console.log(response);
                // window.location.reload();
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
                });
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
                // console.log(response.message);
            }
        });

    });


    // Fungsi Hapus Surat Masuk
    // Popup Hapus Surat Masuk
    table.on('click', '.hapus', function() {
        // var id_surat = $('#id_surat').val();

        var id_surat = $(this).parents('tr').attr('id');
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        data = "<p class='no-surat'>Nomor Surat : " + data[1] + "</p>";
        $('#id_hapus').val(id_surat);
        $('#verif_field').append(data);
    });

    $('#form_hapus_surat_masuk').on('click','.btn-batal',function(e) {
        e.preventDefault();
        $('.no-surat').remove();
    });



    // Fungsi Proses Hapus Surat Masuk
    $('#form_hapus_surat_masuk').on('submit', function(e) {
        e.preventDefault();

        var id_surat = $('#id_hapus').val();

        $.ajax({
            type: "DELETE",
            url: "/surat_masuk/" + id_surat,
            data: {
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#modal_form_hapus_surat_masuk').hide();
                console.log(response);
                swal({
                    title: "Success",
                    text: "Terima Kasih, Data Surat Masuk Berhasil Dihapus",
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
                // console.log(response.message);
            }
        });

    });



});