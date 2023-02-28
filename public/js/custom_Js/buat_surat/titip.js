function Generate_PDF(){
    $('#modal_eksport_pdf').hide();
    var doc = new jsPDF('p', 'mm','a4');
    var id_spk = $('#no_surat').val();
    var jenis_perintah = $('#jenis_perintah').val();
    var name = $('#name').val();
    // var email_1 = $('#email_1').val();
    // var email_2 = $('#email_2').val();
    var divisi = $('#divisi').val();
    var jabatan = $('#jabatan').val();
    var deadline = $('#deadline').val();
    var deskripsi = $('#deskripsi').val();
    var total_file = document.getElementById('file_spk').files.length;

    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;

    // var data = signaturePad.toDataURL("image/png");
    var data = get_signature();
    console.log(data);

    // Nama Properti
    doc.setFontSize(13);
    doc.text("Form Perintah Kerja (FPK) General Affair (GA)", 20, 20);
    doc.setFontSize(8);
    doc.text("Nomor : #"+id_spk, 20, 17);
    doc.text("Diajukan tgl. : ", 20, 20);
    doc.text(dateTime,28,20)
    doc.line(20, 23, 138, 23);


    doc.setFontSize(9);
    doc.text("Jenis Perintah", 20, 30);
    doc.text("Nama Lengkap", 20, 35);
    doc.text("Divisi", 20, 40);
    doc.text("Jabatan", 20, 45);
    doc.text("Deadline", 20, 50);
    doc.text("Lampiran", 20, 55);
    doc.text("Detail/ Spesidikasi Pekerjaan", 20, 60);
    doc.setFontSize(9);
    doc.text(":", 65, 30);
    doc.text(":", 65, 35);
    doc.text(":", 65, 40);
    doc.text(":", 65, 45);
    doc.text(":", 65, 50);
    doc.text(":", 65, 55);
    doc.text(":", 65, 60);
    // doc.text("Tanda tangan", 20, 75);


    // Value Properti
    doc.text(jenis_perintah, 70, 30);
    doc.text(name, 70, 35);
    // doc.text(email_1, 70, 40);
    // doc.text(email_2, 70, 45);
    doc.text(divisi, 70, 40);
    doc.text(jabatan, 70, 45);
    doc.text(deadline, 70, 50);
    doc.text(total_file+" File", 70, 55);
    var splittext = doc.splitTextToSize(deskripsi, 128);
    var yPos = 65;

    for(var i = 0; i<splittext.length; i++){
        doc.text(20, yPos, splittext[i]);
        yPos += 4;
        if(yPos >= 200){
            doc.addPage();
            yPos = 20;
        }
    }

    if(yPos >= 160){
        doc.addPage();
        yPos = 20;
    }

    yPos += 5;

    doc.text("Pemohon", 100, yPos);
    doc.addImage(data,'png', 100, yPos,25,25);
    yPos += 20;
    doc.line(100, yPos, 138, yPos);
    yPos += 5;
    doc.text(name, 100, yPos);

    console.log(yPos);

    if(yPos >= 100){
        doc.addPage();
        yPos = 20;
    }else{
        yPos += 20;
    }


    doc.setFontSize(13);
    doc.text("Pernyataan Pemenuhan FPK GA", 20, yPos);
    yPos += 5;
    doc.line(20, yPos, 138, yPos);
    yPos += 20;
    doc.setFontSize(9);
    doc.text("Dengan ini pemohon menyatakan bahwa pengajuan perintah kerja", 20, yPos);
    yPos += 5;
    doc.text("telah diselesaikan oleh Tim General Affair sesuai dengan deskripsi yang diajukan,  ", 20, yPos);
    yPos += 5;
    doc.text("Nomor: "+id_spk, 20, yPos);
    yPos += 5;
    doc.text("Tgl. Selesai : ", 20, yPos);
    yPos += 20;



    // garis vertical
    doc.line(20, yPos+35, 20, yPos);
    doc.line(52.5, yPos+35, 52.5, yPos);
    doc.line(95, yPos+35, 95, yPos);
    doc.line(138, yPos+35, 138, yPos);


    // garis horizontal
    doc.line(20, yPos, 138, yPos);
    yPos += 5;
    doc.text("Pelaksana", 23.5, yPos);
    doc.text("Pemohon", 66.5, yPos);
    doc.text("Mengetahui", 108, yPos);
    yPos += 3;
    doc.line(20, yPos, 138, yPos);
    yPos += 19;
    doc.line(20, yPos, 138, yPos);
    yPos += 8;
    doc.line(20, yPos, 138, yPos);




    doc.setProperties({ title: 'FPK - '+dateTime });

    var string = doc.output('datauristring', '_blank');
    var embed = "<embed width='100%' height='100%' src='" + string + "'/>"
    var x = window.open('about:blank', '_blank',);
    x.document.open();
    x.document.write(embed);
    doc.save('FPK - '+dateTime);
    // x.document.close();
};