@extends('layouts.app')
@section('content')

@include('perjalanan_dinas.form')
@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset ('js/custom_js/perjalanan_dinas/perjalanan_dinas.js') }}"></script>
<script src="{{ asset ('js/custom_js/perjalanan_dinas/signature.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
const dt = new DataTransfer();

$("#file_spk").on('change', function(e) {
    for (var i = 0; i < this.files.length; i++) {
        let fileBloc = $('<span/>', {
                class: 'file-block '
            }),
            fileName = $('<span/>', {
                class: 'name',
                text: this.files.item(i).name
            });
        fileBloc.append(
                '<span class="btn btn-light btn-delete text-secondary"><i class="fas fa-trash" ></i></span>'
            )
            .append(fileName);
        $("#filesList > #files-names").append(fileBloc);
    };
    for (let file of this.files) {
        dt.items.add(file);
    }
    this.files = dt.files;

    $('span.btn-delete').click(function() {
        let name = $(this).next('span.name').text();
        $(this).parent().remove();
        for (let i = 0; i < dt.items.length; i++) {
            if (name === dt.items[i].getAsFile().name) {
                dt.items.remove(i);
                continue;
            }
        }
        document.getElementById('file_spk').files = dt.files;
    });
});
</script>
@endsection