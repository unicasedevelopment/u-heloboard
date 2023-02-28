$(document).ready(function() {
    var table = $('#myTable').DataTable();

    // Tampilkan Tamu
    $('.link-tamu').on('click', function(e) {
        e.preventDefault();
        var id_tamu = $(this).parents('tr').attr('id');

        $.ajax({
            type: "GET",
            url: "/tamu/" + id_tamu + "/edit",
            success: function(response) {
                console.log(response);
                response = response.data;

                $('#id_update').val(response.id);
                $('#nama_tamu').val(response.nama_tamu);
                $('#penerima_tamu').val(response.penerima_tamu);
                $('#no_hp').val(response.no_hp);
                $('#nama_perusahaan').val(response.nama_perusahaan);
                $('#tgl_kunjungan').val(response.tgl_kunjungan);
                $('#keperluan').val(response.keperluan);

                $('#id_update').attr('readonly', true);
                $('#nama_tamu').attr('readonly', true);
                $('#penerima_tamu').attr('readonly', true);
                $('#no_hp').attr('readonly', true);
                $('#nama_perusahaan').attr('readonly', true);
                $('#tgl_kunjungan').attr('readonly', true);
                $('#keperluan').attr('readonly', true);
            },
            error: function(error) {
                console.log(error);
            }
        });
        $('.btn-edit-form').on('click',function(){
            $('#id_update').attr('readonly', false);
                $('#nama_tamu').attr('readonly', false);
                $('#penerima_tamu').attr('readonly', false);
                $('#no_hp').attr('readonly', false);
                $('#nama_perusahaan').attr('readonly', false);
                $('#tgl_kunjungan').attr('readonly', false);
                $('#keperluan').attr('readonly', false);
        });

    });

    // Fungsi Update Tamu
    $('#form_edit_tamu').on('submit', function(e) {
        e.preventDefault();

        var id_tamu = $('#id_update').val();
        console.log(id_tamu);

        $.ajax({
            type: "PUT",
            url: "/tamu/" + id_tamu,
            data: $('#form_edit_tamu').serialize(),
            success: function(response) {
                $('#modal_form_edit_tamu').hide();
                console.log(response);
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


    // Fungsi Hapus Tamu
    // Popup Hapus Tamu
    table.on('click', '.btn-hapus-tamu', function() {
        // var id_tamu = $('#id_tamu').val();
        var id_tamu = $(this).parents('tr').attr('id');
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        console.log(id_tamu);
        console.log(data);
        data = "<p class='nama-tamu'>Nama Tamu : " + data[0] + "</p>";
        $('#id_hapus').val(id_tamu);
        $('#verif_field').append(data);
    });

    $('#form_hapus_tamu').on('click','.btn-batal',function(e) {
        e.preventDefault();
        $('.nama-tamu').remove();
    });

    // Fungsi Proses Hapus Tamu
    $('#form_hapus_tamu').on('submit', function(e) {
        e.preventDefault();

        var id_tamu = $('#id_hapus').val();

        $.ajax({
            type: "DELETE",
            url: "/tamu/" + id_tamu,
            data: {
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#modal_form_hapus_tamu').hide();
                console.log(response);
                swal({
                    title: "Deleted",
                    text: "Data berhasil Dihapus",
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



});