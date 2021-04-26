@extends('adminlte::page')

@section('title', 'Rekomendasikan Laptop')

@section('content_header')
<style>
    {
        box-sizing: border-box;
    }
    /* Set additional styling options for the columns*/
    .column {
    float: left;
    width: 50%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }
</style>

<h2> Rekomendasikan Laptop </h2>

<form id="presetpreferenceForm" action="{{ route('rekomendasi.hasil') }}" method="POST">
    @csrf

<div class="pull-right">
    <a class="btn btn-warning" href="{{ route('rekomendasi.list_preset') }}"> Use Preset Value</a>
    <noscript>
        <input type="submit" value="Submit form!" />
    </noscript>
    <button type="submit" class="btn btn-primary"> Rekomendasikan!</button>
</div>
@stop

@section('content')
<p>Hello {{ auth()->user()->name }}, masukkan nilai preferensi spesifikasi laptop yang Anda inginkan atau gunakan nilai preset yang tersedia</p>

  <div class="col-xs-5 col-sm-5 col-md-5">
    <div class="form-group">
        {{-- <label for="inputStatus">Jenis layar</label> --}}
        <strong>Pembobotan yang digunakan:</strong>
        <select name="jenis_pembobotan" class="form-control custom-select" required>
            <option value="" selected disabled >-- Pilih salah satu --</option>
            <option value="1">Analytical Hierarchy Process (AHP)</option>
            <option value="0">Pembobotan langsung</option>
        </select>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    {{-- <div class="card">
        <div class="card-body"> --}}



@if ($presetpreference !== null)
    {{-- {{ $presetpreference = $presetpreference[0] }} --}}
    {{-- <div class="row"> --}}
    {{-- <div class="row" style="overflow: auto; max-height: 70vh"> --}}
        <div class="column">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Harga (Rp):</strong>
                <input type="number" name="harga" value="{{ $presetpreference->harga }}" class="form-control" placeholder="Harga (Rp)" min=0 max="200000000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Prosesor (GHz): </strong> (Baseclock(GHz) x Threads)
                <input type="number" name="prosesor" value="{{ $presetpreference->prosesor }}" class="form-control" placeholder="Prosesor (GHz)" min=0 step="0.1" max="200" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas RAM (GB):</strong>
                <input type="number" name="kapasitas_ram" value="{{ $presetpreference->kapasitas_ram }}" class="form-control" placeholder="Kapasitas RAM (GB)" min="0.1" step="0.1" max="64" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas HDD (GB):</strong>
                <input type="number" name="kapasitas_hdd" value="{{ $presetpreference->kapasitas_hdd }}" class="form-control" placeholder="Kapasitas HDD (GB)" min="0" step="0.1" max="5000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas SSD (GB):</strong>
                <input type="number" name="kapasitas_ssd" value="{{ $presetpreference->kapasitas_ssd }}" class="form-control" placeholder="Kapasitas SSD (GB)" min="0" step="0.1" max="5000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas VRAM (GB):</strong>
                <input type="number" name="kapasitas_vram" value="{{ $presetpreference->kapasitas_vram }}" class="form-control" placeholder="Kapasitas VRAM (GB)" min="0.1" step="0.1" max="32" required>
            </div>
        </div>
        </div>

        <div class="column">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas maksimal upgrade RAM (GB):</strong>
                <input type="number" name="kapasitas_maxram" value="{{ $presetpreference->kapasitas_maxram }}" class="form-control" placeholder="Kapasitas maksimal upgrade RAM (GB)" min="0.1" step="0.1" max="64" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Berat (Gram):</strong>
                <input type="number" name="berat" value="{{ $presetpreference->berat }}" class="form-control" placeholder="Berat (Gram)" min=0 max="10000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Ukuran layar (Inci):</strong>
                <input type="number" name="ukuran_layar" value="{{ $presetpreference->ukuran_layar }}" class="form-control" placeholder="Ukuran layar (Inci)" min=5 step="0.1" max="30" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                {{-- <label for="inputStatus">Jenis layar</label> --}}
                <strong>Jenis layar:</strong>
                <select name="jenis_layar" value="{{ $presetpreference->jenis_layar }}" class="form-control custom-select" required>
                    @if ( $presetpreference->jenis_layar  === null)<option disabled selected>-- Pilih salah satu --</option> <option value="1" >Twisted Nematic (TN)</option><option value="3">In-Plane Switching (IPS)</option><option value="5">Organic Light-emitting Diode (OLED)</option> @endif
                    @if ( $presetpreference->jenis_layar  === 1)<option disabled>-- Pilih salah satu --</option> <option value="1" selected>Twisted Nematic (TN)</option><option value="3">In-Plane Switching (IPS)</option><option value="5">Organic Light-emitting Diode (OLED)</option> @endif
                    @if ( $presetpreference->jenis_layar  === 3)<option disabled>-- Pilih salah satu --</option> <option value="1" >Twisted Nematic (TN)</option><option value="3" selected>In-Plane Switching (IPS)</option><option value="5">Organic Light-emitting Diode (OLED)</option> @endif
                    @if ( $presetpreference->jenis_layar  === 5)<option disabled>-- Pilih salah satu --</option> <option value="1" >Twisted Nematic (TN)</option><option value="3">In-Plane Switching (IPS)</option><option value="5" selected>Organic Light-emitting Diode (OLED)</option> @endif
                </select>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Refresh rate layar (Hz):</strong>
                <input type="number" name="refresh_rate" value="{{ $presetpreference->refresh_rate }}" class="form-control" placeholder="Refresh rate layar (Hz)" min=0 max="1000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Resolusi layar (jumlah pixel):</strong> (pixel vertical x pixel horizontal) 
                <input type="number" name="resolusi_layar" value="{{ $presetpreference->resolusi_layar }}" class="form-control" placeholder="Jumlah pixel (pixel vertical x pixel horizontal)" min=0 max="80000000" list="resolution" required>
                <datalist id="resolution">
                    <option value="8294400">3840 * 2160 (4K)</option>
                    <option value="2073600">1920 * 1080 (FullHD)</option>
                    <option value="1049088">1366 * 768 (HD+)</option>
                    <option value="921600" >1280 * 720 (HD)</option>
                </datalist>
            </div>
        </div>
        </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div> --}}
    {{-- </div> --}}

    </form>

@else

{{-- <div class="row" style="overflow: auto; max-height: 70vh"> --}}
    <div class="column">
    <div class="col-xs-12 col-sm-12 col-md-11">
        <div class="form-group">
            <strong>Harga (Rp):</strong>
            <input type="number" name="harga" class="form-control" placeholder="Harga (Rp)" min=0 max="200000000">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-11">
        <div class="form-group">
            <strong>Prosesor (GHz): </strong> (Baseclock(GHz) x Threads)
            <input type="number" name="prosesor" class="form-control" placeholder="Prosesor (GHz)" min=0 step="0.1" max="200">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-11">
        <div class="form-group">
            <strong>Kapasitas RAM (GB):</strong>
            <input type="number" name="kapasitas_ram" class="form-control" placeholder="Kapasitas RAM (GB)" min="0.1" step="0.1" max="64">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-11">
        <div class="form-group">
            <strong>Kapasitas HDD (GB):</strong>
            <input type="number" name="kapasitas_hdd" class="form-control" placeholder="Kapasitas HDD (GB)" min="0" step="0.1" max="5000">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-11">
        <div class="form-group">
            <strong>Kapasitas SSD (GB):</strong>
            <input type="number" name="kapasitas_ssd" class="form-control" placeholder="Kapasitas SSD (GB)" min="0" step="0.1" max="5000">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-11">
        <div class="form-group">
            <strong>Kapasitas VRAM (GB):</strong>
            <input type="number" name="kapasitas_vram" class="form-control" placeholder="Kapasitas VRAM (GB)" min="0.1" step="0.1" max="32">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-11">
        <div class="form-group">
            <strong>Kapasitas maksimal upgrade RAM (GB):</strong>
            <input type="number" name="kapasitas_maxram" class="form-control" placeholder="Kapasitas maksimal upgrade RAM (GB)" min="0.1" step="0.1" max="64">
        </div>
    </div>
    </div>

    <div class="column">
    <div class="col-xs-12 col-sm-12 col-md-11">
        <div class="form-group">
            <strong>Berat (Gram):</strong>
            <input type="number" name="berat" class="form-control" placeholder="Berat (Gram)" min=0 max="10000">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-11">
        <div class="form-group">
            <strong>Ukuran layar (Inci):</strong>
            <input type="number" name="ukuran_layar" class="form-control" placeholder="Ukuran layar (Inci)" min=5 step="0.1" max="30">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-11">
        <div class="form-group">
            {{-- <label for="inputStatus">Jenis layar</label> --}}
            <strong>Jenis layar:</strong>
            <select name="jenis_layar" class="form-control custom-select">
                <option selected disabled>-- Pilih salah satu --</option>
                <option value="1" selected>Twisted Nematic (TN)</option>
                <option value="3">In-Plane Switching (IPS)</option>
                <option value="5">Organic Light-emitting Diode (OLED)</option>
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-11">
        <div class="form-group">
            <strong>Refresh rate layar (Hz):</strong>
            <input type="number" name="refresh_rate" class="form-control" placeholder="Refresh rate layar (Hz)" min=0 max="1000">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-11">
        <div class="form-group">
            <strong>Resolusi layar (jumlah pixel):</strong> (pixel vertical x pixel horizontal) 
            <input type="number" name="resolusi_layar" class="form-control" placeholder="Jumlah pixel (pixel vertical x pixel horizontal)" min=0 max="80000000" list="resolution">
            <datalist id="resolution">
                <option value="8294400">3840 * 2160 (4K)</option>
                <option value="2073600">1920 * 1080 (FullHD)</option>
                <option value="1049088">1366 * 768 (HD+)</option>
                <option value="921600" >1280 * 720 (HD)</option>
            </datalist>
        </div>
    </div>
    </div>

    {{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div> --}}
{{-- </div> --}}

@endif


        {{-- </div>
    </div> --}}
</section>

@endsection