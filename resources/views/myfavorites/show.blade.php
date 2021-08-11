@extends('adminlte::page')

@section('title', 'Products Management')

@section('content_header')
<h2> Show Product </h2>
<div class="pull-right">
    
    {{-- <a class="btn btn-secondary" href="{{ route('myfavorites.index') }}"> Back</a> --}}

    @if ( !($is_favorite) )
        {{-- <a class="btn btn-success" href="{{ route('myfavorites.store',$product->id) }}"> Add to favorite</a> --}}
        {{-- <button type="submit" class="btn btn-success"> <i class="fas fa-star"></i> Add to favorite</button> --}}

        <form action="{{ route('myfavorites.store',$product->id) }}" method="POST">
            <a class="btn btn-secondary" href="{{ route('myfavorites.index') }}"> Back</a>

            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            @csrf
            <button type="submit" class="btn btn-success"> <i class="fas fa-star"></i> Add to favorite</button>
            {{-- <a class="btn btn-danger" href="{{ route('myfavorites.store') }}"> Add to favorite</a> --}}
        </form>
    @else
        {{-- <a class="btn btn-danger" href="{{ route('myfavorites.destroy',$product->id) }}"> Remove from favorite</a> --}}

        <form action="{{ route('myfavorites.destroy',$product->id) }}" method="POST">
            
            <a class="btn btn-secondary" href="{{ route('myfavorites.index') }}"> Back</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger "> <i class="far fa-star"></i> Remove from favorite</button>

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



<table class="table table-hover table-striped">
    <tr>
        <td><strong>Product Name</strong></td>
        <td>{{ $product->name }}</td>
    </tr><tr>
        <td><strong>Details</strong></td>
        <td>{{ $product->detail }}</td>
    </tr><tr>
        <td><strong>Harga (Rp)</strong></td>
        <td>            Rp{{ $product->harga }}</td>
    </tr><tr>
        <td><strong>Prosesor (GHz)  (Baseclock(GHz) x Threads)</strong> </td>
        <td>            {{ $product->prosesor }} GHz</td>
    </tr><tr>
        <td><strong>Kapasitas RAM (GB)</strong></td>
        <td>            {{ $product->kapasitas_ram }} GB</td>
    </tr><tr>
        <td><strong>Kapasitas HDD (GB)</strong></td>
        <td>            {{ $product->kapasitas_hdd }} GB</td>
    </tr><tr>
        <td><strong>Kapasitas SSD (GB)</strong></td>
        <td>            {{ $product->kapasitas_ssd }} GB</td>
    </tr><tr>
        <td><strong>Kapasitas VRAM (GB)</strong></td>
        <td>            {{ $product->kapasitas_vram }} GB</td>
    </tr><tr>
        <td width='30%'><strong>Kapasitas maksimal upgrade RAM (GB)</strong></td>
        <td>            {{ $product->kapasitas_maxram }} GB</td>
    </tr><tr>
        <td><strong>Berat (Gram)</strong></td>
        <td>            {{ $product->berat }} gram</td>
    </tr><tr>
        <td><strong>Jenis layar</strong></td>
        <td>@if ( $product->jenis_layar  === 1)Twisted Nematic (TN)@endif
            @if ( $product->jenis_layar  === 3)In-Plane Switching (IPS) @endif
            @if ( $product->jenis_layar  === 5)Organic Light-emitting Diode (OLED) @endif</td>
    </tr><tr>
        <td><strong>Refresh rate layar (Hz)</strong></td>
        <td>            {{ $product->refresh_rate }} Hz</td>
    </tr><tr>
        <td><strong>Resolusi layar (jumlah pixel)</strong></td>
        <td>            {{ $product->resolusi_layar }} pixel</td>
    </tr>
</table>


        </div>
    </div>
</section>

@endsection
