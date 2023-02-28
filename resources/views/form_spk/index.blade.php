@extends('layouts.app')
@section('content')

<div class="col-md-12 d-flex justify-content-center ">
    <div class="col-md-6">
        <style>
        .select2 {
            width: 100% !important;
        }

        .container,
        .container-fluid,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            width: 100%;
            padding-right: 0.5rem;
            padding-left: 0.5rem;
            margin-right: auto;
            margin-left: auto;
        }
        </style>
        <style>
        button {
            border-radius: 5px;
            border-width: 0;
        }

        select.form-control-sm~.select2-container--default {
            font-size: 0.75rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__clear {
            /* cursor: pointer;
                                    float: right;
                                    font-weight: bold; */
            margin-right: 1rem;
        }
        </style>
        @include('form_spk.eksport_form')
        @include('form_spk.form')

    </div>
</div>
@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset ('js/custom_js/form_spk.js') }}"></script>
<script src="{{ asset ('js/custom_js/signature.js') }}"></script>
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