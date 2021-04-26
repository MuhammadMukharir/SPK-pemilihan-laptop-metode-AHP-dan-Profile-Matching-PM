@extends('adminlte::page')

@section('title', 'Products Management')

@section('content_header')
<h2> Add New Product </h2>

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

{{-- https://stackoverflow.com/questions/40702308/required-attribute-not-working --}}
<form id="productCreateForm" action="{{ route('products.store') }}" method="POST">
    @csrf

<div class="pull-right">
    <a class="btn btn-secondary" href="{{ route('products.index') }}"> Back</a>
    <noscript>
        <input type="submit" value="Submit form!" />
    </noscript>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
@stop

@section('content')

<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    {{-- <div class="card">
        <div class="card-body"> --}}

{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div> --}}




    {{-- <div class="row"> --}}
    {{-- <div class="row" style="overflow: auto; height:450px; max-height: 100vh"> --}}
    <div class="row" style="overflow: auto; max-height: 80vh">
        <div class="column">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Harga (Rp):</strong>
                <input type="number" name="harga" class="form-control" placeholder="Harga (Rp)" min=0 max="200000000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Prosesor (GHz): </strong> (Baseclock(GHz) x Threads)
                <input type="number" name="prosesor" class="form-control" placeholder="Prosesor (GHz)" min=0 step="0.1" max="200"  required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas RAM (GB):</strong>
                <input type="number" name="kapasitas_ram" class="form-control" placeholder="Kapasitas RAM (GB)" min="0.1" step="0.1" max="64" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas HDD (GB):</strong>
                <input type="number" name="kapasitas_hdd" class="form-control" placeholder="Kapasitas HDD (GB)" min="0" step="0.1" max="5000"  required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas SSD (GB):</strong>
                <input type="number" name="kapasitas_ssd" class="form-control" placeholder="Kapasitas SSD (GB)" min="0" step="0.1" max="5000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas VRAM (GB):</strong>
                <input type="number" name="kapasitas_vram" class="form-control" placeholder="Kapasitas VRAM (GB)" min="0.1" step="0.1" max="32" required>
            </div>
        </div>
        </div>

        <div class="column">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Kapasitas maksimal upgrade RAM (GB):</strong>
                <input type="number" name="kapasitas_maxram" class="form-control" placeholder="Kapasitas maksimal upgrade RAM (GB)" min="0.1" step="0.1" max="64" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Berat (Gram):</strong>
                <input type="number" name="berat" class="form-control" placeholder="Berat (Gram)" min=0 max="10000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Ukuran layar (Inci):</strong>
                <input type="number" name="ukuran_layar" class="form-control" placeholder="Ukuran layar (Inci)" min=5 step="0.1" max="30" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                {{-- <label for="inputStatus">Jenis layar</label> --}}
                <strong>Jenis layar:</strong>
                <select name="jenis_layar" class="form-control custom-select" required>
                    <option value="" selected disabled>-- Pilih salah satu --</option>
                    <option value="1">Twisted Nematic (TN)</option>
                    <option value="3">In-Plane Switching (IPS)</option>
                    <option value="5">Organic Light-emitting Diode (OLED)</option>
                </select>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Refresh rate layar (Hz):</strong>
                <input type="number" name="refresh_rate" class="form-control" placeholder="Refresh rate layar (Hz)" min=0 max="1000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Resolusi layar (jumlah pixel):</strong> (pixel vertical x pixel horizontal) 
                <input type="number" name="resolusi_layar" class="form-control" placeholder="Jumlah pixel (pixel vertical x pixel horizontal)" min=0 max="80000000" list="resolution" required>
                <datalist id="resolution">
                    <option value="8294400">3840 * 2160 (4K)</option>
                    <option value="2073600">1920 * 1080 (FullHD)</option>
                    <option value="1049088">1366 * 768 (HD+)</option>
                    <option value="921600" >1280 * 720 (HD)</option>
                </datalist>
            </div>
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
            </div>
        </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div> --}}
    </div>


</form>

        {{-- </div>
    </div> --}}
</section>

@endsection
