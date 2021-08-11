@extends('adminlte::page')

@section('title', 'Laptop Detail')

@section('content_header')
<h2> Show Product </h2>
<div class="pull-right">

    @if ( !($is_favorite) )
        <form action="{{ route('myfavorites.store',$product->id) }}" method="POST">

            {{-- <a class="btn btn-secondary" href="{{ route('search.index') }}"> Back</a> --}}
            <a class="btn btn-secondary" href="{{ url()->previous()  }}"> Back</a>

            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            @csrf
            <button type="submit" class="btn btn-success"> <i class="fas fa-star"></i> Add to favorite</button>
            {{-- <a class="btn btn-danger" href="{{ route('myfavorites.store') }}"> Add to favorite</a> --}}
        </form>
    @else
        <form action="{{ route('myfavorites.destroy',$product->id) }}" method="POST">
            {{-- <a class="btn btn-secondary" href="{{ route('search.index') }}"> Back</a> --}}
            <a class="btn btn-secondary" href="{{ rekomendasi.hasil.index  }}"> Back</a>
            @csrf 
            @method('DELETE')
            <button type="submit" class="btn btn-danger"> <i class="far fa-star"></i> Remove from favorite</button>

        </form>  
    @endif

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
    <div class="card">
        <div class="card-body p-0">

{{-- <div class="row"> --}}
    <table class="table table-hover table-striped">
        <tr>
            <td><strong>Product Name</strong></td>
            <td><strong>{{ $product->name }}</strong></td>
        </tr><tr>
            <td><strong>Details</strong></td>
            <td><strong>{{ $product->detail }}</strong></td>
        </tr><tr>
            <td><strong>Harga (Rp)</strong></td>
            <td><strong>            Rp{{ $product->harga }}</strong></td>
        </tr><tr>
            <td><strong>Prosesor (GHz)  (Baseclock(GHz) x Threads)</strong> </td>
            <td><strong>            {{ $product->prosesor }} GHz</td>
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
{{-- </div> --}}

        </div>
    </div>
</section>

@endsection
