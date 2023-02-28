@extends('layouts.app')
@section('content')

<div class="row">
    @include('buat_surat.form')
    @include('buat_surat.preview')
</div>

@endsection

@section('javascript')

<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
<script src="{{ asset ('js/custom_js/buat_surat.js') }}"></script>
@endsection