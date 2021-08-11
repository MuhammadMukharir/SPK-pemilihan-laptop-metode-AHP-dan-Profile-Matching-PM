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

    input{
        text-align: center;
        }

        

        * {
        box-sizing: border-box;
    }

    th {
    position: relative;
    top: 0;
    background: #6c7ae0;
    text-align: Center;
    font-weight: normal;
    font-size: 1.1rem;
    color: white;
    }

    /* td 
    {
        height: 5px; 
        width: 5px;
    } */

    input{
        text-align: center;
    }

    .custColor{
        top: 0;
        background: #6c7ae0;
        text-align: Center;
        font-weight: normal;
        font-size: 1.1rem;
        color: white;
    }

    .cssTableCenter td
    {
        text-align: center; 
        vertical-align: middle;
    }

    .goCenter
    {
        text-align: center; 
        vertical-align: middle;
    }

    .column {
        float: left;
        width: 50%;
        }
    
    select{
      width: 400px; text-align-last:center; text-align: center;
    }
    
 /* 
    scroll down komentar pada laman dari https://stackoverflow.com/questions/5523735/how-to-make-a-radio-button-look-like-a-toggle-button
  */
    label.btn {
    padding: 0;
    }

    label.btn input {
    opacity: 0;
    position: absolute;
    }

    label.btn span {
    text-align: center;
    padding: 6px 12px;
    display: block;
    }

    label.btn input:checked+span {
    background-color: rgb(80, 110, 228);
    color: #fff;
    }
</style>

{{-- <h2> Rekomendasikan Laptop </h2> --}}
<h4>Masukkan nilai preferensi spesifikasi laptop yang Anda inginkan secara manual atau gunakan nilai preset preferensi yang tersedia</h4>
<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>



<form id="presetpreferenceForm" action="{{ route('rekomendasi.hasil') }}" method="POST">
    @csrf

<div class="pull-right">
    <a class="btn btn-dark btn-" href="{{ route('user.bobot.ahp.index') }}"> <i class="fas fa-fw fa-balance-scale"></i> Edit Pembobotan AHP </a>
    <a class="btn btn-info btn-" href="{{ route('rekomendasi.list_preset') }}"> <i class="fas fa-fw fa-bullseye"></i> Gunakan Nilai Preset Preferensi </a>
    <noscript>
        <input type="submit" value="Submit form!" />
    </noscript>
    <button type="submit" class="btn btn-primary btn-"> <i class="fas fa-fw fa-calculator"></i> Rekomendasikan!</button>
</div>
@stop

@section('content')
{{-- <h3>Masukkan nilai preferensi spesifikasi laptop yang Anda inginkan atau gunakan nilai preset preferensi yang tersedia</h3> --}}

  <div class="col-xs-5 col-sm-5 col-md-5">
    <div class="form-group">
        {{-- <label for="inputStatus">Jenis layar</label> --}}
        <strong>Pembobotan yang digunakan:</strong>
        <select name="jenis_pembobotan" class="form-control custom-select" required>
            <option value="" disabled >-- Pilih salah satu --</option>
            <option value="1" selected>Analytical Hierarchy Process (AHP)</option>
            <option value="0">Pembobotan langsung</option>
        </select>
    </div>
</div>

{{-- <div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div> --}}

<section class="content">
    {{-- <div class="card">
        <div class="card-body"> --}}


@if ($presetpreference !== null)
    {{-- {{ $presetpreference = $presetpreference[0] }} --}}
    {{-- <div class="row"> --}}
    {{-- <div class="row" style="overflow: auto; max-height: 70vh"> --}}
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <table>
                    <td>
                        <strong>Harga (Rp):</strong>
                    </td>
                </table>
                <div>
                    <label class="btn btn-outline-primary"><input type="radio" id="c1_rad0" name="prioritas[0]" value="Kriteria Diabaikan" ><span>Abaikan kriteria</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c1_rad1" name="prioritas[0]" value="Prioritas Nilai Terendah" ><span>Prioritas nilai terendah</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c1_rad2" name="prioritas[0]" value="Prioritas Nilai Tertinggi" ><span>Prioritas nilai tertinggi</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c1_rad3" name="prioritas[0]" value="Prioritas Nilai Preferensi" checked ><span>Preferensi nilai:</span></label>
                </div>

                <input type="number" id="c1" name="harga" value="{{ $presetpreference->harga }}" class="form-control" placeholder="Harga (Rp)" min=0 max="200000000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Prosesor (GHz): </strong> (Baseclock(GHz) x Threads)
                <div>
                    <label class="btn btn-outline-primary"><input type="radio" id="c2_rad0" name="prioritas[1]" value="Kriteria Diabaikan" ><span>Abaikan kriteria</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c2_rad1" name="prioritas[1]" value="Prioritas Nilai Terendah" ><span>Prioritas nilai terendah</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c2_rad2" name="prioritas[1]" value="Prioritas Nilai Tertinggi" checked><span>Prioritas nilai tertinggi</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c2_rad3" name="prioritas[1]" value="Prioritas Nilai Preferensi" @if (is_numeric($presetpreference->prosesor)) checked @endif><span>Preferensi nilai:</span></label>
                </div>
                <input type="number" id="c2" name="prosesor" value="{{ $presetpreference->prosesor }}" @if (!(is_numeric($presetpreference->prosesor))) disabled @endif  class="form-control" placeholder="Prosesor (GHz)" min=0 step="0.1" max="200" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas RAM (GB):</strong>
                <div>
                    <label class="btn btn-outline-primary"><input type="radio" id="c3_rad0" name="prioritas[2]" value="Kriteria Diabaikan" ><span>Abaikan kriteria</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c3_rad1" name="prioritas[2]" value="Prioritas Nilai Terendah" ><span>Prioritas nilai terendah</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c3_rad2" name="prioritas[2]" value="Prioritas Nilai Tertinggi" checked><span>Prioritas nilai tertinggi</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c3_rad3" name="prioritas[2]" value="Prioritas Nilai Preferensi" @if (is_numeric($presetpreference->kapasitas_ram)) checked @endif><span>Preferensi nilai:</span></label>
                </div>
                <input type="number" id="c3" name="kapasitas_ram" value="{{ $presetpreference->kapasitas_ram }}" @if (!(is_numeric($presetpreference->kapasitas_ram))) disabled @endif class="form-control" placeholder="Kapasitas RAM (GB)" min="0.1" step="0.1" max="64" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas HDD (GB):</strong>
                <div>
                    <label class="btn btn-outline-primary"><input type="radio" id="c4_rad0" name="prioritas[3]" value="Kriteria Diabaikan" ><span>Abaikan kriteria</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c4_rad1" name="prioritas[3]" value="Prioritas Nilai Terendah" ><span>Prioritas nilai terendah</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c4_rad2" name="prioritas[3]" value="Prioritas Nilai Tertinggi" checked><span>Prioritas nilai tertinggi</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c4_rad3" name="prioritas[3]" value="Prioritas Nilai Preferensi" @if (is_numeric($presetpreference->kapasitas_hdd)) checked @endif><span>Preferensi nilai:</span></label>
                </div>
                <input type="number" id="c4" name="kapasitas_hdd" value="{{ $presetpreference->kapasitas_hdd }}" @if (!(is_numeric($presetpreference->kapasitas_hdd))) disabled @endif class="form-control" placeholder="Kapasitas HDD (GB)" min="0" step="0.1" max="5000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas SSD (GB):</strong>
                <div>
                    <label class="btn btn-outline-primary"><input type="radio" id="c5_rad0" name="prioritas[4]" value="Kriteria Diabaikan" ><span>Abaikan kriteria</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c5_rad1" name="prioritas[4]" value="Prioritas Nilai Terendah" ><span>Prioritas nilai terendah</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c5_rad2" name="prioritas[4]" value="Prioritas Nilai Tertinggi" checked><span>Prioritas nilai tertinggi</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c5_rad3" name="prioritas[4]" value="Prioritas Nilai Preferensi" @if (is_numeric($presetpreference->kapasitas_ssd)) checked @endif><span>Preferensi nilai:</span></label>
                </div>
                <input type="number" id="c5" name="kapasitas_ssd" value="{{ $presetpreference->kapasitas_ssd }}" @if (!(is_numeric($presetpreference->kapasitas_ssd))) disabled @endif class="form-control" placeholder="Kapasitas SSD (GB)" min="0" step="0.1" max="5000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas VRAM (GB):</strong>
                <div>
                    <label class="btn btn-outline-primary"><input type="radio" id="c6_rad0" name="prioritas[5]" value="Kriteria Diabaikan" ><span>Abaikan kriteria</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c6_rad1" name="prioritas[5]" value="Prioritas Nilai Terendah" ><span>Prioritas nilai terendah</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c6_rad2" name="prioritas[5]" value="Prioritas Nilai Tertinggi" checked><span>Prioritas nilai tertinggi</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c6_rad3" name="prioritas[5]" value="Prioritas Nilai Preferensi" @if (is_numeric($presetpreference->kapasitas_vram)) checked @endif><span>Preferensi nilai:</span></label>
                </div>
                <input type="number" id="c6" name="kapasitas_vram" value="{{ $presetpreference->kapasitas_vram }}" @if (!(is_numeric($presetpreference->kapasitas_vram))) disabled @endif class="form-control" placeholder="Kapasitas VRAM (GB)" min="0.1" step="0.1" max="32" required>
            </div>
        </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas maksimal upgrade RAM (GB):</strong>
                <div>
                    <label class="btn btn-outline-primary"><input type="radio" id="c7_rad0" name="prioritas[6]" value="Kriteria Diabaikan" ><span>Abaikan kriteria</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c7_rad1" name="prioritas[6]" value="Prioritas Nilai Terendah" ><span>Prioritas nilai terendah</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c7_rad2" name="prioritas[6]" value="Prioritas Nilai Tertinggi" checked><span>Prioritas nilai tertinggi</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c7_rad3" name="prioritas[6]" value="Prioritas Nilai Preferensi" @if (is_numeric($presetpreference->kapasitas_maxram)) checked @endif><span>Preferensi nilai:</span></label>
                </div>
                <input type="number" id="c7" name="kapasitas_maxram" value="{{ $presetpreference->kapasitas_maxram }}" @if (!(is_numeric($presetpreference->kapasitas_maxram))) disabled @endif class="form-control" placeholder="Kapasitas maksimal upgrade RAM (GB)" min="0.1" step="0.1" max="64" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Berat (Gram):</strong>
                <div>
                    <label class="btn btn-outline-primary"><input type="radio" id="c8_rad0" name="prioritas[7]" value="Kriteria Diabaikan" ><span>Abaikan kriteria</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c8_rad1" name="prioritas[7]" value="Prioritas Nilai Terendah" checked><span>Prioritas nilai terendah</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c8_rad2" name="prioritas[7]" value="Prioritas Nilai Tertinggi" ><span>Prioritas nilai tertinggi</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c8_rad3" name="prioritas[7]" value="Prioritas Nilai Preferensi" @if (is_numeric($presetpreference->berat)) checked @endif><span>Preferensi nilai:</span></label>
                </div>
                <input type="number" id="c8" name="berat" value="{{ $presetpreference->berat }}" class="form-control" @if (!(is_numeric($presetpreference->berat))) disabled @endif placeholder="Berat (Gram)" min=0 max="10000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Ukuran layar (Inci):</strong>
                <div>
                    <label class="btn btn-outline-primary"><input type="radio" id="c9_rad0" name="prioritas[8]" value="Kriteria Diabaikan" ><span>Abaikan kriteria</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c9_rad1" name="prioritas[8]" value="Prioritas Nilai Terendah" ><span>Prioritas nilai terendah</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c9_rad2" name="prioritas[8]" value="Prioritas Nilai Tertinggi" ><span>Prioritas nilai tertinggi</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c9_rad3" name="prioritas[8]" value="Prioritas Nilai Preferensi" checked><span>Preferensi nilai:</span></label>
                </div>
                <input type="number" id="c9" name="ukuran_layar" value="{{ $presetpreference->ukuran_layar }}" class="form-control" placeholder="Ukuran layar (Inci)" min=5 step="0.1" max="30" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                {{-- <label for="inputStatus">Jenis layar</label> --}}
                <strong>Jenis layar:</strong>
                <div>
                    <label class="btn btn-outline-primary"><input type="radio" id="c10_rad0" name="prioritas[9]" value="Kriteria Diabaikan" ><span>Abaikan kriteria</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c10_rad1" name="prioritas[9]" value="Prioritas Nilai Terendah" ><span>Prioritas nilai terendah</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c10_rad2" name="prioritas[9]" value="Prioritas Nilai Tertinggi" checked><span>Prioritas nilai tertinggi</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c10_rad3" name="prioritas[9]" value="Prioritas Nilai Preferensi" @if (is_numeric($presetpreference->jenis_layar)) checked @endif><span>Preferensi nilai:</span></label>
                </div>
                <select name="jenis_layar" id="c10" value="{{ $presetpreference->jenis_layar }}" @if (!(is_numeric($presetpreference->jenis_layar))) disabled @endif class="form-control custom-select" required>
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
                <div>
                    <label class="btn btn-outline-primary"><input type="radio" id="c11_rad0" name="prioritas[10]" value="Kriteria Diabaikan" ><span>Abaikan kriteria</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c11_rad1" name="prioritas[10]" value="Prioritas Nilai Terendah" ><span>Prioritas nilai terendah</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c11_rad2" name="prioritas[10]" value="Prioritas Nilai Tertinggi" ><span>Prioritas nilai tertinggi</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c11_rad3" name="prioritas[10]" value="Prioritas Nilai Preferensi" checked><span>Preferensi nilai:</span></label>
                </div>
                <input type="number" id="c11" name="refresh_rate" value="{{ $presetpreference->refresh_rate }}" class="form-control" placeholder="Refresh rate layar (Hz)" min=0 max="1000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Resolusi layar (jumlah pixel):</strong> (pixel vertical x pixel horizontal) 
                <div>
                    <label class="btn btn-outline-primary"><input type="radio" id="c12_rad0" name="prioritas[11]" value="Kriteria Diabaikan" ><span>Abaikan kriteria</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c12_rad1" name="prioritas[11]" value="Prioritas Nilai Terendah" ><span>Prioritas nilai terendah</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c12_rad2" name="prioritas[11]" value="Prioritas Nilai Tertinggi" checked><span>Prioritas nilai tertinggi</span></label>
                    <label class="btn btn-outline-primary"><input type="radio" id="c12_rad3" name="prioritas[11]" value="Prioritas Nilai Preferensi" @if (is_numeric($presetpreference->resolusi_layar)) checked @endif><span>Preferensi nilai:</span></label>
                </div>
                <input type="number" id="c12" name="resolusi_layar" value="{{ $presetpreference->resolusi_layar }}" @if (!(is_numeric($presetpreference->resolusi_layar))) disabled @endif class="form-control" placeholder="Jumlah pixel (pixel vertical x pixel horizontal)" min=0 max="80000000" list="resolution" required>
                <datalist id="resolution">
                    <option value="8294400">3840 * 2160 (4K)</option>
                    <option value="2073600">1920 * 1080 (FullHD)</option>
                    <option value="1049088">1366 * 768 (HD+)</option>
                    <option value="921600" >1280 * 720 (HD)</option>
                </datalist>
            </div>
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

{{-- <div class="col-md-12" style="text-align: left">
    <a class="btn btn-info btn-sm" href="{{ route('user.bobot.ahp.index') }}"> Edit Pembobotan AHP </a>
    <a class="btn btn-info btn-sm" href="{{ route('user.bobot.langsung.index') }}"> Edit Pembobotan langsung </a>
</div> --}}

        {{-- </div>
    </div> --}}

    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Bobot Kriteria yang digunakan dalam perhitungan rekomendasi</h3>
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-hover table-borderless table-striped">
                <thead>
                  <tr>
                    <th class="goCenter">No</th>
                    <th class="goCenter" style="text-align: left">Kriteria</th>
                    <th class="goCenter">Bobot antar kriteria hasil AHP</th>
                    <th class="goCenter">Bobot antar kriteria hasil pembobotan langsung</th>
                  </tr>
                </thead>
                <tbody>
    
                  <tr>
                    <td class="goCenter custColor">C1</td>
                    <td><strong> Harga laptop </strong></td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_ahp->c1 * 100,0,",",".") . ' %' }} </strong> </td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_langsung->c1 * 100,0,",",".") . ' %' }} </strong> </td>
                  </tr><tr>
                    <td class="goCenter custColor">C2</td>
                    <td><strong> Prosesor </strong></td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_ahp->c2 * 100,0,",",".") . ' %' }} </strong> </td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_langsung->c2 * 100,0,",",".") . ' %' }} </strong> </td>
                  </tr><tr>
                    <td class="goCenter custColor">C3</td>
                    <td><strong> Kapasitas RAM </strong></td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_ahp->c3 * 100,0,",",".") . ' %' }} </strong> </td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_langsung->c3 * 100,0,",",".") . ' %' }} </strong> </td>
                  </tr><tr>
                    <td class="goCenter custColor">C4</td>
                    <td><strong> Kapasitas Harddisk </strong></td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_ahp->c4 * 100,0,",",".") . ' %' }} </strong> </td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_langsung->c4 * 100,0,",",".") . ' %' }} </strong> </td>
                  </tr><tr>
                    <td class="goCenter custColor">C5</td>
                    <td><strong> Kapasitas SSD </strong></td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_ahp->c5 * 100,0,",",".") . ' %' }} </strong> </td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_langsung->c5 * 100,0,",",".") . ' %' }} </strong> </td>
                  </tr><tr>
                    <td class="goCenter custColor">C6</td>
                    <td><strong> Kapasitas V-RAM </strong></td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_ahp->c6 * 100,0,",",".") . ' %' }} </strong> </td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_langsung->c6 * 100,0,",",".") . ' %' }} </strong> </td>
                  </tr><tr>
                    <td class="goCenter custColor">C7</td>
                    <td><strong> Kapasitas maksimal upgrade RAM </strong></td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_ahp->c7 * 100,0,",",".") . ' %' }} </strong> </td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_langsung->c7 * 100,0,",",".") . ' %' }} </strong> </td>
                  </tr><tr>
                    <td class="goCenter custColor">C8</td>
                    <td><strong> Berat laptop </strong></td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_ahp->c8 * 100,0,",",".") . ' %' }} </strong> </td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_langsung->c8 * 100,0,",",".") . ' %' }} </strong> </td>
                  </tr><tr>
                    <td class="goCenter custColor">C9</td>
                    <td><strong> Ukuran layar </strong></td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_ahp->c9 * 100,0,",",".") . ' %' }} </strong> </td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_langsung->c9 * 100,0,",",".") . ' %' }} </strong> </td>
                  </tr><tr>
                    <td class="goCenter custColor">C10</td>
                    <td><strong> Jenis layar </strong></td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_ahp->c10 * 100,0,",",".") . ' %' }} </strong> </td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_langsung->c10 * 100,0,",",".") . ' %' }} </strong> </td>
                  </tr><tr>
                    <td class="goCenter custColor">C11</td>
                    <td><strong> Refresh rate layar </strong></td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_ahp->c11 * 100,0,",",".") . ' %' }} </strong> </td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_langsung->c11 * 100,0,",",".") . ' %' }} </strong> </td>
                  </tr><tr>
                    <td class="goCenter custColor">C12</td>
                    <td><strong> Resolusi layar </strong></td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_ahp->c12 * 100,0,",",".") . ' %' }} </strong> </td>
                    <td class="goCenter"> <strong> {{ number_format($bobot_langsung->c12 * 100,0,",",".") . ' %' }} </strong> </td>
                  </tr>
                  

                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
      <!-- /.card -->
    </div>
</section>

<script>
    function disable_enable_input_form(event) {
        var source = event.target || event.srcElement;
        var source_element = document.getElementById(source.id);

        var id = source.id;
        var input_form_target_id = id.split('_')[0];
        var target_element = document.getElementById(input_form_target_id);

        var radio_input_val = id.split('_')[1];

        if (radio_input_val === "rad3") {
            target_element.disabled = false;
        } else {
            target_element.disabled = true;
        }
    }

    var radios = document.querySelectorAll("input[type=radio]");

    for (const element of radios) {
        element.addEventListener('change', disable_enable_input_form, false);
    };

</script>

@endsection