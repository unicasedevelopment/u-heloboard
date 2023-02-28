$(document).ready(function() {
    get_data();

    var table = $('#myTable').DataTable();
    var x = 1;
    var barang_terkait= '<tr>'+
                            '<td> <input type="text" name="kode_barang[]" class="data-barang form-control" placeholder="Kode" required> </td>'+
                            '<td> <input type="text" name="nama_barang[]" class="data-barang form-control" placeholder="Nama" required> </td>'+
                            '<td> <input type="number" min="1" id="qty_barang" name="qty_barang[]" class="data-barang form-control" placeholder="Qty"> </td>'+
                            '<td> <input type="text" name="keterangan_barang[]" class="data-barang form-control" placeholder="Kondisi"> </td>'+
                            '<td> <button id="remove" type="button" class="btn btn-light text-secondary"><i class="fa fa-trash"></i></button> </td>'+
                        '</tr>';

    $("#add_barang").click(function() {
        console.log('tombol berfungsi');
        $("#field_barang_terkait").append(barang_terkait);
        x++;
        get_data();
    });

    $("#field_barang_terkait").on('click', '#remove', function() {
        if (x > 1) {
            $(this).closest('tr').remove();
            x--;
        }
        console.log(x)
        get_data();

    });
    $("#field_barang_terkait").on('keyup', '.data-barang', function() {
        get_data();
    });
    $("#field_barang_terkait").on('change', '.data-barang', function() {
        get_data();
    });

    function Generate_PDF(){

        var id_divisi = $('#id_divisi').val();
        var id_jenis_surat = $('#id_jenis').val();
        var no_arsip = $('#no-arsip').val();
        var no_surat = $('#no_surat').val();
        var judul = $('#judul').val();
        var tanggal = $('#tanggal').val();
        var alamat_asal = $('#alamat_asal').val();
        var alamat_tujuan = $('#alamat_tujuan').val();

        var isi = $('#isi').val();

        var pengirim = $('#pengirim').val();

        var mengetahui = $('#mengetahui').val();
        var nama_barang = [];
        var kode_barang = [];
        var qty_barang = [];
        var keterangan_barang = [];


        var nama_barang = [];
        var qty_barang = [];
        var keterangan_barang = [];

        for (var i=0 ; i<$('input[name="nama_barang[]"]').length;i++){
            console.log($('input[name="nama_barang[]"]')[i].value);
            kode_barang.push($('input[name="kode_barang[]"]')[i].value);
            nama_barang.push($('input[name="nama_barang[]"]')[i].value);
            qty_barang.push($('input[name="qty_barang[]"]')[i].value);
            keterangan_barang.push($('input[name="keterangan_barang[]"]')[i].value);
        }

        var doc = new jsPDF('p', 'mm','a4');


        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;

        // Kop Surat
        doc.setFont('times','bold');
        doc.setFontSize(9);
        doc.text("CV. Unitech Indonesia",65,15);
        doc.setFont('times','normal');
        doc.text("Jl. Lokon No. 56, RT. 01 RW. 01 Karangbesuki, Kec. Sukun, Kota Malang, Jawa Timur, Indonesia",65,20);
        doc.text("Telpon : 0341-5080803",65,25);
        doc.text("Email : support@unicasestore.com",65,30);
        console.log(doc.internal.getFontSize());
        doc.line(15, 35, 195, 35);
        doc.setFontSize(12);
        doc.setFont('times','bold');
        var xOffset = (doc.internal.pageSize.width / 2) - (doc.getTextWidth(judul) / 2);
        doc.text(judul, xOffset, 45);
        doc.setFontSize(11);
        var xOffset = (doc.internal.pageSize.width / 2) - (doc.getTextWidth(no_surat) / 2);
        doc.text(no_surat, xOffset, 50);

        doc.setFont('times','normal');
        var yPos = 60;

        // pembuka Surat
        var splittext = doc.splitTextToSize(pembuka, 170);
        for(var i = 0; i<splittext.length; i++){
            doc.text(20, yPos, splittext[i]);
            yPos +=5;
            // if(yPos >= 200){
            //     doc.addPage();
            //     yPos = 10;
            // }
        }

        // Pihak Terkait
        yPos += 5;
        doc.text("Nama", 20, yPos);
        doc.text(": "+nama_1, 50, yPos);

        yPos += 7;
        doc.text("Divisi", 20, yPos);
        doc.text(": "+divisi_1, 50, yPos);

        yPos += 7;
        doc.text("Jabatan", 20, yPos);
        doc.text(": "+jabatan_1, 50, yPos);

        yPos += 7;
        doc.text(keterangan_1, 20, yPos);

        yPos += 7;
        doc.text("Nama", 20, yPos);
        doc.text(": "+nama_2, 50, yPos);

        yPos += 7;
        doc.text("Divisi", 20, yPos);
        doc.text(": "+divisi_2, 50, yPos);

        yPos += 7;
        doc.text("Jabatan", 20, yPos);
        doc.text(": "+jabatan_2, 50, yPos);

        yPos += 7;
        doc.text(keterangan_2, 20, yPos);

        yPos += 10;

        // Isi

        var splittext = doc.splitTextToSize(isi, 170);
        for(var i = 0; i<splittext.length; i++){
            doc.text(20, yPos, splittext[i]);
            yPos +=5;
            // if(yPos >= 200){
            //     doc.addPage();
            //     yPos = 10;
            // }
        }

        yPos += 5;

        var start_barang = yPos;

        // garis vertical


        doc.line(20, yPos, 190, yPos);
        yPos += 5;
        doc.text("No.",22.5,yPos);
        doc.text("Nama Barang",70,yPos);
        doc.text("Qty",137,yPos);
        doc.text("Keterangan",161,yPos);
        yPos += 3;
        doc.line(20, yPos, 190, yPos);

        console.log(nama_barang.length+" - "+qty_barang.length+" - "+keterangan_barang.length )

        for(var i=0;i<nama_barang.length;i++){
            console.log(qty_barang[i]);
            yPos += 5;
            doc.text(String(i+1),22.5,yPos);
            doc.text(nama_barang[i],35,yPos);
            var xOffset = 10 - (doc.getTextWidth(qty_barang[i]) / 2);
            doc.text(qty_barang[i],xOffset+130,yPos);
            var xOffset = 20 - (doc.getTextWidth(keterangan_barang[i]) / 2);
            doc.text(keterangan_barang[i],xOffset+150,yPos);
        }



        yPos += 3;
        var end_barang = yPos;
        doc.line(20, yPos, 190, yPos);

        yPos += 10;

        // garis vertical
        doc.line(20, start_barang, 20, end_barang);
        doc.line(30, start_barang, 30, end_barang);
        doc.line(130, start_barang, 130, end_barang);
        doc.line(150, start_barang, 150, end_barang);
        doc.line(190, start_barang, 190, end_barang);

        // Penutup
        var splittext = doc.splitTextToSize(penutup, 170);
        for(var i = 0; i<splittext.length; i++){
            doc.text(20, yPos, splittext[i]);
            yPos +=5;
            // if(yPos >= 200){
            //     doc.addPage();
            //     yPos = 10;
            // }
        }

        yPos += 5;


        // TTD Pihak Terkait

        // garis vertical
        doc.line(20, yPos+49, 20, yPos);
        doc.line(76.6, yPos+49, 76.6, yPos);
        doc.line(133.3, yPos+49, 133.3, yPos);
        doc.line(190, yPos+49, 190, yPos);


        // garis horizontal
        doc.line(20, yPos, 190, yPos);
        yPos += 5;
        doc.text("PIHAK PERTAMA", 32.5, yPos);
        doc.text("PIHAK KEDUA", 92, yPos);
        doc.text("MENGETAHUI", 148.5, yPos);
        yPos += 3;
        doc.line(20, yPos, 190, yPos);
        yPos += 25;
        doc.line(20, yPos, 190, yPos);

        // yPos+=5;
        // var xOffset = (56.6/2) - (doc.getTextWidth(nama_1) / 2);
        // doc.text(nama_1, xOffset+20, yPos);
        // var xOffset = (56.6/2) - (doc.getTextWidth(nama_2) / 2);
        // doc.text(nama_2, xOffset+76.6, yPos);
        // var xOffset = (56.6/2) - (doc.getTextWidth(mengetahui)/ 2);
        // doc.text(mengetahui, xOffset+133.3, yPos);
        // yPos += 3;
        // doc.line(20, yPos, 190, yPos);

        yPos+=5;
        doc.text("Nama :", 25, yPos);
        doc.text("Nama :", 81.6, yPos);
        doc.text("Nama :", 138.3, yPos);
        yPos += 3;
        doc.line(20, yPos, 190, yPos);
        yPos+=5;
        doc.text("Tgl. :", 25, yPos);
        doc.text("Tgl. :", 81.6, yPos);
        doc.text("Tgl. :", 138.3, yPos);
        yPos += 3;
        doc.line(20, yPos, 190, yPos);


        doc.setProperties({ title: 'FPK - '+dateTime });

        var string = doc.output('datauristring', '_blank');
        var embed = "<embed width='100%' height='100%' src='" + string + "'/>"
        var x = window.open('about:blank', '_blank',);
        x.document.open();
        x.document.write(embed);
        // doc.save('FPK - '+dateTime);
        // x.document.close();
    };

    function get_data(){
        var id_divisi = $('#id_divisi').val();
        var id_jenis_surat = $('#id_jenis').val();
        var no_arsip = $('#no-arsip').val();
        var no_surat = $('#no_surat').val();
        var judul = $('#judul').val();
        var tanggal = $('#tanggal').val();
        var alamat_asal = $('#alamat_asal').val();
        var alamat_tujuan = $('#alamat_tujuan').val();

        var isi = $('#isi').val();

        var pengirim = $('#pengirim').val();

        var mengetahui = $('#mengetahui').val();
        var nama_barang = [];
        var kode_barang = [];
        var qty_barang = [];
        var keterangan_barang = [];
        for (var i=0 ; i<$('input[name="nama_barang[]"]').length;i++){
            console.log($('input[name="nama_barang[]"]')[i].value);
            kode_barang.push($('input[name="kode_barang[]"]')[i].value);
            nama_barang.push($('input[name="nama_barang[]"]')[i].value);
            qty_barang.push($('input[name="qty_barang[]"]')[i].value);
            keterangan_barang.push($('input[name="keterangan_barang[]"]')[i].value);
        }

        if(nama_barang.length != qty_barang.length || nama_barang.length != keterangan_barang.length || qty_barang.length != keterangan_barang.length){
            swal({
                title: "Perhatian",
                text: "Pastikan Kuantitas Nama Barang, Qty Barang dan Keterangan barang sama !",
                icon: "warning",
                buttons: "Ok",
                dangerMode: true,
            });
            return false;
        }else{
            var isi_barang = '';

            for(var i=0;i<nama_barang.length;i++){
                isi_barang = isi_barang +
                            '<tr>'+
                                '<td id="no_urut">'+(i+1)+'</td>'+
                                '<td id="field_kode_barang">'+kode_barang[i]+'</td>'+
                                '<td id="field_nama_barang">'+nama_barang[i]+'</td>'+
                                '<td id="field_qty_barang">'+qty_barang[i]+'</td>'+
                                '<td id="field_keterangan_barang">'+keterangan_barang[i]+'</td>'+
                            '</tr>';
            }

            document.getElementById('field_barang').innerHTML=isi_barang;

            if(judul != ''){
                $('#judul_surat').text(judul);
            }else{
                $('#judul_surat').text('[judul_surat]');
            }

            if(tanggal != ''){
                $('#field_tanggal').text(moment(tanggal).format('dddd') + ', '+ moment(tanggal).format('DD MMMM YYYY'));
            }else{
                $('#field_tanggal').text('[tanggal]');
            }

            if(alamat_asal != ''){
                $('#field_alamat_asal').text(alamat_asal);
            }else{
                $('#field_alamat_asal').text('[alamat_asal]');
            }

            if(alamat_tujuan != ''){
                $('#field_alamat_tujuan').text(alamat_tujuan);
            }else{
                $('#field_alamat_tujuan').text('[alamat_tujuan]');
            }

            if(no_surat != ''){
                $('#nomor_surat').text(no_surat);
            }else{
                $('#nomor_surat').text('[nomor_surat]');
            }


            if(isi != ''){
                $('#isi_surat').text(isi);
            }else{
                $('#isi_surat').text('[isi_surat]');
            }


            if(pengirim != ''){
                $('#pengirim').text(pengirim);
                $('#ttd_pengirim').text(pengirim);
            }else{
                $('#pengirim').text('[pic_pengirim]');
                $('#ttd_pengirim').text('[pengirim]');
            }

            if(mengetahui != ''){
                $('#ttd_mengetahui').text(mengetahui);
            }else{
                $('#ttd_mengetahui').text('[mengetahui]');
            }
        }


    };

    // Generate Nomor Arsip
    $('#id_jenis').on('change',function(e) {
        e.preventDefault();

        var id_jenis = $('#id_jenis').val();
        var id_divisi = $('#id_divisi').val();

        if(id_jenis == ''){
            $('#no-arsip').val('');
            $('#no_surat').val('');
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
                    url:'/buat_surat/'+id_jenis,
                    data:{
                        'id_divisi' : id_divisi
                    },
                    success: function(response) {
                        $('#no-arsip').val(response.no_arsip);
                        $('#no_surat').val(response.no_surat);
                    },
                    error: function(error) {
                        console.log('gagal');
                        console.log(error);
                    }

                });
                $('#form_buat_surat').innerHTML= form_berita_acara;
            }
        }
        get_data();
    });

    $('#id_divisi').on('change',function(e) {
        e.preventDefault();
        var id_jenis = $('#id_jenis').val();
        var id_divisi = $('#id_divisi').val();

        if(id_divisi == ''){
            $('#no-arsip').val('');
            $('#no_surat').val('');
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
                    url:'/buat_surat/'+id_jenis,
                    data:{
                        'id_divisi' : id_divisi
                    },
                    success: function(response) {
                        $('#no-arsip').val(response.no_arsip);
                        $('#no_surat').val(response.no_surat);
                    },
                    error: function(error) {
                        console.log('gagal');
                        console.log(error);
                    }

                });
            }
        }
        get_data();
    });

    // Generate No. Arsip
    $('#generate_no_arsip').on('click',function(e) {
        e.preventDefault();
        var id_jenis = $('#id_jenis').val();
        var id_divisi = $('#id_divisi').val();
        console.log(id_jenis);
        $.ajax({
            type:'GET',
            url:'/buat_surat/'+id_jenis,
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
        get_data();
    });

    // Generate No. Surat

    $('#generate_no_surat').on('click',function(e) {
        e.preventDefault();
        var id_jenis = $('#id_jenis').val();
        var id_divisi = $('#id_divisi').val();
        console.log(id_jenis);
        $.ajax({
            type:'GET',
            url:'/buat_surat/'+id_jenis,
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
        get_data();
    });

    // $('#simpan').on('click', function(){
    //     console.log('tombol berfungsi');
    //     get_data();
    //     simpan_surat();
    //     Generate_PDF();
    // });

    function simpan_surat(){

        var tanggal = $('#tanggal').val();
        var pengirim = $('#pengirim').val();

        var form_data = new FormData($('#form_buat_surat')[0]);

        form_data.append('penerima','-');
        form_data.append('tgl_dikirim',tanggal);
        form_data.append('tgl_surat',tanggal);
        form_data.append('keterangan',judul+" - oleh "+pengirim);
        $.ajax({
            type: "post",
            url: "/buat_surat",
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
    }

    $('#simpan').on('click', function(){
        console.log('tombol berfungsi');
        // get_data();
        simpan_surat();
        Generate_PDF();
    });

    // Live Preview
    $('#judul').on('keyup', function(){
        get_data();
    });
    $('#tanggal').on('change', function(){
        get_data();
    });
    $('#alamat_asal').on('keyup', function(){
        get_data();
    });
    $('#alamat_tujuan').on('keyup', function(){
        get_data();
    });
    $('#isi').on('keyup', function(){
        get_data();
    });
    $('#pengirim').on('keyup', function(){
        get_data();
    });
    $('#mengetahui').on('keyup', function(){
        get_data();
    });

});