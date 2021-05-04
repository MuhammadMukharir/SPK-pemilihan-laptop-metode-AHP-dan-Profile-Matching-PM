@extends('adminlte::page')

@section('title', 'Preset Preferences Management')

@section('content_header')
<h2> Show Preset Preference </h2>
<div class="pull-right">
    <a class="btn btn-secondary" href="{{ route('presetpreferences.index') }}"> Back</a>
    <a class="btn btn-primary" href="{{ route('presetpreferences.edit',$presetpreference->id) }}">Edit</a>
</div>
@stop

@section('content')

<section class="content">
    <div class="card">
        <div class="card-body p-0">

{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Preset Preference</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('presetpreferences.index') }}"> Back</a>
            <a class="btn btn-primary" href="{{ route('presetpreferences.edit',$presetpreference->id) }}">Edit</a>
        </div>
    </div>
</div> --}}


<div class="row">
    <table class="table table-hover table-striped">
        <tr>
            <td><strong>Preset Preference Name</strong></td>
            <td>{{ $presetpreference->name }}</td>
        </tr><tr>
            <td><strong>Details</strong></td>
            <td>{{ $presetpreference->detail }}</td>
        </tr><tr>
            <td><strong>Harga (Rp)</strong></td>
            <td>            Rp{{ $presetpreference->harga }}</td>
        </tr><tr>
            <td><strong>Prosesor (GHz)  (Baseclock(GHz) x Threads)</strong> </td>
            <td>            {{ $presetpreference->prosesor }} GHz</td>
        </tr><tr>
            <td><strong>Kapasitas RAM (GB)</strong></td>
            <td>            {{ $presetpreference->kapasitas_ram }} GB</td>
        </tr><tr>
            <td><strong>Kapasitas HDD (GB)</strong></td>
            <td>            {{ $presetpreference->kapasitas_hdd }} GB</td>
        </tr><tr>
            <td><strong>Kapasitas SSD (GB)</strong></td>
            <td>            {{ $presetpreference->kapasitas_ssd }} GB</td>
        </tr><tr>
            <td><strong>Kapasitas VRAM (GB)</strong></td>
            <td>            {{ $presetpreference->kapasitas_vram }} GB</td>
        </tr><tr>
            <td width='30%'><strong>Kapasitas maksimal upgrade RAM (GB)</strong></td>
            <td>            {{ $presetpreference->kapasitas_maxram }} GB</td>
        </tr><tr>
            <td><strong>Berat (Gram)</strong></td>
            <td>            {{ $presetpreference->berat }} gram</td>
        </tr><tr>
            <td><strong>Jenis layar</strong></td>
            <td>@if ( $presetpreference->jenis_layar  === 1)Twisted Nematic (TN)@endif
                @if ( $presetpreference->jenis_layar  === 3)In-Plane Switching (IPS) @endif
                @if ( $presetpreference->jenis_layar  === 5)Organic Light-emitting Diode (OLED) @endif</td>
        </tr><tr>
            <td><strong>Refresh rate layar (Hz)</strong></td>
            <td>            {{ $presetpreference->refresh_rate }} Hz</td>
        </tr><tr>
            <td><strong>Resolusi layar (jumlah pixel)</strong></td>
            <td>            {{ $presetpreference->resolusi_layar }} pixel</td>
        </tr>
    </table>
</div>

        </div>
    </div>
</section>

@endsection
