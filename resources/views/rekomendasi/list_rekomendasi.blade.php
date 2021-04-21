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
        <th>Product Name</th>
        <th>Skor Rekomendasi</th>
        <th>Harga</th>
        <th>Details</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $key => $product)
    <tr>
        <td style="text-align: center"> <strong>{{ $key+1 }}</strong></td>
        <td><strong>{{ $product->name }} </strong></td>
        <td>{{ $n_bobot[$key] }}</td>
        <td>Rp{{ number_format($product->harga,0,",",".") }}</td>
        <td>{{ $product->detail }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('search.show',$product->id) }}">Show</a>
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