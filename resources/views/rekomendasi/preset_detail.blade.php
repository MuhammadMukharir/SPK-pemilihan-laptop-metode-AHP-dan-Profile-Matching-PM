@extends('adminlte::page')

@section('title', 'Preset Preferences Management')

@section('content_header')
<h2> Show Preset Preference </h2>
<div class="pull-right">
    <a class="btn btn-secondary" href="{{ route('rekomendasi.list_preset') }}"> Back</a>
    <a class="btn btn-warning" href="{{ route('rekomendasi.preset.use',$presetpreference->id) }}">Gunakan preset</a>
</div>
@stop

@section('content')

<section class="content">
    <div class="card">
        <div class="card-body">


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $presetpreference->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Details:</strong>
            {{ $presetpreference->detail }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Harga (Rp):</strong>
            Rp{{ $presetpreference->harga }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Prosesor (GHz): </strong> (Baseclock(GHz) x Threads)
            {{ $presetpreference->prosesor }} GHz
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kapasitas RAM (GB):</strong>
            {{ $presetpreference->kapasitas_ram }} GB
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kapasitas HDD (GB):</strong>
            {{ $presetpreference->kapasitas_hdd }} GB
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kapasitas SSD (GB):</strong>
            {{ $presetpreference->kapasitas_ssd }} GB
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kapasitas VRAM (GB):</strong>
            {{ $presetpreference->kapasitas_vram }} GB
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kapasitas maksimal upgrade RAM (GB):</strong>
            {{ $presetpreference->kapasitas_maxram }} GB
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Berat (Gram):</strong>
            {{ $presetpreference->berat }} gram
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ukuran layar (Inci):</strong>
            {{ $presetpreference->ukuran_layar }} inci
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{-- <label for="inputStatus">Jenis layar</label> --}}
            <strong>Jenis layar:</strong>
                @if ( $presetpreference->jenis_layar  === 1)Twisted Nematic (TN)@endif
                @if ( $presetpreference->jenis_layar  === 3)In-Plane Switching (IPS) @endif
                @if ( $presetpreference->jenis_layar  === 5)Organic Light-emitting Diode (OLED) @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Refresh rate layar (Hz):</strong>
            {{ $presetpreference->refresh_rate }} Hz
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Resolusi layar (jumlah pixel):</strong>
            {{ $presetpreference->resolusi_layar }} pixel
        </div>
    </div>
</div>

        </div>
    </div>
</section>

@endsection
