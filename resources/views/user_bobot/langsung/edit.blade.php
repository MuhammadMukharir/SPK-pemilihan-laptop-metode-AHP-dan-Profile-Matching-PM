@extends('adminlte::page')

@section('title', 'Pembobotan Langsung')

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

<h2> Edit Pembobotan Langsung </h2>

<form id="presetpreferenceForm" action="{{ route('user.bobot.langsung.update') }}" method="POST">
    @csrf

<div class="pull-right">
    {{-- <a class="btn btn-warning" href="{{ route('rekomendasi.list_preset') }}"> Use Preset Value</a> --}}
    <a class="btn btn-secondary" href="{{ url()->previous() }}"> Back</a>
    <noscript>
        <input type="submit" value="Submit form!" />
    </noscript>
    <button type="submit" class="btn btn-primary"> Submit</button>
</div>
@stop

@section('content')
<p>Hello {{ auth()->user()->name }}, masukkan nilai bobot langsung spesifikasi laptop yang Anda inginkan (0.00 - 10.00).</p>


<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    {{-- <div class="card">
        <div class="card-body"> --}}


    {{-- {{ $presetpreference = $presetpreference[0] }} --}}
    {{-- <div class="row"> --}}
    {{-- <div class="row" style="overflow: auto; max-height: 70vh"> --}}
        <div class="column">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Harga:</strong>
                <input  type="number" name="harga" value="{{ $bobot_langsung->c1 }}" class="form-control" placeholder="Harga (Rp)" min=0 step="0.01" max="10" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Prosesor: </strong>
                <input  type="number " name="prosesor" value="{{ $bobot_langsung->c2 }}" class="form-control" placeholder="Prosesor (GHz)" min=0 step="0.01" max="10" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Kapasitas RAM:</strong>
                <input  type="number" name="kapasitas_ram" value="{{ $bobot_langsung->c3 }}" class="form-control" placeholder="Kapasitas RAM (GB)" min=0 step="0.01" max="10" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Kapasitas HDD:</strong>
                <input  type="number" name="kapasitas_hdd" value="{{ $bobot_langsung->c4 }}" class="form-control" placeholder="Kapasitas HDD (GB)" min=0 step="0.01" max="10" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Kapasitas SSD:</strong>
                <input  type="number" name="kapasitas_ssd" value="{{ $bobot_langsung->c5 }}" class="form-control" placeholder="Kapasitas SSD (GB)" min=0 step="0.01" max="10" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Kapasitas VRAM:</strong>
                <input  type="number" name="kapasitas_vram" value="{{ $bobot_langsung->c6 }}" class="form-control" placeholder="Kapasitas VRAM (GB)" min=0 step="0.01" max="10" required>
            </div>
        </div>
        </div>

        <div class="column">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Kapasitas maksimal upgrade RAM:</strong>
                <input  type="number" name="kapasitas_maxram" value="{{ $bobot_langsung->c7 }}" class="form-control" placeholder="Kapasitas maksimal upgrade RAM (GB)" min=0 step="0.01" max="10" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Berat:</strong>
                <input  type="number" name="berat" value="{{ $bobot_langsung->c8 }}" class="form-control" placeholder="Berat (Gram)" min=0 step="0.01" max="10" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Ukuran layar:</strong>
                <input  type="number" name="ukuran_layar" value="{{ $bobot_langsung->c9 }}" class="form-control" placeholder="Ukuran layar (Inci)" min=0 step="0.01" max="10" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                {{-- <label for="inputStatus">Jenis layar</label> --}}
                <strong>Bobot Jenis layar:</strong>
                <input  type="number" name="jenis_layar" value="{{ $bobot_langsung->c10}}" class="form-control" placeholder="Refresh rate layar (Hz)" min=0 step="0.01" max="10" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Refresh rate layar:</strong>
                <input  type="number" name="refresh_rate" value="{{ $bobot_langsung->c11}}" class="form-control" placeholder="Refresh rate layar (Hz)" min=0 step="0.01" max="10" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Resolusi layar:</strong>
                <input  type="number" name="resolusi_layar" value="{{ $bobot_langsung->c12 }}" class="form-control" placeholder="Refresh rate layar (Hz)" min=0 step="0.01" max="10" required>
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