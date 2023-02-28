@extends('layouts.app')
@section('content')
{!! Form::open(['route' => 'form_tamu.save', 'enctype' => 'multipart/form-data'])!!}

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" id="card_label_divisi">Form Data Tamu</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_tamu">Nama Tamu : </label>
                    <input type="text" name="nama_tamu" class="form-control" required="reuqired" value="" />
                </div>
                <div class="form-group">
                    <label for="penerima_tamu">Nama Penerima Tamu : </label>
                    <input type="text" name="penerima_tamu" class="form-control" required="reuqired" value="" />
                </div>
                <div class="form-group">
                    <label for="no_hp">No. HP : </label>
                    <input type="text" name="no_hp" class="form-control" required="reuqired" value="" />
                </div>
                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan : </label>
                    <input type="text" name="nama_perusahaan" class="form-control" required="reuqired" value="" />
                </div>
                <div class="form-group">
                    <label for="tgl_kunjungan">Tgl. Kunjungan : </label>
                    <input type="date" name="tgl_kunjungan" class="form-control" required="reuqired" value="" />
                </div>
                <div class="form-group">
                    <label for="keperluan">Keperluan : </label>
                    <input type="text" name="keperluan" class="form-control" required="reuqired" value="" />
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group text-right">
                    {!! Form::submit('Simpan', ['class'=>'btn btn-secondary text-white']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection