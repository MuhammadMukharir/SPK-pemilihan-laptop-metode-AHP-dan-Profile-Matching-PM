@extends('adminlte::page')

@section('title', 'Preset Preferences Management')

@section('content_header')
<h2> Pilih Satu Preset Preferensi </h2>
<div class="pull-right">
    <a class="btn btn-secondary" href="{{ route('rekomendasi.index') }}"> Back</a>
</div>
@stop

@section('content')

{{-- <h4>Hello {{ auth()->user()->name }}, silakan pilih nilai preset preferensi spesifikasi laptop yang tersedia dengan menekan tombol Gunakan Preset</h4> --}}

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
        <th style="text-align: center">No</th>
        <th>Nama Preferensi</th>
        <th>Deskripsi</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($presetpreferences as $key => $presetpreference)
    <tr>
        <td style="text-align: center">{{ $key + 1 }}</td>
        <td> <i class="fas fa-fw fa-bullseye"></i> {{ $presetpreference->name }}</td>
        <td>{{ $presetpreference->detail }}</td>
        <td>
                <a class="btn btn-info" href="{{ route('rekomendasi.preset.show',$presetpreference->id) }}">Detail</a>
                <a class="btn btn-warning" href="{{ route('rekomendasi.preset.use',$presetpreference->id) }}">Gunakan preset</a>

            </form>
        </td>
    </tr>
    @endforeach
</table>


{{-- {!! $presetpreferences->links() !!} --}}
{{-- @include('pagination.index', ['paginator' => $presetpreferences]) --}}

        </div>
    </div>
</section>


@endsection