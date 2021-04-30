@extends('adminlte::page')

@section('title', 'My Favorite Products')

@section('content_header')
<h2> My Favorite Products </h2>
@stop

@section('content')

<p>Hello {{ auth()->user()->name }}, here you can manage your favorite products</p>

<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    {{-- <div class="card"> --}}
        {{-- <div class="card-header">
            <h4>Products</h4>
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
        </div> --}}
        {{-- <div class="card-body"> --}}

<div class="row">
    <div class="col-lg-12 margin-tb">
        {{-- <div class="pull-left">
            <h2>Products</h2>
        </div> --}}
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('search.index') }}"> <i class="fas fa-plus"></i> Add Product</a>
        </div>
    </div>
</div>
<br>


<table class="table table- table-hover">
    <tr>
        <th style="text-align: center">No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th width='280px'>Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td style="text-align: center">{{ ++$i }}</td>
        <td>{{ $product->name }}</td>
        <td>Rp{{ number_format($product->harga,0,",",".") }}</td>
        <td>{{ $product->detail }}</td>
        <td>
            <form action="{{ route('myfavorites.destroy',$product->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('myfavorites.show',$product->id) }}">Detail</a>

                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Remove</button>

            </form>
        </td>
    </tr>
    @endforeach
</table>


{{-- {!! $products->links() !!} --}}
@include('pagination.index', ['paginator' => $products])

        {{-- </div>
    </div> --}}
</section>


@endsection