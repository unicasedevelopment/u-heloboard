@extends('layouts.app')
@section('content')

<div class="col-md-12 d-flex justify-content-center">
    <div class="col-md-9">

        <form action="{{ route ('buat_surat.create') }}" method="get">
            <div class="row">
                @csrf
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="id_divisi">Divisi : </label>
                        <span class="required text-danger">*</span>
                        <select name="id_divisi" id="id_divisi" required="reuqired"
                            class="form-control custom-select select2">
                            <option value="">-- Pilih --</option>
                            @foreach ($data_divisi as $id_divisi => $nama_divisi)
                            <option value="{{$id_divisi}}">{{$nama_divisi}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="id_jenis">Jenis Surat : </label>
                        <span class="required text-danger">*</span>
                        <select name="id_jenis" id="id_jenis" required="reuqired"
                            class="form-control custom-select select2">
                            <option value="">-- Pilih --</option>
                            @foreach ($data_jenis_surat as $id_jenis => $nama_jenis)
                            <option value="{{$id_jenis}}">{{$nama_jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <div class="form-group">
                        <button type="submit" id="create" class="btn btn-secondary">Create</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>

@endsection