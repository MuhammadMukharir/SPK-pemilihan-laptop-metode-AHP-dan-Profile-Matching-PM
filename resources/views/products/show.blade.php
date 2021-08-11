@extends('adminlte::page')

@section('title', 'Products Management')

@section('content_header')
<h2> Show Product </h2>
<div class="pull-right">
    <a class="btn btn-secondary" href="{{ route('products.index') }}"> Back</a>
    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

    
    {{-- <form action="{{ route('myfavorites.store',$product->id) }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <button type="submit" class="btn btn-danger">Add to favorite</button>
        <a class="btn btn-danger" href="{{ route('myfavorites.store') }}"> Add to favorite</a>
    </form> --}}

</div>
@stop

@section('content')

<section class="content">
    <div class="card">
        <div class="card-body p-0">

{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
        </div>
    </div>
</div> --}}


<table class="table table-hover table-striped">
    <tr>
        <td><strong>Product Name</strong></td>
        <td><strong>{{ $product->name }}</td>
    </tr><tr>
        <td><strong>Details</strong></td>
        <td><strong>{{ $product->detail }}</strong></td>
    </tr><tr>
        <td><strong>Harga (Rp)</strong></td>
        <td><strong>            Rp{{ $product->harga }}</strong></td>
    </tr><tr>
        <td><strong>Prosesor (GHz)  (Baseclock(GHz) x Threads)</strong> </td>
        <td><strong>            {{ $product->prosesor }} GHz</strong></td>
    </tr><tr>
        <td><strong>Kapasitas RAM (GB)</strong></td>
        <td><strong>            {{ $product->kapasitas_ram }} GB</strong></td>
    </tr><tr>
        <td><strong>Kapasitas HDD (GB)</strong></td>
        <td><strong>            {{ $product->kapasitas_hdd }} GB</strong></td>
    </tr><tr>
        <td><strong>Kapasitas SSD (GB)</strong></td>
        <td><strong>            {{ $product->kapasitas_ssd }} GB</strong></td>
    </tr><tr>
        <td><strong>Kapasitas VRAM (GB)</strong></td>
        <td><strong>            {{ $product->kapasitas_vram }} GB</strong></td>
    </tr><tr>
        <td width='30%'><strong>Kapasitas maksimal upgrade RAM (GB)</strong></td>
        <td><strong>            {{ $product->kapasitas_maxram }} GB</strong></td>
    </tr><tr>
        <td><strong>Berat (Gram)</strong></td>
        <td><strong>            {{ $product->berat }} gram</strong></td>
    </tr><tr>
        <td><strong>Ukuran layar</strong></td>
        <td><strong>            {{ $product->ukuran_layar }} inci</strong></td>
    </tr><tr>
        <td><strong>Jenis layar</strong></td>
        <td><strong>@if ( $product->jenis_layar  === 1)Twisted Nematic (TN)@endif
            @if ( $product->jenis_layar  === 3)In-Plane Switching (IPS) @endif
            @if ( $product->jenis_layar  === 5)Organic Light-emitting Diode (OLED) @endif</strong></td>
    </tr><tr>
        <td><strong>Refresh rate layar (Hz)</strong></td>
        <td><strong>            {{ $product->refresh_rate }} Hz</strong></td>
    </tr><tr>
        <td><strong>Resolusi layar (jumlah pixel)</strong></td>
        <td><strong>            {{ $product->resolusi_layar }} pixel</strong></td>
    </tr>
</table>


        </div>
    </div>
</section>

@endsection
