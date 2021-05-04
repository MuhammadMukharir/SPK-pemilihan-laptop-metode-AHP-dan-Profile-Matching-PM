@extends('adminlte::page')

@section('title', 'Hasil Rekomendasi Laptop')

@section('content_header')
<script src='https://code.jquery.com/jquery-3.1.1.min.js' type='text/javascript'></script>
<h2> Hasil Rekomendasi Laptop </h2>
@stop

@section('content')

<p>Hello {{ auth()->user()->name }}, berikut hasil rekomendasi produk</p>

<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="card">
        <div class="card-body p-0">
            
<table class="table table- table-hover">
    <tr>
        <th style="text-align: center">Peringkat</th>
        <th>Nama Produk</th>
        <th>Skor Rekomendasi</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th width='320px'>Action</th>
    </tr>
    @foreach ($products as $key => $product)
    <tr>
        <td style="text-align: center"> <strong> @if ($key===0) <i class="fas fa-fw fa-crown"></i>@else {{ $key+1 }} @endif   </strong></td>
        <td><i class="fas fa-fw fa-laptop"></i> <strong> {{ $product->name }} </strong></td>
        <td><strong>{{ $product->n_bobot }} </strong></td>
        <td>Rp{{ number_format($product->harga,0,",",".") }}</td>
        <td>{{ $product->detail }}</td>
        <td>
            {{-- <a class="btn btn-info" href="{{ route('search.show',$product->id) }}">Show</a> --}}

            @if ( !($product->fav_product_id) )

                <form action="{{ route('myfavorites.store',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('search.show',$product->id) }}"> Detail</a>

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    @csrf
                    <button type="submit" class="btn btn-link"> <i class="fas fa-star"></i> Add to favorite</button>
                    {{-- <a class="btn btn-danger" href="{{ route('myfavorites.store') }}"> Add to favorite</a> --}}
                </form>
            @else
                <form action="{{ route('myfavorites.destroy',$product->id) }}" method="POST">
                    
                    <a class="btn btn-info" href="{{ route('search.show',$product->id) }}">Detail</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link "> <i class="far fa-star"></i> Remove from favorite</button>

                </form>  
            @endif

        </td>
    </tr>
    @endforeach
</table>


{{-- {!! $products->links() !!} --}}
{{-- @include('pagination.index', ['paginator' => $products]) --}}

        </div>
    </div>
</section>



@endsection