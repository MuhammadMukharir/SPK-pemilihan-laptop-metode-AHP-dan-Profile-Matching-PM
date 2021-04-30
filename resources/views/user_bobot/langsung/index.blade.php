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

<h2> Pembobotan Langsung </h2>

<form id="presetpreferenceForm" action="{{ route('rekomendasi.hasil') }}" method="POST">
    @csrf

<div class="pull-right">
    <a class="btn btn-secondary btn-" href="{{ route('rekomendasi.index') }}"> <i class="fas fa-fw fa-laptop"></i> Mulai Rekomendasi </a>
    <a class="btn btn-primary" href="{{ route('user.bobot.langsung.edit') }}"> <i class="fas fa-fw fa-balance-scale"></i> Edit bobot</a>
    <noscript>
        <input type="submit" value="Submit form!" />
    </noscript>
    {{-- <button type="submit" class="btn btn-primary"> Rekomendasikan!</button> --}}
</div>
@stop

@section('content')
<p>Hello {{ auth()->user()->name }}, berikut nilai bobot langsung spesifikasi laptop yang Anda inginkan (semakin tinggi nilai bobot semakin diprioritaskan).</p>


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
                <input disabled type="number" name="harga" value="{{ $bobot_langsung->c1 }}" class="form-control" placeholder="Harga (Rp)" min=0 max="200000000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Prosesor: </strong>
                <input disabled type="number" name="prosesor" value="{{ $bobot_langsung->c2 }}" class="form-control" placeholder="Prosesor (GHz)" min=0 step="0.01" max="200" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Kapasitas RAM:</strong>
                <input disabled type="number" name="kapasitas_ram" value="{{ $bobot_langsung->c3 }}" class="form-control" placeholder="Kapasitas RAM (GB)" min="0.1" step="0.1" max="64" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Kapasitas HDD:</strong>
                <input disabled type="number" name="kapasitas_hdd" value="{{ $bobot_langsung->c4 }}" class="form-control" placeholder="Kapasitas HDD (GB)" min="0" step="0.1" max="5000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Kapasitas SSD:</strong>
                <input disabled type="number" name="kapasitas_ssd" value="{{ $bobot_langsung->c5 }}" class="form-control" placeholder="Kapasitas SSD (GB)" min="0" step="0.1" max="5000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Kapasitas VRAM:</strong>
                <input disabled type="number" name="kapasitas_vram" value="{{ $bobot_langsung->c6 }}" class="form-control" placeholder="Kapasitas VRAM (GB)" min="0.1" step="0.1" max="32" required>
            </div>
        </div>
        </div>

        <div class="column">
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Kapasitas maksimal upgrade RAM:</strong>
                <input disabled type="number" name="kapasitas_maxram" value="{{ $bobot_langsung->c7 }}" class="form-control" placeholder="Kapasitas maksimal upgrade RAM (GB)" min="0.1" step="0.1" max="64" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Berat:</strong>
                <input disabled type="number" name="berat" value="{{ $bobot_langsung->c8 }}" class="form-control" placeholder="Berat (Gram)" min=0 max="10000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Ukuran layar:</strong>
                <input disabled type="number" name="ukuran_layar" value="{{ $bobot_langsung->c9 }}" class="form-control" placeholder="Ukuran layar (Inci)" min=5 step="0.1" max="30" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                {{-- <label for="inputStatus">Jenis layar</label> --}}
                <strong>Bobot Jenis layar:</strong>
                <input disabled type="number" name="jenis_layar" value="{{ $bobot_langsung->c10}}" class="form-control" placeholder="Refresh rate layar (Hz)" min=0 max="1000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Refresh rate layar:</strong>
                <input disabled type="number" name="refresh_rate" value="{{ $bobot_langsung->c11}}" class="form-control" placeholder="Refresh rate layar (Hz)" min=0 max="1000" required>
            </div>
        </div>
        <div class="col-xs-11 col-sm-11 col-md-11">
            <div class="form-group">
                <strong>Bobot Resolusi layar:</strong>
                <input disabled type="number" name="resolusi_layar" value="{{ $bobot_langsung->c12 }}" class="form-control" placeholder="Refresh rate layar (Hz)" min=0 max="1000" required>
            </div>
        </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div> --}}
        </div>

    </form>
    {{-- <a class="btn btn-primary" href="{{ route('user.bobot.langsung.edit') }}"> Edit bobot</a> --}}


        {{-- </div>
    </div> --}}
</section>

@endsection