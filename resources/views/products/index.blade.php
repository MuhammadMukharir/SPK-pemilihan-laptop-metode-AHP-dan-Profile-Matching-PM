@extends('adminlte::page')

@section('title', 'Products Management')

@section('content_header')
<h2> Products Management </h2>
@stop

@section('content')

<p>Hello {{ auth()->user()->name }}, here you can manage your products</p>

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
            @can('product-create')
            <a class="btn btn-success" href="{{ route('products.create') }}"> <i class="fas fa-plus"></i> Create New Product</a>
            @endcan
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
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $key => $product)
    <tr>
        {{-- <td>{{ ++$i }}</td> --}}
        <td style="text-align: center">{{ $key+1 }}</td>
        <td><i class="fas fa-fw fa-laptop"></i>  {{ $product->name }} </td>
        <td> Rp{{ number_format($product->harga,0,",",".") }}</td>
        <td>{{ $product->detail }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Detail</a>
                @can('product-edit')
                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                @endcan


                @csrf
                @method('DELETE')
                @can('product-delete')
                <button type="submit" class="btn btn-danger">Delete</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>


{{-- {!! $products->links() !!} --}}
{{-- @include('pagination.index', ['paginator' => $products]) --}}

        {{-- </div> --}}
    {{-- </div> --}}
</section>


@endsection