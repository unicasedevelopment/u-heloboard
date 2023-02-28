$(document).ready(function() {

    $('.modal .select2').select2({
        dropdownParent: $('.modal')
    });

    $('.select2').select2({
        placeholder: "Pilih",
        // allowClear: true,
        dropdownParent: "#modal_form_karyawan",
    });

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
    table.on('click', '.btn-hapus-karyawan', function() {

        var id_karyawan = $(this).parents('tr').attr('id');
        var nama = $(this).closest('tr').find('td:eq(0)').text();
        console.log(nama);
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        // var data = table.row($tr).data();
        // console.log(data);
        // data = "<p class='no-surat'>Nomor Surat : " + data[1] + "</p>";
        // $('#id_hapus').val(id_surat);
        // $('#verif_field').append(data);

        // $('#form_hapus_surat_keluar').on('click','.btn-batal',function(e) {
        //     e.preventDefault();
        //     $('.no-surat').remove();
        // });
        // Swal.fire({
        //     title: "Pengajuan Diterima",
        //     icon: 'success',
        //     text: "Terima Kasih, Permintaan Anda Akan Segera Diproses",
        //     button: "Ok",
        //     confirmButtonColor: '#7cd1f9',
        //   }).then((value) => {
        //     if (true) {
        //       window.location.reload();
        //     } else {
        //         window.location.reload();
        //     }
        // });

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Menghapus Data Karyawan Atas Nama "+nama,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#7cd1f9',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "/karyawan/"+id_karyawan,
                    success: function(response){
                        console.log(response);
                        if(response.status == true){
                            Swal.fire({
                                title: 'Sukses',
                                text: "Data Atas Nama "+nama+" Berhasil Dihapus",
                                icon: 'success',
                                confirmButtonColor: '#7cd1f9',
                                confirmButtonText: 'Ok',
                            }).then((value) => {
                                    if (true) {
                                      window.location.reload();
                                    } else {
                                        window.location.reload();
                                    }
                            });
                        }else{
                            Swal.fire({
                                title: 'Gagal',
                                text: "Data Atas Nama "+nama+" Gagal Dihapus",
                                icon: 'failed',
                                confirmButtonColor: '#7cd1f9',
                                confirmButtonText: 'Ok',
                            }).then((value) => {
                                    if (true) {
                                      window.location.reload();
                                    } else {
                                        window.location.reload();
                                    }
                            });
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                })

            }
        })
    });
});