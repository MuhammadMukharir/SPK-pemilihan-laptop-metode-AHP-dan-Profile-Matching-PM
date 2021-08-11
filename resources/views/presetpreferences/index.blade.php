@extends('adminlte::page')

@section('title', 'Preset Preferences Management')

@section('content_header')
<h2> Preset Preferences Management </h2>
@stop

@section('content')

<p>Hello {{ auth()->user()->name }}, here you can manage preset preferences value</p>

<div class="content">
    <div class="container-fluid">
        @include('partials.alert')
        @yield('content')
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    {{-- <div class="card"> --}}
        {{-- <div class="card-header">
            <h4>Preset Preferences</h4>
            <a class="btn btn-success" href="{{ route('presetpreferences.create') }}"> Create New Preset Preferences</a>
        </div> --}}
        {{-- <div class="card-body"> --}}

<div class="row">
    <div class="col-lg-12 margin-tb">
        {{-- <div class="pull-left">
            <h2>Preset Preferences</h2>
        </div> --}}
        <div class="pull-right">
            @can('product-create')
            <a class="btn btn-success" href="{{ route('presetpreferences.create') }}"> <i class="fas fa-plus"></i> Buat Baru Nilai Preset Preferensi</a>
            @endcan
        </div>
    </div>
</div>
<br>


<table class="table table- table-hover">
    <tr>
        <th style="text-align: center">No</th>
        <th>Nama Preferensi</th>
        <th>Deskripsi</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($presetpreferences as $key => $presetpreference)
    <tr>
        {{-- <td>{{ ++$i }}</td> --}}
        <td style="text-align: center">{{ $key+1 }}</td>
        <td><i class="fas fa-fw fa-bullseye"></i> {{ $presetpreference->name }}</td>
        <td>{{ $presetpreference->detail }}</td>
        <td>
            <form action="{{ route('presetpreferences.destroy',$presetpreference->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('presetpreferences.show',$presetpreference->id) }}">Show</a>
                @can('product-edit')
                <a class="btn btn-primary" href="{{ route('presetpreferences.edit',$presetpreference->id) }}">Edit</a>
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


{{-- {!! $presetpreferences->links() !!} --}}
{{-- @include('pagination.index', ['paginator' => $presetpreferences]) --}}

        {{-- </div> --}}
    {{-- </div> --}}
</section>


@endsection