@extends('adminlte::page')

@section('title', 'Cari Laptop')

@section('content_header')
<script src='https://code.jquery.com/jquery-3.1.1.min.js' type='text/javascript'></script>
<h2> Cari Laptop </h2>
@stop

@section('content')

<p>Hello {{ auth()->user()->name }}, here you can search your products</p>

<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    {{-- <div class="card">
        <div class="card-body"> --}}

{{-- <div style="padding: 50px"> --}}
<table class="table table- table-hover" >
    <tr>
        <th style="text-align: center">No</th>
        <th>Product Name</th>
        <th>Harga</th>
        <th>Details</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td style="text-align: center">{{ ++$i }}</td>
        <td><strong>{{ $product->name }}</strong></td>
        <td><strong> Rp{{ number_format($product->harga,0,",",".") }} </strong></td>
        <td>{{ $product->detail }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('search.show',$product->id) }}">Show</a>
        </td>
    </tr>
    @endforeach
</table>
{{-- </div> --}}


{{-- {!! $products->links() !!} --}}
{{-- @include('pagination.index', ['paginator' => $products]) --}}

        {{-- </div>
    </div> --}}
</section>



@endsection